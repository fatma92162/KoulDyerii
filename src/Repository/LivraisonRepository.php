<?php

namespace App\Repository;

use App\Entity\Livraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livraison::class);
    }

    public function findByFilters(string $search = '', string $status = '', string $sort = 'id_desc'): array
    {
        $qb = $this->createQueryBuilder('l');
        
        if (!empty($search)) {
            $qb->andWhere('l.adresse LIKE :search OR l.idCommande LIKE :search OR l.idLivreur LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        if (!empty($status)) {
            $qb->andWhere('l.statutLivraison = :status')
               ->setParameter('status', $status);
        }
        
        switch ($sort) {
            case 'id_asc':
                $qb->orderBy('l.idLivraison', 'ASC');
                break;
            case 'statut_asc':
                $qb->orderBy('l.statutLivraison', 'ASC');
                break;
            case 'statut_desc':
                $qb->orderBy('l.statutLivraison', 'DESC');
                break;
            case 'id_desc':
            default:
                $qb->orderBy('l.idLivraison', 'DESC');
                break;
        }
        
        return $qb->getQuery()->getResult();
    }
}