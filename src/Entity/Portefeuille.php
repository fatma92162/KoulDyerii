<?php

namespace App\Entity;

<<<<<<< HEAD
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortefeuilleRepository::class)]
#[ORM\Table(name: 'portefeuille')]
class Portefeuille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idUtilisateur = null;

    public function getIdUtilisateur(): ?int
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idUtilisateur;
    }

<<<<<<< HEAD
    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    #[ORM\Column(type: 'decimal', nullable: true, precision: 10, scale: 3)]
    private ?string $solde = null;

    public function getSolde(): ?string
=======
    public function setIdUtilisateur($value)
    {
        $this->idUtilisateur = $value;
    }

    public function getSolde()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->solde;
    }

<<<<<<< HEAD
    public function setSolde(?string $solde): self
    {
        $this->solde = $solde;
        return $this;
    }

}
=======
    public function setSolde($value)
    {
        $this->solde = $value;
    }
}
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
