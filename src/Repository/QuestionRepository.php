<?php

namespace App\Repository;

use App\Entity\Question;
use App\Entity\Quiz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    public function findByQuizOrdered(Quiz $quiz): array
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.quiz = :quiz')
            ->setParameter('quiz', $quiz)
            ->orderBy('q.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
