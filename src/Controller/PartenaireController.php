<?php

namespace App\Controller;

use App\Entity\CollaborationProduit;
use App\Entity\Partenaire;
use App\Entity\Plat;
use App\Entity\Produit;
use App\Entity\Utilisateur;
use App\Repository\CollaborationProduitRepository;
use App\Repository\PartenaireRepository;
use App\Repository\PlatRepository;
use App\Repository\ProduitRepository;
use App\Service\PartnerLeadSyncService;
use App\Service\RecommendationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/partenaire')]
class PartenaireController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PartenaireRepository $partenaireRepository,
        private PlatRepository $platRepository,
        private RecommendationService $recommendationService,
        private CollaborationProduitRepository $collaborationProduitRepository,
        private ProduitRepository $produitRepository,
        private PartnerLeadSyncService $partnerLeadSyncService,
        private HttpClientInterface $httpClient,
        private string $calApiKey = '',
        private string $calUsername = '',
        private ?string $calTeamSlug = null,
        private ?string $calOrganizationSlug = null,
        private string $calEventTypeSlug = '',
        private string $calTimezone = 'Africa/Tunis',
        private string $calApiVersionSlots = '2024-09-04',
        private string $calApiVersionBookings = '2026-02-25',
    ) {}

    private function isCalApiConfigured(): bool
    {
        $teamSlug = trim((string) $this->calTeamSlug);
        $username = trim((string) $this->calUsername);

        return $this->calApiKey !== ''
            && $this->calEventTypeSlug !== ''
            && ($username !== '' || $teamSlug !== '');
    }

    private function buildCalEventSelector(): array
    {
        $selector = [
            'eventTypeSlug' => $this->calEventTypeSlug,
        ];

        $teamSlug = trim((string) $this->calTeamSlug);
        $organizationSlug = trim((string) $this->calOrganizationSlug);
        $username = trim((string) $this->calUsername);

        if ($teamSlug !== '') {
            $selector['teamSlug'] = $teamSlug;
        } else {
            $selector['username'] = $username;
        }

        if ($organizationSlug !== '') {
            $selector['organizationSlug'] = $organizationSlug;
        }

        return $selector;
    }

    #[Route('/', name: 'app_partenaire_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        $recommendations = [];
        $collaborationParProduitId = [];
        if ($partenaire && $partenaire->getStatut() === 'accepte') {
            $recommendations = $this->recommendationService->getRecommendationsForPartenaire($partenaire);
            foreach ($this->collaborationProduitRepository->findByPartenaire($partenaire) as $collab) {
                $pid = $collab->getProduit()?->getIdProduit();
                if ($pid !== null) {
                    $collaborationParProduitId[$pid] = $collab->getStatut();
                }
            }
        }

        $userEmail = method_exists($user, 'getEmail') ? (string) $user->getEmail() : '';
        $userName = trim(
            (method_exists($user, 'getPrenom') ? (string) $user->getPrenom() : '') . ' ' .
            (method_exists($user, 'getNom') ? (string) $user->getNom() : '')
        );

        if ($userName === '') {
            $userName = 'Partenaire';
        }

        return $this->render('partenaire/index.html.twig', [
            'partenaire' => $partenaire,
            'recommendations' => $recommendations,
            'collaborationParProduitId' => $collaborationParProduitId,
            'calApiEnabled' => $this->isCalApiConfigured(),
            'calUsername' => $this->calUsername,
            'calEventTypeSlug' => $this->calEventTypeSlug,
            'calTimezone' => $this->calTimezone,
            'prefillName' => $userName,
            'prefillEmail' => $userEmail,
            'prefillPhone' => ($partenaire && $partenaire->getTelephone()) ? (string) $partenaire->getTelephone() : '',
        ]);
    }

    #[Route('/cal/slots', name: 'app_partenaire_cal_slots', methods: ['GET'])]
    public function calSlots(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['ok' => false, 'message' => 'Non authentifié.'], 401);
        }

        if (!$this->isCalApiConfigured()) {
            return $this->json(['ok' => false, 'message' => 'Cal.com non configuré.'], 500);
        }

        $date = trim((string) $request->query->get('date', ''));
        if ($date === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return $this->json(['ok' => false, 'message' => 'Date invalide.'], 400);
        }

        try {
            $tz = new \DateTimeZone($this->calTimezone);
            $start = new \DateTimeImmutable($date . ' 00:00:00', $tz);
            $end = $start->modify('+1 day');

            $response = $this->httpClient->request('GET', 'https://api.cal.com/v2/slots', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->calApiKey,
                    'cal-api-version' => $this->calApiVersionSlots,
                    'Accept' => 'application/json',
                ],
                'query' => array_merge($this->buildCalEventSelector(), [
                    'start' => $start->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d\TH:i:s\Z'),
                    'end' => $end->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d\TH:i:s\Z'),
                    'timeZone' => $this->calTimezone,
                    'format' => 'range',
                ]),
            ]);

            $statusCode = $response->getStatusCode();
            $payload = $response->toArray(false);

            if ($statusCode >= 400) {
                return $this->json([
                    'ok' => false,
                    'message' => $payload['error']['message'] ?? $payload['message'] ?? 'Erreur Cal.com.',
                    'debug' => $payload,
                ], $statusCode);
            }

            $daySlots = $payload['data'][$date] ?? [];
            $slots = array_map(static function (array $slot): array {
                $start = $slot['start'] ?? null;
                $end = $slot['end'] ?? null;

                $startDt = $start ? new \DateTimeImmutable($start) : null;

                return [
                    'start' => $start,
                    'end' => $end,
                    'label' => $startDt ? $startDt->format('H:i') : '-',
                ];
            }, $daySlots);

            return $this->json([
                'ok' => true,
                'date' => $date,
                'timezone' => $this->calTimezone,
                'slots' => $slots,
            ]);
        } catch (\Throwable $e) {
            return $this->json([
                'ok' => false,
                'message' => 'Erreur lors du chargement des créneaux.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    #[Route('/cal/book', name: 'app_partenaire_cal_book', methods: ['POST'])]
    public function calBook(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['ok' => false, 'message' => 'Non authentifié.'], 401);
        }

        if (!$this->isCalApiConfigured()) {
            return $this->json(['ok' => false, 'message' => 'Cal.com non configuré.'], 500);
        }

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            return $this->json(['ok' => false, 'message' => 'Payload invalide.'], 400);
        }

        $start = trim((string) ($payload['start'] ?? ''));
        $name = trim((string) ($payload['name'] ?? ''));
        $email = trim((string) ($payload['email'] ?? ''));
        $phone = trim((string) ($payload['phone'] ?? ''));
        $timeZone = trim((string) ($payload['timeZone'] ?? $this->calTimezone));

        if ($start === '' || $name === '' || $email === '') {
            return $this->json(['ok' => false, 'message' => 'Informations incomplètes.'], 400);
        }

        try {
            $response = $this->httpClient->request('POST', 'https://api.cal.com/v2/bookings', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->calApiKey,
                    'cal-api-version' => $this->calApiVersionBookings,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => array_merge($this->buildCalEventSelector(), [
                    'start' => $start,
                    'attendee' => [
                        'name' => $name,
                        'email' => $email,
                        'timeZone' => $timeZone,
                        'phoneNumber' => $phone !== '' ? $phone : null,
                        'language' => 'fr',
                    ],
                ]),
            ]);

            $statusCode = $response->getStatusCode();
            $data = $response->toArray(false);

            if ($statusCode >= 400) {
                return $this->json([
                    'ok' => false,
                    'message' => $data['error']['message'] ?? $data['message'] ?? 'Impossible de réserver.',
                    'debug' => $data,
                ], $statusCode);
            }

            $booking = $data['data'] ?? [];

            return $this->json([
                'ok' => true,
                'message' => 'Rendez-vous réservé avec succès.',
                'booking' => [
                    'uid' => $booking['uid'] ?? null,
                    'start' => $booking['start'] ?? null,
                    'end' => $booking['end'] ?? null,
                    'status' => $booking['status'] ?? null,
                ],
            ]);
        } catch (\Throwable $e) {
            return $this->json([
                'ok' => false,
                'message' => 'Erreur lors de la réservation.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    #[Route('/collaboration-produit/{produitId}/choisir', name: 'app_partenaire_choisir_collaboration_produit', methods: ['POST'])]
    public function choisirCollaborationProduit(int $produitId): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);
        if (!$partenaire || $partenaire->getStatut() !== 'accepte') {
            $this->addFlash('error', 'Action réservée aux partenaires acceptés.');
            return $this->redirectToRoute('app_partenaire_index');
        }

        $produit = $this->produitRepository->find($produitId);
        if (!$produit instanceof Produit) {
            $this->addFlash('error', 'Produit introuvable.');
            return $this->redirectToRoute('app_partenaire_index');
        }

        $idsReco = array_map(
            static fn (Produit $p) => $p->getIdProduit(),
            $this->recommendationService->getRecommendationsForPartenaire($partenaire, 50)
        );
        if (!in_array($produit->getIdProduit(), $idsReco, true)) {
            $this->addFlash('error', 'Ce produit ne fait pas partie de vos recommandations actuelles.');
            return $this->redirectToRoute('app_partenaire_index');
        }

        $existing = $this->collaborationProduitRepository->findOneBy([
            'partenaire' => $partenaire,
            'produit' => $produit,
        ]);

        if ($existing !== null) {
            if ($existing->getStatut() === CollaborationProduit::STATUT_VALIDEE) {
                $this->addFlash('info', sprintf(
                    'Vous êtes déjà en collaboration avec « %s ».',
                    $produit->getNom()
                ));
                return $this->redirectToRoute('app_partenaire_index');
            }
            $existing->setStatut(CollaborationProduit::STATUT_VALIDEE);
            $existing->setCreatedAt(new \DateTimeImmutable());
            $this->entityManager->flush();
            $this->addFlash('success', sprintf(
                '✅ Collaboration activée pour « %s ». Vous pouvez maintenant collaborer sur ce produit!',
                $produit->getNom()
            ));
            return $this->redirectToRoute('app_partenaire_index');
        }

        $collab = new CollaborationProduit();
        $collab->setPartenaire($partenaire);
        $collab->setProduit($produit);
        $collab->setStatut(CollaborationProduit::STATUT_VALIDEE);
        $collab->setCreatedAt(new \DateTimeImmutable());
        $this->entityManager->persist($collab);
        $this->entityManager->flush();

        $this->addFlash('success', sprintf(
            '✅ Collaboration activée pour « %s ». Vous pouvez maintenant collaborer sur ce produit!',
            $produit->getNom()
        ));

        return $this->redirectToRoute('app_partenaire_index');
    }

    #[Route('/recommandations', name: 'app_partenaire_recommandations', methods: ['GET'])]
    public function recommandations(): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Non authentifié'], 401);
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if (!$partenaire || $partenaire->getStatut() !== 'accepte') {
            return $this->json(['error' => 'Accès réservé aux partenaires acceptés'], 403);
        }

        $produits = $this->recommendationService->getRecommendationsForPartenaire($partenaire);

        $collabRows = $this->collaborationProduitRepository->findByPartenaire($partenaire);
        $statutParId = [];
        foreach ($collabRows as $row) {
            $pid = $row->getProduit()?->getIdProduit();
            if ($pid !== null) {
                $statutParId[$pid] = $row->getStatut();
            }
        }

        $data = array_map(static function (Produit $p) use ($statutParId): array {
            $id = $p->getIdProduit();
            return [
                'id' => $id,
                'nom' => $p->getNom(),
                'description' => $p->getDescription(),
                'prix' => (float) $p->getPrix(),
                'photo' => $p->getPhoto(),
                'quantite' => $p->getQuantite(),
                'collaboration_statut' => $statutParId[$id] ?? null,
            ];
        }, $produits);

        return $this->json([
            'partenaire' => $partenaire->getNom(),
            'recommendations' => $data,
            'total' => count($data),
        ]);
    }

    #[Route('/devenir', name: 'app_partenaire_devenir', methods: ['GET'])]
    public function devenirPartenaire(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if ($partenaire) {
            $this->addFlash('info', 'Vous êtes déjà partenaire ou avez une demande en cours');
            return $this->redirectToRoute('app_partenaire_index');
        }

        return $this->render('partenaire/devenir.html.twig', [
            'errors' => [],
            'formData' => [],
            'calApiEnabled' => $this->isCalApiConfigured(),
        ]);
    }

    #[Route('/devenir/submit', name: 'app_partenaire_submit', methods: ['POST'])]
    public function submitDemande(Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $nom = trim($request->request->get('nom'));
        $type = trim($request->request->get('type'));
        $telephone = trim($request->request->get('telephone'));
        $adresse = trim($request->request->get('adresse'));
        $description = trim($request->request->get('description'));

        $errors = [];

        if (empty($nom)) {
            $errors['nom'] = '❌ Le nom est obligatoire';
        }
        if (empty($type)) {
            $errors['type'] = '❌ Le type est obligatoire';
        }
        if (empty($telephone)) {
            $errors['telephone'] = '❌ Le téléphone est obligatoire';
        } elseif (!preg_match('/^[0-9]{8}$/', $telephone)) {
            $errors['telephone'] = '❌ Le téléphone doit contenir 8 chiffres';
        }
        if (empty($adresse)) {
            $errors['adresse'] = '❌ L\'adresse est obligatoire';
        }

        if (!empty($errors)) {
            return $this->render('partenaire/devenir.html.twig', [
                'errors' => $errors,
                'formData' => compact('nom', 'type', 'telephone', 'adresse', 'description'),
                'calApiEnabled' => $this->isCalApiConfigured(),
            ]);
        }

        $partenaire = new Partenaire();
        $partenaire->setIdUtilisateur($user->getIdUtilisateur());
        $partenaire->setNom($nom);
        $partenaire->setType($type);
        $partenaire->setTelephone($telephone);
        $partenaire->setAdresse($adresse);
        $partenaire->setDescription($description);
        $partenaire->setStatut('en_attente');
        $partenaire->setDateDemande(new \DateTime());

        $logoFile = $request->files->get('logo');
        if ($logoFile && $logoFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/partenaires';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newFileName = uniqid() . '_' . time() . '.' . $logoFile->guessExtension();
            $logoFile->move($uploadDir, $newFileName);
            $partenaire->setLogo('/uploads/partenaires/' . $newFileName);
        }

        $this->entityManager->persist($partenaire);
        $this->entityManager->flush();

        $leadData = [
            'email' => method_exists($user, 'getEmail') ? (string) $user->getEmail() : '',
            'first_name' => method_exists($user, 'getPrenom') ? (string) $user->getPrenom() : '',
            'last_name' => method_exists($user, 'getNom') ? (string) $user->getNom() : '',
            'phone' => $telephone,
            'company' => $nom,
            'address' => $adresse,
            'description' => $description,
        ];
        $syncStatus = $this->partnerLeadSyncService->syncLead($leadData);
        if ($syncStatus['hubspot'] === 'failed' || $syncStatus['brevo'] === 'failed') {
            $this->addFlash('warning', 'Demande créée, mais synchronisation CRM/email partiellement échouée.');
        }

        $this->addFlash('success', '✅ Votre demande a été envoyée. Un administrateur va l\'examiner.');
        return $this->redirectToRoute('app_partenaire_index');
    }

    #[Route('/annuler', name: 'app_partenaire_annuler', methods: ['POST'])]
    public function annulerDemande(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if (!$partenaire) {
            $this->addFlash('error', 'Aucune demande de partenariat trouvée');
            return $this->redirectToRoute('app_partenaire_index');
        }

        if ($partenaire->getStatut() !== 'en_attente') {
            $this->addFlash('error', 'Cette demande ne peut plus être annulée car elle a déjà été traitée');
            return $this->redirectToRoute('app_partenaire_index');
        }

        $this->entityManager->remove($partenaire);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Votre demande de partenariat a été annulée avec succès');
        return $this->redirectToRoute('app_partenaire_index');
    }

    #[Route('/ajouter-plat', name: 'app_partenaire_ajouter_plat', methods: ['GET', 'POST'])]
    public function ajouterPlat(Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if (!$partenaire || $partenaire->getStatut() !== 'accepte') {
            $this->addFlash('error', 'Vous devez être un partenaire accepté pour ajouter des plats');
            return $this->redirectToRoute('app_partenaire_index');
        }

        if ($request->isMethod('POST')) {
            $nom = trim($request->request->get('nom'));
            $description = trim($request->request->get('description'));
            $prix = $request->request->get('prix');
            $ingredients = trim($request->request->get('ingredients'));
            $categorie = $request->request->get('categorie');

            $errors = [];

            if (empty($nom)) {
                $errors['nom'] = '❌ Le nom du plat est obligatoire';
            }
            if (empty($prix) || !is_numeric($prix) || $prix <= 0) {
                $errors['prix'] = '❌ Le prix doit être un nombre positif';
            }

            $imageFile = $request->files->get('image');

            if (!empty($errors)) {
                return $this->render('partenaire/ajouter_plat.html.twig', [
                    'errors' => $errors,
                    'formData' => compact('nom', 'description', 'prix', 'ingredients', 'categorie')
                ]);
            }

            $plat = new Plat();
            $plat->setNom($nom);
            $plat->setDescription($description);
            $plat->setPrix((float) $prix);
            $plat->setIngredients($ingredients);
            $plat->setCategorie($categorie);
            $plat->setIdPartenaire($partenaire->getId());
            $plat->setStatut('en_attente');
            $plat->setDateCreation(new \DateTime());
            if ($user instanceof Utilisateur) {
                $plat->setProposePar($user);
            }

            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/plats';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
                $imageFile->move($uploadDir, $newFileName);
                $plat->setImage('/uploads/plats/' . $newFileName);
            }

            $this->entityManager->persist($plat);
            $this->entityManager->flush();

            $this->addFlash('success', '✅ Votre plat a été ajouté et sera visible après validation');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }

        return $this->render('partenaire/ajouter_plat.html.twig', [
            'errors' => [],
            'formData' => []
        ]);
    }

    #[Route('/plat/{id}/modifier', name: 'app_partenaire_plat_modifier', methods: ['GET', 'POST'])]
    public function modifierPlat(int $id, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $plat = $this->platRepository->find($id);

        if (!$plat) {
            $this->addFlash('error', 'Plat non trouvé');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }

        $partenaire = $this->partenaireRepository->find($plat->getIdPartenaire());

        if (!$partenaire || $partenaire->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous ne pouvez pas modifier ce plat');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }

        if ($request->isMethod('POST')) {
            $nom = trim($request->request->get('nom'));
            $description = trim($request->request->get('description'));
            $prix = $request->request->get('prix');
            $ingredients = trim($request->request->get('ingredients'));
            $categorie = $request->request->get('categorie');
            $deleteImage = $request->request->get('delete_image');

            $errors = [];
            $formData = compact('nom', 'description', 'prix', 'ingredients', 'categorie');

            if (empty($nom)) {
                $errors['nom'] = '❌ Le nom du plat est obligatoire';
            }
            if (empty($prix) || !is_numeric($prix) || $prix <= 0) {
                $errors['prix'] = '❌ Le prix doit être un nombre positif';
            }

            $imageFile = $request->files->get('image');

            if (!empty($errors)) {
                return $this->render('partenaire/modifier_plat.html.twig', [
                    'plat' => $plat,
                    'errors' => $errors,
                    'formData' => $formData
                ]);
            }

            $plat->setNom($nom);
            $plat->setDescription($description);
            $plat->setPrix((float) $prix);
            $plat->setIngredients($ingredients);
            $plat->setCategorie($categorie);

            if ($deleteImage && $plat->getImage()) {
                $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $plat->getImage();
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $plat->setImage(null);
            }

            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/plats';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                if ($plat->getImage()) {
                    $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $plat->getImage();
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
                $imageFile->move($uploadDir, $newFileName);
                $plat->setImage('/uploads/plats/' . $newFileName);
            }

            $this->entityManager->flush();

            $this->addFlash('success', '✅ Plat modifié avec succès');
            return $this->redirectToRoute('app_partenaire_mes_plats', [
                'search' => $request->query->get('search', ''),
                'statut' => $request->query->get('statut', ''),
                'sort' => $request->query->get('sort', 'date_desc')
            ]);
        }

        return $this->render('partenaire/modifier_plat.html.twig', [
            'plat' => $plat,
            'errors' => [],
            'formData' => [
                'nom' => $plat->getNom(),
                'description' => $plat->getDescription(),
                'prix' => $plat->getPrix(),
                'ingredients' => $plat->getIngredients(),
                'categorie' => $plat->getCategorie()
            ]
        ]);
    }

    #[Route('/mes-plats', name: 'app_partenaire_mes_plats', methods: ['GET'])]
    public function mesPlats(Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if (!$partenaire) {
            return $this->redirectToRoute('app_partenaire_index');
        }

        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $sort = $request->query->get('sort', 'date_desc');

        $plats = $this->platRepository->findByFilters($partenaire->getId(), $search, $statut, $sort);

        foreach ($plats as $plat) {
            $plat->setPartenaire($partenaire);
        }

        $allPlats = $this->platRepository->findBy(['idPartenaire' => $partenaire->getId()]);
        $stats = [
            'total' => count($allPlats),
            'en_attente' => count($this->platRepository->findBy(['idPartenaire' => $partenaire->getId(), 'statut' => 'en_attente'])),
            'accepte' => count($this->platRepository->findBy(['idPartenaire' => $partenaire->getId(), 'statut' => 'accepte'])),
            'refuse' => count($this->platRepository->findBy(['idPartenaire' => $partenaire->getId(), 'statut' => 'refuse']))
        ];

        return $this->render('partenaire/mes_plats.html.twig', [
            'plats' => $plats,
            'partenaire' => $partenaire,
            'search' => $search,
            'statut' => $statut,
            'sort' => $sort,
            'stats' => $stats
        ]);
    }

    #[Route('/plat/{id}/supprimer', name: 'app_partenaire_plat_supprimer', methods: ['POST'])]
    public function supprimerPlat(int $id, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $plat = $this->platRepository->find($id);

        if (!$plat) {
            $this->addFlash('error', 'Plat non trouvé');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }

        $partenaire = $this->partenaireRepository->find($plat->getIdPartenaire());

        if (!$partenaire || $partenaire->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer ce plat');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }

        if ($plat->getImage()) {
            $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $plat->getImage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $this->entityManager->remove($plat);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Plat supprimé avec succès');

        return $this->redirectToRoute('app_partenaire_mes_plats', [
            'search' => $request->query->get('search', ''),
            'statut' => $request->query->get('statut', ''),
            'sort' => $request->query->get('sort', 'date_desc')
        ]);
    }

    #[Route('/collaborations', name: 'app_partenaire_collaborations', methods: ['GET'])]
    public function mesCollaborations(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if (!$partenaire || $partenaire->getStatut() !== 'accepte') {
            $this->addFlash('error', 'Action réservée aux partenaires acceptés.');
            return $this->redirectToRoute('app_partenaire_index');
        }

        $collaborations = $this->collaborationProduitRepository->findByPartenaire($partenaire);

        $parStatut = [];
        foreach ($collaborations as $collab) {
            $statut = $collab->getStatut();
            if (!isset($parStatut[$statut])) {
                $parStatut[$statut] = [];
            }
            $parStatut[$statut][] = $collab;
        }

        return $this->render('partenaire/collaborations.html.twig', [
            'partenaire' => $partenaire,
            'collaborations' => $collaborations,
            'parStatut' => $parStatut,
        ]);
    }

    #[Route('/collaborations/{collaborationId}/annuler', name: 'app_partenaire_annuler_collaboration', methods: ['POST'])]
    public function annulerCollaboration(int $collaborationId): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);

        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_partenaire_index');
        }

        $collab = $this->collaborationProduitRepository->find($collaborationId);

        if (!$collab || $collab->getPartenaire()->getId() !== $partenaire->getId()) {
            $this->addFlash('error', 'Collaboration non trouvée');
            return $this->redirectToRoute('app_partenaire_collaborations');
        }

        $produitNom = $collab->getProduit()?->getNom() ?? 'Produit inconnu';
        $collab->setStatut(CollaborationProduit::STATUT_ANNULEE);
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('✅ Collaboration avec « %s » annulée.', $produitNom));

        return $this->redirectToRoute('app_partenaire_collaborations');
    }
}
