<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InscriptionFormationRepository;

#[ORM\Entity(repositoryClass: InscriptionFormationRepository::class)]
#[ORM\Table(name: 'inscription_formation')]
class InscriptionFormation
{
    public const STATUT_EN_ATTENTE = 'en_attente';
    public const STATUT_ACCEPTEE   = 'acceptee';
    public const STATUT_REFUSEE    = 'refusee';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_inscription', type: 'integer')]
    private ?int $idInscription = null;

    #[ORM\Column(name: 'id_formation', type: 'integer')]
    private ?int $idFormation = null;

    #[ORM\Column(name: 'id_utilisateur', type: 'integer')]
    private ?int $idUtilisateur = null;

    // ✅ Corrigé : datetime_immutable pour cohérence avec le reste du projet
    #[ORM\Column(name: 'date_inscription', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $dateInscription = null;

    #[ORM\Column(name: 'statut', type: 'string', length: 50, options: ['default' => 'en_attente'])]
    private ?string $statut = self::STATUT_EN_ATTENTE;

    /**
     * ✅ Propriété transiente (non mappée Doctrine) pour charger l'Utilisateur à la volée.
     * Utilisée côté admin uniquement.
     */
    private ?Utilisateur $utilisateur = null;

    // Propriété transiente pour la formation
    private ?Formation $formation = null;

    // ---- Getters / Setters ----

    public function getIdInscription(): ?int
    {
        return $this->idInscription;
    }

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(int $idFormation): self
    {
        $this->idFormation = $idFormation;
        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    public function getDateInscription(): ?\DateTimeImmutable
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeImmutable $dateInscription): self
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function isEnAttente(): bool
    {
        return $this->statut === self::STATUT_EN_ATTENTE;
    }

    public function isAcceptee(): bool
    {
        return $this->statut === self::STATUT_ACCEPTEE;
    }

    public function isRefusee(): bool
    {
        return $this->statut === self::STATUT_REFUSEE;
    }

    // ---- Propriétés transientes ----

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;
        return $this;
    }
}