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

    // ─── Méthodes existantes (préservées) ────────────────────────────────────

    /**
     * Récupérer les plats d'un partenaire avec filtres et tri
     */
    public function findByFilters(int $idPartenaire, string $search = '', string $statut = '', string $sort = 'date_desc'): array
    {
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.idPartenaire = :idPartenaire')
            ->setParameter('idPartenaire', $idPartenaire);

        if (!empty($search)) {
            $qb->andWhere('p.nom LIKE :search OR p.description LIKE :search OR p.ingredients LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($statut) && $statut !== 'tous') {
            $qb->andWhere('p.statut = :statut')
               ->setParameter('statut', $statut);
        }

        switch ($sort) {
            case 'nom_asc':     $qb->orderBy('p.nom', 'ASC'); break;
            case 'nom_desc':    $qb->orderBy('p.nom', 'DESC'); break;
            case 'prix_asc':    $qb->orderBy('p.prix', 'ASC'); break;
            case 'prix_desc':   $qb->orderBy('p.prix', 'DESC'); break;
            case 'statut_asc':  $qb->orderBy('p.statut', 'ASC'); break;
            case 'statut_desc': $qb->orderBy('p.statut', 'DESC'); break;
            case 'ventes_desc': $qb->orderBy('p.salesCount', 'DESC'); break;
            case 'date_asc':    $qb->orderBy('p.dateCreation', 'ASC'); break;
            case 'date_desc':
            default:            $qb->orderBy('p.dateCreation', 'DESC'); break;
        }

        return $qb->getQuery()->getResult();
    }

    public function findByIdPartenaire(int $idPartenaire): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idPartenaire = :idPartenaire')
            ->setParameter('idPartenaire', $idPartenaire)
            ->orderBy('p.dateCreation', 'DESC')
            ->getQuery()->getResult();
    }

    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('p.dateCreation', 'DESC')
            ->getQuery()->getResult();
    }

    // ─── Nouvelles méthodes (FEATURE 5) ──────────────────────────────────────

    /**
     * ✅ Plats en attente de modération (PENDING).
     * Utilisé par AdminPlatController.
     */
    public function findPendingPlats(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', 'en_attente')
            ->orderBy('p.dateCreation', 'ASC')  // plus ancien = plus urgent
            ->getQuery()->getResult();
    }

    /**
     * ✅ Plats validés (APPROVED).
     * Seuls ceux-ci sont visibles par le public.
     */
    public function findApprovedPlats(): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', 'accepte')
            ->orderBy('p.dateCreation', 'DESC')
            ->getQuery()->getResult();
    }

    /**
     * ✅ Best-sellers : plats avec isBestSeller=true, triés par nombre de ventes.
     */
    public function findBestSellers(int $limit = 10): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.isBestSeller = :bs')
            ->andWhere('p.statut = :statut')
            ->setParameter('bs', true)
            ->setParameter('statut', 'accepte')
            ->orderBy('p.salesCount', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()->getResult();
    }

    /**
     * Top plats par quantité réellement commandée (somme des lignes), hors commandes annulées.
     * Complété par les plats approuvés les plus vendus (salesCount) si peu d'historique.
     *
     * @return Plat[]
     */
    public function findTopPlatsBySoldQuantity(int $limit = 10): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $rows = $conn->fetchAllAssociative(
            'SELECT l.plat_id, SUM(l.quantite) AS qty
             FROM ligne_commande_plat l
             INNER JOIN commands c ON c.id = l.commande_id
             INNER JOIN plat p ON p.id = l.plat_id
             WHERE c.status != :ann AND p.statut = :st
             GROUP BY l.plat_id
             ORDER BY qty DESC
             LIMIT ' . (int) $limit,
            ['ann' => 'annulee', 'st' => 'accepte']
        );

        if ($rows === []) {
            return $this->findFallbackTopApprovedBySalesCount($limit);
        }

        $qtyByPlatId = [];
        foreach ($rows as $row) {
            $qtyByPlatId[(int) $row['plat_id']] = (int) $row['qty'];
        }

        $plats = $this->findBy(['id' => array_keys($qtyByPlatId)]);

        usort($plats, static function (Plat $a, Plat $b) use ($qtyByPlatId): int {
            return ($qtyByPlatId[$b->getId()] ?? 0) <=> ($qtyByPlatId[$a->getId()] ?? 0);
        });

        if (count($plats) < $limit) {
            $existing = array_flip(array_map(static fn (Plat $p) => $p->getId(), $plats));
            $fill = $this->findFallbackTopApprovedBySalesCount($limit);
            foreach ($fill as $p) {
                if (count($plats) >= $limit) {
                    break;
                }
                if (!isset($existing[$p->getId()])) {
                    $plats[] = $p;
                    $existing[$p->getId()] = true;
                }
            }
        }

        return array_slice($plats, 0, $limit);
    }

    /**
     * @return Plat[]
     */
    private function findFallbackTopApprovedBySalesCount(int $limit): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.statut = :statut')
            ->setParameter('statut', 'accepte')
            ->orderBy('p.salesCount', 'DESC')
            ->addOrderBy('p.dateCreation', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Plats approuvés d'un partenaire donné.
     */
    public function findApprovedByPartenaire(int $idPartenaire): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idPartenaire = :idPartenaire')
            ->andWhere('p.statut = :statut')
            ->setParameter('idPartenaire', $idPartenaire)
            ->setParameter('statut', 'accepte')
            ->orderBy('p.salesCount', 'DESC')
            ->getQuery()->getResult();
    }
}