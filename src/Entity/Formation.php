<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Inscription_formation;

#[ORM\Entity]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idFormation", type: "integer")]
    private int $idFormation;

    #[ORM\Column(type: "string", length: 100)]
    private string $titre;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "float")]
    private float $prix;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "formations")]
    #[ORM\JoinColumn(name: 'idVendeuse', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idVendeuse;

    public function getIdFormation()
    {
        return $this->idFormation;
    }

    public function setIdFormation($value)
    {
        $this->idFormation = $value;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($value)
    {
        $this->titre = $value;
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

    public function getIdVendeuse()
    {
        return $this->idVendeuse;
    }

    public function setIdVendeuse($value)
    {
        $this->idVendeuse = $value;
    }

    #[ORM\OneToMany(mappedBy: "idFormation", targetEntity: Inscription_formation::class)]
    private Collection $inscription_formations;

    public function getInscription_formations(): Collection
    {
        return $this->inscription_formations;
    }

    public function addInscription_formation(Inscription_formation $inscription_formation): self
    {
        if (!$this->inscription_formations->contains($inscription_formation)) {
            $this->inscription_formations[] = $inscription_formation;
            $inscription_formation->setIdFormation($this);
        }

        return $this;
    }

    public function removeInscription_formation(Inscription_formation $inscription_formation): self
    {
        if ($this->inscription_formations->removeElement($inscription_formation)) {
            if ($inscription_formation->getIdFormation() === $this) {
                $inscription_formation->setIdFormation(null);
            }
        }

        return $this;
    }
}