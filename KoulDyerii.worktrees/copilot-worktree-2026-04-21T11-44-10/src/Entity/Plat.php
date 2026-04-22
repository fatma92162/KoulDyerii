<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
#[ORM\Table(name: 'plat')]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
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

    #[ORM\Column(type: 'decimal', nullable: true, precision: 10, scale: 2)]
    private ?string $prix = null;

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $id_partenaire = null;

    public function getId_partenaire(): ?int
    {
        return $this->id_partenaire;
    }

    public function setId_partenaire(?int $id_partenaire): self
    {
        $this->id_partenaire = $id_partenaire;
        return $this;
    }

    public function getIdPartenaire(): ?int
    {
        return $this->id_partenaire;
    }

    public function setIdPartenaire(?int $id_partenaire): static
    {
        $this->id_partenaire = $id_partenaire;

        return $this;
    }

}
