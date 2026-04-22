<?php

namespace App\Repository;

use App\Entity\Inscription_formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class Inscription_formationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscription_formation::class);
    }

    // Add custom methods as needed
}