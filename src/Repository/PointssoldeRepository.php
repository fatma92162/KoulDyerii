<?php

namespace App\Repository;

use App\Entity\Pointssolde;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PointssoldeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pointssolde::class);
    }

    // Add custom methods as needed
}