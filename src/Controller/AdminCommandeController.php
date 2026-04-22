<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\AbandonedCommandeRepository;
use App\Repository\CommandRepository;
use App\Repository\ProduitRepository;
use App\Repository\VisitorActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/commandes')]
class AdminCommandeController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CommandRepository $commandRepository,
        private ProduitRepository $produitRepository,
        private VisitorActivityRepository $visitorActivityRepository,
        private AbandonedCommandeRepository $abandonedCommandeRepository
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();

        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    private function hydrateCommandeData(Commande $commande): void
    {
        $commande->produit = $this->produitRepository->find($commande->getProductId());

        $cartItems = method_exists($commande, 'getCartItems') ? ($commande->getCartItems() ?? []) : [];

        $cartSummary = [
            'items' => [],
            'quantity' => 0,
            'total' => method_exists($commande, 'getTotal') ? (float) ($commande->getTotal() ?? 0) : 0,
            'isPanier' => !empty($cartItems),
        ];

        if (!empty($cartItems)) {
            foreach ($cartItems as $item) {
                $productId = (int) ($item['product_id'] ?? 0);
                $quantite = (int) ($item['quantite'] ?? $item['quantity'] ?? 1);

                if ($productId <= 0) {
                    continue;
                }

                $produit = $this->produitRepository->find($productId);
                if (!$produit) {
                    continue;
                }

                $prix = (float) $produit->getPrix();
                $sousTotal = $prix * $quantite;

                $cartSummary['items'][] = [
                    'id' => $produit->getIdProduit(),
                    'nom' => $produit->getNom(),
                    'photo' => $produit->getPhoto(),
                    'prix' => $prix,
                    'quantite' => $quantite,
                    'sous_total' => $sousTotal,
                ];

                $cartSummary['quantity'] += $quantite;
            }

            if ($cartSummary['total'] <= 0) {
                $cartSummary['total'] = array_sum(array_column($cartSummary['items'], 'sous_total'));
            }
        } else {
            $cartSummary['quantity'] = 1;

            if ($cartSummary['total'] <= 0 && $commande->produit) {
                $cartSummary['total'] = (float) $commande->produit->getPrix();
            }
        }

        $commande->setCartSummary($cartSummary);
    }

    private function buildCommandeEditPayload(Commande $commande): array
    {
        $this->hydrateCommandeData($commande);

        $cartSummary = $commande->getCartSummary() ?? [
            'items' => [],
            'quantity' => 0,
            'total' => 0,
            'isPanier' => false,
        ];

        return [
            'id' => $commande->getId(),
            'customerName' => $commande->getCustomerName(),
            'phone' => $commande->getPhone(),
            'location' => $commande->getLocation(),
            'status' => $commande->getStatus(),
            'productId' => $commande->getProductId(),
            'createdAt' => $commande->getCreatedAt()?->format('d/m/Y H:i'),
            'isPanier' => $cartSummary['isPanier'],
            'total' => number_format((float) $cartSummary['total'], 2, ',', ' ') . ' TND',
            'quantity' => $cartSummary['quantity'],
            'items' => $cartSummary['items'],
        ];
    }

    private function getCommandeStatusLabel(string $status): string
    {
        return match ($status) {
            'en_attente' => 'Pending',
            'acceptee' => 'Accepted',
            'refusee' => 'Rejected',
            'annulee' => 'Cancelled',
            default => ucfirst($status),
        };
    }

    private function getCommandeHistoryCount(Commande $commande): int
    {
        return $this->commandRepository->countPreviousOrdersForCommande($commande);
    }

    private function buildCommandeHistoryPayload(Commande $commande, int $limit = 5): array
    {
        $history = $this->commandRepository->findPreviousOrdersForCommande($commande, $limit);
        $items = [];

        foreach ($history as $item) {
            $status = (string) ($item->getStatus() ?? '');

            $items[] = [
                'id' => $item->getId(),
                'createdAt' => $item->getCreatedAt()?->format('d M Y, H:i'),
                'status' => $status,
                'statusLabel' => $this->getCommandeStatusLabel($status),
                'location' => $item->getLocation(),
                'total' => number_format((float) ($item->getTotal() ?? 0), 2, ',', ' ') . ' TND',
            ];
        }

        return [
            'customerName' => $commande->getCustomerName(),
            'matchBy' => $commande->getIdUtilisateur() ? 'id_utilisateur' : 'phone',
            'history' => $items,
            'count' => count($items),
        ];
    }

    #[Route('/', name: 'app_admin_commandes_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();

        $search = $request->query->get('search', '');
        $status = $request->query->get('status', '');
        $sort = $request->query->get('sort', 'date_desc');
       $visitors24h = $this->visitorActivityRepository->countUniqueVisitorsByRouteAndMinutes('app_produits_index', 1440);
