<?php

namespace App\Entity;

use App\Repository\PointssoldeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointssoldeRepository::class)]
#[ORM\Table(name: 'pointssolde')]
class Pointssolde
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_points', type: 'integer')]
    private ?int $idPoints = null;

    #[ORM\Column(name: 'solde', type: 'integer', nullable: false, options: ['default' => 0])]
    private ?int $solde = 0;

    #[ORM\OneToOne(targetEntity: Utilisateur::class, inversedBy: 'pointsSolde')]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'idUtilisateur', nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(name: 'date_modification', type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $dateModification = null;

    public function getIdPoints(): ?int
    {
        return $this->idPoints;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(?int $solde): self
    {
        $this->solde = $solde;
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(?\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;
        return $this;
    }
}