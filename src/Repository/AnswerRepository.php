<?php

namespace App\Repository;

use App\Entity\Answer;
use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Answer::class);
    }

    public function findCorrectForQuestion(Question $question): ?Answer
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.question = :question')
            ->andWhere('a.isCorrect = 1')
            ->setParameter('question', $question)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
