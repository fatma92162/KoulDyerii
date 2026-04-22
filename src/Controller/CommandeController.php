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

    private function hydrateCommandeFrontend($commande): void
    {
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

            $commande->produit = null;
        } else {
    $produit = $this->produitRepository->find($commande->getProductId());
    $commande->produit = $produit;

    $quantite = method_exists($commande, 'getQuantite')
        ? max(1, (int) ($commande->getQuantite() ?? 1))
        : 1;

    $cartSummary['quantity'] = $quantite;

    if ($produit) {
        $prix = (float) $produit->getPrix();

        $cartSummary['items'][] = [
            'id' => $produit->getIdProduit(),
            'nom' => $produit->getNom(),
            'photo' => $produit->getPhoto(),
            'prix' => $prix,
            'quantite' => $quantite,
            'sous_total' => $prix * $quantite,
        ];
    }

    if ($cartSummary['total'] <= 0 && $produit) {
        $cartSummary['total'] = (float) $produit->getPrix() * $quantite;
    }
}
        $commande->setCartSummary($cartSummary);
    }

    #[Route('/', name: 'app_mes_commandes_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $userId = method_exists($user, 'getIdUtilisateur')
            ? $user->getIdUtilisateur()
            : $user->getId();

        $commandes = $this->commandRepository->findBy(
            ['idUtilisateur' => $userId],
            ['createdAt' => 'DESC']
        );

        foreach ($commandes as $commande) {
            $this->hydrateCommandeFrontend($commande);
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

        $userId = method_exists($user, 'getIdUtilisateur')
            ? $user->getIdUtilisateur()
            : $user->getId();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        if ($commande->getIdUtilisateur() !== $userId) {
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

        $userId = method_exists($user, 'getIdUtilisateur')
            ? $user->getIdUtilisateur()
            : $user->getId();

        $commande = $this->commandRepository->find($id);

        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        if ($commande->getIdUtilisateur() !== $userId) {
            $this->addFlash('error', 'Accès non autorisé');
            return $this->redirectToRoute('app_mes_commandes_index');
        }

        $this->hydrateCommandeFrontend($commande);

        return $this->render('commandes/show.html.twig', [
            'commande' => $commande
        ]);
    }
}