<?php
// src/Repository/CodeReductionRepository.php

namespace App\Repository;

use App\Entity\CodeReduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CodeReductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodeReduction::class);
    }

    public function findValidByCode(string $code): ?CodeReduction
    {
        $now = new \DateTime();

        return $this->createQueryBuilder('c')
            ->where('c.code = :code')
            ->andWhere('c.actif = :actif')
            ->andWhere('c.validiteDebut <= :now')
            ->andWhere('c.validiteFin >= :now')
            ->andWhere('c.utilisationActuelle < c.utilisationMax')
            ->setParameter('code', strtoupper(trim($code)))
            ->setParameter('actif', true)
            ->setParameter('now', $now)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findValidForUser(string $code, int $userId): ?CodeReduction
    {
        $now = new \DateTime();

        return $this->createQueryBuilder('c')
            ->leftJoin('c.utilisateur', 'u')
            ->where('c.code = :code')
            ->andWhere('c.actif = :actif')
            ->andWhere('c.validiteDebut <= :now')
            ->andWhere('c.validiteFin >= :now')
            ->andWhere('c.utilisationActuelle < c.utilisationMax')
            ->andWhere('(c.utilisateur IS NULL OR u.idUtilisateur = :userId)')
            ->setParameter('code', strtoupper(trim($code)))
            ->setParameter('actif', true)
            ->setParameter('now', $now)
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getOneOrNullResult();
    }
}