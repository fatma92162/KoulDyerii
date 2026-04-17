<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\GifFavori;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GifFavori>
 */
class GifFavoriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GifFavori::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Exemple : récupérer les favoris d'un utilisateur
    public function findByUtilisateur(int $userId): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.utilisateur = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('g.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}