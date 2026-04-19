<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Entity\Partenaire;
use App\Repository\PlatRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/partenaires')]
class PartenaireController extends AbstractController
{
    public function __construct(
        private PlatRepository $platRepository,
        private PartenaireRepository $partenaireRepository,
        private EntityManagerInterface $em
    ) {}

    /**
     * Page de liste des partenaires et leurs produits avec collaboration
     */
    #[Route('/', name: 'app_partenaires_liste', methods: ['GET'])]
    public function liste(): Response
    {
        $partenaires = $this->partenaireRepository->findAll();
        $plats = $this->platRepository->findAll();

        return $this->render('partenaires/liste.html.twig', [
            'partenaires' => $partenaires,
            'plats' => $plats,
        ]);
    }

    /**
     * Afficher les détails d'un partenaire
     */
    #[Route('/{id}', name: 'app_partenaire_detail', methods: ['GET'])]
    public function detail(int $id): Response
    {
        $partenaire = $this->partenaireRepository->find($id);
        
        if (!$partenaire) {
            throw $this->createNotFoundException('Partenaire non trouvé');
        }

        $plats = $this->platRepository->findBy(['idPartenaire' => $id]);

        return $this->render('partenaires/detail.html.twig', [
            'partenaire' => $partenaire,
            'plats' => $plats,
        ]);
    }

    /**
     * Activer la collaboration pour un partenaire
     */
    #[Route('/{id}/activer-collaboration', name: 'app_partenaire_collaboration', methods: ['POST'])]
    public function activerCollaboration(int $id, Request $request): Response
    {
        $user = $this->getUser();
        
        // Vérifier que l'utilisateur est authentifié
        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'Vous devez être connecté pour activer une collaboration'
            ], 401);
        }

        $partenaire = $this->partenaireRepository->find($id);
        
        if (!$partenaire) {
            return $this->json([
                'success' => false,
                'message' => 'Partenaire non trouvé'
            ], 404);
        }

        try {
            // Vérifier que le partenaire n'est pas déjà actif
            if ($partenaire->getStatut() === 'actif') {
                return $this->json([
                    'success' => false,
                    'message' => 'Cette collaboration est déjà active'
                ]);
            }

            // Activer la collaboration
            $partenaire->setStatut('actif');
            $this->em->persist($partenaire);
            $this->em->flush();

            return $this->json([
                'success' => true,
                'message' => 'Collaboration activée avec succès',
                'partenaire' => [
                    'id' => $partenaire->getId(),
                    'nom' => $partenaire->getNom(),
                    'statut' => $partenaire->getStatut()
                ]
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Une erreur s\'est produite: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Voir les détails d'un produit (plat)
     */
    #[Route('/produit/{id}', name: 'app_produit_detail', methods: ['GET'])]
    public function voirProduit(int $id): Response
    {
        $plat = $this->platRepository->find($id);
        
        if (!$plat) {
            throw $this->createNotFoundException('Produit non trouvé');
        }

        $partenaire = $this->partenaireRepository->find($plat->getIdPartenaire());

        return $this->render('partenaires/produit.html.twig', [
            'plat' => $plat,
            'partenaire' => $partenaire,
        ]);
    }
}
