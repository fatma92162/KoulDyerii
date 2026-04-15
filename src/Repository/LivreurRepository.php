<?php

namespace App\Repository;

use App\Entity\Livreur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LivreurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livreur::class);
    }

    public function findDisponibles(): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.disponibilite = :disponible')
            ->setParameter('disponible', true)
            ->orderBy('l.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupérer les livreurs avec filtres et tri
     */
    public function findByFilters(string $search = '', string $status = '', string $sort = 'id_desc'): array
    {
        $qb = $this->createQueryBuilder('l');
        
        // Filtre par recherche
        if (!empty($search)) {
            $qb->andWhere('l.nom LIKE :search OR l.prenom LIKE :search OR l.telephone LIKE :search OR l.idLivreur LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Filtre par statut
        if ($status === 'disponible') {
            $qb->andWhere('l.disponibilite = :disponible')
               ->setParameter('disponible', true);
        } elseif ($status === 'indisponible') {
            $qb->andWhere('l.disponibilite = :indisponible')
               ->setParameter('indisponible', false);
        }
        
        // Tri
        switch ($sort) {
            case 'nom_asc':
                $qb->orderBy('l.nom', 'ASC');
                break;
            case 'nom_desc':
                $qb->orderBy('l.nom', 'DESC');
                break;
            case 'prenom_asc':
                $qb->orderBy('l.prenom', 'ASC');
                break;
            case 'prenom_desc':
                $qb->orderBy('l.prenom', 'DESC');
                break;
            case 'telephone_asc':
                $qb->orderBy('l.telephone', 'ASC');
                break;
            case 'telephone_desc':
                $qb->orderBy('l.telephone', 'DESC');
                break;
            case 'status_asc':
                $qb->orderBy('l.disponibilite', 'ASC');
                break;
            case 'status_desc':
                $qb->orderBy('l.disponibilite', 'DESC');
                break;
            case 'id_asc':
                $qb->orderBy('l.idLivreur', 'ASC');
                break;
            case 'id_desc':
            default:
                $qb->orderBy('l.idLivreur', 'DESC');
                break;
        }
        
        return $qb->getQuery()->getResult();
    }
}