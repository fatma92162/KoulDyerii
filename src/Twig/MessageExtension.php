<?php
namespace App\Twig;

use App\Repository\MessageRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MessageExtension extends AbstractExtension
{
    public function __construct(private MessageRepository $messageRepository) {}

    public function getFunctions(): array
    {
        return [
            new TwigFunction('unread_messages_count', [$this, 'getUnreadCount']),
        ];
    }

    public function getUnreadCount(int $userId): int
    {
        return $this->messageRepository->countUnreadForUser($userId);
    }
}