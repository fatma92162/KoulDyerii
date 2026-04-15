<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PlatRepository;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
#[ORM\Table(name: 'plat')]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(type: 'decimal', nullable: true, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\Column(name: 'id_partenaire', type: 'integer', nullable: true)]
    private ?int $idPartenaire = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $ingredients = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $categorie = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: 'string', nullable: true, options: ['default' => 'en_attente'])]
    private ?string $statut = 'en_attente';

    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    // Propriété virtuelle
    private $partenaire;

    // Getters et Setters
    public function getId(): ?int { return $this->id; }
    public function getNom(): ?string { return $this->nom; }
    public function setNom(?string $nom): self { $this->nom = $nom; return $this; }
    public function getPrix(): ?string { return $this->prix; }
    public function setPrix(?string $prix): self { $this->prix = $prix; return $this; }
    public function getIdPartenaire(): ?int { return $this->idPartenaire; }
    public function setIdPartenaire(?int $idPartenaire): self { $this->idPartenaire = $idPartenaire; return $this; }
    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): self { $this->description = $description; return $this; }
    public function getIngredients(): ?string { return $this->ingredients; }
    public function setIngredients(?string $ingredients): self { $this->ingredients = $ingredients; return $this; }
    public function getCategorie(): ?string { return $this->categorie; }
    public function setCategorie(?string $categorie): self { $this->categorie = $categorie; return $this; }
    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): self { $this->image = $image; return $this; }
    public function getStatut(): ?string { return $this->statut; }
    public function setStatut(?string $statut): self { $this->statut = $statut; return $this; }
    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
    public function setDateCreation(?\DateTimeInterface $dateCreation): self { $this->dateCreation = $dateCreation; return $this; }
    public function getPartenaire() { return $this->partenaire; }
    public function setPartenaire($partenaire): self { $this->partenaire = $partenaire; return $this; }
}