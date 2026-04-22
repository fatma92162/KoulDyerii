<?php
// src/Repository/AbonnementRepository.php

namespace App\Repository;

use App\Entity\Abonnement;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AbonnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Abonnement::class);
    }

    public function findActiveByUser(Utilisateur $user): ?Abonnement
    {
        return $this->createQueryBuilder('a')
            ->where('a.utilisateur = :user')
            ->andWhere('a.status = :status')
            ->andWhere('a.endDate > :now')
            ->setParameter('user', $user)
            ->setParameter('status', 'active')
            ->setParameter('now', new \DateTime())
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getUserReduction(Utilisateur $user): int
    {
        $activeSubscription = $this->findActiveByUser($user);
        return $activeSubscription ? $activeSubscription->getReduction() : 0;
    }
}