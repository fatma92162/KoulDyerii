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

    // ==================== READ: Conversations ====================
    
    /**
     * Trouve toutes les conversations d'un utilisateur
     */
    public function findConversationsForUser(int $userId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "
            SELECT DISTINCT 
                CASE 
                    WHEN m.sender_id = :userId THEN m.recipient_id
                    ELSE m.sender_id
                END as other_user_id,
                MAX(m.created_at) as last_message_date,
                (SELECT COUNT(*) FROM message m2 
                 WHERE ((m2.sender_id = :userId AND m2.recipient_id = other_user_id) 
                    OR (m2.sender_id = other_user_id AND m2.recipient_id = :userId))
                 AND m2.is_read = 0 
                 AND m2.recipient_id = :userId) as unread_count
            FROM message m
            WHERE m.sender_id = :userId OR m.recipient_id = :userId
            GROUP BY other_user_id
            ORDER BY last_message_date DESC
        ";
        $stmt = $conn->executeQuery($sql, ['userId' => $userId]);
        return $stmt->fetchAllAssociative();
    }

    /**
     * Trouve la dernière conversation d'un utilisateur
     */
    public function findLastConversation(int $userId): ?array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "
            SELECT 
                CASE 
                    WHEN m.sender_id = :userId THEN m.recipient_id
                    ELSE m.sender_id
                END as other_user_id,
                MAX(m.created_at) as last_message_date
            FROM message m
            WHERE m.sender_id = :userId OR m.recipient_id = :userId
            GROUP BY other_user_id
            ORDER BY last_message_date DESC
            LIMIT 1
        ";
        $stmt = $conn->executeQuery($sql, ['userId' => $userId]);
        return $stmt->fetchAssociative();
    }

    // ==================== READ: Messages ====================
    
    /**
     * Récupère les messages entre deux utilisateurs dans l'ordre chronologique
     */
    public function getMessagesBetween(int $user1, int $user2, int $limit = 50, int $offset = 0): array
    {
        return $this->createQueryBuilder('m')
            ->where('(m.sender = :user1 AND m.recipient = :user2) OR (m.sender = :user2 AND m.recipient = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->orderBy('m.createdAt', 'ASC')  // ← CORRIGÉ: ASC pour ordre chronologique
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les messages non lus d'un utilisateur
     */
    public function findUnreadForUser(int $userId): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.recipient = :userId')
            ->andWhere('m.isRead = :false')
            ->setParameter('userId', $userId)
            ->setParameter('false', false)
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les derniers messages d'un utilisateur (limite)
     */
    public function findRecentMessages(int $userId, int $limit = 10): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.sender = :userId OR m.recipient = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère un message par son ID avec vérification de propriété
     */
    public function findMessageForUser(int $messageId, int $userId): ?Message
    {
        return $this->createQueryBuilder('m')
            ->where('m.id = :messageId')
            ->andWhere('m.sender = :userId OR m.recipient = :userId')
            ->setParameter('messageId', $messageId)
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // ==================== UPDATE: Marquer comme lu ====================
    
    /**
     * Marque tous les messages entre deux utilisateurs comme lus
     */
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

    /**
     * Marque un seul message comme lu
     */
    public function markAsRead(int $messageId, int $recipientId): bool
    {
        $result = $this->createQueryBuilder('m')
            ->update()
            ->set('m.isRead', ':true')
            ->where('m.id = :messageId')
            ->andWhere('m.recipient = :recipient')
            ->andWhere('m.isRead = :false')
            ->setParameter('true', true)
            ->setParameter('messageId', $messageId)
            ->setParameter('recipient', $recipientId)
            ->setParameter('false', false)
            ->getQuery()
            ->execute();
        
        return $result > 0;
    }

    /**
     * Marque tous les messages d'un utilisateur comme lus
     */
    public function markAllAsRead(int $recipientId): int
    {
        return $this->createQueryBuilder('m')
            ->update()
            ->set('m.isRead', ':true')
            ->where('m.recipient = :recipient')
            ->andWhere('m.isRead = :false')
            ->setParameter('true', true)
            ->setParameter('recipient', $recipientId)
            ->setParameter('false', false)
            ->getQuery()
            ->execute();
    }

    // ==================== COUNT: Compteurs ====================
    
    /**
     * Compte les messages non lus pour un utilisateur
     */
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

    /**
     * Compte les messages non lus par expéditeur
     */
    public function countUnreadBySender(int $recipientId): array
    {
        return $this->createQueryBuilder('m')
            ->select('IDENTITY(m.sender) as sender_id, COUNT(m.id) as unread_count')
            ->where('m.recipient = :recipient')
            ->andWhere('m.isRead = :false')
            ->setParameter('recipient', $recipientId)
            ->setParameter('false', false)
            ->groupBy('m.sender')
            ->getQuery()
            ->getResult();
    }

    /**
     * Compte le nombre total de messages entre deux utilisateurs
     */
    public function countMessagesBetween(int $user1, int $user2): int
    {
        return $this->createQueryBuilder('m')
            ->select('COUNT(m.id)')
            ->where('(m.sender = :user1 AND m.recipient = :user2) OR (m.sender = :user2 AND m.recipient = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->getQuery()
            ->getSingleScalarResult();
    }

    // ==================== DELETE: Suppression ====================
    
    /**
     * Supprime un message (avec vérification de propriété)
     */
    public function deleteMessage(int $messageId, int $userId): bool
    {
        $message = $this->findMessageForUser($messageId, $userId);
        if ($message) {
            $this->getEntityManager()->remove($message);
            $this->getEntityManager()->flush();
            return true;
        }
        return false;
    }

    /**
     * Supprime tous les messages entre deux utilisateurs
     */
    public function deleteConversation(int $user1, int $user2): int
    {
        return $this->createQueryBuilder('m')
            ->delete()
            ->where('(m.sender = :user1 AND m.recipient = :user2) OR (m.sender = :user2 AND m.recipient = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->getQuery()
            ->execute();
    }

    /**
     * Supprime les messages plus vieux que X jours
     */
    public function deleteOldMessages(int $days): int
    {
        $date = new \DateTime("-{$days} days");
        return $this->createQueryBuilder('m')
            ->delete()
            ->where('m.createdAt < :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->execute();
    }

    /**
     * Supprime tous les messages d'un utilisateur
     */
    public function deleteAllUserMessages(int $userId): int
    {
        return $this->createQueryBuilder('m')
            ->delete()
            ->where('m.sender = :userId OR m.recipient = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->execute();
    }

    // ==================== UPDATE: Modification ====================
    
    /**
     * Met à jour le contenu d'un message (avec vérification de propriété)
     */
    public function updateMessageContent(int $messageId, int $userId, string $newContent): bool
    {
        $message = $this->findMessageForUser($messageId, $userId);
        if ($message && $message->getSender()->getIdUtilisateur() === $userId) {
            // Vérifier que le message a moins de 5 minutes
            $now = new \DateTime();
            $diff = $now->getTimestamp() - $message->getCreatedAt()->getTimestamp();
            if ($diff <= 300) { // 5 minutes
                $message->setContent($newContent);
                $this->getEntityManager()->flush();
                return true;
            }
        }
        return false;
    }

    // ==================== SEARCH: Recherche ====================
    
    /**
     * Recherche dans les messages
     */
    public function searchMessages(int $userId, string $searchTerm, int $limit = 20): array
    {
        return $this->createQueryBuilder('m')
            ->where('(m.sender = :userId OR m.recipient = :userId)')
            ->andWhere('m.content LIKE :search')
            ->setParameter('userId', $userId)
            ->setParameter('search', '%' . $searchTerm . '%')
            ->orderBy('m.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    // ==================== STATS: Statistiques ====================
    
    /**
     * Statistiques des messages pour un utilisateur
     */
    public function getMessageStats(int $userId): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "
            SELECT 
                COUNT(*) as total_messages,
                SUM(CASE WHEN sender_id = :userId THEN 1 ELSE 0 END) as messages_sent,
                SUM(CASE WHEN recipient_id = :userId THEN 1 ELSE 0 END) as messages_received,
                SUM(CASE WHEN recipient_id = :userId AND is_read = 0 THEN 1 ELSE 0 END) as unread_count,
                COUNT(DISTINCT CASE WHEN sender_id = :userId THEN recipient_id ELSE sender_id END) as total_conversations
            FROM message
            WHERE sender_id = :userId OR recipient_id = :userId
        ";
        $stmt = $conn->executeQuery($sql, ['userId' => $userId]);
        return $stmt->fetchAssociative();
    }

    /**
     * Récupère les utilisateurs les plus actifs dans les conversations
     */
    public function getMostActiveConversations(int $userId, int $limit = 5): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "
            SELECT 
                CASE 
                    WHEN m.sender_id = :userId THEN m.recipient_id
                    ELSE m.sender_id
                END as other_user_id,
                COUNT(*) as message_count,
                MAX(m.created_at) as last_message_date
            FROM message m
            WHERE m.sender_id = :userId OR m.recipient_id = :userId
            GROUP BY other_user_id
            ORDER BY message_count DESC
            LIMIT :limit
        ";
        $stmt = $conn->executeQuery($sql, ['userId' => $userId, 'limit' => $limit]);
        return $stmt->fetchAllAssociative();
    }
}