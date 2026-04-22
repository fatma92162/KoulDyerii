<?php

namespace App\Service;

use App\Entity\Notification;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

class NotificationService
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    public function notify(
        Utilisateur $recipient,
        ?Utilisateur $sender,
        string $type,
        string $message,
        ?int $postId = null,
        ?int $commentId = null
    ): void {
        if ($sender && $recipient->getIdUtilisateur() === $sender->getIdUtilisateur()) {
            return;
        }

        $notification = new Notification();
        $notification->setUserId($recipient->getIdUtilisateur());
        $notification->setFromUserId($sender ? $sender->getIdUtilisateur() : 0);
        $notification->setType($type);
        $notification->setMessage($message);
        $notification->setPostId($postId);
        $notification->setCommentaireId($commentId);
        $notification->setIsRead(false);
        $notification->setCreatedAt(new \DateTime());

        $this->em->persist($notification);
        $this->em->flush();
    }
}