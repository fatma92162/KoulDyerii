<?php

namespace App\Repository;

use App\Entity\Formation;
use App\Entity\Quiz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class QuizRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Quiz::class);
    }

    public function findOneByFormation(Formation $formation): ?Quiz
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.formation = :formation')
            ->setParameter('formation', $formation)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
