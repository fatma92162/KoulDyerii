<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\Produit;

#[ORM\Entity]
class Favoris
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "favoriss")]
    #[ORM\JoinColumn(name: 'idClient', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idClient;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class, inversedBy: "favoriss")]
    #[ORM\JoinColumn(name: 'idProduit', referencedColumnName: 'idProduit', onDelete: 'CASCADE')]
    private Produit $idProduit;

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($value)
    {
        $this->idClient = $value;
    }

    public function getIdProduit()
    {
        return $this->idProduit;
    }

    public function setIdProduit($value)
    {
        $this->idProduit = $value;
    }
}