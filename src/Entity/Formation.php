<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormationRepository;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
#[ORM\Table(name: 'formation')]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
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

    #[ORM\OneToOne(mappedBy: 'formation', targetEntity: Quiz::class, cascade: ['persist', 'remove'])]
    private ?Quiz $quiz = null;

    // Getters
    public function getIdFormation(): ?int { return $this->idFormation; }
    public function getTitre(): ?string { return $this->titre; }
    public function getDescription(): ?string { return $this->description; }
    public function getPrix(): ?float { return $this->prix; }
    public function getIdVendeuse(): ?int { return $this->idVendeuse; }
    public function getStatut(): ?string { return $this->statut; }
    public function getQuiz(): ?Quiz { return $this->quiz; }

    // Setters
    public function setIdFormation(?int $idFormation): self { $this->idFormation = $idFormation; return $this; }
    public function setTitre(?string $titre): self { $this->titre = $titre; return $this; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }
    public function setPrix(?float $prix): self { $this->prix = $prix; return $this; }
    public function setIdVendeuse(?int $idVendeuse): self { $this->idVendeuse = $idVendeuse; return $this; }
    public function setStatut(?string $statut): self { $this->statut = $statut; return $this; }

    public function setQuiz(?Quiz $quiz): self
    {
        if ($quiz !== null && $quiz->getFormation() !== $this) {
            $quiz->setFormation($this);
        }

        $this->quiz = $quiz;

        return $this;
    }
}