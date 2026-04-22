<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Repository\PartenaireRepository;
use App\Repository\PlatRepository;
use App\Repository\CollaborationProduitRepository;
use App\Service\RecommendationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/admin/partenaires')]
class AdminPartenaireController extends AbstractController
{
   public function __construct(
    private EntityManagerInterface $entityManager,
    private PartenaireRepository $partenaireRepository,
    private PlatRepository $platRepository,
    private CollaborationProduitRepository $collaborationProduitRepository,
    private RecommendationService $recommendationService,
    private HttpClientInterface $httpClient,
    private string $calendlyPartenaireUrl = '',
    private string $mapboxApiKey = '',
) {}

    // ─── Garde admin ─────────────────────────────────────────────────────────

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    // ─── Liste ────────────────────────────────────────────────────────────────

    #[Route('/', name: 'app_admin_partenaires_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();

        $statut = $request->query->get('statut', '');
        $search = $request->query->get('search', '');

        $partenaires = $statut
            ? $this->partenaireRepository->findByStatut($statut)
            : $this->partenaireRepository->findAll();

        // Filtre textuel côté PHP (recherche multi-champs)
        if (!empty($search)) {
            $partenaires = array_filter($partenaires, static function (Partenaire $p) use ($search): bool {
                return stripos((string) $p->getNom(), $search) !== false
                    || stripos((string) $p->getType(), $search) !== false
                    || stripos((string) $p->getTelephone(), $search) !== false;
            });
        }

        // ✅ Charger les plats par partenaire en batch (évite N+1)
        $platsParPartenaire = [];
        foreach ($partenaires as $partenaire) {
            $platsParPartenaire[$partenaire->getId()] = $this->platRepository->findByIdPartenaire($partenaire->getId());
        }

        $allPartenaires = $this->partenaireRepository->findAll();
        $stats = [
            'total'      => count($allPartenaires),
            'en_attente' => count($this->partenaireRepository->findByStatut('en_attente')),
            'accepte'    => count($this->partenaireRepository->findByStatut('accepte')),
            'refuse'     => count($this->partenaireRepository->findByStatut('refuse')),
        ];

