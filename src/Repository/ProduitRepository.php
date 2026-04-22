<?php
// src/Repository/ProduitRepository.php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

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
     * Récupérer les produits indisponibles
     */
    public function findIndisponibles(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.disponible = :disponible')
            ->setParameter('disponible', false)
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Compter le nombre total de produits
     */
    public function countAll(): int
    {
        return (int) $this->createQueryBuilder('p')
            ->select('COUNT(p.idProduit)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Compter les produits disponibles
     */
    public function countDisponibles(): int
    {
        return (int) $this->createQueryBuilder('p')
            ->select('COUNT(p.idProduit)')
            ->andWhere('p.disponible = :disponible')
            ->setParameter('disponible', true)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Compter les produits indisponibles
     */
    public function countIndisponibles(): int
    {
        return (int) $this->createQueryBuilder('p')
            ->select('COUNT(p.idProduit)')
            ->andWhere('p.disponible = :disponible')
            ->setParameter('disponible', false)
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

    /**
     * Rechercher des produits par mots-clés (sans le champ categorie)
     * 
     * @param string|array $keywords
     * @param int $limit
     * @return array<int, Produit>
     */
    public function findByKeywords(string|array $keywords, int $limit = 10): array
    {
        $qb = $this->createQueryBuilder('p');
        
        // Convertir en tableau si c'est une chaîne
        if (is_string($keywords)) {
            $keywords = array_filter(explode(' ', $keywords));
        }
        
        if (empty($keywords)) {
            return $this->findTopProduits($limit);
        }
        
        // Construire la recherche avec plusieurs mots-clés (sans categorie)
        $conditions = [];
        foreach ($keywords as $index => $keyword) {
            $keyword = trim($keyword);
            if (strlen($keyword) >= 2) {
                $paramName = 'keyword' . $index;
                // Recherche uniquement dans nom et description
                $conditions[] = '(p.nom LIKE :' . $paramName . 
                               ' OR p.description LIKE :' . $paramName . ')';
                $qb->setParameter($paramName, '%' . $keyword . '%');
            }
        }
        
        if (!empty($conditions)) {
            $qb->andWhere(implode(' OR ', $conditions));
        }
        
        return $qb->setMaxResults($limit)
                  ->orderBy('p.idProduit', 'DESC')
                  ->getQuery()
                  ->getResult();
    }

    /**
     * Récupérer les top produits (meilleures ventes)
     */
    public function findTopProduits(int $limit = 6): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.idProduit', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les produits par catégorie (si le champ existe)
     */
    public function findByCategorie(string $categorie): array
    {
        // Vérifier si le champ categorie existe
        $metadata = $this->getEntityManager()->getClassMetadata(Produit::class);
        if (!$metadata->hasField('categorie') && !$metadata->hasAssociation('categorie')) {
            // Si le champ n'existe pas, retourner tous les produits
            return $this->findBy([], ['nom' => 'ASC']);
        }
        
        return $this->createQueryBuilder('p')
            ->andWhere('p.categorie = :categorie')
            ->setParameter('categorie', $categorie)
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les produits par fournisseur
     */
    public function findByFournisseur(int $fournisseurId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.fournisseur = :fournisseurId')
            ->setParameter('fournisseurId', $fournisseurId)
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les produits avec pagination
     */
    public function findAllWithPagination(int $page = 1, int $limit = 10): array
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.idProduit', 'DESC')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);
        
        return $qb->getQuery()->getResult();
    }

    /**
     * Récupérer les produits récents
     */
    public function findRecent(int $limit = 5): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche avancée avec tous les critères
     */
    public function advancedSearch(array $criteria): array
    {
        $qb = $this->createQueryBuilder('p');
        
        if (!empty($criteria['nom'])) {
            $qb->andWhere('p.nom LIKE :nom')
               ->setParameter('nom', '%' . $criteria['nom'] . '%');
        }
        
        // Vérifier si le champ categorie existe avant de l'utiliser
        $metadata = $this->getEntityManager()->getClassMetadata(Produit::class);
        if (!empty($criteria['categorie']) && $metadata->hasField('categorie')) {
            $qb->andWhere('p.categorie = :categorie')
               ->setParameter('categorie', $criteria['categorie']);
        }
        
        if (isset($criteria['prix_min'])) {
            $qb->andWhere('p.prix >= :prix_min')
               ->setParameter('prix_min', $criteria['prix_min']);
        }
        
        if (isset($criteria['prix_max'])) {
            $qb->andWhere('p.prix <= :prix_max')
               ->setParameter('prix_max', $criteria['prix_max']);
        }
        
        if (isset($criteria['disponible'])) {
            $qb->andWhere('p.disponible = :disponible')
               ->setParameter('disponible', $criteria['disponible']);
        }
        
        if (!empty($criteria['sort'])) {
            switch ($criteria['sort']) {
                case 'prix_asc':
                    $qb->orderBy('p.prix', 'ASC');
                    break;
                case 'prix_desc':
                    $qb->orderBy('p.prix', 'DESC');
                    break;
                case 'nom_asc':
                    $qb->orderBy('p.nom', 'ASC');
                    break;
                default:
                    $qb->orderBy('p.idProduit', 'DESC');
            }
        } else {
            $qb->orderBy('p.idProduit', 'DESC');
        }
        
        return $qb->getQuery()->getResult();
    }
}