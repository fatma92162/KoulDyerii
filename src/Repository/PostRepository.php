<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

<<<<<<< HEAD
/**
 * @extends ServiceEntityRepository<Post>
 */
=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }
<<<<<<< HEAD
=======

    // Add custom methods as needed
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}