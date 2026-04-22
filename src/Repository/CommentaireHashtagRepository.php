<?php

namespace App\Repository;   // ⚠️ Le namespace doit être App\Repository (pas App\Entity)

use App\Entity\CommentaireHashtag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CommentaireHashtag>
 */
class CommentaireHashtagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentaireHashtag::class);
    }

    // Exemple de méthode personnalisée (optionnel)
    public function findByCommentaire(int $commentaireId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.commentaire_id = :commentaireId')
            ->setParameter('commentaireId', $commentaireId)
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}