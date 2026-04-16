<?php
namespace App\Service;

use App\Entity\Pointssolde;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

class PointsFideliteService
{
    public function __construct(private EntityManagerInterface $em) {}

    public function getSolde(int $utilisateurId): int
    {
        $solde = $this->em->getRepository(Pointssolde::class)->findOneBy(['utilisateur' => $utilisateurId]);
        return $solde ? $solde->getSolde() : 0;
    }

    public function ajouterPoints(int $utilisateurId, int $points, string $raison = ''): void
    {
        $utilisateur = $this->em->getRepository(Utilisateur::class)->find($utilisateurId);
        if (!$utilisateur) return;

        $solde = $this->em->getRepository(Pointssolde::class)->findOneBy(['utilisateur' => $utilisateur]);
        if (!$solde) {
            $solde = new Pointssolde();
            $solde->setUtilisateur($utilisateur);
            $solde->setSolde(0);
            $now = new \DateTime();
            $solde->setDateCreation($now);
            $solde->setDateModification($now);
            $this->em->persist($solde);
        } else {
            $solde->setDateModification(new \DateTime());
        }
        $solde->setSolde($solde->getSolde() + $points);
        $this->em->flush();
    }

    public function retirerPoints(int $utilisateurId, int $points, string $raison = ''): void
    {
        $this->ajouterPoints($utilisateurId, -$points, $raison);
    }

    public function supprimerSolde(int $utilisateurId): void
    {
        $solde = $this->em->getRepository(Pointssolde::class)->findOneBy(['utilisateur' => $utilisateurId]);
        if ($solde) {
            $this->em->remove($solde);
            $this->em->flush();
        }
    }
}