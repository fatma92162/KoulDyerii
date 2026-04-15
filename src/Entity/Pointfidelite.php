<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointfideliteRepository::class)]
#[ORM\Table(name: 'pointfidelite')]
class Pointfidelite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $idPoint = null;

    public function getIdPoint(): ?int
    {
        return $this->idPoint;
    }

    public function setIdPoint(?int $idPoint): self
    {
        $this->idPoint = $idPoint;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $solde = null;

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(?int $solde): self
    {
        $this->solde = $solde;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $idUtilisateur = null;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

}
