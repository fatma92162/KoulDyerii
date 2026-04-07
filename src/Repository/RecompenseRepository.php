<?php

namespace App\Repository;

use App\Entity\Recompense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recompense>
 */
class RecompenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recompense::class);
    }

    /**
     * Récupérer les récompenses actives triées par points requis
     */
    public function findActives(): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.actif = :actif')
            ->setParameter('actif', true)
            ->orderBy('r.pointsRequis', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les récompenses qu'un utilisateur peut obtenir avec ses points
     */
    public function findAccessibles(int $points): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.actif = :actif')
            ->andWhere('r.pointsRequis <= :points')
            ->setParameter('actif', true)
            ->setParameter('points', $points)
            ->orderBy('r.pointsRequis', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer la prochaine récompense à atteindre
     */
    public function findProchaineRecompense(int $pointsActuels): ?Recompense
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.actif = :actif')
            ->andWhere('r.pointsRequis > :points')
            ->setParameter('actif', true)
            ->setParameter('points', $pointsActuels)
            ->orderBy('r.pointsRequis', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}