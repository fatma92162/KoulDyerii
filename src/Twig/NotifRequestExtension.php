<?php
// src/Twig/NotifRequestExtension.php

namespace App\Twig;

use App\Repository\NotifRequestRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class NotifRequestExtension extends AbstractExtension
{
    public function __construct(
        private NotifRequestRepository $notifRequestRepository
    ) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('notif_requests_count', [$this, 'getPendingCount']),
        ];
    }

    public function getPendingCount(int $userId): int
    {
        return $this->notifRequestRepository->countPendingRequests($userId);
    }
}