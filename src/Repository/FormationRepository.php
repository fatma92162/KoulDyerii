<?php

namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    /**
     * Récupérer les formations avec filtres et tri
     */
    public function findByFilters(string $search = '', string $statut = '', string $sort = 'id_desc'): array
    {
        $qb = $this->createQueryBuilder('f');
        
        // Filtre par recherche
        if (!empty($search)) {
            $qb->andWhere('f.titre LIKE :search OR f.description LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Filtre par statut
        if (!empty($statut) && $statut !== 'tous') {
            $qb->andWhere('f.statut = :statut')
               ->setParameter('statut', $statut);
        }
        
        // Tri
        switch ($sort) {
            case 'titre_asc':
                $qb->orderBy('f.titre', 'ASC');
                break;
            case 'titre_desc':
                $qb->orderBy('f.titre', 'DESC');
                break;
            case 'prix_asc':
                $qb->orderBy('f.prix', 'ASC');
                break;
            case 'prix_desc':
                $qb->orderBy('f.prix', 'DESC');
                break;
            case 'statut_asc':
                $qb->orderBy('f.statut', 'ASC');
                break;
            case 'statut_desc':
                $qb->orderBy('f.statut', 'DESC');
                break;
            case 'id_asc':
                $qb->orderBy('f.idFormation', 'ASC');
                break;
            case 'id_desc':
            default:
                $qb->orderBy('f.idFormation', 'DESC');
                break;
        }
        
        return $qb->getQuery()->getResult();
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('f')
            ->orderBy('f.idFormation', 'DESC')
            ->getQuery()
            ->getResult();
    }
}