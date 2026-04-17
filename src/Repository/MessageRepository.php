<?php

namespace App\Repository;

use App\Entity\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function findConversationsForUser(int $userId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "
            SELECT DISTINCT 
                CASE 
                    WHEN m.sender_id = :userId THEN m.recipient_id
                    ELSE m.sender_id
                END as other_user_id,
                MAX(m.created_at) as last_message_date
            FROM message m
            WHERE m.sender_id = :userId OR m.recipient_id = :userId
            GROUP BY other_user_id
            ORDER BY last_message_date DESC
        ";
        $stmt = $conn->executeQuery($sql, ['userId' => $userId]);
        return $stmt->fetchAllAssociative();
    }

    public function getMessagesBetween(int $user1, int $user2, int $limit = 50): array
    {
        return $this->createQueryBuilder('m')
            ->where('(m.sender = :user1 AND m.recipient = :user2) OR (m.sender = :user2 AND m.recipient = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->orderBy('m.createdAt', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function markAsReadBetween(int $recipientId, int $senderId): void
    {
        $this->createQueryBuilder('m')
            ->update()
            ->set('m.isRead', ':true')
            ->where('m.recipient = :recipient')
            ->andWhere('m.sender = :sender')
            ->andWhere('m.isRead = :false')
            ->setParameter('true', true)
            ->setParameter('recipient', $recipientId)
            ->setParameter('sender', $senderId)
            ->setParameter('false', false)
            ->getQuery()
            ->execute();
    }

    public function countUnreadForUser(int $userId): int
    {
        return $this->createQueryBuilder('m')
            ->select('COUNT(m.id)')
            ->where('m.recipient = :userId')
            ->andWhere('m.isRead = :false')
            ->setParameter('userId', $userId)
            ->setParameter('false', false)
            ->getQuery()
            ->getSingleScalarResult();
    }
}