$accepted24h = $this->commandRepository->countCreatedByMinutes(1440);
$conversionRate = $visitors24h > 0 ? round(($accepted24h / $visitors24h) * 100, 2) : 0;
$sourceStats = $this->visitorActivityRepository->getSourceStatsByRouteAndMinutes('app_produits_index', 1440);
$aov24h = $accepted24h > 0 ? round($this->commandRepository->sumTotalByMinutes(1440) / $accepted24h, 2) : 0;

        $page = max(1, (int) $request->query->get('page', 1));
        $perPage = 8;

        $abandonedPage = max(1, (int) $request->query->get('abandonedPage', 1));
        $abandonedPerPage = 8;

        $commandes = $this->commandRepository->findByFilters($search, $status, $sort);

        foreach ($commandes as $commande) {
            $this->hydrateCommandeData($commande);
        }

        $commandeHistoryCounts = [];
        foreach ($commandes as $commande) {
            $commandeHistoryCounts[$commande->getId()] = $this->getCommandeHistoryCount($commande);
        }

        $totalCommandesCount = count($commandes);
        $totalPages = max(1, (int) ceil($totalCommandesCount / $perPage));
        $page = min($page, $totalPages);
        $commandes = array_slice($commandes, ($page - 1) * $perPage, $perPage);

        $abandonedCommandes = $this->abandonedCommandeRepository->findBy(
            ['status' => 'draft'],
            ['updatedAt' => 'DESC']
        );

        foreach ($abandonedCommandes as $draft) {
            $draft->produit = null;

            if ($draft->getProductId()) {
                $draft->produit = $this->produitRepository->find($draft->getProductId());
            }
        }

        $totalAbandonedCount = count($abandonedCommandes);
        $abandonedTotalPages = max(1, (int) ceil($totalAbandonedCount / $abandonedPerPage));
        $abandonedPage = min($abandonedPage, $abandonedTotalPages);
        $abandonedCommandes = array_slice($abandonedCommandes, ($abandonedPage - 1) * $abandonedPerPage, $abandonedPerPage);

        $total = count($this->commandRepository->findAll());
        $enAttente = $this->commandRepository->countByStatus('en_attente');
        $acceptee = $this->commandRepository->countByStatus('acceptee');
        $refusee = $this->commandRepository->countByStatus('refusee');
        $annulee = $this->commandRepository->countByStatus('annulee');

        $stats = [
            'total' => $total,
            'en_attente' => $enAttente,
            'acceptee' => $acceptee,
            'refusee' => $refusee,
            'annulee' => $annulee,
            'pourcentage_acceptee' => $total > 0 ? round(($acceptee / $total) * 100, 1) : 0,
            'pourcentage_refusee' => $total > 0 ? round(($refusee / $total) * 100, 1) : 0,
        ];

        $deviceStats = $this->visitorActivityRepository->getOnlineDeviceStatsByRoute('app_produits_index', 5);

        return $this->render('admin_commandes/index.html.twig', [
            'commandes' => $commandes,
            'abandonedCommandes' => $abandonedCommandes,
            'search' => $search,
            'status' => $status,
            'sort' => $sort,
            'stats' => $stats,
            'onlineVisitors' => $this->visitorActivityRepository->countOnlineVisitorsByRoute('app_produits_index', 5),
            'deviceStats' => $deviceStats,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => $totalPages,
            'totalCommandesCount' => $totalCommandesCount,
            'abandonedPage' => $abandonedPage,
            'abandonedPerPage' => $abandonedPerPage,
            'abandonedTotalPages' => $abandonedTotalPages,
            'totalAbandonedCount' => $totalAbandonedCount,
'visitors24h' => $visitors24h,
'accepted24h' => $accepted24h,
'conversionRate' => $conversionRate,
'sourceStats' => $sourceStats,
'aov24h' => $aov24h,
            'commandeHistoryCounts' => $commandeHistoryCounts,
        ]);
    }

    #[Route('/{id}/edit-data', name: 'app_admin_commandes_edit_data', methods: ['GET'])]
    public function editData(int $id): JsonResponse
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            return $this->json([
                'success' => false,
                'message' => 'Commande non trouvée',
            ], 404);
        }

        return $this->json([
            'success' => true,
            'commande' => $this->buildCommandeEditPayload($commande),
        ]);
    }

    #[Route('/{id}/update-ajax', name: 'app_admin_commandes_update_ajax', methods: ['POST'])]
    public function updateAjax(int $id, Request $request): JsonResponse
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            return $this->json([
                'success' => false,
                'message' => 'Commande non trouvée',
            ], 404);
        }

        $commande->setCustomerName(trim((string) $request->request->get('customerName', '')));
        $commande->setPhone(trim((string) $request->request->get('phone', '')));
        $commande->setLocation(trim((string) $request->request->get('location', '')));
        $commande->setStatus((string) $request->request->get('status_commande', 'en_attente'));

        $productId = (int) $request->request->get('productId');
        if ($productId > 0) {
            $commande->setProductId($productId);
        }

        $quantite = max(1, (int) $request->request->get('quantite', 1));

        if (method_exists($commande, 'getCartItems') && method_exists($commande, 'setCartItems')) {
            $cartItems = $commande->getCartItems() ?? [];

            if (!empty($cartItems) && count($cartItems) === 1) {
                $cartItems[0]['quantite'] = $quantite;
                unset($cartItems[0]['quantity']);
                $commande->setCartItems($cartItems);

                $produit = $this->produitRepository->find((int) ($cartItems[0]['product_id'] ?? $commande->getProductId()));
                if ($produit && method_exists($commande, 'setTotal')) {
                    $commande->setTotal((float) $produit->getPrix() * $quantite);
                }
            } elseif (empty($cartItems) && method_exists($commande, 'setTotal')) {
                $produit = $this->produitRepository->find($commande->getProductId());
                if ($produit) {
                    $commande->setTotal((float) $produit->getPrix() * $quantite);
                }
            }
        }

        $this->entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Commande mise à jour avec succès',
        ]);
    }

    #[Route('/abandoned/{id}/accepter', name: 'app_admin_abandoned_commandes_accepter', methods: ['POST'])]
    public function accepterAbandoned(int $id): Response
    {
        $this->checkAdmin();

        $draft = $this->abandonedCommandeRepository->find($id);

        if (!$draft) {
            $this->addFlash('error', 'Lead abandonné non trouvé');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $createdCount = 0;
        $firstCommandeId = null;

        if ($draft->getProductId()) {
            $commande = new Commande();
            $commande->setProductId($draft->getProductId());
            $commande->setCustomerName($draft->getCustomerName() ?: 'Client');
            $commande->setPhone($draft->getPhone() ?: '');
            $commande->setLocation($draft->getLocation() ?: '');
            $commande->setCreatedAt(new \DateTime());
            $commande->setStatus('acceptee');

            $this->entityManager->persist($commande);
            $this->entityManager->flush();

            $firstCommandeId = $commande->getId();
            $createdCount = 1;
        } else {
            $cartData = $draft->getCartData() ?? [];

            foreach ($cartData as $item) {
                $productId = (int) ($item['product_id'] ?? 0);
                $quantity = max(1, (int) ($item['quantity'] ?? 1));

                if ($productId <= 0) {
                    continue;
                }

                for ($i = 0; $i < $quantity; $i++) {
                    $commande = new Commande();
                    $commande->setProductId($productId);
                    $commande->setCustomerName($draft->getCustomerName() ?: 'Client');
                    $commande->setPhone($draft->getPhone() ?: '');
                    $commande->setLocation($draft->getLocation() ?: '');
                    $commande->setCreatedAt(new \DateTime());
                    $commande->setStatus('acceptee');

                    $this->entityManager->persist($commande);
                    $this->entityManager->flush();

                    if ($firstCommandeId === null) {
                        $firstCommandeId = $commande->getId();
                    }

                    $createdCount++;
                }
            }
        }

        if ($createdCount === 0) {
            $this->addFlash('error', 'Impossible de convertir ce lead en commande');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $draft->setStatus('converted');
        $draft->setConvertedToCommandeId($firstCommandeId);
        $draft->setUpdatedAt(new \DateTime());
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Lead converti en commande acceptée');
        return $this->redirectToRoute('app_admin_commandes_index');
    }

    #[Route('/abandoned/{id}/refuser', name: 'app_admin_abandoned_commandes_refuser', methods: ['POST'])]
    public function refuserAbandoned(int $id): Response
    {
        $this->checkAdmin();

        $draft = $this->abandonedCommandeRepository->find($id);

        if (!$draft) {
            $this->addFlash('error', 'Lead abandonné non trouvé');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $draft->setStatus('refusee');
        $draft->setUpdatedAt(new \DateTime());
        $this->entityManager->flush();

        $this->addFlash('info', '❌ Lead abandonné refusé');
        return $this->redirectToRoute('app_admin_commandes_index');
    }

    #[Route('/export-lookalike', name: 'app_admin_commandes_export_lookalike', methods: ['GET'])]
    public function exportLookalike(): Response
    {
        $this->checkAdmin();

        $commandes = $this->commandRepository->findBy([], ['createdAt' => 'DESC']);
        $uniqueCustomers = [];

        foreach ($commandes as $commande) {
            $phone = trim((string) $commande->getPhone());

            if ($phone === '') {
                continue;
            }

            if (!isset($uniqueCustomers[$phone])) {
                $customerName = trim((string) $commande->getCustomerName());
                $location = trim((string) $commande->getLocation());

                $uniqueCustomers[$phone] = [
                    'first_name' => $this->extractFirstName($customerName),
                    'last_name' => $this->extractLastName($customerName),
                    'phone' => $this->formatPhone($phone),
                    'city' => $location,
                    'country' => 'Tunisia',
                ];
            }
        }

        $csvContent = $this->generateCsv($uniqueCustomers);
        $fileName = 'lookalike_customers_' . date('Y-m-d_H-i-s') . '.csv';

        return new Response($csvContent, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    private function generateCsv(array $data): string
    {
        $output = fopen('php://temp', 'r+');

        fputcsv($output, ['first_name', 'last_name', 'phone', 'city', 'country']);

        foreach ($data as $row) {
            fputcsv($output, [
                $row['first_name'],
                $row['last_name'],
                $row['phone'],
                $row['city'],
                $row['country'],
            ]);
        }

        rewind($output);
        return stream_get_contents($output);
    }

    private function extractFirstName(string $fullName): string
    {
        $parts = preg_split('/\s+/', trim($fullName));
        return $parts[0] ?? '';
    }

    private function extractLastName(string $fullName): string
    {
        $parts = preg_split('/\s+/', trim($fullName));

        if (!$parts || count($parts) < 2) {
            return '';
        }

        array_shift($parts);
        return implode(' ', $parts);
    }

    private function formatPhone(string $phone): string
    {
        $phone = preg_replace('/\D/', '', $phone);

        if (str_starts_with($phone, '216')) {
            return '+' . $phone;
        }

        if (str_starts_with($phone, '0')) {
            $phone = substr($phone, 1);
        }

        return '+216' . $phone;
    }

    #[Route('/calculator', name: 'app_admin_commandes_calculator', methods: ['GET'])]
    public function calculator(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_commandes/calculator.html.twig');
    }

    #[Route('/advanced-stats', name: 'app_admin_commandes_advanced_stats', methods: ['GET'])]
    public function advancedStats(Request $request): JsonResponse
    {
        $this->checkAdmin();

        $period = $request->query->get('period', 'today');
        $fromDate = $this->getPeriodStartDate($period);

        $commandes = $this->commandRepository->findByPeriodAndStatus($fromDate, 'acceptee');

        $revenue = 0.0;
        $acceptedCount = 0;

        foreach ($commandes as $commande) {
            $produit = $this->produitRepository->find($commande->getProductId());

            if ($produit) {
                $revenue += (float) $produit->getPrix();
                $acceptedCount++;
            }
        }

        return $this->json([
            'period' => $period,
            'acceptedCount' => $acceptedCount,
            'revenue' => round($revenue, 2),
        ]);
    }

    #[Route('/count', name: 'app_admin_visitors_count', methods: ['GET'])]
    public function count(): JsonResponse
    {
        $this->checkAdmin();
        $visitors24h = $this->visitorActivityRepository->countUniqueVisitorsByRouteAndMinutes('app_produits_index', 1440);
$accepted24h = $this->commandRepository->countCreatedByMinutes(1440);
$conversionRate = $visitors24h > 0 ? round(($accepted24h / $visitors24h) * 100, 2) : 0;
$sourceStats = $this->visitorActivityRepository->getSourceStatsByRouteAndMinutes('app_produits_index', 1440);
$aov24h = $accepted24h > 0 ? round($this->commandRepository->sumTotalByMinutes(1440) / $accepted24h, 2) : 0;
            return $this->json([
        'onlineVisitors' => $this->visitorActivityRepository->countOnlineVisitorsByRoute('app_produits_index', 5),
        'visitors24h' => $visitors24h,
        'accepted24h' => $accepted24h,
        'conversionRate' => $conversionRate,
        'sourceStats' => $sourceStats,
        'aov24h' => $aov24h,
    ]);
    }

    private function getPeriodStartDate(string $period): \DateTime
    {
        return match ($period) {
            'week' => new \DateTime('-7 days'),
            'month' => new \DateTime('-30 days'),
            default => (new \DateTime())->setTime(0, 0, 0),
        };
    }

    #[Route('/{id}/delete', name: 'app_admin_commandes_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $this->entityManager->remove($commande);
        $this->entityManager->flush();

        $this->addFlash('success', '🗑️ Commande supprimée avec succès');

        return $this->redirectToRoute('app_admin_commandes_index', [
            'status' => $request->request->get('status', ''),
            'search' => $request->request->get('search', ''),
            'sort' => $request->request->get('sort', 'date_desc'),
        ]);
    }

    #[Route('/{id}/accepter', name: 'app_admin_commandes_accepter', methods: ['POST'])]
    public function accepter(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $commande->setStatus('acceptee');
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Commande acceptée avec succès !');

        return $this->redirectToRoute('app_admin_commandes_index', [
            'status' => $request->request->get('status', ''),
            'search' => $request->request->get('search', ''),
            'sort' => $request->request->get('sort', 'date_desc'),
        ]);
    }

    #[Route('/{id}/first-delivery', name: 'app_admin_commandes_first_delivery', methods: ['POST'])]
    public function sendToFirstDelivery(int $id): JsonResponse
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            return $this->json([
                'success' => false,
                'message' => 'Commande non trouvée'
            ], 404);
        }

        if ($commande->getStatus() === 'en_attente') {
            $commande->setStatus('acceptee');
        }

        $this->entityManager->flush();

        return $this->json([
            'success' => true,
            'newStatus' => $commande->getStatus()
        ]);
    }

    #[Route('/{id}/refuser', name: 'app_admin_commandes_refuser', methods: ['POST'])]
    public function refuser(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $commande->setStatus('refusee');
        $this->entityManager->flush();

        $this->addFlash('info', '❌ Commande refusée');

        return $this->redirectToRoute('app_admin_commandes_index', [
            'status' => $request->request->get('status', ''),
            'search' => $request->request->get('search', ''),
            'sort' => $request->request->get('sort', 'date_desc'),
        ]);
    }

    #[Route('/import-txt', name: 'app_admin_commandes_import_txt', methods: ['POST'])]
    public function importTxt(Request $request): Response
    {
        $this->checkAdmin();

        /** @var UploadedFile|null $file */
        $file = $request->files->get('txt_file');

        if (!$file) {
            $this->addFlash('error', 'Aucun fichier TXT sélectionné.');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $extension = strtolower($file->getClientOriginalExtension());
        if ($extension !== 'txt') {
            $this->addFlash('error', 'Le fichier doit être au format .txt');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $content = file_get_contents($file->getPathname());

        if ($content === false || trim($content) === '') {
            $this->addFlash('error', 'Le fichier TXT est vide ou illisible.');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $lines = preg_split('/\r\n|\r|\n/', trim($content));
        $imported = 0;
        $failed = 0;
        $errors = [];

        $allowedStatuses = ['en_attente', 'acceptee', 'refusee', 'annulee'];

        foreach ($lines as $index => $line) {
            $lineNumber = $index + 1;
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            if ($index === 0 && str_contains(strtolower($line), 'customer_name|phone|location|product_id|status')) {
                continue;
            }

            $parts = array_map('trim', explode('|', $line));

            if (count($parts) < 5) {
                $failed++;
                $errors[] = 'Ligne ' . $lineNumber . ' invalide: 5 colonnes requises.';
                continue;
            }

            [$customerName, $phone, $location, $productIdRaw, $statusValue] = $parts;

            $productId = (int) $productIdRaw;

            if ($customerName === '' || $phone === '' || $location === '' || $productId <= 0 || $statusValue === '') {
                $failed++;
                $errors[] = 'Ligne ' . $lineNumber . ' invalide: champs manquants ou product_id incorrect.';
                continue;
            }

            if (!in_array($statusValue, $allowedStatuses, true)) {
                $failed++;
                $errors[] = 'Ligne ' . $lineNumber . ' invalide: statut "' . $statusValue . '" non autorisé.';
                continue;
            }

            $produit = $this->produitRepository->find($productId);
            if (!$produit) {
                $failed++;
                $errors[] = 'Ligne ' . $lineNumber . ' invalide: produit #' . $productId . ' introuvable.';
                continue;
            }

            $commande = new Commande();
            $commande->setCustomerName($customerName);
            $commande->setPhone($phone);
            $commande->setLocation($location);
            $commande->setProductId($productId);
            $commande->setStatus($statusValue);
            $commande->setCreatedAt(new \DateTime());

            $this->entityManager->persist($commande);
            $imported++;
        }

        if ($imported > 0) {
            $this->entityManager->flush();
        }

        if ($imported > 0) {
            $this->addFlash('success', '✅ Import terminé : ' . $imported . ' commande(s) importée(s).');
        }

        if ($failed > 0) {
            $message = '⚠️ ' . $failed . ' ligne(s) ignorée(s).';

            if (!empty($errors)) {
                $message .= ' ' . implode(' | ', array_slice($errors, 0, 5));
                if (count($errors) > 5) {
                    $message .= ' ...';
                }
            }

            $this->addFlash('error', $message);
        }

        if ($imported === 0 && $failed === 0) {
            $this->addFlash('error', 'Aucune donnée valide trouvée dans le fichier.');
        }

        return $this->redirectToRoute('app_admin_commandes_index');
    }

    #[Route('/live-data', name: 'app_admin_commandes_live_data', methods: ['GET'])]
    public function liveData(Request $request): JsonResponse
    {
        $this->checkAdmin();

        $search = $request->query->get('search', '');
        $status = $request->query->get('status', '');
        $sort = $request->query->get('sort', 'date_desc');

        $page = max(1, (int) $request->query->get('page', 1));
        $perPage = 8;

        $abandonedPage = max(1, (int) $request->query->get('abandonedPage', 1));
        $abandonedPerPage = 8;

        $commandes = $this->commandRepository->findByFilters($search, $status, $sort);

        foreach ($commandes as $commande) {
            $this->hydrateCommandeData($commande);
        }

        $commandeHistoryCounts = [];
        foreach ($commandes as $commande) {
            $commandeHistoryCounts[$commande->getId()] = $this->getCommandeHistoryCount($commande);
        }

        $totalCommandesCount = count($commandes);
        $totalPages = max(1, (int) ceil($totalCommandesCount / $perPage));
        $page = min($page, $totalPages);
        $commandes = array_slice($commandes, ($page - 1) * $perPage, $perPage);

        $abandonedCommandes = $this->abandonedCommandeRepository->findBy(
            ['status' => 'draft'],
            ['updatedAt' => 'DESC']
        );

        foreach ($abandonedCommandes as $draft) {
            $draft->produit = null;

            if ($draft->getProductId()) {
                $draft->produit = $this->produitRepository->find($draft->getProductId());
            }
        }

        $totalAbandonedCount = count($abandonedCommandes);
        $abandonedTotalPages = max(1, (int) ceil($totalAbandonedCount / $abandonedPerPage));
        $abandonedPage = min($abandonedPage, $abandonedTotalPages);
        $abandonedCommandes = array_slice($abandonedCommandes, ($abandonedPage - 1) * $abandonedPerPage, $abandonedPerPage);

        $normalRows = '';

        foreach ($commandes as $commande) {
            $statusLabel = $this->getCommandeStatusLabel((string) $commande->getStatus());
            $historyCount = $commandeHistoryCounts[$commande->getId()] ?? 0;
            $historyButtonHtml = $historyCount > 0
                ? '<button type="button" class="history-icon-btn js-command-history-btn" title="Historique client" aria-label="Historique client" data-history-url="/admin/commandes/' . $commande->getId() . '/history"><i class="fas fa-clock-rotate-left"></i><span class="history-badge">' . $historyCount . '</span></button>'
                : '';

            $cartSummary = $commande->getCartSummary() ?? [
                'items' => [],
                'quantity' => 1,
                'total' => 0,
                'isPanier' => false,
            ];

            if ($cartSummary['isPanier']) {
                $firstItem = $cartSummary['items'][0] ?? null;

                $thumbHtml = $firstItem && !empty($firstItem['photo'])
                    ? '<img src="' . htmlspecialchars((string) $firstItem['photo'], ENT_QUOTES) . '" alt="' . htmlspecialchars((string) ($firstItem['nom'] ?? 'Panier'), ENT_QUOTES) . '" class="product-thumb">'
                    : '<span class="product-fallback">🛒</span>';

                $productCellHtml = '
                    <div class="product-cell">
                        ' . $thumbHtml . '
                        <div>
                            <div>Commande panier</div>
                            <small class="text-secondary">' . (int) $cartSummary['quantity'] . ' article(s)</small>
                        </div>
                    </div>';
            } else {
                $produit = $commande->produit;

                $thumbHtml = ($produit && method_exists($produit, 'getPhoto') && $produit->getPhoto())
                    ? '<img src="' . htmlspecialchars((string) $produit->getPhoto(), ENT_QUOTES) . '" alt="' . htmlspecialchars((string) $produit->getNom(), ENT_QUOTES) . '" class="product-thumb">'
                    : '<span class="product-fallback">📦</span>';

                $productName = ($produit && method_exists($produit, 'getNom')) ? $produit->getNom() : 'Produit';

                $productCellHtml = '
                    <div class="product-cell">
                        ' . $thumbHtml . '
                        <div>
                            <div>' . htmlspecialchars((string) $productName, ENT_QUOTES) . '</div>
                            <small class="text-secondary">x' . (int) $cartSummary['quantity'] . '</small>
                        </div>
                    </div>';
            }

            $normalRows .= '
                <tr>
                    <td><strong>' . $commande->getId() . '</strong></td>
                    <td>' . $productCellHtml . '</td>
                    <td>
                        <div class="customer-history-cell">
                            <span>' . htmlspecialchars((string) $commande->getCustomerName(), ENT_QUOTES) . '</span>
                            ' . $historyButtonHtml . '
                        </div>
                    </td>
                    <td>' . $commande->getCreatedAt()?->format('d M Y, H:i') . '</td>
                    <td>' . htmlspecialchars((string) $commande->getLocation(), ENT_QUOTES) . '</td>
                    <td>
                        <span id="fdg-status-' . $commande->getId() . '" class="status-pill status-' . htmlspecialchars((string) $commande->getStatus(), ENT_QUOTES) . '">
                            ' . $statusLabel . '
                        </span>
                    </td>
                    <td>' . number_format((float) ($cartSummary['total'] ?? 0), 2, ',', ' ') . ' TND</td>
                    <td>
                        <div class="actions-cell">
                            <button type="button"
                                class="icon-btn fdg-btn"
                                title="Envoyer à First Delivery"
                                onclick="openFirstDeliveryModal(' . $commande->getId() . ')">
                                <i class="fas fa-paper-plane"></i>
                            </button>';

            if ($commande->getStatus() === 'en_attente') {
                $normalRows .= '
                            <form action="/admin/commandes/' . $commande->getId() . '/accepter" method="post" class="inline-form">
                                <input type="hidden" name="status" value="' . htmlspecialchars($status, ENT_QUOTES) . '">
                                <input type="hidden" name="search" value="' . htmlspecialchars($search, ENT_QUOTES) . '">
                                <input type="hidden" name="sort" value="' . htmlspecialchars($sort, ENT_QUOTES) . '">
                                <button type="submit" class="icon-btn" title="Accepter">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>

                            <form action="/admin/commandes/' . $commande->getId() . '/refuser" method="post" class="inline-form">
                                <input type="hidden" name="status" value="' . htmlspecialchars($status, ENT_QUOTES) . '">
                                <input type="hidden" name="search" value="' . htmlspecialchars($search, ENT_QUOTES) . '">
                                <input type="hidden" name="sort" value="' . htmlspecialchars($sort, ENT_QUOTES) . '">
                                <button type="submit" class="icon-btn" title="Refuser">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>';
            }

            $normalRows .= '
                            <button type="button"
                                class="icon-btn"
                                title="Modifier"
                                onclick="openCommandeEditPanel(' . $commande->getId() . ')">
                                <i class="fas fa-pen"></i>
                            </button>

                            <form action="/admin/commandes/' . $commande->getId() . '/delete" method="post" class="inline-form" onsubmit="return confirm(\'Supprimer cette commande ?\');">
                                <input type="hidden" name="status" value="' . htmlspecialchars($status, ENT_QUOTES) . '">
                                <input type="hidden" name="search" value="' . htmlspecialchars($search, ENT_QUOTES) . '">
                                <input type="hidden" name="sort" value="' . htmlspecialchars($sort, ENT_QUOTES) . '">
                                <button type="submit" class="icon-btn" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>';
        }

        if ($normalRows === '') {
            $normalRows = '<tr><td colspan="8" class="text-center py-4">Aucune commande trouvée.</td></tr>';
        }

        $abandonedRows = '';

        foreach ($abandonedCommandes as $draft) {
            $draftProductPhoto = ($draft->produit && method_exists($draft->produit, 'getPhoto') && $draft->produit->getPhoto())
                ? '/uploads/produits/' . $draft->produit->getPhoto()
                : null;

            $draftProductName = ($draft->produit && method_exists($draft->produit, 'getNom'))
                ? $draft->produit->getNom()
                : null;

            $cartData = method_exists($draft, 'getCartData') ? $draft->getCartData() : null;

            $abandonedRows .= '
                <tr>
                    <td><strong>#' . $draft->getId() . '</strong></td>
                    <td>';

            if ($draftProductName) {
                $abandonedRows .= '
                        <div class="product-cell">' .
                            ($draftProductPhoto
                                ? '<img src="' . htmlspecialchars($draftProductPhoto, ENT_QUOTES) . '" alt="' . htmlspecialchars((string) $draftProductName, ENT_QUOTES) . '" class="product-thumb">'
                                : '<span class="product-fallback">📦</span>') .
                            '<div>
                                <div>' . htmlspecialchars((string) $draftProductName, ENT_QUOTES) . '</div>
                                <small class="text-secondary">Produit direct</small>
                            </div>
                        </div>';
            } elseif (!empty($cartData)) {
                $abandonedRows .= '
                        <div class="product-cell">
                            <span class="product-fallback">🛒</span>
                            <div>
                                <div>Panier abandonné</div>
                                <small class="text-secondary">' . count($cartData) . ' article(s)</small>
                            </div>
                        </div>';
            } else {
                $abandonedRows .= '
                        <div class="product-cell">
                            <span class="product-fallback">📦</span>
                            <div>
                                <div>Lead sans produit</div>
                            </div>
                        </div>';
            }

            $abandonedRows .= '
                    </td>
                    <td>' . htmlspecialchars((string) ($draft->getCustomerName() ?: '-'), ENT_QUOTES) . '</td>
                    <td>' . ($draft->getPhone()
                        ? '<a href="tel:' . htmlspecialchars((string) $draft->getPhone(), ENT_QUOTES) . '" style="color:#000; text-decoration:underline;">' . htmlspecialchars((string) $draft->getPhone(), ENT_QUOTES) . '</a>'
                        : '-') . '</td>
                    <td>' . htmlspecialchars((string) ($draft->getLocation() ?: '-'), ENT_QUOTES) . '</td>
                    <td>' . htmlspecialchars((string) $draft->getSource(), ENT_QUOTES) . '</td>
                    <td>' . ($draft->getUpdatedAt() ? $draft->getUpdatedAt()->format('d M Y, H:i') : '-') . '</td>
                    <td><span class="status-pill status-en_attente">Abandonnée</span></td>
                    <td>
                        <div class="actions-cell">
                            <form action="/admin/commandes/abandoned/' . $draft->getId() . '/accepter" method="post" class="inline-form">
                                <button type="submit" class="icon-btn" title="Accepter le lead">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>

                            <form action="/admin/commandes/abandoned/' . $draft->getId() . '/refuser" method="post" class="inline-form">
                                <button type="submit" class="icon-btn" title="Refuser le lead">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>';
        }

        if ($abandonedRows === '') {
            $abandonedRows = '<tr><td colspan="9" class="text-center py-4">Aucune commande abandonnée.</td></tr>';
        }

        $latestOrder = null;

        if (!empty($commandes)) {
            $latestCommande = $commandes[0];
            $latestProduit = $latestCommande->produit;

            $latestCartSummary = $latestCommande->getCartSummary() ?? [
                'items' => [],
                'quantity' => 0,
                'total' => 0,
                'isPanier' => false,
            ];

            $latestOrder = [
                'customerName' => $latestCommande->getCustomerName(),
                'phone' => $latestCommande->getPhone(),
                'productName' => $latestCartSummary['isPanier']
                    ? 'Commande panier (' . $latestCartSummary['quantity'] . ' article(s))'
                    : ($latestProduit && method_exists($latestProduit, 'getNom') ? $latestProduit->getNom() : 'Produit'),
                'price' => number_format((float) ($latestCartSummary['total'] ?? 0), 2, ',', ' ') . ' TND',
                'photo' => $latestCartSummary['isPanier']
                    ? (($latestCartSummary['items'][0]['photo'] ?? null) ?: null)
                    : ($latestProduit && method_exists($latestProduit, 'getPhoto') && $latestProduit->getPhoto()
                        ? $latestProduit->getPhoto()
                        : null),
            ];
        }

        return $this->json([
            'normalCount' => $totalCommandesCount,
            'abandonedCount' => $totalAbandonedCount,
            'normalRows' => $normalRows,
            'abandonedRows' => $abandonedRows,
            'latestOrder' => $latestOrder,
            'commandeHistoryCounts' => $commandeHistoryCounts,
            'pagination' => [
                'page' => $page,
                'totalPages' => $totalPages,
                'abandonedPage' => $abandonedPage,
                'abandonedTotalPages' => $abandonedTotalPages,
            ],
            'onlineVisitors' => $this->visitorActivityRepository->countOnlineVisitorsByRoute('app_produits_index', 5),
        ]);
    }

    #[Route('/{id}/history', name: 'app_admin_commandes_history', methods: ['GET'])]
    public function history(int $id): JsonResponse
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            return new JsonResponse(['error' => 'Commande introuvable'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($this->buildCommandeHistoryPayload($commande));
    }
}
