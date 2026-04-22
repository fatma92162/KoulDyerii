<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Gestion de la modération des plats côté admin.
 * Routes : /admin/plats/*
 */
#[Route('/admin/plats')]
class AdminPlatController extends AbstractController
{
    /** Routes autorisées après modération (évite les redirections ouvertes). */
    private const REDIRECT_AFTER_MODERATION = [
        'app_admin_plats_pending' => 'list',
        'app_admin_plats_index' => 'list',
        'app_admin_partenaire_voir' => 'partner',
    ];

    public function __construct(
        private EntityManagerInterface $entityManager,
        private PlatRepository         $platRepository,
        private PartenaireRepository   $partenaireRepository
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    private function redirectAfterPlatModeration(Request $request): Response
    {
        $route = (string) $request->request->get('redirect_route', '');
        $rawId = $request->request->get('redirect_id');

        if ($route === '' || !isset(self::REDIRECT_AFTER_MODERATION[$route])) {
            return $this->redirectToRoute('app_admin_plats_pending');
        }

        if (self::REDIRECT_AFTER_MODERATION[$route] === 'list') {
            return $this->redirectToRoute($route);
        }

        if ($rawId === null || $rawId === '') {
            return $this->redirectToRoute('app_admin_plats_pending');
        }

        return $this->redirectToRoute($route, ['id' => (int) $rawId]);
    }

    // ─── Liste des plats en attente ───────────────────────────────────────────

    #[Route('/pending', name: 'app_admin_plats_pending', methods: ['GET'])]
    public function pending(): Response
    {
        $this->checkAdmin();

        $pending  = $this->platRepository->findPendingPlats();
        $approved = $this->platRepository->findApprovedPlats();
        $all      = $this->platRepository->findAll();

        // Associer le partenaire à chaque plat
        foreach ($pending as $plat) {
            if ($plat->getIdPartenaire()) {
                $plat->setPartenaire(
                    $this->partenaireRepository->find($plat->getIdPartenaire())
                );
            }
        }

        $stats = [
            'total'      => count($all),
            'en_attente' => count($pending),
            'accepte'    => count($approved),
            'refuse'     => count($all) - count($pending) - count($approved),
        ];

        return $this->render('admin_plats/pending.html.twig', [
            'plats' => $pending,
            'stats' => $stats,
        ]);
    }

    // ─── Liste de TOUS les plats (avec filtres) ───────────────────────────────

    #[Route('/', name: 'app_admin_plats_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();

        $statutFiltre = $request->query->get('statut', '');

        if (!empty($statutFiltre)) {
            $plats = $this->platRepository->findByStatut($statutFiltre);
        } else {
            $plats = $this->platRepository->findAll();
        }

        // Associer le partenaire
        foreach ($plats as $plat) {
            if ($plat->getIdPartenaire()) {
                $plat->setPartenaire(
                    $this->partenaireRepository->find($plat->getIdPartenaire())
                );
            }
        }

        $allPlats = $this->platRepository->findAll();
        $stats = [
            'total'      => count($allPlats),
            'en_attente' => count($this->platRepository->findPendingPlats()),
            'accepte'    => count($this->platRepository->findApprovedPlats()),
            'refuse'     => count($this->platRepository->findByStatut('refuse')),
        ];

        return $this->render('admin_plats/index.html.twig', [
            'plats'        => $plats,
            'stats'        => $stats,
            'statutFiltre' => $statutFiltre,
        ]);
    }

    // ─── Approuver un plat ────────────────────────────────────────────────────

    #[Route('/{id}/approve', name: 'app_admin_plat_approve', methods: ['POST'])]
    public function approve(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $plat = $this->platRepository->find($id);
        if (!$plat) {
            $this->addFlash('error', 'Plat non trouvé.');
            return $this->redirectAfterPlatModeration($request);
        }

        $plat->setStatut('accepte');
        $plat->setRejectComment(null);
        $this->entityManager->flush();

        $this->addFlash('success', sprintf('✅ Plat « %s » approuvé avec succès !', $plat->getNom()));
        return $this->redirectAfterPlatModeration($request);
    }

    // ─── Rejeter un plat ──────────────────────────────────────────────────────

    #[Route('/{id}/reject', name: 'app_admin_plat_reject', methods: ['POST'])]
    public function reject(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $plat = $this->platRepository->find($id);
        if (!$plat) {
            $this->addFlash('error', 'Plat non trouvé.');
            return $this->redirectAfterPlatModeration($request);
        }

        $plat->setStatut('refuse');
        $comment = trim((string) $request->request->get('reject_comment', ''));
        $plat->setRejectComment($comment !== '' ? $comment : null);
        $this->entityManager->flush();

        $this->addFlash('info', sprintf('❌ Plat « %s » rejeté.', $plat->getNom()));
        return $this->redirectAfterPlatModeration($request);
    }
}
