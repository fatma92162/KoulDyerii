<?php

namespace App\Repository;

use App\Entity\VisitorActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class VisitorActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VisitorActivity::class);
    }

    public function findOneBySessionId(string $sessionId): ?VisitorActivity
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.sessionId = :sessionId')
            ->setParameter('sessionId', $sessionId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function countOnlineVisitors(int $minutes = 5): int
    {
        $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

        return (int) $this->createQueryBuilder('v')
            ->select('COUNT(v.id)')
            ->andWhere('v.lastSeen >= :threshold')
            ->setParameter('threshold', $threshold)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countOnlineVisitorsByRoute(string $routeName, int $minutes = 5): int
    {
        $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

        return (int) $this->createQueryBuilder('v')
            ->select('COUNT(v.id)')
            ->andWhere('v.lastSeen >= :threshold')
            ->andWhere('v.routeName = :routeName')
            ->setParameter('threshold', $threshold)
            ->setParameter('routeName', $routeName)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getOnlineDeviceStatsByRoute(string $routeName, int $minutes = 5): array
    {
        $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

        $rows = $this->createQueryBuilder('v')
            ->select('v.deviceType AS deviceType, COUNT(v.id) AS total')
            ->andWhere('v.lastSeen >= :threshold')
            ->andWhere('v.routeName = :routeName')
            ->setParameter('threshold', $threshold)
            ->setParameter('routeName', $routeName)
            ->groupBy('v.deviceType')
            ->getQuery()
            ->getArrayResult();

        $mobile = 0;
        $pc = 0;

        foreach ($rows as $row) {
            if ($row['deviceType'] === 'mobile') {
                $mobile = (int) $row['total'];
            } elseif ($row['deviceType'] === 'pc') {
                $pc = (int) $row['total'];
            }
        }

        $total = $mobile + $pc;

        return [
            'mobile' => $mobile,
            'pc' => $pc,
            'mobile_percentage' => $total > 0 ? round(($mobile / $total) * 100, 1) : 0,
            'pc_percentage' => $total > 0 ? round(($pc / $total) * 100, 1) : 0,
            'total' => $total,
        ];
    }
}