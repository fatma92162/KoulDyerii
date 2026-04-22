<?php

namespace App\Repository;

use App\Entity\Post_reaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class Post_reactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post_reaction::class);
    }

    // Add custom methods as needed
}