        return $this->render('admin_partenaire/index.html.twig', [
            'partenaires'        => $partenaires,
            'platsParPartenaire' => $platsParPartenaire,
            'stats'              => $stats,
            'statutFiltre'       => $statut,
            'search'             => $search,
            'calendlyUrl'        => $this->calendlyPartenaireUrl !== '' ? $this->calendlyPartenaireUrl : null,
            'mapboxConfigured'   => $this->mapboxApiKey !== '',
        ]);
    }

    // ─── Accepter ─────────────────────────────────────────────────────────────

    #[Route('/{id}/accepter', name: 'app_admin_partenaire_accepter', methods: ['POST'])]
    public function accepter(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $partenaire = $this->partenaireRepository->find($id);
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }

        $partenaire->setStatut('accepte');
        $partenaire->setDateValidation(new \DateTime());
        $this->entityManager->flush();

        $this->addFlash('success', sprintf(
            '✅ Partenaire "%s" accepté avec succès ! Les recommandations de produits sont maintenant disponibles.',
            $partenaire->getNom()
        ));

        // Rediriger vers la fiche partenaire pour voir les recommandations
        return $this->redirectToRoute('app_admin_partenaire_voir', ['id' => $id]);
    }

    // ─── Refuser ──────────────────────────────────────────────────────────────

    #[Route('/{id}/refuser', name: 'app_admin_partenaire_refuser', methods: ['POST'])]
    public function refuser(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $partenaire = $this->partenaireRepository->find($id);
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }

        $motif = $request->request->get('motif', '');
        $partenaire->setStatut('refuse');
        $partenaire->setDateValidation(new \DateTime());
        $this->entityManager->flush();

        $this->addFlash('info', '❌ Partenaire refusé' . ($motif ? ' : ' . $motif : ''));

        return $this->redirectToRoute('app_admin_partenaires_index', [
            'statut' => $request->query->get('statut', ''),
            'search' => $request->query->get('search', ''),
        ]);
    }

    // ─── Supprimer ────────────────────────────────────────────────────────────

    #[Route('/{id}/supprimer', name: 'app_admin_partenaire_supprimer', methods: ['POST'])]
    public function supprimer(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $partenaire = $this->partenaireRepository->find($id);
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }

        $this->entityManager->remove($partenaire);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Partenaire supprimé avec succès !');

        return $this->redirectToRoute('app_admin_partenaires_index', [
            'statut' => $request->query->get('statut', ''),
            'search' => $request->query->get('search', ''),
        ]);
    }

    // ─── Voir (détail + plats + recommandations) ──────────────────────────────

    #[Route('/{id}/voir', name: 'app_admin_partenaire_voir', methods: ['GET'])]
    public function voir(int $id): Response
    {
        $this->checkAdmin();

        $partenaire = $this->partenaireRepository->find($id);
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }

        // ✅ Charger les plats du partenaire (1 requête)
        $plats = $this->platRepository->findByIdPartenaire($partenaire->getId());

        // ✅ Charger les collaborations du partenaire
        $collaborations = $this->collaborationProduitRepository->findByPartenaire($partenaire);
        
        // Grouper collaborations par statut
        $collaborationsParStatut = [];
        foreach ($collaborations as $collab) {
            $statut = $collab->getStatut();
            if (!isset($collaborationsParStatut[$statut])) {
                $collaborationsParStatut[$statut] = [];
            }
            $collaborationsParStatut[$statut][] = $collab;
        }

        // ✅ Recommandations produits basées sur les plats (disponible uniquement si accepté)
        $recommendations = [];
        if ($partenaire->getStatut() === 'accepte') {
            $recommendations = $this->recommendationService->getRecommendationsForPartenaire($partenaire);
        }

        // Statistiques des plats
        $platStats = [
            'total'      => count($plats),
            'en_attente' => count(array_filter($plats, fn($p) => $p->getStatut() === 'en_attente')),
            'accepte'    => count(array_filter($plats, fn($p) => $p->getStatut() === 'accepte')),
            'refuse'     => count(array_filter($plats, fn($p) => $p->getStatut() === 'refuse')),
        ];

        // Statistiques des collaborations
        $collaborationStats = [
            'total'     => count($collaborations),
            'validee'   => count($collaborationsParStatut['validee'] ?? []),
            'refusee'   => count($collaborationsParStatut['refusee'] ?? []),
            'annulee'   => count($collaborationsParStatut['annulee'] ?? []),
        ];

        return $this->render('admin_partenaire/voir.html.twig', [
            'partenaire'              => $partenaire,
            'plats'                   => $plats,
            'platStats'               => $platStats,
            'recommendations'         => $recommendations,
            'collaborations'          => $collaborations,
            'collaborationsParStatut' => $collaborationsParStatut,
            'collaborationStats'      => $collaborationStats,
        ]);
    }

    // ─── COLLABORATIONS ───────────────────────────────────────────

    /**
     * Liste toutes les collaborations
     */
    #[Route('/collaborations', name: 'app_admin_collaborations_index', methods: ['GET'])]
    public function indexCollaborations(Request $request): Response
    {
        $this->checkAdmin();

        $statut = $request->query->get('statut', '');
        $search = $request->query->get('search', '');

        $collaborations = $statut
            ? $this->collaborationProduitRepository->findByStatut($statut)
            : $this->collaborationProduitRepository->findAll();

        // Filtre textuel
        if (!empty($search)) {
            $collaborations = array_filter($collaborations, static function ($collab) use ($search): bool {
                $partNom = $collab->getPartenaire()?->getNom() ?? '';
                $prodNom = $collab->getProduit()?->getNom() ?? '';
                return stripos($partNom, $search) !== false || stripos($prodNom, $search) !== false;
            });
        }

        // Stats
        $allCollaborations = $this->collaborationProduitRepository->findAll();
        $stats = [
            'total'     => count($allCollaborations),
            'validee'   => count($this->collaborationProduitRepository->findByStatut('validee')),
            'refusee'   => count($this->collaborationProduitRepository->findByStatut('refusee')),
            'annulee'   => count($this->collaborationProduitRepository->findByStatut('annulee')),
        ];

        return $this->render('admin_partenaire/collaborations.html.twig', [
            'collaborations' => $collaborations,
            'stats'          => $stats,
            'statutFiltre'   => $statut,
            'search'         => $search,
        ]);
    }
    #[Route('/{id}/risk-detection', name: 'app_admin_partenaire_risk_detection', methods: ['POST'])]
