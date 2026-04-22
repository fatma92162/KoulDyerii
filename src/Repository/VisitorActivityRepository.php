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

    public function countUniqueVisitorsByRouteAndMinutes(string $routeName, int $minutes = 1440): int
    {
        $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

        return (int) $this->createQueryBuilder('v')
            ->select('COUNT(DISTINCT v.sessionId)')
            ->andWhere('v.lastSeen >= :threshold')
            ->andWhere('v.routeName = :routeName')
            ->setParameter('threshold', $threshold)
            ->setParameter('routeName', $routeName)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getSourceStatsByRouteAndMinutes(string $routeName, int $minutes = 1440): array
    {
        $threshold = new \DateTime(sprintf('-%d minutes', $minutes));

        $rows = $this->createQueryBuilder('v')
            ->select('v.sourcePlatform AS platform, COUNT(DISTINCT v.sessionId) AS total')
            ->andWhere('v.lastSeen >= :threshold')
            ->andWhere('v.routeName = :routeName')
            ->setParameter('threshold', $threshold)
            ->setParameter('routeName', $routeName)
            ->groupBy('v.sourcePlatform')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getArrayResult();

        $result = [];

        foreach ($rows as $row) {
            $platform = $row['platform'] ?: 'direct';
            $result[] = [
                'platform' => $platform,
                'total' => (int) $row['total'],
            ];
        }

        return $result;
    }
}