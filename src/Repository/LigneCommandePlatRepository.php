<?php

namespace App\Repository;

use App\Entity\Commande;
use App\Entity\LigneCommandePlat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneCommandePlat>
 */
class LigneCommandePlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneCommandePlat::class);
    }

    /**
     * @return LigneCommandePlat[]
     */
    public function findByCommande(Commande $commande): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.commande = :c')
            ->setParameter('c', $commande)
            ->orderBy('l.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
