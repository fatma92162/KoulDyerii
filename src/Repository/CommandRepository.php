<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommandRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    public function findByFilters(string $search = '', string $status = '', string $sort = 'date_desc'): array
    {
        $qb = $this->createQueryBuilder('c');

        if ($search !== '') {
            $qb->andWhere('c.customerName LIKE :search OR c.phone LIKE :search OR c.location LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if ($status !== '') {
            $qb->andWhere('c.status = :status')
               ->setParameter('status', $status);
        }

        switch ($sort) {
            case 'date_asc':
                $qb->orderBy('c.createdAt', 'ASC');
                break;
            case 'client_asc':
                $qb->orderBy('c.customerName', 'ASC');
                break;
            case 'client_desc':
                $qb->orderBy('c.customerName', 'DESC');
                break;
            case 'date_desc':
            default:
                $qb->orderBy('c.createdAt', 'DESC');
                break;
        }

        return $qb->getQuery()->getResult();
    }

    public function countByStatus(string $status): int
    {
        return (int) $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->andWhere('c.status = :status')
            ->setParameter('status', $status)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByPeriodAndStatus(\DateTimeInterface $fromDate, string $status): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.createdAt >= :fromDate')
            ->andWhere('c.status = :status')
            ->setParameter('fromDate', $fromDate)
            ->setParameter('status', $status)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
    public function countByStatusAndMinutes(string $status, int $minutes = 1440): int
{
    $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

    return (int) $this->createQueryBuilder('c')
        ->select('COUNT(c.id)')
        ->andWhere('c.status = :status')
        ->andWhere('c.createdAt >= :threshold')
        ->setParameter('status', $status)
        ->setParameter('threshold', $threshold)
        ->getQuery()
        ->getSingleScalarResult();
}
public function countCreatedByMinutes(int $minutes = 1440): int
{
    $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

    return (int) $this->createQueryBuilder('c')
        ->select('COUNT(c.id)')
        ->andWhere('c.createdAt >= :threshold')
        ->setParameter('threshold', $threshold)
        ->getQuery()
        ->getSingleScalarResult();
}
public function sumTotalByMinutes(int $minutes = 1440): float
{
    $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

    $result = $this->createQueryBuilder('c')
        ->select('SUM(c.total)')
        ->andWhere('c.createdAt >= :threshold')
        ->setParameter('threshold', $threshold)
        ->getQuery()
        ->getSingleScalarResult();

        return (float) ($result ?? 0);
    }

    public function findPreviousOrdersForCommande(Commande $commande, int $limit = 5): array
    {
        $qb = $this->createQueryBuilder('c')
            ->andWhere('c.id != :currentId')
            ->andWhere('c.createdAt < :currentCreatedAt')
            ->setParameter('currentId', $commande->getId())
            ->setParameter('currentCreatedAt', $commande->getCreatedAt() ?? new \DateTimeImmutable())
            ->orderBy('c.createdAt', 'DESC')
            ->setMaxResults($limit);

        $customerId = $commande->getIdUtilisateur();
        $phone = trim((string) $commande->getPhone());

        if ($customerId !== null && $customerId > 0 && $phone !== '') {
            $qb->andWhere('(c.idUtilisateur = :customerId OR c.phone = :phone)')
               ->setParameter('customerId', $customerId)
               ->setParameter('phone', $phone);
        } elseif ($customerId !== null && $customerId > 0) {
            $qb->andWhere('c.idUtilisateur = :customerId')
               ->setParameter('customerId', $customerId);
        } elseif ($phone !== '') {
            $qb->andWhere('c.phone = :phone')
               ->setParameter('phone', $phone);
        } else {
            return [];
        }

        return $qb->getQuery()->getResult();
    }

    public function countPreviousOrdersForCommande(Commande $commande): int
    {
        $qb = $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->andWhere('c.id != :currentId')
            ->andWhere('c.createdAt < :currentCreatedAt')
            ->setParameter('currentId', $commande->getId())
            ->setParameter('currentCreatedAt', $commande->getCreatedAt() ?? new \DateTimeImmutable());

        $customerId = $commande->getIdUtilisateur();
        $phone = trim((string) $commande->getPhone());

        if ($customerId !== null && $customerId > 0 && $phone !== '') {
            $qb->andWhere('(c.idUtilisateur = :customerId OR c.phone = :phone)')
               ->setParameter('customerId', $customerId)
               ->setParameter('phone', $phone);
        } elseif ($customerId !== null && $customerId > 0) {
            $qb->andWhere('c.idUtilisateur = :customerId')
               ->setParameter('customerId', $customerId);
        } elseif ($phone !== '') {
            $qb->andWhere('c.phone = :phone')
               ->setParameter('phone', $phone);
        } else {
            return 0;
        }

        return (int) $qb->getQuery()->getSingleScalarResult();
    }
}
