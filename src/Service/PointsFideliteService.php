<?php

namespace App\Service;

use App\Entity\Pointssolde;
use App\Entity\Utilisateur;
use App\Repository\PointssoldeRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;

class PointsFideliteService
{
    private PointssoldeRepository $pointsRepository;
    private UtilisateurRepository $utilisateurRepository;
    private EntityManagerInterface $entityManager;

    public const POINTS_PUBLICATION = 10;
    public const POINTS_COMMENTAIRE = 5;
    public const POINTS_LIKE_RECU = 2;
    public const POINTS_LIKE_DONNE = 1;

    public function __construct(
        PointssoldeRepository $pointsRepository,
        UtilisateurRepository $utilisateurRepository,
        EntityManagerInterface $entityManager
    ) {
        $this->pointsRepository = $pointsRepository;
        $this->utilisateurRepository = $utilisateurRepository;
        $this->entityManager = $entityManager;
    }

    public function ajouterPoints(int $idUtilisateur, int $points, string $raison = ""): Pointssolde
    {
        $utilisateur = $this->utilisateurRepository->find($idUtilisateur);
        
        if (!$utilisateur) {
            throw new \Exception("Utilisateur non trouvé avec l'ID: " . $idUtilisateur);
        }
        
        $pointsSolde = $this->pointsRepository->findOneBy(["utilisateur" => $utilisateur]);
        
        if (!$pointsSolde) {
            $pointsSolde = new Pointssolde();
            $pointsSolde->setUtilisateur($utilisateur);
            $pointsSolde->setSolde(0);
            $pointsSolde->setDateCreation(new \DateTime());
            $pointsSolde->setDateModification(new \DateTime());
            $this->entityManager->persist($pointsSolde);
        }
        
        $pointsSolde->setSolde($pointsSolde->getSolde() + $points);
        $pointsSolde->setDateModification(new \DateTime());
        $this->entityManager->flush();
        
        return $pointsSolde;
    }

    public function retirerPoints(int $idUtilisateur, int $points, string $raison = ""): Pointssolde
    {
        $utilisateur = $this->utilisateurRepository->find($idUtilisateur);
        
        if (!$utilisateur) {
            throw new \Exception("Utilisateur non trouvé avec l'ID: " . $idUtilisateur);
        }
        
        $pointsSolde = $this->pointsRepository->findOneBy(["utilisateur" => $utilisateur]);
        
        if (!$pointsSolde) {
            $pointsSolde = new Pointssolde();
            $pointsSolde->setUtilisateur($utilisateur);
            $pointsSolde->setSolde(0);
            $pointsSolde->setDateCreation(new \DateTime());
            $pointsSolde->setDateModification(new \DateTime());
            $this->entityManager->persist($pointsSolde);
        }
        
        $pointsSolde->setSolde(max(0, $pointsSolde->getSolde() - $points));
        $pointsSolde->setDateModification(new \DateTime());
        $this->entityManager->flush();
        
        return $pointsSolde;
    }

    public function getSolde(int $idUtilisateur): int
    {
        $utilisateur = $this->utilisateurRepository->find($idUtilisateur);
        if (!$utilisateur) {
            return 0;
        }
        
        $pointsSolde = $this->pointsRepository->findOneBy(["utilisateur" => $utilisateur]);
        return $pointsSolde ? $pointsSolde->getSolde() : 0;
    }

    public function supprimerSolde(int $idUtilisateur): void
    {
        $utilisateur = $this->utilisateurRepository->find($idUtilisateur);
        if ($utilisateur) {
            $pointsSolde = $this->pointsRepository->findOneBy(["utilisateur" => $utilisateur]);
            if ($pointsSolde) {
                $this->entityManager->remove($pointsSolde);
                $this->entityManager->flush();
            }
        }
    }

    public function onPublicationAjoutee(int $idUtilisateur): void
    {
        $this->ajouterPoints($idUtilisateur, self::POINTS_PUBLICATION, "Nouvelle publication créée");
    }

    public function onCommentaireAjoute(int $idUtilisateur): void
    {
        $this->ajouterPoints($idUtilisateur, self::POINTS_COMMENTAIRE, "Nouveau commentaire ajouté");
    }

    public function onLikeRecu(int $idUtilisateur): void
    {
        $this->ajouterPoints($idUtilisateur, self::POINTS_LIKE_RECU, "Like reçu sur une publication");
    }

    public function onLikeDonne(int $idUtilisateur): void
    {
        $this->ajouterPoints($idUtilisateur, self::POINTS_LIKE_DONNE, "Like donné à une publication");
    }
}