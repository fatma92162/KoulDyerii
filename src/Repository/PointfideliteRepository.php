<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\Pointfidelite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pointfidelite>
 */
class PointfideliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pointfidelite::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findByUtilisateur(int $userId): array
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.utilisateur = :userId')
    //         ->setParameter('userId', $userId)
    //         ->getQuery()
    //         ->getResult();
    // }
}