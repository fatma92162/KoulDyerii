<?php

namespace App\EventListener;

use App\Entity\HistoriqueConnexion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\LoginSuccessEvent;

class LoginSuccessListener implements EventSubscriberInterface
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    public static function getSubscribedEvents(): array
    {
        return [LoginSuccessEvent::class => 'onLoginSuccess'];
    }

    public function onLoginSuccess(LoginSuccessEvent $event): void
    {
        $user = $event->getUser();
        $request = $event->getRequest();

        $historique = new HistoriqueConnexion();
        $historique->setUtilisateur($user);
        $historique->setDateConnexion(new \DateTime());
        $historique->setIp($request->getClientIp());
        $historique->setUserAgent($request->headers->get('User-Agent'));

        $this->entityManager->persist($historique);
        $this->entityManager->flush();
    }
}