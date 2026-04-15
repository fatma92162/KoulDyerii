<?php

namespace App\EventListener;

use App\Entity\VisitorActivity;
use App\Repository\VisitorActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class VisitorActivityListener implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private VisitorActivityRepository $visitorActivityRepository
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();

        if (!$this->shouldTrack($request)) {
            return;
        }

        if (!$request->hasSession()) {
            return;
        }

        $session = $request->getSession();

        if (!$session->isStarted()) {
            $session->start();
        }

        $sessionId = $session->getId();

        if (!$sessionId) {
            return;
        }

        $visitor = $this->visitorActivityRepository->findOneBy([
            'sessionId' => $sessionId,
        ]);

        if (!$visitor) {
            $visitor = new VisitorActivity();
            $visitor->setSessionId($sessionId);
            $visitor->setCreatedAt(new \DateTime());
            $this->entityManager->persist($visitor);
        }

        $visitor->setIpAddress($request->getClientIp());
        $visitor->setRouteName($request->attributes->get('_route'));
        $visitor->setPageUrl($request->getPathInfo());
        $visitor->setLastSeen(new \DateTime());

        $this->entityManager->flush();
    }

    private function shouldTrack(Request $request): bool
    {
        if (!$request->isMethod('GET')) {
            return false;
        }

        if ($request->isXmlHttpRequest()) {
            return false;
        }

        $path = $request->getPathInfo();

        $ignoredPrefixes = [
            '/_wdt',
            '/_profiler',
            '/build',
            '/assets',
            '/bundles',
        ];

        foreach ($ignoredPrefixes as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return false;
            }
        }

        return true;
    }
}