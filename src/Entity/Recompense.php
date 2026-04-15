<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecompenseRepository;

#[ORM\Entity(repositoryClass: RecompenseRepository::class)]
#[ORM\Table(name: 'recompense')]
class Recompense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_recompense', type: 'integer')]
    private ?int $idRecompense = null;

    #[ORM\Column(name: 'nom', type: 'string', length: 100)]
    private ?string $nom = null;

    #[ORM\Column(name: 'description', type: 'text')]
    private ?string $description = null;

    #[ORM\Column(name: 'points_requis', type: 'integer')]
    private ?int $pointsRequis = null;

    #[ORM\Column(name: 'type', type: 'string', length: 50)]
    private ?string $type = null; // 'reduction', 'livraison_gratuite', 'article_gratuit', 'cadeau'

    #[ORM\Column(name: 'valeur', type: 'string', length: 100, nullable: true)]
    private ?string $valeur = null; // Montant ou description du cadeau

    #[ORM\Column(name: 'icone', type: 'string', length: 50, nullable: true)]
    private ?string $icone = null;

    #[ORM\Column(name: 'actif', type: 'boolean', options: ['default' => true])]
    private ?bool $actif = true;

    #[ORM\Column(name: 'ordre_affichage', type: 'integer', nullable: true)]
    private ?int $ordreAffichage = null;

    public function getIdRecompense(): ?int
    {
        return $this->idRecompense;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPointsRequis(): ?int
    {
        return $this->pointsRequis;
    }

    public function setPointsRequis(int $pointsRequis): self
    {
        $this->pointsRequis = $pointsRequis;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(?string $valeur): self
    {
        $this->valeur = $valeur;
        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(?string $icone): self
    {
        $this->icone = $icone;
        return $this;
    }

    public function isActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;
        return $this;
    }

    public function getOrdreAffichage(): ?int
    {
        return $this->ordreAffichage;
    }

    public function setOrdreAffichage(?int $ordreAffichage): self
    {
        $this->ordreAffichage = $ordreAffichage;
        return $this;
    }
}