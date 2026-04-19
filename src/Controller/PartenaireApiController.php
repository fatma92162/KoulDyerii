<?php

namespace App\Controller;

use App\Repository\PartenaireRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/partenaires')]
class PartenaireApiController extends AbstractController
{
    public function __construct(
        private PartenaireRepository $partenaireRepository,
        private PlatRepository $platRepository
    ) {}

    /**
     * Récupère tous les partenaires et leurs produits
     * GET /api/partenaires/
     */
    #[Route('/', name: 'api_partenaires_liste', methods: ['GET'])]
    public function liste(): JsonResponse
    {
        try {
            $partenaires = $this->partenaireRepository->findAll();
            $plats = $this->platRepository->findAll();

            $data = [];
            foreach ($partenaires as $partenaire) {
                $partenaireData = [
                    'id' => $partenaire->getId(),
                    'partenaire' => $partenaire->getNom(),
                    'type' => $partenaire->getType(),
                    'telephone' => $partenaire->getTelephone(),
                    'adresse' => $partenaire->getAdresse(),
                    'statut' => $partenaire->getStatut(),
                    'recommendations' => []
                ];

                // Ajouter les produits du partenaire
                foreach ($plats as $plat) {
                    if ($plat->getIdPartenaire() === $partenaire->getId()) {
                        $partenaireData['recommendations'][] = [
                            'id' => $plat->getId(),
                            'nom' => $plat->getNom(),
                            'description' => 'Produit de qualité supérieure',
                            'prix' => $plat->getPrix(),
                            'photo' => null,
                            'quantite' => 10,
                            'collaboration_status' => $partenaire->getStatut()
                        ];
                    }
                }

                $data[] = $partenaireData;
            }

            return $this->json([
                'success' => true,
                'total' => count($data),
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Récupère les détails d'un partenaire spécifique
     * GET /api/partenaires/{id}
     */
    #[Route('/{id}', name: 'api_partenaire_detail', methods: ['GET'])]
    public function detail(int $id): JsonResponse
    {
        try {
            $partenaire = $this->partenaireRepository->find($id);
            
            if (!$partenaire) {
                return $this->json([
                    'success' => false,
                    'message' => 'Partenaire non trouvé'
                ], 404);
            }

            $plats = $this->platRepository->findBy(['idPartenaire' => $id]);

            $data = [
                'id' => $partenaire->getId(),
                'partenaire' => $partenaire->getNom(),
                'type' => $partenaire->getType(),
                'telephone' => $partenaire->getTelephone(),
                'adresse' => $partenaire->getAdresse(),
                'statut' => $partenaire->getStatut(),
                'recommendations' => array_map(fn($plat) => [
                    'id' => $plat->getId(),
                    'nom' => $plat->getNom(),
                    'description' => 'Produit de qualité',
                    'prix' => $plat->getPrix(),
                    'photo' => null,
                    'quantite' => 10,
                    'collaboration_status' => $partenaire->getStatut()
                ], $plats)
            ];

            return $this->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Actualise les données depuis une source externe
     * POST /api/partenaires/refresh
     */
    #[Route('/refresh', name: 'api_partenaires_refresh', methods: ['POST'])]
    public function refresh(): JsonResponse
    {
        try {
            // Ici on pourrait récupérer les données depuis une API externe
            // Pour l'instant, on retourne simplement les données actuelles

            $partenaires = $this->partenaireRepository->findAll();
            $plats = $this->platRepository->findAll();

            $data = [];
            foreach ($partenaires as $partenaire) {
                $partenaireData = [
                    'id' => $partenaire->getId(),
                    'partenaire' => $partenaire->getNom(),
                    'type' => $partenaire->getType(),
                    'statut' => $partenaire->getStatut(),
                    'recommendations' => []
                ];

                foreach ($plats as $plat) {
                    if ($plat->getIdPartenaire() === $partenaire->getId()) {
                        $partenaireData['recommendations'][] = [
                            'id' => $plat->getId(),
                            'nom' => $plat->getNom(),
                            'prix' => $plat->getPrix(),
                            'photo' => null,
                            'quantite' => 10,
                            'collaboration_status' => $partenaire->getStatut()
                        ];
                    }
                }

                $data[] = $partenaireData;
            }

            return $this->json([
                'success' => true,
                'message' => 'Données actualisées avec succès',
                'total' => count($data),
                'data' => $data,
                'timestamp' => (new \DateTime())->format('Y-m-d H:i:s')
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur lors de l\'actualisation: ' . $e->getMessage()
            ], 500);
        }
    }
}
