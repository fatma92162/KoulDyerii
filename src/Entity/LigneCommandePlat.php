<?php

namespace App\Entity;

use App\Repository\LigneCommandePlatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne de commande pour un plat (quantités vendues, lien vers Commande).
 */
#[ORM\Entity(repositoryClass: LigneCommandePlatRepository::class)]
#[ORM\Table(name: 'ligne_commande_plat')]
class LigneCommandePlat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Commande::class, inversedBy: 'lignesPlat')]
    #[ORM\JoinColumn(name: 'commande_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Commande $commande = null;

    #[ORM\ManyToOne(targetEntity: Plat::class)]
    #[ORM\JoinColumn(name: 'plat_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Plat $plat = null;

    #[ORM\Column(type: 'integer', options: ['default' => 1])]
    private int $quantite = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;
        return $this;
    }

    public function getPlat(): ?Plat
    {
        return $this->plat;
    }

    public function setPlat(?Plat $plat): self
    {
        $this->plat = $plat;
        return $this;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = max(1, $quantite);
        return $this;
    }
}
