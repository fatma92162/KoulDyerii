<?php

namespace App\Repository;

use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

<<<<<<< HEAD
/**
 * @extends ServiceEntityRepository<Commentaire>
 */
=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }
<<<<<<< HEAD
=======

    // Add custom methods as needed
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}