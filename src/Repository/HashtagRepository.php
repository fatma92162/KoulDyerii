<?php
// src/Repository/HashtagRepository.php

namespace App\Repository;

use App\Entity\Hashtag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HashtagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hashtag::class);
    }

    public function findTopHashtags(int $limit = 5): array
    {
        return $this->createQueryBuilder('h')
            ->select('h.name, COUNT(p.id) as postCount')
            ->leftJoin('h.posts', 'p')
            ->groupBy('h.id')
            ->orderBy('postCount', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}