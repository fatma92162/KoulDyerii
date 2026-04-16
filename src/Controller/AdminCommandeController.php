<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Repository\AbandonedCommandeRepository;
use App\Repository\CommandRepository;
use App\Repository\ProduitRepository;
use App\Repository\VisitorActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/', name: 'app_admin_commandes_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();

        $search = $request->query->get('search', '');
        $status = $request->query->get('status', '');
        $sort = $request->query->get('sort', 'date_desc');

        $commandes = $this->commandRepository->findByFilters($search, $status, $sort);

        foreach ($commandes as $commande) {
            $commande->produit = $this->produitRepository->find($commande->getProductId());
        }

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

        return $this->json([
            'onlineVisitors' => $this->visitorActivityRepository->countOnlineVisitorsByRoute('app_produits_index', 5),
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

    #[Route('/{id}/edit', name: 'app_admin_commandes_edit', methods: ['GET'])]
    public function edit(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $produits = $this->produitRepository->findAll();
        $produit = $this->produitRepository->find($commande->getProductId());

        return $this->render('admin_commandes/edit.html.twig', [
            'commande' => $commande,
            'produit' => $produit,
            'produits' => $produits,
            'status' => $request->query->get('status', ''),
            'search' => $request->query->get('search', ''),
            'sort' => $request->query->get('sort', 'date_desc'),
        ]);
    }

    #[Route('/{id}/update', name: 'app_admin_commandes_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_admin_commandes_index');
        }

        $commande->setCustomerName(trim($request->request->get('customerName', '')));
        $commande->setPhone(trim($request->request->get('phone', '')));
        $commande->setLocation(trim($request->request->get('location', '')));
        $commande->setStatus($request->request->get('status_commande', 'en_attente'));

        $productId = (int) $request->request->get('productId');
        if ($productId > 0) {
            $commande->setProductId($productId);
        }

        $this->entityManager->flush();

        $this->addFlash('success', '✅ Commande mise à jour avec succès');

        return $this->redirectToRoute('app_admin_commandes_index', [
            'status' => $request->request->get('status_filter', ''),
            'search' => $request->request->get('search_filter', ''),
            'sort' => $request->request->get('sort_filter', 'date_desc'),
        ]);
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
    #[Route('/live-data', name: 'app_admin_commandes_live_data', methods: ['GET'])]
public function liveData(Request $request): JsonResponse
{
    $this->checkAdmin();

    $search = $request->query->get('search', '');
    $status = $request->query->get('status', '');
    $sort = $request->query->get('sort', 'date_desc');

    $commandes = $this->commandRepository->findByFilters($search, $status, $sort);

    foreach ($commandes as $commande) {
        $commande->produit = $this->produitRepository->find($commande->getProductId());
    }

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

    $normalRows = '';

    foreach ($commandes as $commande) {
        $productPhoto = ($commande->produit && method_exists($commande->produit, 'getPhoto') && $commande->produit->getPhoto())
            ? '/uploads/produits/' . $commande->produit->getPhoto()
            : null;

        $productName = ($commande->produit && method_exists($commande->produit, 'getNom'))
            ? $commande->produit->getNom()
            : 'Produit';

        $productPrice = ($commande->produit && method_exists($commande->produit, 'getPrix'))
            ? number_format((float) $commande->produit->getPrix(), 2, ',', ' ') . ' TND'
            : '-';

        $statusLabel = match ($commande->getStatus()) {
            'en_attente' => 'Pending',
            'acceptee' => 'Accepted',
            'refusee' => 'Rejected',
            'annulee' => 'Cancelled',
            default => $commande->getStatus(),
        };

        $normalRows .= '
            <tr>
                <td><strong>' . $commande->getId() . '</strong></td>
                <td>
                    <div class="product-cell">' .
                        ($productPhoto
                            ? '<img src="' . htmlspecialchars($productPhoto) . '" alt="' . htmlspecialchars($productName) . '" class="product-thumb">'
                            : '<span class="product-fallback">📦</span>') .
                        '<div>
                            <div>' . htmlspecialchars($productName) . '</div>
                            <small class="text-secondary">x1</small>
                        </div>
                    </div>
                </td>
                <td>' . htmlspecialchars((string) $commande->getCustomerName()) . '</td>
                <td>' . $commande->getCreatedAt()?->format('d M Y, H:i') . '</td>
                <td>' . htmlspecialchars((string) $commande->getLocation()) . '</td>
                <td><span class="status-pill status-' . htmlspecialchars((string) $commande->getStatus()) . '">' . htmlspecialchars($statusLabel) . '</span></td>
                <td>' . $productPrice . '</td>
                <td>
                    <div class="actions-cell">';

        if ($commande->getStatus() === 'en_attente') {
            $normalRows .= '
                        <form action="/admin/commandes/' . $commande->getId() . '/accepter" method="post" class="inline-form">
                            <input type="hidden" name="status" value="' . htmlspecialchars($status) . '">
                            <input type="hidden" name="search" value="' . htmlspecialchars($search) . '">
                            <input type="hidden" name="sort" value="' . htmlspecialchars($sort) . '">
                            <button type="submit" class="icon-btn" title="Accepter">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>

                        <form action="/admin/commandes/' . $commande->getId() . '/refuser" method="post" class="inline-form">
                            <input type="hidden" name="status" value="' . htmlspecialchars($status) . '">
                            <input type="hidden" name="search" value="' . htmlspecialchars($search) . '">
                            <input type="hidden" name="sort" value="' . htmlspecialchars($sort) . '">
                            <button type="submit" class="icon-btn" title="Refuser">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>';
        }

        $normalRows .= '
                        <a href="/admin/commandes/' . $commande->getId() . '/edit?status=' . urlencode($status) . '&search=' . urlencode($search) . '&sort=' . urlencode($sort) . '" class="icon-btn" title="Modifier">
                            <i class="fas fa-pen"></i>
                        </a>

                        <form action="/admin/commandes/' . $commande->getId() . '/delete" method="post" class="inline-form" onsubmit="return confirm(\'Supprimer cette commande ?\');">
                            <input type="hidden" name="status" value="' . htmlspecialchars($status) . '">
                            <input type="hidden" name="search" value="' . htmlspecialchars($search) . '">
                            <input type="hidden" name="sort" value="' . htmlspecialchars($sort) . '">
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
                            ? '<img src="' . htmlspecialchars($draftProductPhoto) . '" alt="' . htmlspecialchars($draftProductName) . '" class="product-thumb">'
                            : '<span class="product-fallback">📦</span>') .
                        '<div>
                            <div>' . htmlspecialchars($draftProductName) . '</div>
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
                <td>' . htmlspecialchars((string) ($draft->getCustomerName() ?: '-')) . '</td>
                <td>' . ($draft->getPhone()
                    ? '<a href="tel:' . htmlspecialchars($draft->getPhone()) . '" style="color:#fff; text-decoration:underline;">' . htmlspecialchars($draft->getPhone()) . '</a>'
                    : '-') . '</td>
                <td>' . htmlspecialchars((string) ($draft->getLocation() ?: '-')) . '</td>
                <td>' . htmlspecialchars((string) $draft->getSource()) . '</td>
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

        $latestOrder = [
            'customerName' => $latestCommande->getCustomerName(),
            'phone' => $latestCommande->getPhone(),
            'productName' => $latestProduit && method_exists($latestProduit, 'getNom') ? $latestProduit->getNom() : 'Produit',
            'price' => $latestProduit && method_exists($latestProduit, 'getPrix')
                ? number_format((float) $latestProduit->getPrix(), 2, ',', ' ') . ' TND'
                : '-',
            'photo' => $latestProduit && method_exists($latestProduit, 'getPhoto') && $latestProduit->getPhoto()
                ? '/uploads/produits/' . $latestProduit->getPhoto()
                : null,
        ];
    }

    return $this->json([
        'normalCount' => count($commandes),
        'abandonedCount' => count($abandonedCommandes),
        'normalRows' => $normalRows,
        'abandonedRows' => $abandonedRows,
        'latestOrder' => $latestOrder,
    ]);
}
}