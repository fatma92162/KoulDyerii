<?php
// src/Repository/NotifRequestRepository.php

namespace App\Repository;

use App\Entity\NotifRequest;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NotifRequest>
 */
class NotifRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotifRequest::class);
    }

    /**
     * Compte le nombre de demandes d'ami en attente pour un utilisateur
     */
    public function countPendingRequests(int $userId): int
    {
        return $this->createQueryBuilder('n')
            ->select('COUNT(n.id)')
            ->where('n.receiver = :userId')
            ->andWhere('n.status = :status')
            ->setParameter('userId', $userId)
            ->setParameter('status', 'pending')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Récupère les demandes d'ami en attente pour un utilisateur
     */
    public function findPendingRequests(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.receiver = :userId')
            ->andWhere('n.status = :status')
            ->setParameter('userId', $userId)
            ->setParameter('status', 'pending')
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère tous les amis acceptés d'un utilisateur
     */
    public function findAcceptedFriends(int $userId): array
    {
        $sent = $this->createQueryBuilder('n')
            ->where('n.sender = :userId')
            ->andWhere('n.status = :status')
            ->setParameter('userId', $userId)
            ->setParameter('status', 'accepted')
            ->getQuery()
            ->getResult();

        $received = $this->createQueryBuilder('n')
            ->where('n.receiver = :userId')
            ->andWhere('n.status = :status')
            ->setParameter('userId', $userId)
            ->setParameter('status', 'accepted')
            ->getQuery()
            ->getResult();

        return array_merge($sent, $received);
    }

    /**
     * Vérifie si une demande d'ami en attente existe entre deux utilisateurs
     */
    public function hasPendingRequest(Utilisateur $sender, Utilisateur $receiver): bool
    {
        $result = $this->createQueryBuilder('n')
            ->where('n.sender = :sender AND n.receiver = :receiver')
            ->andWhere('n.status = :status')
            ->setParameter('sender', $sender)
            ->setParameter('receiver', $receiver)
            ->setParameter('status', 'pending')
            ->getQuery()
            ->getOneOrNullResult();
        
        return $result !== null;
    }

    /**
     * Vérifie si deux utilisateurs sont déjà amis (relation acceptée)
     */
    public function areFriends(Utilisateur $user1, Utilisateur $user2): bool
    {
        $result = $this->createQueryBuilder('n')
            ->where('(n.sender = :user1 AND n.receiver = :user2 AND n.status = :status)')
            ->orWhere('(n.sender = :user2 AND n.receiver = :user1 AND n.status = :status)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->setParameter('status', 'accepted')
            ->getQuery()
            ->getOneOrNullResult();
        
        return $result !== null;
    }

    /**
     * Récupère une demande d'ami spécifique entre deux utilisateurs
     */
    public function findRequestBetweenUsers(Utilisateur $sender, Utilisateur $receiver): ?NotifRequest
    {
        return $this->createQueryBuilder('n')
            ->where('n.sender = :sender AND n.receiver = :receiver')
            ->setParameter('sender', $sender)
            ->setParameter('receiver', $receiver)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Récupère toutes les demandes d'ami envoyées par un utilisateur
     */
    public function findSentRequests(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.sender = :userId')
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère toutes les demandes d'ami reçues par un utilisateur
     */
    public function findReceivedRequests(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->where('n.receiver = :userId')
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Accepte une demande d'ami
     */
    public function acceptRequest(NotifRequest $request): void
    {
        $request->setStatus('accepted');
        $this->getEntityManager()->flush();
    }

    /**
     * Refuse une demande d'ami
     */
    public function rejectRequest(NotifRequest $request): void
    {
        $request->setStatus('rejected');
        $this->getEntityManager()->flush();
    }

    /**
     * Supprime une demande d'ami
     */
    public function deleteRequest(NotifRequest $request): void
    {
        $this->getEntityManager()->remove($request);
        $this->getEntityManager()->flush();
    }

    /**
     * Vérifie si une relation existe (peu importe le statut)
     */
    public function hasAnyRelation(Utilisateur $user1, Utilisateur $user2): bool
    {
        $result = $this->createQueryBuilder('n')
            ->where('(n.sender = :user1 AND n.receiver = :user2)')
            ->orWhere('(n.sender = :user2 AND n.receiver = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->getQuery()
            ->getOneOrNullResult();
        
        return $result !== null;
    }

    /**
     * Récupère la relation entre deux utilisateurs (peu importe le statut)
     */
    public function findRelationBetweenUsers(Utilisateur $user1, Utilisateur $user2): ?NotifRequest
    {
        return $this->createQueryBuilder('n')
            ->where('(n.sender = :user1 AND n.receiver = :user2)')
            ->orWhere('(n.sender = :user2 AND n.receiver = :user1)')
            ->setParameter('user1', $user1)
            ->setParameter('user2', $user2)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Récupère les demandes d'ami en attente avec les détails de l'expéditeur
     */
    public function findPendingRequestsWithSender(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->select('n', 'u')
            ->leftJoin('n.sender', 'u')
            ->where('n.receiver = :userId')
            ->andWhere('n.status = :status')
            ->setParameter('userId', $userId)
            ->setParameter('status', 'pending')
            ->orderBy('n.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Supprime toutes les relations d'un utilisateur
     */
    public function deleteAllUserRelations(int $userId): int
    {
        $qb = $this->createQueryBuilder('n')
            ->delete()
            ->where('n.sender = :userId OR n.receiver = :userId')
            ->setParameter('userId', $userId);
        
        return $qb->getQuery()->execute();
    }
}