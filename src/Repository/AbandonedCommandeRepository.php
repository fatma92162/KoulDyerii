<?php

namespace App\Repository;

use App\Entity\AbandonedCommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AbandonedCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbandonedCommande::class);
    }

    public function findLatestDraftByPhone(string $phone, string $source = 'panier'): ?AbandonedCommande
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.phone = :phone')
            ->andWhere('a.source = :source')
            ->andWhere('a.status = :status')
            ->setParameter('phone', $phone)
            ->setParameter('source', $source)
            ->setParameter('status', 'draft')
            ->orderBy('a.updatedAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findRecoverable(): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.status = :status')
            ->setParameter('status', 'draft')
            ->orderBy('a.updatedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}