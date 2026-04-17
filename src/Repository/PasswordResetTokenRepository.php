<?php

namespace App\Repository;   // ⚠️ Changement crucial : namespace App\Repository (pas App\Entity)

use App\Entity\PasswordResetToken;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PasswordResetToken>
 */
class PasswordResetTokenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PasswordResetToken::class);
    }

    // ========== MÉTHODES PERSONNALISÉES ==========
    // Ajoutez ici vos propres méthodes, par exemple :
    // public function findValidToken(string $token): ?PasswordResetToken
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.token = :token')
    //         ->andWhere('p.expiresAt > :now')
    //         ->setParameter('token', $token)
    //         ->setParameter('now', new \DateTime())
    //         ->getQuery()
    //         ->getOneOrNullResult();
    // }
}