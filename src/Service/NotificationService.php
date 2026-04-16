<?php
// src/Service/NotificationService.php

namespace App\Service;

use App\Entity\Notification;
use App\Entity\Commentaire;
use App\Entity\Post;  // au lieu de Publication
use App\Repository\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;

class NotificationService
{
    public function __construct(
        private EntityManagerInterface $em,
        private NotificationRepository $notificationRepository
    ) {}

    private function creerNotification(
        int $destinataireId,
        int $auteurId,
        string $type,
        string $message,
        ?string $lien = null,
        ?int $idReference = null
    ): void {
        if ($destinataireId === $auteurId) return;

        $notification = new Notification();
        $notification->setIdUtilisateur($destinataireId);
        $notification->setIdAuteur($auteurId);
        $notification->setType($type);
        $notification->setMessage($message);
        $notification->setLien($lien);
        $notification->setIdReference($idReference);
        $notification->setLu(false);
        $notification->setCreatedAt(new \DateTime());

        $this->em->persist($notification);
        $this->em->flush();
    }

    // Notification pour un commentaire
    public function notificationCommentaire(Commentaire $commentaire, int $auteurId, string $auteurNom): void
    {
        $post = $commentaire->getPost();               // ✅ getPost()
        $proprietaireId = $post->getUtilisateur()->getIdUtilisateur();

        $message = sprintf(
            '%s a commenté votre publication "%s"',
            $auteurNom,
            substr($post->getContent(), 0, 50)        // ✅ getContent()
        );

        $lien = sprintf('/posts/%d#comment-%d', $post->getId(), $commentaire->getId()); // ✅ getId()

        $this->creerNotification($proprietaireId, $auteurId, 'comment', $message, $lien, $commentaire->getId());
    }

    // Notification pour un like sur publication
    public function notificationLike(Post $post, int $auteurId, string $auteurNom): void   // ✅ Post au lieu de Publication
    {
        $proprietaireId = $post->getUtilisateur()->getIdUtilisateur();

        $message = sprintf(
            '%s a aimé votre publication "%s"',
            $auteurNom,
            substr($post->getContent(), 0, 50)        // ✅ getContent()
        );

        $lien = sprintf('/posts/%d', $post->getId());  // ✅ getId()

        $this->creerNotification($proprietaireId, $auteurId, 'like', $message, $lien, $post->getId());
    }

    // Notification pour un like sur commentaire
    public function notificationLikeCommentaire(Commentaire $commentaire, int $auteurId, string $auteurNom): void
    {
        $proprietaireId = $commentaire->getUtilisateur()->getIdUtilisateur();
        if ($proprietaireId === $auteurId) return;

        $message = sprintf(
            '%s a aimé votre commentaire : "%s"',
            $auteurNom,
            substr($commentaire->getContent(), 0, 50)   // ✅ getContent()
        );

        $lien = sprintf('/posts/%d#comment-%d', $commentaire->getPost()->getId(), $commentaire->getId());

        $this->creerNotification($proprietaireId, $auteurId, 'like_comment', $message, $lien, $commentaire->getId());
    }

    // ========== MÉTHODES POUR LE CONTROLLER ==========
    public function getNotifications(int $userId, int $limit = 20): array
    {
        return $this->notificationRepository->findByUtilisateur($userId, $limit);
    }

    public function getNombreNonLu(int $userId): int
    {
        return $this->notificationRepository->countNonLu($userId);
    }

    public function marquerToutCommeLu(int $userId): void
    {
        $this->notificationRepository->marquerToutCommeLu($userId);
    }

    public function marquerCommeLu(int $notificationId): void
    {
        $this->notificationRepository->marquerCommeLu($notificationId);
    }
}