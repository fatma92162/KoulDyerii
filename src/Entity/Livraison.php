<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Commande;

#[ORM\Entity]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
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
    {
        return $this->idLivraison;
    }

    public function setIdLivraison($value)
    {
        $this->idLivraison = $value;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($value)
    {
        $this->adresse = $value;
    }

    public function getStatutLivraison()
    {
        return $this->statutLivraison;
    }

    public function setStatutLivraison($value)
    {
        $this->statutLivraison = $value;
    }

    public function getIdCommande()
    {
        return $this->idCommande;
    }

    public function setIdCommande($value)
    {
        $this->idCommande = $value;
    }
}