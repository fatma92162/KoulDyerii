<?php

<<<<<<< HEAD
namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)
=======
namespace App\Repository;
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd

use App\Entity\Portefeuille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

<<<<<<< HEAD
/**
 * @extends ServiceEntityRepository<Portefeuille>
 */
=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class PortefeuilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Portefeuille::class);
    }

<<<<<<< HEAD
    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findByUtilisateur(int $userId): ?Portefeuille
    // {
    //     return $this->findOneBy(['utilisateur' => $userId]);
    // }
=======
    // Add custom methods as needed
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}