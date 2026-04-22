<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'commande_produit')]
class Commande_produit
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Commande::class)]
    #[ORM\JoinColumn(name: 'idCommande', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Commande $idCommande = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Produit::class)]
    #[ORM\JoinColumn(name: 'idProduit', referencedColumnName: 'id_produit', nullable: false, onDelete: 'CASCADE')]
    private ?Produit $idProduit = null;

    #[ORM\Column(type: 'integer')]
    private ?int $quantite = null;

    public function getIdCommande(): ?Commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?Commande $commande): self
    {
        $this->idCommande = $commande;
        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produit $produit): self
    {
        $this->idProduit = $produit;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;
        return $this;
    }
}