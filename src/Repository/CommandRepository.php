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
}