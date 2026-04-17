<?php

namespace App\Controller;

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
}