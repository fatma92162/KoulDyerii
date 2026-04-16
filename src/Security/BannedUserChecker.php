<?php
namespace App\Security;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class BannedUserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        // Vérifie si l'utilisateur a une méthode isBanned()
        if (!method_exists($user, 'isBanned')) {
            return;
        }

        if ($user->isBanned()) {
            $bannedUntil = $user->getBannedUntil();
            if ($bannedUntil) {
                $now = new \DateTime();
                $diff = $now->diff($bannedUntil);
                $remaining = '';
                if ($diff->days > 0) $remaining .= $diff->days . ' jour(s) ';
                if ($diff->h > 0) $remaining .= $diff->h . ' heure(s) ';
                if ($diff->i > 0) $remaining .= $diff->i . ' minute(s)';
                if (empty($remaining)) $remaining = 'quelques instants';
                $message = sprintf('Votre compte est banni. Il sera réactivé dans %s.', trim($remaining));
            } else {
                $message = 'Votre compte est banni définitivement.';
            }
            throw new CustomUserMessageAuthenticationException($message);
        }
    }

    public function checkPostAuth(UserInterface $user): void {}
}