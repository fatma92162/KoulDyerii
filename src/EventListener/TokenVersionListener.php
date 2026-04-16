<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityManagerInterface;

class TokenVersionListener implements EventSubscriberInterface
{
    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private EntityManagerInterface $entityManager
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [RequestEvent::class => 'onKernelRequest'];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) return;

        $token = $this->tokenStorage->getToken();
        if (!$token) return;

        $user = $token->getUser();
        if (!$user instanceof \App\Entity\Utilisateur) return;

        $session = $event->getRequest()->getSession();
        if (!$session->has('token_version')) {
            $session->set('token_version', $user->getTokenVersion());
        } else {
            $storedVersion = $session->get('token_version');
            $currentVersion = $user->getTokenVersion();
            if ($storedVersion !== $currentVersion) {
                $session->invalidate();
                $this->tokenStorage->setToken(null);
                $event->getRequest()->getSession()->getFlashBag()->add('error', 'Vous avez été déconnecté car votre compte a été utilisé ailleurs.');
            }
        }
    }
}