<?php

namespace App\Security;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class LoginBlockedChecker implements UserCheckerInterface
{
    public function __construct(private LoginAttemptService $loginAttemptService) {}

    public function checkPreAuth(UserInterface $user): void
    {
        $email = $user->getUserIdentifier();
        if ($this->loginAttemptService->isBlocked($email)) {
            throw new CustomUserMessageAuthenticationException(
                'Trop de tentatives. Votre compte est bloqué 15 minutes.'
            );
        }
    }

    public function checkPostAuth(UserInterface $user): void {}
}