<?php

namespace App\Repository;

use App\Entity\Plat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plat::class);
    }

    /**
     * Récupérer les plats d'un partenaire avec filtres et tri
     */
    public function findByFilters(int $idPartenaire, string $search = '', string $statut = '', string $sort = 'date_desc'): array
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.idPartenaire = :idPartenaire')
            ->setParameter('idPartenaire', $idPartenaire);
        
        // Filtre par recherche
        if (!empty($search)) {
            $qb->andWhere('p.nom LIKE :search OR p.description LIKE :search OR p.ingredients LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Filtre par statut
        if (!empty($statut) && $statut !== 'tous') {
            $qb->andWhere('p.statut = :statut')
               ->setParameter('statut', $statut);
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
            case 'statut_asc':
                $qb->orderBy('p.statut', 'ASC');
                break;
            case 'statut_desc':
                $qb->orderBy('p.statut', 'DESC');
                break;
            case 'date_asc':
                $qb->orderBy('p.dateCreation', 'ASC');
                break;
            case 'date_desc':
            default:
                $qb->orderBy('p.dateCreation', 'DESC');
                break;
        }
        
        return $qb->getQuery()->getResult();
    }

    public function findByIdPartenaire(int $idPartenaire): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idPartenaire = :idPartenaire')
            ->setParameter('idPartenaire', $idPartenaire)
            ->orderBy('p.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('p.dateCreation', 'DESC')
            ->getQuery()
            ->getResult();
    }
}