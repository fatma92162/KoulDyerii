<?php

namespace App\Repository;

use App\Entity\Reaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ReactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reaction::class);
    }

    // ✅ CORRIGÉ : utiliser l'association 'post' au lieu de 'post_id'
    public function countByPost(int $postId): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.post = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    // ✅ CORRIGÉ : utiliser l'association 'commentaire' au lieu de 'commentaire_id'
    public function countByCommentaire(int $commentaireId): int
    {
        return $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.commentaire = :commentaireId')
            ->setParameter('commentaireId', $commentaireId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    // ✅ CORRIGÉ : vérifier si l'utilisateur a réagi
    public function userHasReacted(int $userId, ?int $postId = null, ?int $commentaireId = null): bool
    {
        $qb = $this->createQueryBuilder('r')
            ->select('COUNT(r.id)')
            ->where('r.utilisateur = :userId')
            ->setParameter('userId', $userId);

        if ($postId) {
            $qb->andWhere('r.post = :postId')
               ->setParameter('postId', $postId);
        }
        if ($commentaireId) {
            $qb->andWhere('r.commentaire = :commentaireId')
               ->setParameter('commentaireId', $commentaireId);
        }

        return $qb->getQuery()->getSingleScalarResult() > 0;
    }
}