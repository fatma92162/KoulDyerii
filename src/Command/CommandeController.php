<?php

namespace App\Controller;

use App\Repository\CommandRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mes-commandes')]
class CommandeController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CommandRepository $commandRepository,
        private ProduitRepository $produitRepository
    ) {}

    #[Route('/', name: 'app_mes_commandes_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $commandes = $this->commandRepository->findByUtilisateur($user->getIdUtilisateur());

        foreach ($commandes as $commande) {
            $produit = $this->produitRepository->find($commande->getProductId());
            $commande->produit = $produit;
        }

        return $this->render('commandes/index.html.twig', [
            'commandes' => $commandes
        ]);
    }

    #[Route('/{id}/annuler', name: 'app_mes_commandes_annuler', methods: ['POST'])]
    public function annuler(int $id): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        if ($commande->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous ne pouvez pas annuler cette commande');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        if ($commande->getStatus() !== 'en_attente') {
            $this->addFlash('error', 'Cette commande ne peut plus être annulée');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        $commande->setStatus('annulee');
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Commande annulée avec succès');
        return $this->redirectToRoute('app_mes_commandes_index');
    }

    #[Route('/{id}', name: 'app_mes_commandes_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        if ($commande->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Accès non autorisé');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        $produit = $this->produitRepository->find($commande->getProductId());

        return $this->render('commandes/show.html.twig', [
            'commande' => $commande,
            'produit' => $produit
        ]);
    }
}