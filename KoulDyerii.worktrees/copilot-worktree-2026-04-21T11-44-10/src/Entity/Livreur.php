<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreurRepository::class)]
#[ORM\Table(name: 'livreur')]
class Livreur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $nom = null;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $prenom = null;

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $telephone = null;

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: false)]
    private ?bool $disponibilite = null;

    public function getDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(?bool $disponibilite): self
    {
        $this->disponibilite = $disponibilite;
        return $this;
    }

    public function isDisponibilite(): ?bool
    {
        return $this->disponibilite;
    }

}