public function riskDetection(int $id, Request $request): JsonResponse
{
    $this->checkAdmin();

    $partenaire = $this->partenaireRepository->find($id);

    if (!$partenaire) {
        return $this->json([
            'ok' => false,
            'message' => 'Partenaire non trouvé.'
        ], 404);
    }

    $nom = trim((string) $partenaire->getNom());
    $type = trim((string) $partenaire->getType());
    $telephone = trim((string) $partenaire->getTelephone());
    $adresse = trim((string) $partenaire->getAdresse());
    $description = trim((string) $partenaire->getDescription());
    $logo = $partenaire->getLogo();

    $score = 0;
    $reasons = [];

    // Description
    if ($description === '') {
        $score += 30;
        $reasons[] = 'Description absente.';
    } elseif (mb_strlen($description) < 20) {
        $score += 20;
        $reasons[] = 'Description trop courte.';
    } elseif (mb_strlen($description) < 50) {
        $score += 10;
        $reasons[] = 'Description peu détaillée.';
    }

    // Adresse
    if ($adresse === '') {
        $score += 30;
        $reasons[] = 'Adresse absente.';
    } else {
        if (mb_strlen($adresse) < 10) {
            $score += 15;
            $reasons[] = 'Adresse trop courte ou incomplète.';
        }

        $adresseLower = mb_strtolower($adresse);
        $badAddressWords = ['test', 'unknown', 'n/a', 'null', 'abc', 'fake', '???', 'xxxx'];

        foreach ($badAddressWords as $word) {
            if (str_contains($adresseLower, $word)) {
                $score += 20;
                $reasons[] = 'Adresse contenant une valeur suspecte.';
                break;
            }
        }
    }

    // Téléphone
    if ($telephone === '') {
        $score += 20;
        $reasons[] = 'Numéro de téléphone absent.';
    } else {
        $digits = preg_replace('/\D+/', '', $telephone);

        if (strlen($digits) < 8) {
            $score += 25;
            $reasons[] = 'Numéro de téléphone invalide.';
        }

        if ($digits !== '' && preg_match('/^(\d)\1+$/', $digits)) {
            $score += 25;
            $reasons[] = 'Numéro de téléphone répétitif et suspect.';
        }

        if (preg_match('/(1234|0000|1111|2222|3333|4444|5555|6666|7777|8888|9999)/', $digits)) {
            $score += 15;
            $reasons[] = 'Numéro contenant une séquence peu crédible.';
        }
    }

    // Logo
    if (empty($logo)) {
        $score += 10;
        $reasons[] = 'Logo absent.';
    }

    // Nom / type
    if ($nom === '' || mb_strlen($nom) < 3) {
        $score += 20;
        $reasons[] = 'Nom du partenaire trop court.';
    }

    if ($type === '' || mb_strlen($type) < 3) {
        $score += 10;
        $reasons[] = 'Type de partenaire peu précis.';
    }

    // Mots suspects
    $combined = mb_strtolower($nom . ' ' . $description);
    $suspiciousWords = ['urgent', 'quick money', 'fake', 'test', 'spam', 'gratuit', 'free money', 'arnaque'];

    foreach ($suspiciousWords as $word) {
        if (str_contains($combined, $word)) {
            $score += 20;
            $reasons[] = 'Contenu contenant des mots suspects.';
            break;
        }
    }

    // Téléphone dupliqué
    $samePhoneCount = 0;
    if ($telephone !== '') {
        $samePhoneCount = $this->partenaireRepository->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->andWhere('p.telephone = :telephone')
            ->andWhere('p.id != :id')
            ->setParameter('telephone', $partenaire->getTelephone())
            ->setParameter('id', $partenaire->getId())
            ->getQuery()
            ->getSingleScalarResult();

        if ((int) $samePhoneCount > 0) {
            $score += min(25, (int) $samePhoneCount * 10);
            $reasons[] = 'Numéro déjà utilisé par ' . $samePhoneCount . ' autre(s) partenaire(s).';
        }
    }

    // Adresse dupliquée
    $sameAddressCount = 0;
    if ($adresse !== '') {
        $sameAddressCount = $this->partenaireRepository->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->andWhere('p.adresse = :adresse')
            ->andWhere('p.id != :id')
            ->setParameter('adresse', $partenaire->getAdresse())
            ->setParameter('id', $partenaire->getId())
            ->getQuery()
            ->getSingleScalarResult();

        if ((int) $sameAddressCount > 1) {
            $score += 15;
            $reasons[] = 'Adresse partagée par plusieurs partenaires.';
        }
    }

    $score = min(100, $score);

    $riskLevel = 'low';
    $riskLabel = 'Faible';
    $summary = 'Profil globalement crédible.';

    if ($score >= 60) {
        $riskLevel = 'high';
        $riskLabel = 'Élevé';
        $summary = 'Profil potentiellement risqué. Vérification manuelle recommandée avant acceptation.';
    } elseif ($score >= 30) {
        $riskLevel = 'medium';
        $riskLabel = 'Moyen';
        $summary = 'Quelques signaux de risque détectés. Vérifiez les informations avant de continuer.';
    }

    return $this->json([
        'ok' => true,
        'partnerId' => $partenaire->getId(),
        'riskScore' => $score,
        'riskLevel' => $riskLevel,
        'riskLabel' => $riskLabel,
        'summary' => $summary,
        'reasons' => $reasons,
    ]);
}

    /**
     * Refuser une collaboration
     */
    #[Route('/geocode', name: 'app_admin_partenaire_geocode', methods: ['GET'])]
