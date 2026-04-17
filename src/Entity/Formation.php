<?php

namespace App\Entity;

<<<<<<< HEAD
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormationRepository;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
#[ORM\Table(name: 'formation')]
=======
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Inscription_formation;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column(name: 'id_formation', type: 'integer')]
    private ?int $idFormation = null;

    #[ORM\Column(name: 'titre', type: 'string', length: 200, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'prix', type: 'float', nullable: true)]
    private ?float $prix = null;

    #[ORM\Column(name: 'id_vendeuse', type: 'integer', nullable: true)]
    private ?int $idVendeuse = null;

    #[ORM\Column(name: 'statut', type: 'string', length: 50, nullable: true)]
    private ?string $statut = null;

    // Getters
    public function getIdFormation(): ?int { return $this->idFormation; }
    public function getTitre(): ?string { return $this->titre; }
    public function getDescription(): ?string { return $this->description; }
    public function getPrix(): ?float { return $this->prix; }
    public function getIdVendeuse(): ?int { return $this->idVendeuse; }
    public function getStatut(): ?string { return $this->statut; }

    // Setters
    public function setIdFormation(?int $idFormation): self { $this->idFormation = $idFormation; return $this; }
    public function setTitre(?string $titre): self { $this->titre = $titre; return $this; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }
    public function setPrix(?float $prix): self { $this->prix = $prix; return $this; }
    public function setIdVendeuse(?int $idVendeuse): self { $this->idVendeuse = $idVendeuse; return $this; }
    public function setStatut(?string $statut): self { $this->statut = $statut; return $this; }
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}