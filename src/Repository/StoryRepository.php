<?php

namespace App\Repository;

use App\Entity\Story;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Story::class);
    }

    public function findActiveStories(): array
    {
        $expiration = new \DateTime('-24 hours');
        return $this->createQueryBuilder('s')
            ->where('s.created_at > :expiration')
            ->setParameter('expiration', $expiration)
            ->orderBy('s.created_at', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findActiveStoriesByUser(int $userId): array
    {
        $expiration = new \DateTime('-24 hours');
        return $this->createQueryBuilder('s')
            ->where('s.utilisateur = :userId')
            ->andWhere('s.created_at > :expiration')
            ->setParameter('userId', $userId)
            ->setParameter('expiration', $expiration)
            ->getQuery()
            ->getResult();
    }
}