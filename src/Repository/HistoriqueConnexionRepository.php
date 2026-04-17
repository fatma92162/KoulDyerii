<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\HistoriqueConnexion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HistoriqueConnexion>
 */
class HistoriqueConnexionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueConnexion::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Exemple : récupérer l'historique d'un utilisateur
    public function findByUtilisateur(int $userId): array
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.utilisateur = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('h.dateConnexion', 'DESC')
            ->getQuery()
            ->getResult();
    }
}