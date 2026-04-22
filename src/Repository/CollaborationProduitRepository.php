<?php

namespace App\Repository;

use App\Entity\CollaborationProduit;
use App\Entity\Partenaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CollaborationProduit>
 */
class CollaborationProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CollaborationProduit::class);
    }

    /**
     * @return CollaborationProduit[]
     */
    public function findByPartenaire(Partenaire $partenaire): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.partenaire = :p')  // ← Correction : remplacer 😛 par :p
            ->setParameter('p', $partenaire)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return CollaborationProduit[]
     */
    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.statut = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return CollaborationProduit[]
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Vérifie si une collaboration existe déjà entre un partenaire et un produit
     */
    public function existsCollaboration(int $partenaireId, int $produitId): bool
    {
        $result = $this->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->where('c.partenaire = :partenaireId')
            ->andWhere('c.produit = :produitId')
            ->setParameter('partenaireId', $partenaireId)
            ->setParameter('produitId', $produitId)
            ->getQuery()
            ->getSingleScalarResult();
        
        return $result > 0;
    }

    /**
     * Récupère les collaborations par statut et partenaire
     */
    public function findByPartenaireAndStatut(Partenaire $partenaire, string $statut): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.partenaire = :partenaire')
            ->andWhere('c.statut = :statut')
            ->setParameter('partenaire', $partenaire)
            ->setParameter('statut', $statut)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les collaborations en attente
     */
    public function findPendingCollaborations(): array
    {
        return $this->findByStatut('demande');
    }

    /**
     * Récupère les collaborations acceptées
     */
    public function findAcceptedCollaborations(): array
    {
        return $this->findByStatut('acceptee');
    }

    /**
     * Récupère les collaborations refusées
     */
    public function findRejectedCollaborations(): array
    {
        return $this->findByStatut('refusee');
    }

    /**
     * Récupère les collaborations avec les détails du partenaire et du produit
     */
    public function findAllWithDetails(): array
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.partenaire', 'p')
            ->addSelect('p')
            ->leftJoin('c.produit', 'pr')
            ->addSelect('pr')
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}