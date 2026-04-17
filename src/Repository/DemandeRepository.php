<?php

namespace App\Repository;   // ⚠️ Changement crucial : le namespace doit être App\Repository

use App\Entity\Demande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Demande>
 */
class DemandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Demande::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findRecent(): array
    // {
    //     return $this->createQueryBuilder('d')
    //         ->orderBy('d.id', 'DESC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult();
    // }
}