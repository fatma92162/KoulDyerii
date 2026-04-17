<?php

namespace App\Controller;

use App\Repository\AbandonedCommandeRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/abandoned-commandes')]
class AdminAbandonedCommandeController extends AbstractController
{
    public function __construct(
        private AbandonedCommandeRepository $abandonedCommandeRepository,
        private ProduitRepository $produitRepository
    ) {
    }

    private function checkAdmin(): void
    {
        $user = $this->getUser();

        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    #[Route('/', name: 'app_admin_abandoned_commandes_index', methods: ['GET'])]
    public function index(): Response
    {
        $this->checkAdmin();

        $drafts = $this->abandonedCommandeRepository->findRecoverable();

        foreach ($drafts as $draft) {
            if ($draft->getProductId()) {
                $draft->produit = $this->produitRepository->find($draft->getProductId());
            } else {
                $draft->produit = null;
            }
        }

        return $this->render('admin_abandoned_commandes/index.html.twig', [
            'drafts' => $drafts
        ]);
    }
}