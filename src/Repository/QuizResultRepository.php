<?php

namespace App\Repository;

use App\Entity\Formation;
use App\Entity\Quiz;
use App\Entity\QuizResult;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class QuizResultRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuizResult::class);
    }

    /**
     * Dernier résultat d'un utilisateur pour un quiz donné.
     */
    public function findLatestForUserAndQuiz(Utilisateur $user, Quiz $quiz): ?QuizResult
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.user = :user')
            ->andWhere('r.quiz = :quiz')
            ->setParameter('user', $user)
            ->setParameter('quiz', $quiz)
            ->orderBy('r.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Dernier résultat d'un utilisateur pour une formation donnée.
     * Joint quiz → formation pour éviter un lookup supplémentaire.
     */
    public function findLastByUserAndFormation(Utilisateur $user, Formation $formation): ?QuizResult
    {
        return $this->createQueryBuilder('r')
            ->join('r.quiz', 'q')
            ->join('q.formation', 'f')
            ->andWhere('r.user = :user')
            ->andWhere('f = :formation')
            ->setParameter('user', $user)
            ->setParameter('formation', $formation)
            ->orderBy('r.submittedAt', 'DESC')
            ->addOrderBy('r.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Charge en UNE seule requête le dernier résultat de l'utilisateur
     * pour TOUTES ses formations → élimine le problème N+1 sur mes_inscriptions.
     *
     * Retourne un tableau indexé par l'ID de la formation :
     *   [ formationId => QuizResult|null ]
     *
     * @param  int[] $formationIds
     * @return array<int, QuizResult>
     */
    public function findLastResultsForUserAndFormations(Utilisateur $user, array $formationIds): array
    {
        if (empty($formationIds)) {
            return [];
        }

        // Récupère TOUS les résultats de l'utilisateur pour ces formations,
        // triés du plus récent au plus ancien.
        $rows = $this->createQueryBuilder('r')
            ->join('r.quiz', 'q')
            ->join('q.formation', 'f')
            ->andWhere('r.user = :user')
            ->andWhere('f.idFormation IN (:ids)')
            ->setParameter('user', $user)
            ->setParameter('ids', $formationIds)
            ->orderBy('r.submittedAt', 'DESC')
            ->addOrderBy('r.id', 'DESC')
            ->getQuery()
            ->getResult();

        // Ne garder que le premier (= le plus récent) par formation
        $indexedByFormation = [];
        foreach ($rows as $result) {
            $fId = $result->getQuiz()?->getFormation()?->getIdFormation();
            if ($fId !== null && !isset($indexedByFormation[$fId])) {
                $indexedByFormation[$fId] = $result;
            }
        }

        return $indexedByFormation;
    }
}

