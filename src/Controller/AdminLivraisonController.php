<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Repository\CommandRepository;
use App\Repository\LivreurRepository;
use App\Repository\LivraisonRepository;
use App\Repository\ProduitRepository;
use App\Repository\UtilisateurRepository;
use App\Service\FirstDeliveryService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/livraisons')]
class AdminLivraisonController extends AbstractController
{
    #[Route('/', name: 'app_admin_livraisons_liste', methods: ['GET'])]
    public function index(
        LivraisonRepository $livraisonRepository,
        LivreurRepository $livreurRepository,
        CommandRepository $commandRepository
    ): Response {
        $livraisonEntities = $livraisonRepository->findAll();
        $livreurs = $livreurRepository->findAll();

        $allCommandes = $commandRepository->findAll();
        $commandes = [];

        foreach ($allCommandes as $commande) {
            $commandeId = $this->extractCommandeId($commande);

            if (!$commandeId || $commandeId === '—') {
                continue;
            }

            $existingLivraison = $livraisonRepository->findOneBy([
                'idCommande' => $commandeId
            ]);

            if (
                !$existingLivraison ||
                (
                    method_exists($existingLivraison, 'getStatutLivraison') &&
                    $existingLivraison->getStatutLivraison() === 'annulee'
                )
            ) {
                $commandes[] = $commande;
            }
        }

        $livraisons = [];

        foreach ($livraisonEntities as $livraison) {
            $commande = null;
            $livreur = null;

            if (method_exists($livraison, 'getIdCommande') && $livraison->getIdCommande()) {
                $commande = $commandRepository->find($livraison->getIdCommande());
            }

            if (method_exists($livraison, 'getIdLivreur') && $livraison->getIdLivreur()) {
                $livreur = $livreurRepository->find($livraison->getIdLivreur());
            }

            $livraison->commandeObject = $commande;
            $livraison->livreurObject = $livreur;

            $livraisons[] = $livraison;
        }

        return $this->render('admin_livraisons/index.html.twig', [
            'livraisons' => $livraisons,
            'livreurs' => $livreurs,
            'commandes' => $commandes,
            'allCommandes' => $allCommandes,
            'averageDeliveryTime' => $this->calculateAverageDeliveryTime($livraisons),
        ]);
    }

