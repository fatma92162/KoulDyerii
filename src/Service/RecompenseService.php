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
     * Obtenir une récompense par son ID
     */
    public function getRecompenseById(int $id): ?Recompense
    {
        return $this->recompenseRepository->find($id);
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
        try {
            $recompense = $this->recompenseRepository->find($idRecompense);
            
            if (!$recompense) {
                return ['success' => false, 'message' => 'Récompense non trouvée'];
            }
            
            $pointsActuels = $pointsService->getSolde($utilisateur->getIdUtilisateur());
            
            if ($pointsActuels < $recompense->getPointsRequis()) {
                return [
                    'success' => false, 
                    'message' => 'Points insuffisants. Vous avez ' . $pointsActuels . ' points, besoin de ' . $recompense->getPointsRequis() . ' points.'
                ];
            }
            
            // Vérifier si l'utilisateur a déjà obtenu cette récompense non utilisée
            $dejaObtenue = $this->recompenseUtilisateurRepository->findOneBy([
                'utilisateur' => $utilisateur,
                'recompense' => $recompense,
                'utilise' => false
            ]);
            
            if ($dejaObtenue) {
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
            $recompenseUtilisateur->setUtilise(false);
            
            $this->entityManager->persist($recompenseUtilisateur);
            $this->entityManager->flush();
            
            return [
                'success' => true, 
                'message' => 'Récompense échangée avec succès !',
                'code' => $recompenseUtilisateur->getCode(),
                'recompense' => $recompense->getNom()
            ];
            
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erreur: ' . $e->getMessage()];
        }
    }

    /**
     * Utiliser une récompense
     */
    public function utiliserRecompense(string $code, Utilisateur $utilisateur): array
    {
        try {
            $recompenseUtilisateur = $this->recompenseUtilisateurRepository->findOneBy([
                'code' => $code,
                'utilisateur' => $utilisateur,
                'utilise' => false
            ]);
            
            if (!$recompenseUtilisateur) {
                return ['success' => false, 'message' => 'Code invalide ou déjà utilisé'];
            }
            
            $recompenseUtilisateur->setUtilise(true);
            $recompenseUtilisateur->setDateUtilisation(new \DateTime());
            
            $this->entityManager->flush();
            
            return ['success' => true, 'message' => 'Récompense utilisée avec succès !'];
            
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Erreur: ' . $e->getMessage()];
        }
    }

    /**
     * Générer un code unique pour la récompense
     */
    private function genererCode(Utilisateur $utilisateur, Recompense $recompense): string
    {
        $prefix = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $recompense->getNom()), 0, 4));
        if (empty($prefix)) {
            $prefix = 'REW';
        }
        
        return $prefix . '-' . 
               $utilisateur->getIdUtilisateur() . '-' . 
               date('Ymd') . '-' . 
               rand(1000, 9999);
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