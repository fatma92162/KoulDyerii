<?php

namespace App\Repository;

use App\Entity\Partenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partenaire>
 */
class PartenaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partenaire::class);
    }

    /**
     * Trouver un partenaire par ID utilisateur
     */
    public function findOneByIdUtilisateur(int $idUtilisateur): ?Partenaire
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idUtilisateur = :idUtilisateur')
            ->setParameter('idUtilisateur', $idUtilisateur)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Trouver les partenaires par statut
     */
    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('p.dateDemande', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Trouver les partenaires en attente
     */
    public function findEnAttente(): array
    {
        return $this->findByStatut('en_attente');
    }

    /**
     * Trouver les partenaires acceptés
     */
    public function findAcceptes(): array
    {
        return $this->findByStatut('accepte');
    }

    /**
     * Compter les partenaires par statut
     */
    public function countByStatut(string $statut): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.id)')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', $statut)
            ->getQuery()
            ->getSingleScalarResult();
    }
}