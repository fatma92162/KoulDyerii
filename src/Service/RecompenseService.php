<?php

namespace App\Service;

use App\Entity\Recompense;
use App\Entity\RecompenseUtilisateur;
use App\Entity\Utilisateur;
use App\Repository\RecompenseRepository;
use App\Repository\RecompenseUtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;

class RecompenseService
{
    private RecompenseRepository $recompenseRepository;
    private RecompenseUtilisateurRepository $recompenseUtilisateurRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        RecompenseRepository $recompenseRepository,
        RecompenseUtilisateurRepository $recompenseUtilisateurRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->recompenseRepository = $recompenseRepository;
        $this->recompenseUtilisateurRepository = $recompenseUtilisateurRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * Obtenir toutes les récompenses disponibles
     */
    public function getRecompensesDisponibles(): array
    {
        return $this->recompenseRepository->findBy(['actif' => true], ['pointsRequis' => 'ASC']);
    }

    /**
     * Obtenir les récompenses qu'un utilisateur peut obtenir
     */
    public function getRecompensesAccessibles(int $pointsUtilisateur): array
    {
        $recompenses = $this->getRecompensesDisponibles();
        $accessibles = [];
        
        foreach ($recompenses as $recompense) {
            if ($recompense->getPointsRequis() <= $pointsUtilisateur) {
                $accessibles[] = $recompense;
            }
        }
        
        return $accessibles;
    }

    /**
     * Obtenir la prochaine récompense à atteindre
     */
    public function getProchaineRecompense(int $pointsUtilisateur): ?Recompense
    {
        $recompenses = $this->getRecompensesDisponibles();
        
        foreach ($recompenses as $recompense) {
            if ($recompense->getPointsRequis() > $pointsUtilisateur) {
                return $recompense;
            }
        }
        
        return null;
    }

    /**
     * Obtenir les récompenses déjà obtenues par l'utilisateur
     */
    public function getRecompensesObtenues(Utilisateur $utilisateur): array
    {
        return $this->recompenseUtilisateurRepository->findBy(['utilisateur' => $utilisateur]);
    }

    /**
     * Échanger des points contre une récompense
     */
    public function echangerRecompense(Utilisateur $utilisateur, int $idRecompense, PointsFideliteService $pointsService): array
    {
        $recompense = $this->recompenseRepository->find($idRecompense);
        
        if (!$recompense) {
            return ['success' => false, 'message' => 'Récompense non trouvée'];
        }
        
        $pointsActuels = $pointsService->getSolde($utilisateur->getIdUtilisateur());
        
        if ($pointsActuels < $recompense->getPointsRequis()) {
            return ['success' => false, 'message' => 'Points insuffisants'];
        }
        
        // Vérifier si l'utilisateur a déjà obtenu cette récompense
        $dejaObtenue = $this->recompenseUtilisateurRepository->findOneBy([
            'utilisateur' => $utilisateur,
            'recompense' => $recompense
        ]);
        
        if ($dejaObtenue && !$dejaObtenue->isUtilise()) {
            return ['success' => false, 'message' => 'Vous avez déjà cette récompense non utilisée'];
        }
        
        // Retirer les points
        $pointsService->retirerPoints($utilisateur->getIdUtilisateur(), $recompense->getPointsRequis(), 'Échange contre récompense: ' . $recompense->getNom());
        
        // Créer la récompense utilisateur
        $recompenseUtilisateur = new RecompenseUtilisateur();
        $recompenseUtilisateur->setUtilisateur($utilisateur);
        $recompenseUtilisateur->setRecompense($recompense);
        $recompenseUtilisateur->setDateObtention(new \DateTime());
        $recompenseUtilisateur->setCode($this->genererCode($utilisateur, $recompense));
        
        $this->entityManager->persist($recompenseUtilisateur);
        $this->entityManager->flush();
        
        return [
            'success' => true, 
            'message' => 'Récompense obtenue avec succès !',
            'recompense' => $recompense,
            'code' => $recompenseUtilisateur->getCode()
        ];
    }

    /**
     * Générer un code unique pour la récompense
     */
    private function genererCode(Utilisateur $utilisateur, Recompense $recompense): string
    {
        return strtoupper(substr($recompense->getNom(), 0, 3)) . 
               '-' . $utilisateur->getIdUtilisateur() . 
               '-' . time() . 
               '-' . rand(100, 999);
    }

    /**
     * Calculer la progression vers la prochaine récompense
     */
    public function getProgression(int $pointsActuels, ?Recompense $prochaineRecompense): array
    {
        if (!$prochaineRecompense) {
            return [
                'pourcentage' => 100,
                'pointsRestants' => 0,
                'pointsActuels' => $pointsActuels,
                'pointsNecessaires' => $pointsActuels
            ];
        }
        
        $pointsNecessaires = $prochaineRecompense->getPointsRequis();
        $pointsRestants = max(0, $pointsNecessaires - $pointsActuels);
        $pourcentage = min(100, round(($pointsActuels / $pointsNecessaires) * 100));
        
        return [
            'pourcentage' => $pourcentage,
            'pointsRestants' => $pointsRestants,
            'pointsActuels' => $pointsActuels,
            'pointsNecessaires' => $pointsNecessaires,
            'nomRecompense' => $prochaineRecompense->getNom(),
            'icone' => $prochaineRecompense->getIcone()
        ];
    }
}