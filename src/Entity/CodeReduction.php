<?php
// src/Entity/CodeReduction.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CodeReductionRepository;

#[ORM\Entity(repositoryClass: CodeReductionRepository::class)]
#[ORM\Table(name: 'code_reduction')]
class CodeReduction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50, unique: true)]
    private ?string $code = null;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $type = null; // percentage, fixed

    #[ORM\Column(type: 'float')]
    private ?float $valeur = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $validiteDebut = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $validiteFin = null;

    #[ORM\Column(type: 'integer', options: ['default' => 1])]
    private ?int $utilisationMax = 1;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $utilisationActuelle = 0;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private ?bool $actif = true;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'utilisateur_id', referencedColumnName: 'idUtilisateur', nullable: true)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;
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

    public function getValeur(): ?float
    {
        return $this->valeur;
    }

    public function setValeur(float $valeur): self
    {
        $this->valeur = $valeur;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getValiditeDebut(): ?\DateTimeInterface
    {
        return $this->validiteDebut;
    }

    public function setValiditeDebut(\DateTimeInterface $validiteDebut): self
    {
        $this->validiteDebut = $validiteDebut;
        return $this;
    }

    public function getValiditeFin(): ?\DateTimeInterface
    {
        return $this->validiteFin;
    }

    public function setValiditeFin(\DateTimeInterface $validiteFin): self
    {
        $this->validiteFin = $validiteFin;
        return $this;
    }

    public function getUtilisationMax(): ?int
    {
        return $this->utilisationMax;
    }

    public function setUtilisationMax(int $utilisationMax): self
    {
        $this->utilisationMax = $utilisationMax;
        return $this;
    }

    public function getUtilisationActuelle(): ?int
    {
        return $this->utilisationActuelle;
    }

    public function setUtilisationActuelle(int $utilisationActuelle): self
    {
        $this->utilisationActuelle = $utilisationActuelle;
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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}