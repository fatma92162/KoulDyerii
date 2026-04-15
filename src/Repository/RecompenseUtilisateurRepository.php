<?php

namespace App\Repository;

use App\Entity\RecompenseUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecompenseUtilisateur>
 */
class RecompenseUtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecompenseUtilisateur::class);
    }

    /**
     * Récupérer les récompenses d'un utilisateur
     */
    public function findByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('ru')
            ->andWhere('ru.utilisateur = :utilisateur')
            ->setParameter('utilisateur', $utilisateur)
            ->orderBy('ru.dateObtention', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Vérifier si un utilisateur a déjà obtenu une récompense non utilisée
     */
    public function findNonUtiliseeByUtilisateurAndRecompense(Utilisateur $utilisateur, int $idRecompense): ?RecompenseUtilisateur
    {
        return $this->createQueryBuilder('ru')
            ->andWhere('ru.utilisateur = :utilisateur')
            ->andWhere('ru.recompense = :recompense')
            ->andWhere('ru.utilise = :utilise')
            ->setParameter('utilisateur', $utilisateur)
            ->setParameter('recompense', $idRecompense)
            ->setParameter('utilise', false)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Compter le nombre de récompenses obtenues par un utilisateur
     */
    public function countByUtilisateur(Utilisateur $utilisateur): int
    {
        return $this->createQueryBuilder('ru')
            ->select('COUNT(ru.id)')
            ->andWhere('ru.utilisateur = :utilisateur')
            ->setParameter('utilisateur', $utilisateur)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Récupérer les récompenses non utilisées d'un utilisateur
     */
    public function findNonUtiliseesByUtilisateur(Utilisateur $utilisateur): array
    {
        return $this->createQueryBuilder('ru')
            ->andWhere('ru.utilisateur = :utilisateur')
            ->andWhere('ru.utilise = :utilise')
            ->setParameter('utilisateur', $utilisateur)
            ->setParameter('utilise', false)
            ->orderBy('ru.dateObtention', 'ASC')
            ->getQuery()
            ->getResult();
    }
}