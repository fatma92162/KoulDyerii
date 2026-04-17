<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\PostReaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostReaction>
 */
class PostReactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostReaction::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function countByPost(int $postId): int
    // {
    //     return $this->createQueryBuilder('p')
    //         ->select('COUNT(p.id)')
    //         ->where('p.post = :postId')
    //         ->setParameter('postId', $postId)
    //         ->getQuery()
    //         ->getSingleScalarResult();
    // }
}