<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;

#[ORM\Entity]
class Pointssolde
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
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
    {
        return $this->idPoints;
    }

    public function setIdPoints($value)
    {
        $this->idPoints = $value;
    }

    public function getSolde()
    {
        return $this->solde;
    }

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
    {
        return $this->dateCreation;
    }

    public function setDateCreation($value)
    {
        $this->dateCreation = $value;
    }

    public function getDateModification()
    {
        return $this->dateModification;
    }

    public function setDateModification($value)
    {
        $this->dateModification = $value;
    }
}