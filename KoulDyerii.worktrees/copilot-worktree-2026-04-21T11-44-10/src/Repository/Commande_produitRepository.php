<?php

namespace App\Repository;

use App\Entity\Commande_produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class Commande_produitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande_produit::class);
    }

    // Add custom methods as needed
}