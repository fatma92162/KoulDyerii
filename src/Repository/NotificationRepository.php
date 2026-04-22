<?php
// src/Repository/NotificationRepository.php

namespace App\Repository;

use App\Entity\Notification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }

    public function countUnreadByUser(int $userId): int
    {
        return $this->createQueryBuilder('n')
            ->select('COUNT(n.id)')
            ->where('n.userId = :userId')
            ->andWhere('n.isRead = :isRead')
            ->setParameter('userId', $userId)
            ->setParameter('isRead', false)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findRecentByUser(int $userId, int $limit = 10): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.userId = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('n.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.userId = :userId')
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function markAsRead(int $notificationId): void
    {
        $notification = $this->find($notificationId);
        if ($notification) {
            $notification->setIsRead(true);
            $this->getEntityManager()->flush();
        }
    }

    public function markAllAsRead(int $userId): void
    {
        $this->createQueryBuilder('n')
            ->update()
            ->set('n.isRead', ':isRead')
            ->where('n.userId = :userId')
            ->setParameter('isRead', true)
            ->setParameter('userId', $userId)
            ->getQuery()
            ->execute();
    }
}