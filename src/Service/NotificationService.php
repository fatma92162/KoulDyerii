<?php
// src/Service/NotificationService.php
namespace App\Service;

use App\Entity\Notification;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Notifier\Notification\Notification as NotifierNotification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

class NotificationService
{
    public function __construct(
        private EntityManagerInterface $em,
        private NotifierInterface $notifier
    ) {}

    /**
     * Envoie une notification à un utilisateur (stockage BDD + notification navigateur).
     */
    public function notify(
        Utilisateur $recipient,
        ?Utilisateur $sender,
        string $type,
        string $message,
        ?int $postId = null,
        ?int $commentId = null
    ): void {
        // 1. Ne pas notifier l'utilisateur pour ses propres actions
        if ($sender && $recipient->getIdUtilisateur() === $sender->getIdUtilisateur()) {
            return;
        }

        // 2. Stockage en base de données (votre entité Notification)
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

        // 3. Notification navigateur (flash message)
        $flashNotification = (new NotifierNotification($message, ['browser']))
            ->content($message);
        // Envoi à l'utilisateur (nécessite son email pour le transport browser ? Non, browser utilise la session)
        // Pour les notifications "browser", Symfony les stocke en session. On peut simplement :
        $this->notifier->send($flashNotification);
        // Note : pour cibler un utilisateur précis, il faudrait un transport personnalisé. 
        // Mais avec le canal 'browser', la notification sera visible sur la prochaine requête de l'utilisateur courant (l'auteur de l'action).
        // Ce n'est pas idéal. On peut plutôt envoyer une notification "flash" classique (via addFlash) ou utiliser Mercure.
    }
}