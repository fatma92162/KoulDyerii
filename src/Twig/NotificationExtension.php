<?php
// src/Twig/NotificationExtension.php

namespace App\Twig;

use App\Repository\NotificationRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NotificationExtension extends AbstractExtension
{
    public function __construct(private NotificationRepository $notificationRepository) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('unread_notifications_count', [$this, 'getUnreadCount']),
            new TwigFunction('recent_notifications', [$this, 'getRecentNotifications']),
        ];
    }

    public function getUnreadCount(int $userId): int
    {
        return $this->notificationRepository->countUnreadByUser($userId);
    }

    public function getRecentNotifications(int $userId, int $limit = 10): array
    {
        return $this->notificationRepository->findRecentByUser($userId, $limit);
    }
}