<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use App\Repository\ProduitRepository;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[ORM\Table(name: 'produit')]
=======
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Favoris;
use App\Entity\Commande_produit;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column(name: 'id_produit', type: 'integer')]
    private ?int $idProduit = null;

    #[ORM\Column(name: 'nom', type: 'string', length: 100)]
    private ?string $nom = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'prix', type: 'decimal', precision: 10, scale: 2)]
    private ?float $prix = null;

    #[ORM\Column(name: 'photo', type: 'string', length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(name: 'disponible', type: 'boolean', options: ['default' => true])]
    private ?bool $disponible = true;

    #[ORM\Column(name: 'id_vendeuse', type: 'integer', nullable: true)]
    private ?int $idVendeuse = null;

    // Getters et Setters
    public function getIdProduit(): ?int
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idProduit;
    }

<<<<<<< HEAD
    public function getNom(): ?string
=======
    public function setIdProduit($value)
    {
        $this->idProduit = $value;
    }

    public function getNom()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->nom;
    }

<<<<<<< HEAD
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
=======
    public function setNom($value)
    {
        $this->nom = $value;
    }

    public function getDescription()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->description;
    }

<<<<<<< HEAD
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPrix(): ?float
=======
    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getPrix()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->prix;
    }

<<<<<<< HEAD
    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getDisponible(): ?bool
=======
    public function setPrix($value)
    {
        $this->prix = $value;
    }

    public function getDisponible()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->disponible;
    }

<<<<<<< HEAD
    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;
        return $this;
    }

    public function getIdVendeuse(): ?int
=======
    public function setDisponible($value)
    {
        $this->disponible = $value;
    }

    public function getIdVendeuse()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idVendeuse;
    }

<<<<<<< HEAD
    public function setIdVendeuse(?int $idVendeuse): self
    {
        $this->idVendeuse = $idVendeuse;
        return $this;
    }
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}