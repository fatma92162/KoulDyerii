<?php

namespace App\Service;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;

class UtilisateurService
{
    public function __construct(
        private UtilisateurRepository $repository,
        private EntityManagerInterface $em
    ) {}

    // Récupérer tous les utilisateurs
    public function getAll(): array
    {
        return $this->repository->findAll();
    }

    // Récupérer un utilisateur par ID
    public function getOne(int $id): ?Utilisateur
    {
        return $this->repository->find($id);
    }

    // Créer un utilisateur
    public function create(array $data): Utilisateur
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setNom($data['nom']);
        $utilisateur->setEmail($data['email']);
        $utilisateur->setMotDePasse(password_hash($data['motDePasse'], PASSWORD_BCRYPT));
        $utilisateur->setRole($data['role'] ?? 'ROLE_USER');
        $utilisateur->setDateNaissance(isset($data['dateNaissance']) ? new \DateTime($data['dateNaissance']) : null);
        $utilisateur->setRegion($data['region'] ?? null);
        $utilisateur->setPhoto($data['photo'] ?? null);
        $utilisateur->setEmpreinte($data['empreinte'] ?? null);

        $this->em->persist($utilisateur);
        $this->em->flush();

        return $utilisateur;
    }

    // Modifier un utilisateur
    public function update(int $id, array $data): ?Utilisateur
    {
        $utilisateur = $this->repository->find($id);
        if (!$utilisateur) return null;

        if (isset($data['nom'])) $utilisateur->setNom($data['nom']);
        if (isset($data['email'])) $utilisateur->setEmail($data['email']);
        if (isset($data['motDePasse'])) $utilisateur->setMotDePasse(password_hash($data['motDePasse'], PASSWORD_BCRYPT));
        if (isset($data['role'])) $utilisateur->setRole($data['role']);
        if (isset($data['dateNaissance'])) $utilisateur->setDateNaissance(new \DateTime($data['dateNaissance']));
        if (isset($data['region'])) $utilisateur->setRegion($data['region']);
        if (isset($data['photo'])) $utilisateur->setPhoto($data['photo']);
        if (isset($data['empreinte'])) $utilisateur->setEmpreinte($data['empreinte']);

        $this->em->flush();

        return $utilisateur;
    }

    // Supprimer un utilisateur
    public function delete(int $id): bool
    {
        $utilisateur = $this->repository->find($id);
        if (!$utilisateur) return false;

        $this->em->remove($utilisateur);
        $this->em->flush();

        return true;
    }
}