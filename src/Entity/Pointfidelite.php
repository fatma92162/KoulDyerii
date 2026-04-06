<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;

#[ORM\Entity]
class Pointfidelite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idPoint", type: "integer")]
    private int $idPoint;

    #[ORM\Column(type: "integer")]
    private int $solde;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "pointfidelites")]
    #[ORM\JoinColumn(name: 'idUtilisateur', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idUtilisateur;

    public function getIdPoint()
    {
        return $this->idPoint;
    }

    public function setIdPoint($value)
    {
        $this->idPoint = $value;
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
}