<?php

namespace App\Service;

use App\Entity\Historique;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class HistoriqueService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private RequestStack $requestStack
    ) {}

    public function log(
        string $action,
        string $entityType,
        int $entityId,
        ?Utilisateur $user = null,
        ?string $details = null
    ): void {
        $historique = new Historique();
        $historique->setAction($action);
        $historique->setEntityType($entityType);
        $historique->setEntityId($entityId);
        $historique->setUser($user);
        $historique->setDetails($details);
        $historique->setCreatedAt(new \DateTime());

        $request = $this->requestStack->getCurrentRequest();
        if ($request) {
            $historique->setIpAddress($request->getClientIp());
        }

        $this->entityManager->persist($historique);
        $this->entityManager->flush();
    }
}