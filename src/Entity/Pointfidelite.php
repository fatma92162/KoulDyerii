<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD

#[ORM\Entity(repositoryClass: PointfideliteRepository::class)]
#[ORM\Table(name: 'pointfidelite')]
=======
use App\Entity\Utilisateur;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Pointfidelite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column(type: 'integer')]
    private ?int $idPoint = null;

    public function getIdPoint(): ?int
=======
    #[ORM\Column(name: "idPoint", type: "integer")]
    private int $idPoint;

    #[ORM\Column(type: "integer")]
    private int $solde;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "pointfidelites")]
    #[ORM\JoinColumn(name: 'idUtilisateur', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idUtilisateur;

    public function getIdPoint()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idPoint;
    }

<<<<<<< HEAD
    public function setIdPoint(?int $idPoint): self
    {
        $this->idPoint = $idPoint;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $solde = null;

    public function getSolde(): ?int
=======
    public function setIdPoint($value)
    {
        $this->idPoint = $value;
    }

    public function getSolde()
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->solde;
    }

<<<<<<< HEAD
    public function setSolde(?int $solde): self
    {
        $this->solde = $solde;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $idUtilisateur = null;

    public function getIdUtilisateur(): ?int
=======
    public function setSolde($value)
    {
        $this->solde = $value;
    }

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

}
=======
    public function setIdUtilisateur($value)
    {
        $this->idUtilisateur = $value;
    }
}
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
