<?php

namespace App\Service;

use App\Entity\VisitorActivity;
use App\Repository\VisitorActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class VisitorTracker
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private VisitorActivityRepository $visitorActivityRepository
    ) {}

    public function track(Request $request, ?SessionInterface $session): void
    {
        if (!$request->isMethod('GET')) {
            return;
        }

        if ($request->isXmlHttpRequest()) {
            return;
        }

        if (!$session) {
            return;
        }

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
}