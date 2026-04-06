<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Commande_produit;
use App\Entity\Livraison;

#[ORM\Entity]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idCommande", type: "integer")]
    private int $idCommande;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $dateCommande;

    #[ORM\Column(type: "string", length: 50)]
    private string $statut;

    #[ORM\Column(type: "float")]
    private float $total;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "commandes")]
    #[ORM\JoinColumn(name: 'idClient', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idClient;

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setIdCommande($value)
    {
        $this->idCommande = $value;
    }

    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    public function setDateCommande($value)
    {
        $this->dateCommande = $value;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($value)
    {
        $this->statut = $value;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($value)
    {
        $this->total = $value;
    }

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($value)
    {
        $this->idClient = $value;
    }

    #[ORM\OneToMany(mappedBy: "idCommande", targetEntity: Livraison::class)]
    private Collection $livraisons;

    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): self
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons[] = $livraison;
            $livraison->setIdCommande($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraisons->removeElement($livraison)) {
            if ($livraison->getIdCommande() === $this) {
                $livraison->setIdCommande(null);
            }
        }

        return $this;
    }

    #[ORM\OneToMany(mappedBy: "idCommande", targetEntity: Commande_produit::class)]
    private Collection $commande_produits;
}