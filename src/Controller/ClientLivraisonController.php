<?php

namespace App\Controller;

use App\Repository\CommandRepository;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mes-livraisons')]
class ClientLivraisonController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CommandRepository $commandRepository,
        private LivraisonRepository $livraisonRepository,
        private LivreurRepository $livreurRepository,
        private ProduitRepository $produitRepository
    ) {}

    #[Route('/', name: 'app_client_livraisons', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $commandes = $this->commandRepository->findBy(
            ['idUtilisateur' => $user->getIdUtilisateur()],
            ['createdAt' => 'DESC']
        );

        $livraisons = [];

        foreach ($commandes as $commande) {
            $commandeId = method_exists($commande, 'getId') ? $commande->getId() : null;

            if (!$commandeId) {
                continue;
            }

            $livraison = $this->livraisonRepository->findOneBy(['idCommande' => $commandeId]);

            if (!$livraison) {
                continue;
            }

            $livreur = null;
            $produit = null;

            if (method_exists($livraison, 'getIdLivreur') && $livraison->getIdLivreur()) {
                $livreur = $this->livreurRepository->find($livraison->getIdLivreur());
            }

            if (method_exists($commande, 'getProductId') && $commande->getProductId()) {
                $produit = $this->produitRepository->find($commande->getProductId());
            }

            $livraison->livreur = $livreur;
            $livraison->commande = $commande;
            $livraison->produit = $produit;

            $livraisons[] = $livraison;
        }

        return $this->render('client/livraisons.html.twig', [
            'livraisons' => $livraisons,
            'commandes' => $commandes
        ]);
    }

    #[Route('/commande/{id}', name: 'app_client_livraison_commande', methods: ['GET'])]
    public function voirLivraisonParCommande(int $id): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $commande = $this->commandRepository->find($id);

        if (!$commande || $commande->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_client_livraisons');
        }

        $livraison = $this->livraisonRepository->findOneBy(['idCommande' => $commande->getId()]);

        if (!$livraison) {
            $this->addFlash('info', 'Aucune livraison n\'a encore été programmée pour cette commande');
            return $this->redirectToRoute('app_client_livraisons');
        }

        $livreur = null;
        $produit = null;

        if (method_exists($livraison, 'getIdLivreur') && $livraison->getIdLivreur()) {
            $livreur = $this->livreurRepository->find($livraison->getIdLivreur());
        }

        if (method_exists($commande, 'getProductId') && $commande->getProductId()) {
            $produit = $this->produitRepository->find($commande->getProductId());
        }

        return $this->render('client/livraison_detail.html.twig', [
            'livraison' => $livraison,
            'commande' => $commande,
            'livreur' => $livreur,
            'produit' => $produit
        ]);
    }

    #[Route('/{id}/annuler', name: 'app_client_livraison_annuler', methods: ['POST'])]
    public function annulerLivraison(int $id, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $livraison = $this->livraisonRepository->find($id);

        if (!$livraison) {
            $this->addFlash('error', 'Livraison non trouvée');
            return $this->redirectToRoute('app_client_livraisons');
        }

        $commande = $this->commandRepository->find($livraison->getIdCommande());

        if (!$commande || $commande->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous ne pouvez pas annuler cette livraison');
            return $this->redirectToRoute('app_client_livraisons');
        }

        if ($livraison->getStatutLivraison() !== 'en_cours') {
            $this->addFlash('error', 'Cette livraison ne peut plus être annulée');
            return $this->redirectToRoute('app_client_livraisons');
        }

        $livraison->setStatutLivraison('annulee');

        $livreur = $this->livreurRepository->find($livraison->getIdLivreur());
        if ($livreur) {
            $livreur->setDisponibilite(true);
        }

        $commande->setStatus('annulee');

        $this->entityManager->flush();

        $this->addFlash('success', '✅ Votre livraison a été annulée avec succès');
        return $this->redirectToRoute('app_client_livraisons');
    }
}