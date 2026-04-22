<?php
// src/Service/AdminNotificationService.php

namespace App\Service;

use App\Entity\AdminNotification;
use Doctrine\ORM\EntityManagerInterface;

class AdminNotificationService
{
    public function __construct(private EntityManagerInterface $em) {}

    public function notifyNewPost(int $postId, string $postTitle): void
    {
        $notif = new AdminNotification();
        $notif->setType('post_new');
        $notif->setMessage(sprintf('📝 Nouvelle publication : "%s"', $postTitle));
        $notif->setEntityId($postId);
        $notif->setEntityType('post');
        $notif->setCreatedAt(new \DateTime());
        $notif->setIsRead(false);
        $this->em->persist($notif);
        $this->em->flush();
    }

    public function notifyReportedContent(int $postId, string $postTitle, int $signalCount): void
    {
        $notif = new AdminNotification();
        $notif->setType('content_reported');
        $notif->setMessage(sprintf('⚠️ Contenu signalé : "%s" (%d/3)', $postTitle, $signalCount));
        $notif->setEntityId($postId);
        $notif->setEntityType('post');
        $notif->setCreatedAt(new \DateTime());
        $this->em->persist($notif);
        $this->em->flush();
    }

    public function notifyImportantComment(int $commentId, string $commentContent, int $postId): void
    {
        // Critère : plus de 200 caractères ou mots-clés d'importance
        if (strlen($commentContent) > 200 || preg_match('/\b(urgent|problème|bug|aide|important|admin)\b/i', $commentContent)) {
            $notif = new AdminNotification();
            $notif->setType('important_comment');
            $notif->setMessage(sprintf('💬 Commentaire important : "%s"', substr($commentContent, 0, 100)));
            $notif->setEntityId($commentId);
            $notif->setEntityType('comment');
            $notif->setCreatedAt(new \DateTime());
            $this->em->persist($notif);
            $this->em->flush();
        }
    }
}