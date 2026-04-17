<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
#[ORM\Table(name: 'livraison')]
=======
use App\Entity\Commande;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column(type: 'integer')]
    private ?int $idLivraison = null;

    public function getIdLivraison(): ?int
=======
    #[ORM\Column(name: "idLivraison", type: "integer")]
    private int $idLivraison;

    #[ORM\Column(type: "string", length: 255)]
    private string $adresse;

    #[ORM\Column(type: "string", length: 50)]
    private string $statutLivraison;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: "livraisons")]
    #[ORM\JoinColumn(name: 'idCommande', referencedColumnName: 'idCommande', onDelete: 'CASCADE')]
    private Commande $idCommande;

    public function getIdLivraison()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idLivraison;
    }

<<<<<<< HEAD
    public function setIdLivraison(?int $idLivraison): self
    {
        $this->idLivraison = $idLivraison;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $adresse = null;

    public function getAdresse(): ?string
=======
    public function setIdLivraison($value)
    {
        $this->idLivraison = $value;
    }

    public function getAdresse()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->adresse;
    }

<<<<<<< HEAD
    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $statutLivraison = null;

    public function getStatutLivraison(): ?string
=======
    public function setAdresse($value)
    {
        $this->adresse = $value;
    }

    public function getStatutLivraison()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->statutLivraison;
    }

<<<<<<< HEAD
    public function setStatutLivraison(?string $statutLivraison): self
    {
        $this->statutLivraison = $statutLivraison;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $idCommande = null;

    public function getIdCommande(): ?int
=======
    public function setStatutLivraison($value)
    {
        $this->statutLivraison = $value;
    }

    public function getIdCommande()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idCommande;
    }

<<<<<<< HEAD
    public function setIdCommande(?int $idCommande): self
    {
        $this->idCommande = $idCommande;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $idLivreur = null;

    public function getIdLivreur(): ?int
    {
        return $this->idLivreur;
    }

    public function setIdLivreur(?int $idLivreur): self
    {
        $this->idLivreur = $idLivreur;
        return $this;
    }

}
=======
    public function setIdCommande($value)
    {
        $this->idCommande = $value;
    }
}
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