public function geocodeAddress(Request $request): JsonResponse
{
    $this->checkAdmin();

    $address = trim((string) $request->query->get('address', ''));

    if ($address === '') {
        return $this->json([
            'ok' => false,
            'message' => 'Adresse vide.'
        ], 400);
    }

    // On favorise Tunisie / Tunis si l'utilisateur ne précise pas le pays
    $query = $address;
    $lowerAddress = mb_strtolower($address);

    if (
        !str_contains($lowerAddress, 'tunisie') &&
        !str_contains($lowerAddress, 'tunisia') &&
        !str_contains($lowerAddress, 'tunis')
    ) {
        $query .= ', Tunis, Tunisie';
    }

    try {
        $response = $this->httpClient->request('GET', 'https://nominatim.openstreetmap.org/search', [
            'query' => [
                'q' => $query,
                'format' => 'jsonv2',
                'addressdetails' => 1,
                'limit' => 1,
                'countrycodes' => 'tn',
            ],
            'headers' => [
                'User-Agent' => 'Symfony Partner Admin Geocoder/1.0',
                'Accept' => 'application/json',
            ],
            'timeout' => 10,
        ]);

        $results = $response->toArray(false);

        if (empty($results)) {
            return $this->json([
                'ok' => false,
                'message' => 'Adresse non trouvée en Tunisie.'
            ], 404);
        }

        $first = $results[0];

        $lat = isset($first['lat']) ? (float) $first['lat'] : null;
        $lon = isset($first['lon']) ? (float) $first['lon'] : null;
        $displayName = $first['display_name'] ?? $address;

        $importance = isset($first['importance']) ? (float) $first['importance'] : 0;
        $type = $first['type'] ?? '';
        $class = $first['class'] ?? '';

        $confidence = 'faible';
        if ($importance >= 0.6) {
            $confidence = 'élevée';
        } elseif ($importance >= 0.3) {
            $confidence = 'moyenne';
        }

        return $this->json([
            'ok' => true,
            'message' => 'Adresse trouvée avec succès.',
            'data' => [
                'label' => $displayName,
                'lat' => $lat,
                'lon' => $lon,
                'type' => $type,
                'class' => $class,
                'confidence' => $confidence,
                'original' => $address,
            ]
        ]);
    } catch (\Throwable $e) {
        return $this->json([
            'ok' => false,
            'message' => 'Erreur serveur lors de la vérification de l’adresse.',
            'error' => $e->getMessage(),
        ], 500);
    }
}
    #[Route('/collaborations/{collaborationId}/refuser', name: 'app_admin_collaboration_refuser', methods: ['POST'])]
    public function refuserCollaboration(int $collaborationId, Request $request): Response
    {
        $this->checkAdmin();

        $collab = $this->collaborationProduitRepository->find($collaborationId);

        if (!$collab) {
            $this->addFlash('error', 'Collaboration non trouvée');
            return $this->redirectToRoute('app_admin_collaborations_index');
        }

        $partenaireName = $collab->getPartenaire()?->getNom() ?? 'Inconnu';
        $produitName = $collab->getProduit()?->getNom() ?? 'Inconnu';

        $collab->setStatut('refusee');
        $this->entityManager->flush();

        $this->addFlash('success', sprintf(
            '❌ Collaboration entre « %s » et « %s » refusée.',
            $partenaireName,
            $produitName
        ));

        return $this->redirectToRoute('app_admin_collaborations_index');
    }

    /**
     * Valider une collaboration refusée
     */
    #[Route('/collaborations/{collaborationId}/valider', name: 'app_admin_collaboration_valider', methods: ['POST'])]
    public function validerCollaboration(int $collaborationId): Response
    {
        $this->checkAdmin();

        $collab = $this->collaborationProduitRepository->find($collaborationId);

        if (!$collab) {
            $this->addFlash('error', 'Collaboration non trouvée');
            return $this->redirectToRoute('app_admin_collaborations_index');
        }

        $partenaireName = $collab->getPartenaire()?->getNom() ?? 'Inconnu';
        $produitName = $collab->getProduit()?->getNom() ?? 'Inconnu';

        $collab->setStatut('validee');
        $this->entityManager->flush();

        $this->addFlash('success', sprintf(
            '✅ Collaboration entre « %s » et « %s » validée.',
            $partenaireName,
            $produitName
        ));

        return $this->redirectToRoute('app_admin_collaborations_index');
    }
}
