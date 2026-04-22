<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\SignalementPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SignalementPost>
 */
class SignalementPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignalementPost::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findNonTraites(): array
    // {
    //     return $this->createQueryBuilder('s')
    //         ->andWhere('s.traite = :false')
    //         ->setParameter('false', false)
    //         ->orderBy('s.createdAt', 'DESC')
    //         ->getQuery()
    //         ->getResult();
    // }
}
