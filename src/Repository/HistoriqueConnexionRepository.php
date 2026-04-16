<?php

namespace App\Repository;

use App\Entity\HistoriqueConnexion; // Remplacez par le nom de votre entité si différent
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HistoriqueConnexion>
 */
class HistoriqueConnexionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueConnexion::class);
    }

    // Vous pouvez ajouter ici des méthodes personnalisées si besoin
}