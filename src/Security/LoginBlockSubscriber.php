<?php

namespace App\Security;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class LoginBlockSubscriber implements EventSubscriberInterface
{
    public function __construct(private LoginAttemptService $loginAttemptService) {}

    public static function getSubscribedEvents(): array
    {
        return [CheckPassportEvent::class => 'onCheckPassport'];
    }

    public function onCheckPassport(CheckPassportEvent $event): void
    {
        $passport = $event->getPassport();
        $user = $passport->getUser();
        $email = $user->getUserIdentifier();

        if ($this->loginAttemptService->isBlocked($email)) {
            throw new CustomUserMessageAuthenticationException(
                'Compte bloqué 15 minutes. Réessayez plus tard.'
            );
        }
    }
}