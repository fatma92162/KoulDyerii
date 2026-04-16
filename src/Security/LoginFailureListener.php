<?php

namespace App\Security;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LoginFailureEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class LoginFailureListener implements EventSubscriberInterface
{
    public function __construct(
        private LoginAttemptService $loginAttemptService,
        private RequestStack $requestStack,
        private RouterInterface $router
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [LoginFailureEvent::class => 'onLoginFailure'];
    }

    public function onLoginFailure(LoginFailureEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();
        $email = $request->request->get('email');

        if ($email) {
            $this->loginAttemptService->addAttempt($email);

            if ($this->loginAttemptService->isBlocked($email)) {
                $request->getSession()->getFlashBag()->add(
                    'error',
                    'Trop de tentatives. Votre compte est bloqué 15 minutes.'
                );
                $event->setResponse(new RedirectResponse($this->router->generate('app_login')));
            }
        }
    }
}