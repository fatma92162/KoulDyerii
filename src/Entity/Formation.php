<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
#[ORM\Table(name: 'formation')]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idFormation = null;

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(?int $idFormation): self
    {
        $this->idFormation = $idFormation;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $titre = null;

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $prix = null;

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $idVendeuse = null;

    public function getIdVendeuse(): ?int
    {
        return $this->idVendeuse;
    }

    public function setIdVendeuse(?int $idVendeuse): self
    {
        $this->idVendeuse = $idVendeuse;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $statut = null;

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

}
