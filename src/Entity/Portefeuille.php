<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;

#[ORM\Entity]
class Portefeuille
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "portefeuilles")]
    #[ORM\JoinColumn(name: 'idUtilisateur', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idUtilisateur;

    #[ORM\Column(type: "float")]
    private float $solde;

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($value)
    {
        $this->idUtilisateur = $value;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($value)
    {
        $this->solde = $value;
    }
}