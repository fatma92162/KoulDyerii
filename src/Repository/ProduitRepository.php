<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

<<<<<<< HEAD
    /**
     * Récupérer tous les produits avec filtres et tri
     */
    public function findByFilters(string $search = '', string $disponible = '', string $sort = 'id_desc'): array
    {
        $qb = $this->createQueryBuilder('p');
        
        // Filtre par recherche
        if (!empty($search)) {
            $qb->andWhere('p.nom LIKE :search OR p.description LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Filtre par disponibilité
        if ($disponible === 'disponible') {
            $qb->andWhere('p.disponible = :disponible')
               ->setParameter('disponible', true);
        } elseif ($disponible === 'indisponible') {
            $qb->andWhere('p.disponible = :disponible')
               ->setParameter('disponible', false);
        }
        
        // Tri
        switch ($sort) {
            case 'nom_asc':
                $qb->orderBy('p.nom', 'ASC');
                break;
            case 'nom_desc':
                $qb->orderBy('p.nom', 'DESC');
                break;
            case 'prix_asc':
                $qb->orderBy('p.prix', 'ASC');
                break;
            case 'prix_desc':
                $qb->orderBy('p.prix', 'DESC');
                break;
            case 'id_asc':
                $qb->orderBy('p.idProduit', 'ASC');
                break;
            case 'id_desc':
            default:
                $qb->orderBy('p.idProduit', 'DESC');
                break;
        }
        
        return $qb->getQuery()->getResult();
    }

    /**
     * Récupérer les produits disponibles
     */
    public function findDisponibles(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.disponible = :disponible')
            ->setParameter('disponible', true)
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Compter le nombre total de produits
     */
    public function countAll(): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.idProduit)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Compter les produits disponibles
     */
    public function countDisponibles(): int
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.idProduit)')
            ->andWhere('p.disponible = :disponible')
            ->setParameter('disponible', true)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Rechercher des produits par nom
     */
    public function searchByNom(string $search): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.nom LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
=======
    // Add custom methods as needed
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}