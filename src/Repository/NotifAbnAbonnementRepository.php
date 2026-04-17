<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\NotifAbnAbonnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NotifAbnAbonnement>
 */
class NotifAbnAbonnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotifAbnAbonnement::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findNonLus(int $userId): array
    // {
    //     return $this->createQueryBuilder('n')
    //         ->andWhere('n.utilisateur = :userId')
    //         ->andWhere('n.isRead = :false')
    //         ->setParameter('userId', $userId)
    //         ->setParameter('false', false)
    //         ->getQuery()
    //         ->getResult();
    // }
}