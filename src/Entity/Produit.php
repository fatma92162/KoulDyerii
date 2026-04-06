<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Favoris;
use App\Entity\Commande_produit;

#[ORM\Entity]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idProduit", type: "integer")]
    private int $idProduit;

    #[ORM\Column(type: "string", length: 100)]
    private string $nom;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "float")]
    private float $prix;

    #[ORM\Column(type: "boolean")]
    private bool $disponible;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "produits")]
    #[ORM\JoinColumn(name: 'idVendeuse', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idVendeuse;

    public function getIdProduit()
    {
        return $this->idProduit;
    }

    public function setIdProduit($value)
    {
        $this->idProduit = $value;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($value)
    {
        $this->nom = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($value)
    {
        $this->prix = $value;
    }

    public function getDisponible()
    {
        return $this->disponible;
    }

    public function setDisponible($value)
    {
        $this->disponible = $value;
    }

    public function getIdVendeuse()
    {
        return $this->idVendeuse;
    }

    public function setIdVendeuse($value)
    {
        $this->idVendeuse = $value;
    }

    #[ORM\OneToMany(mappedBy: "idProduit", targetEntity: Commande_produit::class)]
    private Collection $commande_produits;

    public function getCommande_produits(): Collection
    {
        return $this->commande_produits;
    }

    public function addCommande_produit(Commande_produit $commande_produit): self
    {
        if (!$this->commande_produits->contains($commande_produit)) {
            $this->commande_produits[] = $commande_produit;
            $commande_produit->setIdProduit($this);
        }

        return $this;
    }

    public function removeCommande_produit(Commande_produit $commande_produit): self
    {
        if ($this->commande_produits->removeElement($commande_produit)) {
            if ($commande_produit->getIdProduit() === $this) {
                $commande_produit->setIdProduit(null);
            }
        }

        return $this;
    }

    #[ORM\OneToMany(mappedBy: "idProduit", targetEntity: Favoris::class)]
    private Collection $favoriss;
}