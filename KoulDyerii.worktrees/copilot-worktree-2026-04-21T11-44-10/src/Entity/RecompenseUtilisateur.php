<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecompenseUtilisateurRepository;

#[ORM\Entity(repositoryClass: RecompenseUtilisateurRepository::class)]
#[ORM\Table(name: 'recompense_utilisateur')]
class RecompenseUtilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: Recompense::class)]
    #[ORM\JoinColumn(name: 'id_recompense', referencedColumnName: 'id_recompense', nullable: false)]
    private ?Recompense $recompense = null;

    #[ORM\Column(name: 'date_obtention', type: 'datetime')]
    private ?\DateTimeInterface $dateObtention = null;

    #[ORM\Column(name: 'utilise', type: 'boolean', options: ['default' => false])]
    private ?bool $utilise = false;

    #[ORM\Column(name: 'date_utilisation', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateUtilisation = null;

    #[ORM\Column(name: 'code', type: 'string', length: 50, nullable: true)]
    private ?string $code = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRecompense(): ?Recompense
    {
        return $this->recompense;
    }

    public function setRecompense(?Recompense $recompense): self
    {
        $this->recompense = $recompense;
        return $this;
    }

    public function getDateObtention(): ?\DateTimeInterface
    {
        return $this->dateObtention;
    }

    public function setDateObtention(\DateTimeInterface $dateObtention): self
    {
        $this->dateObtention = $dateObtention;
        return $this;
    }

    public function isUtilise(): ?bool
    {
        return $this->utilise;
    }

    public function setUtilise(bool $utilise): self
    {
        $this->utilise = $utilise;
        return $this;
    }

    public function getDateUtilisation(): ?\DateTimeInterface
    {
        return $this->dateUtilisation;
    }

    public function setDateUtilisation(?\DateTimeInterface $dateUtilisation): self
    {
        $this->dateUtilisation = $dateUtilisation;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;
        return $this;
    }
}