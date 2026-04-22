<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Repository\CommandRepository;
use App\Repository\LivraisonRepository;
use App\Repository\LivreurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/mes-livraisons')]
class ApiClientLivraisonController extends AbstractController
{
    #[Route('/{id}/tracking', name: 'app_api_mes_livraisons_tracking', methods: ['GET'])]
    public function tracking(
        int $id,
        LivraisonRepository $livraisonRepository,
        CommandRepository $commandRepository,
        LivreurRepository $livreurRepository
    ): JsonResponse {
        $user = $this->getUser();

        if (!$user) {
            return $this->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié.'
            ], 401);
        }

        $livraison = $livraisonRepository->find($id);

        if (!$livraison) {
            return $this->json([
                'success' => false,
                'message' => 'Livraison introuvable.'
            ], 404);
        }

        $commandeId = $livraison->getIdCommande();

        if (!$commandeId) {
            return $this->json([
                'success' => false,
                'message' => 'Aucune commande liée à cette livraison.'
            ], 404);
        }

        $commande = $commandRepository->find($commandeId);

        if (!$commande) {
            return $this->json([
                'success' => false,
                'message' => 'Commande introuvable.'
            ], 404);
        }

        if ((int) $commande->getIdUtilisateur() !== (int) $user->getIdUtilisateur()) {
            return $this->json([
                'success' => false,
                'message' => 'Accès refusé à cette livraison.'
            ], 403);
        }

        $livreur = null;
        if ($livraison->getIdLivreur()) {
            $livreur = $livreurRepository->find($livraison->getIdLivreur());
        }

        $status = $livraison->getStatutLivraison() ?? 'en_attente';
        $statusLabel = $this->getStatusLabel($status);
        $timeline = $this->buildTimeline($status, $livreur !== null);

        return $this->json([
            'success' => true,
            'data' => [
                'livraisonId' => $livraison->getIdLivraison(),
                'commandeId' => $commande->getId(),
                'status' => $status,
                'statusLabel' => $statusLabel,
                'adresse' => $livraison->getAdresse(),
                'dateCommande' => $commande->getCreatedAt()?->format('Y-m-d H:i:s'),
                'statutCommande' => $commande->getStatus(),
                'customerName' => $commande->getCustomerName(),
                'customerPhone' => $commande->getPhone(),
                'livreur' => $livreur ? [
                    'id' => $livreur->getIdLivreur(),
                    'nom' => $livreur->getNom(),
                    'prenom' => $livreur->getPrenom(),
                    'telephone' => $livreur->getTelephone(),
                    'disponibilite' => $livreur->getDisponibilite(),
                    'nomComplet' => trim(($livreur->getPrenom() ?? '') . ' ' . ($livreur->getNom() ?? '')),
                ] : null,
                'timeline' => $timeline,
                'lastUpdate' => date('Y-m-d H:i:s'),
                'estimatedMinutes' => $this->estimateMinutes($status),
            ]
        ]);
    }

    private function getStatusLabel(string $status): string
    {
        return match ($status) {
            'en_attente' => 'En attente',
            'preparation' => 'En préparation',
            'assignee', 'assignee', 'livreur_assigne' => 'Livreur assigné',
            'en_cours' => 'En cours de livraison',
            'livree' => 'Livrée',
            'annulee' => 'Annulée',
            'echec' => 'Échec de livraison',
            default => ucfirst(str_replace('_', ' ', $status)),
        };
    }

    private function buildTimeline(string $status, bool $hasLivreur): array
    {
        $steps = [
            [
                'step' => 'commande_validee',
                'label' => 'Commande validée',
                'done' => true,
            ],
            [
                'step' => 'livreur_assigne',
                'label' => 'Livreur assigné',
                'done' => $hasLivreur || in_array($status, ['assignee', 'assignee', 'livreur_assigne', 'en_cours', 'livree'], true),
            ],
            [
                'step' => 'en_cours',
                'label' => 'En cours de livraison',
                'done' => in_array($status, ['en_cours', 'livree'], true),
            ],
            [
                'step' => 'livree',
                'label' => 'Livrée',
                'done' => $status === 'livree',
            ],
        ];

        return $steps;
    }

    private function estimateMinutes(string $status): ?int
    {
        return match ($status) {
            'en_attente' => 60,
            'preparation' => 40,
            'assignee', 'assignee', 'livreur_assigne' => 25,
            'en_cours' => 15,
            'livree' => 0,
            default => null,
        };
    }
}