<?php

namespace App\Repository;

use App\Entity\InscriptionFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionFormation::class);
    }

    public function findByUtilisateur(int $idUtilisateur): array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.idUtilisateur = :idUtilisateur')
            ->setParameter('idUtilisateur', $idUtilisateur)
            ->orderBy('i.dateInscription', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByFormation(int $idFormation): array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.idFormation = :idFormation')
            ->setParameter('idFormation', $idFormation)
            ->orderBy('i.dateInscription', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function isInscrit(int $idUtilisateur, int $idFormation): bool
    {
        $result = $this->createQueryBuilder('i')
            ->select('COUNT(i.idInscription)')
            ->andWhere('i.idUtilisateur = :idUtilisateur')
            ->andWhere('i.idFormation = :idFormation')
            ->setParameter('idUtilisateur', $idUtilisateur)
            ->setParameter('idFormation', $idFormation)
            ->getQuery()
            ->getSingleScalarResult();
        
        return $result > 0;
    }
}