<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BannissementRepository;

#[ORM\Entity(repositoryClass: BannissementRepository::class)]
#[ORM\Table(name: 'bannissement')]
class Bannissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'id')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', name: 'idUtilisateur', nullable: false)]
    private ?int $idUtilisateur = null;

    #[ORM\Column(type: 'datetime', name: 'dateDebut', nullable: true)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: 'datetime', name: 'dateFin', nullable: true)]
    private ?\DateTimeInterface $dateFin = null;

    #[ORM\Column(type: 'string', name: 'raison', nullable: true)]
    private ?string $raison = null;

    #[ORM\Column(type: 'boolean', name: 'estPermanent', nullable: true)]
    private ?bool $estPermanent = null;

    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;
        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(?string $raison): self
    {
        $this->raison = $raison;
        return $this;
    }

    public function isEstPermanent(): ?bool
    {
        return $this->estPermanent;
    }

    public function setEstPermanent(?bool $estPermanent): self
    {
        $this->estPermanent = $estPermanent;
        return $this;
    }
}