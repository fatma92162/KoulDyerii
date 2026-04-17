<?php

<<<<<<< HEAD
namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)
=======
namespace App\Repository;
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd

use App\Entity\Pointfidelite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

<<<<<<< HEAD
/**
 * @extends ServiceEntityRepository<Pointfidelite>
 */
=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class PointfideliteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pointfidelite::class);
    }

<<<<<<< HEAD
    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findByUtilisateur(int $userId): array
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.utilisateur = :userId')
    //         ->setParameter('userId', $userId)
    //         ->getQuery()
    //         ->getResult();
    // }
=======
    // Add custom methods as needed
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}