    #[Route('/affecter/{id}', name: 'app_admin_livraison_affecter', methods: ['POST'])]
    public function affecter(
        int $id,
        Request $request,
        CommandRepository $commandRepository,
        LivreurRepository $livreurRepository,
        LivraisonRepository $livraisonRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $commande = $commandRepository->find($id);

        if (!$commande) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Commande introuvable.'
                ], 404);
            }

            $this->addFlash('error', 'Commande introuvable.');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }

        $livreurId = $request->request->get('livreur_id');

        if (!$livreurId) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Choisir un livreur.'
                ], 400);
            }

            $this->addFlash('error', 'Choisir un livreur.');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }

        $livreur = $livreurRepository->find($livreurId);

        if (!$livreur) {
            if ($request->isXmlHttpRequest()) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Livreur introuvable.'
                ], 404);
            }

            $this->addFlash('error', 'Livreur introuvable.');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }

        $existing = $livraisonRepository->findOneBy([
            'idCommande' => $this->extractCommandeId($commande)
        ]);

        $point = $this->generateRandomStartPoint($this->extractCommandeLocation($commande));

        if ($existing) {
            if (method_exists($existing, 'setStartLat')) {
                $existing->setStartLat($point['lat']);
            }

            if (method_exists($existing, 'setStartLng')) {
                $existing->setStartLng($point['lng']);
            }

            if (method_exists($existing, 'setIdLivreur')) {
                $existing->setIdLivreur($this->extractLivreurId($livreur));
            }

            if (method_exists($existing, 'setStatutLivraison')) {
                $existing->setStatutLivraison('en_cours');
            }

            if (method_exists($existing, 'setAdresse')) {
                $existing->setAdresse($this->extractCommandeLocation($commande));
            }

            if (
                method_exists($existing, 'setDateCreation') &&
                method_exists($existing, 'getDateCreation') &&
                !$existing->getDateCreation()
            ) {
                $existing->setDateCreation(new \DateTime());
            }

            if (method_exists($existing, 'setDateAffectation')) {
                $existing->setDateAffectation(new \DateTime());
            }

            $entityManager->persist($existing);
        } else {
            $livraison = new Livraison();

            if (method_exists($livraison, 'setStartLat')) {
                $livraison->setStartLat($point['lat']);
            }

            if (method_exists($livraison, 'setStartLng')) {
                $livraison->setStartLng($point['lng']);
            }

            if (method_exists($livraison, 'setIdCommande')) {
                $livraison->setIdCommande($this->extractCommandeId($commande));
            }

            if (method_exists($livraison, 'setIdLivreur')) {
                $livraison->setIdLivreur($this->extractLivreurId($livreur));
            }

            if (method_exists($livraison, 'setAdresse')) {
                $livraison->setAdresse($this->extractCommandeLocation($commande));
            }

            if (method_exists($livraison, 'setStatutLivraison')) {
                $livraison->setStatutLivraison('en_cours');
            }

            if (method_exists($livraison, 'setDateCreation')) {
                $livraison->setDateCreation(new \DateTime());
            }

            if (method_exists($livraison, 'setDateAffectation')) {
                $livraison->setDateAffectation(new \DateTime());
            }

            $entityManager->persist($livraison);
        }

        if (method_exists($livreur, 'setDisponibilite')) {
            $livreur->setDisponibilite(0);
            $entityManager->persist($livreur);
        }

        $entityManager->flush();

        if ($request->isXmlHttpRequest()) {
            $allLivraisons = $livraisonRepository->findAll();
            $allLivreurs = $livreurRepository->findAll();

            $allCommandes = $commandRepository->findAll();
            $filteredCommandes = [];

            foreach ($allCommandes as $oneCommande) {
                $oneCommandeId = $this->extractCommandeId($oneCommande);

                if (!$oneCommandeId || $oneCommandeId === '—') {
                    continue;
                }

                $existingLivraison = $livraisonRepository->findOneBy([
                    'idCommande' => $oneCommandeId
                ]);

                if (
                    !$existingLivraison ||
                    (
                        method_exists($existingLivraison, 'getStatutLivraison') &&
                        $existingLivraison->getStatutLivraison() === 'annulee'
                    )
                ) {
                    $filteredCommandes[] = $oneCommande;
                }
            }

            $livreeCount = 0;
            $enCoursCount = 0;
            $attenteCount = 0;
            $annuleeCount = 0;

            foreach ($allLivraisons as $item) {
                $statut = method_exists($item, 'getStatutLivraison') ? $item->getStatutLivraison() : 'en_attente';

                if ($statut === 'livree') {
                    $livreeCount++;
                } elseif ($statut === 'en_cours') {
                    $enCoursCount++;
                } elseif ($statut === 'annulee') {
                    $annuleeCount++;
                } else {
                    $attenteCount++;
                }
            }

            $totalLivraisons = count($allLivraisons);
            $deliveredPercent = $totalLivraisons > 0 ? round(($livreeCount / $totalLivraisons) * 100, 1) : 0;
            $pendingPercent = $totalLivraisons > 0 ? round((($enCoursCount + $attenteCount) / $totalLivraisons) * 100, 1) : 0;

            return new JsonResponse([
                'success' => true,
                'message' => 'Livreur affecté avec succès.',
                'stats' => [
                    'total_livreurs' => count($allLivreurs),
                    'total_commandes' => count($filteredCommandes),
                    'livrees' => $livreeCount,
                    'en_cours' => $enCoursCount,
                    'attente' => $attenteCount,
                    'annulees' => $annuleeCount,
                    'delivered_percent' => $deliveredPercent,
                    'pending_percent' => $pendingPercent,
                ],
                'averageDeliveryTime' => $this->calculateAverageDeliveryTime($allLivraisons),
            ]);
        }

        $this->addFlash('success', 'Livreur affecté avec succès.');
        return $this->redirectToRoute('app_admin_livraisons_liste');
    }

    #[Route('/status/{id}', name: 'app_admin_livraison_status_ajax', methods: ['POST'])]
    public function updateStatus(
        int $id,
        Request $request,
        LivraisonRepository $livraisonRepository,
        LivreurRepository $livreurRepository,
        CommandRepository $commandRepository,
        UtilisateurRepository $utilisateurRepository,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): JsonResponse {
        $livraison = $livraisonRepository->find($id);

        if (!$livraison) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Livraison introuvable.'
            ], 404);
        }

        $status = trim((string) $request->request->get('status', ''));

        if (!in_array($status, ['en_attente', 'en_cours', 'livree', 'annulee'], true)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Statut invalide.'
            ], 400);
        }

        if (!method_exists($livraison, 'setStatutLivraison')) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Méthode setStatutLivraison introuvable.'
            ], 500);
        }

        $oldStatus = method_exists($livraison, 'getStatutLivraison')
            ? (string) $livraison->getStatutLivraison()
            : '';

        $livraison->setStatutLivraison($status);

        if ($status === 'livree' && method_exists($livraison, 'setDateLivraison')) {
            $livraison->setDateLivraison(new \DateTime());
        }

        if ($status !== 'livree' && method_exists($livraison, 'setDateLivraison')) {
            $livraison->setDateLivraison(null);
        }

        $entityManager->persist($livraison);

        if (in_array($status, ['livree', 'annulee'], true) && method_exists($livraison, 'getIdLivreur')) {
            $livreurId = $livraison->getIdLivreur();
            if ($livreurId) {
                $livreur = $livreurRepository->find($livreurId);
                if ($livreur && method_exists($livreur, 'setDisponibilite')) {
                    $livreur->setDisponibilite(1);
                    $entityManager->persist($livreur);
                }
            }
        }

        $entityManager->flush();

        if ($oldStatus !== 'livree' && $status === 'livree') {
            try {
                $this->sendDeliveryCompletedMail(
                    $livraison,
                    $commandRepository,
                    $utilisateurRepository,
                    $mailer
                );
            } catch (\Throwable $e) {
            }
        }

        $allLivraisons = $livraisonRepository->findAll();
        $allLivreurs = $livreurRepository->findAll();

        $allCommandes = $commandRepository->findAll();
        $filteredCommandes = [];

        foreach ($allCommandes as $oneCommande) {
            $oneCommandeId = $this->extractCommandeId($oneCommande);

            if (!$oneCommandeId || $oneCommandeId === '—') {
                continue;
            }

            $existingLivraison = $livraisonRepository->findOneBy([
                'idCommande' => $oneCommandeId
            ]);

            if (
                !$existingLivraison ||
                (
                    method_exists($existingLivraison, 'getStatutLivraison') &&
                    $existingLivraison->getStatutLivraison() === 'annulee'
                )
            ) {
                $filteredCommandes[] = $oneCommande;
            }
        }

        $livreeCount = 0;
        $enCoursCount = 0;
        $attenteCount = 0;
        $annuleeCount = 0;

        foreach ($allLivraisons as $item) {
            $statut = method_exists($item, 'getStatutLivraison') ? $item->getStatutLivraison() : 'en_attente';

            if ($statut === 'livree') {
                $livreeCount++;
            } elseif ($statut === 'en_cours') {
                $enCoursCount++;
            } elseif ($statut === 'annulee') {
                $annuleeCount++;
            } else {
                $attenteCount++;
            }
        }

        $totalLivraisons = count($allLivraisons);
        $deliveredPercent = $totalLivraisons > 0 ? round(($livreeCount / $totalLivraisons) * 100, 1) : 0;
        $pendingPercent = $totalLivraisons > 0 ? round((($enCoursCount + $attenteCount) / $totalLivraisons) * 100, 1) : 0;

        return new JsonResponse([
            'success' => true,
            'message' => 'Statut mis à jour.',
            'newStatus' => $status,
            'badgeLabel' => $this->statusLabel($status),
            'stats' => [
                'total_livreurs' => count($allLivreurs),
                'total_commandes' => count($filteredCommandes),
                'livrees' => $livreeCount,
                'en_cours' => $enCoursCount,
                'attente' => $attenteCount,
                'annulees' => $annuleeCount,
                'delivered_percent' => $deliveredPercent,
                'pending_percent' => $pendingPercent,
            ],
            'averageDeliveryTime' => $this->calculateAverageDeliveryTime($allLivraisons),
        ]);
    }

    #[Route('/send-first-delivery/{id}', name: 'app_admin_livraison_send_first_delivery', methods: ['POST'])]
    public function sendToFirstDelivery(
        int $id,
        CommandRepository $commandRepository,
        ProduitRepository $produitRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $baseUrl = $_ENV['FIRST_DELIVERY_BASE_URL'] ?? $_SERVER['FIRST_DELIVERY_BASE_URL'] ?? null;
        $token = $_ENV['FIRST_DELIVERY_TOKEN'] ?? $_SERVER['FIRST_DELIVERY_TOKEN'] ?? null;

        if (!$baseUrl || !$token) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Variables FIRST_DELIVERY manquantes dans .env.local'
            ], 500);
        }

        $firstDeliveryService = new FirstDeliveryService($baseUrl, $token);
        $commande = $commandRepository->find($id);
        $produit = null;
        $prix = 0;

        if ($commande && $commande->getProductId()) {
            $produit = $produitRepository->find($commande->getProductId());

            if ($produit) {
                if (method_exists($produit, 'getPrix')) {
                    $prix = (float) $produit->getPrix();
                } elseif (method_exists($produit, 'getPrice')) {
                    $prix = (float) $produit->getPrice();
                } elseif (method_exists($produit, 'getPrixProduit')) {
                    $prix = (float) $produit->getPrixProduit();
                }
            }
        }

        if (!$commande) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Commande introuvable.'
            ], 404);
        }

        $payload = [
            'Client' => [
                'nom' => method_exists($commande, 'getCustomerName') ? (string) $commande->getCustomerName() : 'Client',
                'gouvernerat' => method_exists($commande, 'getGovernorate') ? (string) $commande->getGovernorate() : 'Tunis',
                'ville' => method_exists($commande, 'getVille') ? (string) $commande->getVille() : 'Tunis',
                'adresse' => method_exists($commande, 'getLocation') ? (string) $commande->getLocation() : '',
                'telephone' => method_exists($commande, 'getPhone') ? (string) $commande->getPhone() : '',
                'telephone2' => '',
            ],
            'Produit' => [
                'prix' => $prix,
                'designation' => 'Commande #' . $id,
                'nombreArticle' => 1,
                'commentaire' => '',
                'article' => 'Produit',
                'nombreEchange' => 0,
            ],
        ];

        try {
            $result = $firstDeliveryService->createOrder($payload);
            $data = $result['data'] ?? [];

            if (($data['isError'] ?? false) === true) {
                return new JsonResponse([
                    'success' => false,
                    'message' => $data['message'] ?? 'Erreur API First Delivery.'
                ], 400);
            }

            if ($commande->getStatus() === 'en_attente') {
                $commande->setStatus('acceptee');
            }

            if (method_exists($commande, 'setFdgStatus')) {
                $commande->setFdgStatus('sent');
            }

            if (isset($data['result']['barCode']) && method_exists($commande, 'setFdgBarcode')) {
                $commande->setFdgBarcode($data['result']['barCode']);
            }

            if (isset($data['result']['link']) && method_exists($commande, 'setFdgPrintLink')) {
                $commande->setFdgPrintLink($data['result']['link']);
            }

            if (method_exists($commande, 'setFdgSentAt')) {
                $commande->setFdgSentAt(new \DateTime());
            }

            $entityManager->persist($commande);
            $entityManager->flush();

            return new JsonResponse([
                'success' => true,
                'message' => $data['message'] ?? 'Commande envoyée avec succès.',
                'barCode' => $data['result']['barCode'] ?? null,
                'printLink' => $data['result']['link'] ?? null,
            ]);
        } catch (\Throwable $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur First Delivery: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/terminer/{id}', name: 'app_admin_livraison_terminer', methods: ['POST'])]
    public function terminer(
        int $id,
        LivraisonRepository $livraisonRepository,
        LivreurRepository $livreurRepository,
        CommandRepository $commandRepository,
        UtilisateurRepository $utilisateurRepository,
        EntityManagerInterface $entityManager,
        MailerInterface $mailer
    ): Response {
        $livraison = $livraisonRepository->find($id);

        if (!$livraison) {
            $this->addFlash('error', 'Livraison introuvable.');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }

        if (method_exists($livraison, 'setStatutLivraison')) {
            $livraison->setStatutLivraison('livree');

            if (method_exists($livraison, 'setDateLivraison')) {
                $livraison->setDateLivraison(new \DateTime());
            }

            $entityManager->persist($livraison);
        }

        if (method_exists($livraison, 'getIdLivreur') && $livraison->getIdLivreur()) {
            $livreur = $livreurRepository->find($livraison->getIdLivreur());
            if ($livreur && method_exists($livreur, 'setDisponibilite')) {
                $livreur->setDisponibilite(1);
                $entityManager->persist($livreur);
            }
        }

        $entityManager->flush();

        try {
            $this->sendDeliveryCompletedMail(
                $livraison,
                $commandRepository,
                $utilisateurRepository,
                $mailer
            );
        } catch (\Throwable $e) {
        }

        $this->addFlash('success', 'Livraison marquée comme livrée.');
        return $this->redirectToRoute('app_admin_livraisons_liste');
    }

    #[Route('/details/{id}', name: 'app_admin_livraison_details_ajax', methods: ['GET'])]
    public function details(
        int $id,
        LivraisonRepository $livraisonRepository,
        CommandRepository $commandRepository,
        LivreurRepository $livreurRepository
    ): JsonResponse {
        $livraison = $livraisonRepository->find($id);

        if (!$livraison) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Livraison introuvable.'
            ], 404);
        }

        $commande = null;
        $livreur = null;

        if (method_exists($livraison, 'getIdCommande') && $livraison->getIdCommande()) {
            $commande = $commandRepository->find($livraison->getIdCommande());
        }

        if (method_exists($livraison, 'getIdLivreur') && $livraison->getIdLivreur()) {
            $livreur = $livreurRepository->find($livraison->getIdLivreur());
        }

        $createdAt = $this->extractCommandeDate($commande);
        $html = '
            <div class="details-grid">
                <div class="detail-box">
                    <div class="detail-label">Livraison</div>
                    <div class="detail-value">#' . htmlspecialchars((string) $this->extractLivraisonId($livraison)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Commande</div>
                    <div class="detail-value">#' . htmlspecialchars((string) $this->extractCommandeId($commande)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Client</div>
                    <div class="detail-value">' . htmlspecialchars($this->extractCommandeClientName($commande)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Téléphone</div>
                    <div class="detail-value">' . htmlspecialchars($this->extractCommandePhone($commande)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Adresse</div>
                    <div class="detail-value">' . htmlspecialchars($this->extractLivraisonAdresse($livraison)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Statut</div>
                    <div class="detail-value">' . htmlspecialchars($this->extractLivraisonStatut($livraison)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Livreur</div>
                    <div class="detail-value">' . htmlspecialchars($this->extractLivreurName($livreur)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Téléphone livreur</div>
                    <div class="detail-value">' . htmlspecialchars($this->extractLivreurPhone($livreur)) . '</div>
                </div>
                <div class="detail-box">
                    <div class="detail-label">Date commande</div>
                    <div class="detail-value">' . htmlspecialchars($createdAt ? $createdAt->format('d/m/Y H:i') : '—') . '</div>
                </div>
            </div>
        ';

        return new JsonResponse([
            'success' => true,
            'html' => $html
        ]);
    }

    #[Route('/cancel-first-delivery/{id}', name: 'app_admin_livraison_cancel_first_delivery', methods: ['POST'])]
    public function cancelFirstDelivery(
        int $id,
        CommandRepository $commandRepository,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $baseUrl = $_ENV['FIRST_DELIVERY_BASE_URL'] ?? $_SERVER['FIRST_DELIVERY_BASE_URL'] ?? null;
        $token = $_ENV['FIRST_DELIVERY_TOKEN'] ?? $_SERVER['FIRST_DELIVERY_TOKEN'] ?? null;

        if (!$baseUrl || !$token) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Variables FIRST_DELIVERY manquantes dans .env.local'
            ], 500);
        }

        $firstDeliveryService = new FirstDeliveryService($baseUrl, $token);

        $commande = $commandRepository->find($id);

        if (!$commande) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Commande introuvable.'
            ], 404);
        }

        if (!method_exists($commande, 'getFdgBarcode') || !$commande->getFdgBarcode()) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Aucun barcode First Delivery trouvé.'
            ], 400);
        }

        try {
            $result = $firstDeliveryService->cancelOrders([$commande->getFdgBarcode()]);
            $data = $result['data'] ?? [];

            if (($data['isError'] ?? false) === true) {
                return new JsonResponse([
                    'success' => false,
                    'message' => $data['message'] ?? 'Erreur API First Delivery.'
                ], 400);
            }

            $processed = $data['result'] ?? [];

            if (in_array($commande->getFdgBarcode(), $processed, true)) {
                if (method_exists($commande, 'setFdgStatus')) {
                    $commande->setFdgStatus('annulee');
                }

                $entityManager->persist($commande);
                $entityManager->flush();

                return new JsonResponse([
                    'success' => true,
                    'message' => 'Commande annulée sur First Delivery.',
                ]);
            }

            return new JsonResponse([
                'success' => false,
                'message' => 'La commande n’a pas été annulée par First Delivery.'
            ], 400);

        } catch (\Throwable $e) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Erreur First Delivery: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/mark-first-packed/{id}', name: 'app_admin_livraison_mark_first_packed', methods: ['POST'])]
    public function markFirstPacked(
        int $id,
        CommandRepository $commandRepository,
        EntityManagerInterface $entityManager,
        Request $request
    ): JsonResponse {
        $commande = $commandRepository->find($id);

        if (!$commande) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Commande introuvable.'
            ], 404);
        }

        $barcode = trim((string) $request->request->get('barcode', ''));

        if (!$barcode) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Barcode manquant.'
            ], 400);
        }

        if (method_exists($commande, 'setFdgBarcode') && !$commande->getFdgBarcode()) {
            $commande->setFdgBarcode($barcode);
        }

        if (method_exists($commande, 'setFdgStatus')) {
            $commande->setFdgStatus('packed');
        }

        $entityManager->persist($commande);
        $entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Statut packed enregistré.'
        ]);
    }

    private function sendDeliveryCompletedMail(
        Livraison $livraison,
        CommandRepository $commandRepository,
        UtilisateurRepository $utilisateurRepository,
        MailerInterface $mailer
    ): void {
        if (!method_exists($livraison, 'getIdCommande')) {
            return;
        }

        $commandeId = $livraison->getIdCommande();

        if (!$commandeId) {
            return;
        }

        $commande = $commandRepository->find($commandeId);

        if (!$commande || !method_exists($commande, 'getIdUtilisateur')) {
            return;
        }

        $utilisateurId = $commande->getIdUtilisateur();

        if (!$utilisateurId) {
            return;
        }

        $utilisateur = $utilisateurRepository->find($utilisateurId);

        if (!$utilisateur || !$utilisateur->getEmail()) {
            return;
        }

        $customerName = $utilisateur->getNom() ?: 'Client';
        $customerEmail = $utilisateur->getEmail();
        $commandeNumber = method_exists($commande, 'getId') ? $commande->getId() : '-';
        $adresse = method_exists($livraison, 'getAdresse') && $livraison->getAdresse()
            ? $livraison->getAdresse()
            : '-';

        $email = (new Email())
            ->from('noreply@kouldyeri.tn')
            ->to($customerEmail)
            ->subject('Votre livraison a été effectuée')
            ->html("<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
</head>
<body style='margin:0; padding:0; font-family:Arial, sans-serif; background:#f5f5f5;'>

<table width='100%' cellpadding='0' cellspacing='0'>
<tr>
<td align='center'>

<table width='600' cellpadding='0' cellspacing='0' style='background:white; border-radius:15px; overflow:hidden; box-shadow:0 5px 20px rgba(0,0,0,0.1);'>
<tr>
<td style='background:linear-gradient(135deg,#8B0000,#A52A2A); color:white; padding:25px; text-align:center;'>
    <h2 style='margin:0;'>🚚 Livraison effectuée</h2>
</td>
</tr>

<tr>
<td style='padding:25px;'>

    <p style='font-size:16px;'>Bonjour <strong>{$customerName}</strong>,</p>

    <p style='color:#555;'>Votre commande a été livrée avec succès.</p>

    <div style='background:#fafafa; border-radius:10px; padding:20px; margin-top:20px;'>
        <p><strong>📦 Commande :</strong> #{$commandeNumber}</p>
        <p><strong>📍 Adresse :</strong> {$adresse}</p>
        <p><strong>📅 Statut :</strong> <span style='color:green; font-weight:bold;'>Livrée</span></p>
    </div>

    <div style='text-align:center; margin-top:30px;'>
        <a href='http://127.0.0.1:8000/mes-commandes'
           style='background:#8B0000; color:white; padding:12px 25px; text-decoration:none; border-radius:30px; display:inline-block;'>
           Voir mes commandes
        </a>
    </div>

</td>
</tr>

<tr>
<td style='background:#f0e6d6; text-align:center; padding:15px; font-size:12px; color:#555;'>
    © 2026 Koul Dyeri - Merci pour votre confiance
</td>
</tr>
</table>

</td>
</tr>
</table>

</body>
</html>");

        $mailer->send($email);
    }

    private function extractCommandeId(object|null $commande): int|string
    {
        if (!$commande) {
            return '—';
        }

        foreach (['getId', 'getIdCommande'] as $method) {
            if (method_exists($commande, $method)) {
                return $commande->$method();
            }
        }

        return '—';
    }

    private function extractLivraisonId(object $livraison): int|string
    {
        foreach (['getIdLivraison', 'getId'] as $method) {
            if (method_exists($livraison, $method)) {
                return $livraison->$method();
            }
        }

        return '—';
    }

    private function extractLivreurId(object|null $livreur): int|string|null
    {
        if (!$livreur) {
            return null;
        }

        foreach (['getIdLivreur', 'getId'] as $method) {
            if (method_exists($livreur, $method)) {
                return $livreur->$method();
            }
        }

        return null;
    }

    private function extractCommandeClientName(object|null $commande): string
    {
        if (!$commande) {
            return 'Client';
        }

        foreach (['getCustomerName', 'getClientName', 'getNomClient', 'getNom'] as $method) {
            if (method_exists($commande, $method) && $commande->$method()) {
                return (string) $commande->$method();
            }
        }

        return 'Client';
    }

    private function extractCommandePhone(object|null $commande): string
    {
        if (!$commande) {
            return '—';
        }

        foreach (['getPhone', 'getTelephone', 'getNumeroTelephone'] as $method) {
            if (method_exists($commande, $method) && $commande->$method()) {
                return (string) $commande->$method();
            }
        }

        return '—';
    }

    private function extractCommandeLocation(object|null $commande): string
    {
        if (!$commande) {
            return '—';
        }

        foreach (['getLocation', 'getAdresse', 'getAddress'] as $method) {
            if (method_exists($commande, $method) && $commande->$method()) {
                return (string) $commande->$method();
            }
        }

        return '—';
    }

    private function extractCommandeDate(object|null $commande): ?\DateTimeInterface
    {
        if (!$commande) {
            return null;
        }

        foreach (['getCreatedAt', 'getDateCommande'] as $method) {
            if (method_exists($commande, $method)) {
                $value = $commande->$method();
                if ($value instanceof \DateTimeInterface) {
                    return $value;
                }
            }
        }

        return null;
    }

    private function extractLivraisonAdresse(object $livraison): string
    {
        if (method_exists($livraison, 'getAdresse') && $livraison->getAdresse()) {
            return (string) $livraison->getAdresse();
        }

        return '—';
    }

    private function extractLivraisonStatut(object $livraison): string
    {
        if (method_exists($livraison, 'getStatutLivraison') && $livraison->getStatutLivraison()) {
            return (string) $livraison->getStatutLivraison();
        }

        return 'en_attente';
    }

    private function extractLivreurName(object|null $livreur): string
    {
        if (!$livreur) {
            return 'Non assigné';
        }

        $prenom = method_exists($livreur, 'getPrenom') ? (string) $livreur->getPrenom() : '';
        $nom = method_exists($livreur, 'getNom') ? (string) $livreur->getNom() : '';
        $full = trim($prenom . ' ' . $nom);

        return $full !== '' ? $full : 'Livreur';
    }

    private function extractLivreurPhone(object|null $livreur): string
    {
        if (!$livreur) {
            return '—';
        }

        if (method_exists($livreur, 'getTelephone') && $livreur->getTelephone()) {
            return (string) $livreur->getTelephone();
        }

        return '—';
    }

    private function statusLabel(string $status): string
    {
        return match ($status) {
            'en_cours' => 'En cours',
            'livree' => 'Livrée',
            'annulee' => 'Annulée',
            default => 'En attente',
        };
    }

    private function calculateAverageDeliveryTime(array $livraisons): string
    {
        $totalSeconds = 0;
        $count = 0;

        foreach ($livraisons as $livraison) {
            $startDate = null;
            $endDate = null;

            if (method_exists($livraison, 'getDateAffectation') && $livraison->getDateAffectation()) {
                $startDate = $livraison->getDateAffectation();
            } elseif (method_exists($livraison, 'getDateCreation') && $livraison->getDateCreation()) {
                $startDate = $livraison->getDateCreation();
            }

            if (method_exists($livraison, 'getDateLivraison') && $livraison->getDateLivraison()) {
                $endDate = $livraison->getDateLivraison();
            }

            if ($startDate && $endDate) {
                $seconds = $endDate->getTimestamp() - $startDate->getTimestamp();

                if ($seconds > 0) {
                    $totalSeconds += $seconds;
                    $count++;
                }
            }
        }

        if ($count === 0) {
            return '0h 0m';
        }

        $avgSeconds = (int) floor($totalSeconds / $count);
        $hours = floor($avgSeconds / 3600);
        $minutes = floor(($avgSeconds % 3600) / 60);

        return $hours . 'h ' . $minutes . 'm';
    }

    private function generateRandomStartPoint(string $adresse): array
    {
        $baseLat = 36.8065;
        $baseLng = 10.1815;

        $angle = mt_rand() / mt_getrandmax() * 2 * pi();
        $distance = mt_rand(2500, 7000) / 100000;

        return [
            'lat' => $baseLat + cos($angle) * $distance,
            'lng' => $baseLng + sin($angle) * $distance,
        ];
    }
}