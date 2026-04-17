<?php

namespace App\Entity;

<<<<<<< HEAD
use App\Repository\PointssoldeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointssoldeRepository::class)]
#[ORM\Table(name: 'pointssolde')]
=======
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Pointssolde
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
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
=======
    #[ORM\Column(name: "idPoints", type: "integer")]
    private int $idPoints;

    #[ORM\Column(type: "integer")]
    private int $solde;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "pointssoldes")]
    #[ORM\JoinColumn(name: 'idUtilisateur', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idUtilisateur;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $dateCreation;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $dateModification;

    public function getIdPoints()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idPoints;
    }

<<<<<<< HEAD
    public function getSolde(): ?int
=======
    public function setIdPoints($value)
    {
        $this->idPoints = $value;
    }

    public function getSolde()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->solde;
    }

<<<<<<< HEAD
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
=======
    public function setSolde($value)
    {
        $this->solde = $value;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($value)
    {
        $this->idUtilisateur = $value;
    }

    public function getDateCreation()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->dateCreation;
    }

<<<<<<< HEAD
    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
=======
    public function setDateCreation($value)
    {
        $this->dateCreation = $value;
    }

    public function getDateModification()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->dateModification;
    }

<<<<<<< HEAD
    public function setDateModification(?\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;
        return $this;
=======
    public function setDateModification($value)
    {
        $this->dateModification = $value;
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    }
}