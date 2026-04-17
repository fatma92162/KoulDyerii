<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

<<<<<<< HEAD
/**
 * @extends ServiceEntityRepository<Utilisateur>
 */
=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }

<<<<<<< HEAD
    // Ajoutez vos méthodes personnalisées ici
    // Exemple : trouver un utilisateur par email
    public function findOneByEmail(string $email): ?Utilisateur
    {
        return $this->findOneBy(['email' => $email]);
    }

    // Exemple : trouver tous les utilisateurs par rôle
    public function findByRole(string $role): array
    {
        return $this->findBy(['role' => $role]);
    }
=======
    // Add custom methods as needed
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}