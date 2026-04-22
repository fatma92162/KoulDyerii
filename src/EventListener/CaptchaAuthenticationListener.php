<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;

class CaptchaAuthenticationListener implements EventSubscriberInterface
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            CheckPassportEvent::class => ['onCheckPassport', -10],
        ];
    }

    public function onCheckPassport(CheckPassportEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();

        if (!$request || $request->attributes->get('_route') !== 'app_login' || !$request->isMethod('POST')) {
            return;
        }

        $session = $request->getSession();
        $expectedResult = $session->get('math_captcha_result');
        $userAnswer = $request->request->get('math_captcha');

        if ($expectedResult === null || $userAnswer === null || (int)$expectedResult !== (int)$userAnswer) {
            // Remove the result from session to force a newly generated one
            $session->remove('math_captcha_result');
            throw new CustomUserMessageAuthenticationException('CAPTCHA incorrect. Veuillez réessayer.');
        }

        // Clean up the captcha from session if successful
        $session->remove('math_captcha_result');
    }
}
