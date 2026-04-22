<?php

namespace App\Repository;

use App\Entity\Pointssolde;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PointssoldeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pointssolde::class);
    }

    /**
     * Trouver le solde d'un utilisateur
     */
    public function findByUtilisateur(Utilisateur $utilisateur): ?Pointssolde
    {
        return $this->findOneBy(['utilisateur' => $utilisateur]);
    }

    /**
     * Obtenir le solde d'un utilisateur
     */
    public function getSoldeByUtilisateur(Utilisateur $utilisateur): int
    {
        $pointsSolde = $this->findOneBy(['utilisateur' => $utilisateur]);
        return $pointsSolde ? $pointsSolde->getSolde() : 0;
    }

    /**
     * Créer ou mettre à jour le solde d'un utilisateur
     */
    public function updateSolde(Utilisateur $utilisateur, int $nouveauSolde): Pointssolde
    {
        $pointsSolde = $this->findOneBy(['utilisateur' => $utilisateur]);
        
        if (!$pointsSolde) {
            $pointsSolde = new Pointssolde();
            $pointsSolde->setUtilisateur($utilisateur);
            $pointsSolde->setDateCreation(new \DateTime());
        }
        
        $pointsSolde->setSolde($nouveauSolde);
        $pointsSolde->setDateModification(new \DateTime());
        
        $this->getEntityManager()->persist($pointsSolde);
        $this->getEntityManager()->flush();
        
        return $pointsSolde;
    }
}