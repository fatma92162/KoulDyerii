<?php

namespace App\Entity;

use App\Repository\CollaborationProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Demande / suivi de collaboration entre un partenaire et un produit proposé par la plateforme.
 */
#[ORM\Entity(repositoryClass: CollaborationProduitRepository::class)]
#[ORM\Table(name: 'collaboration_produit')]
#[ORM\UniqueConstraint(name: 'uniq_partenaire_produit', columns: ['partenaire_id', 'produit_id'])]
class CollaborationProduit
{
    public const STATUT_DEMANDE = 'demande';
    public const STATUT_VALIDEE = 'validee';
    public const STATUT_REFUSEE = 'refusee';
    public const STATUT_ANNULEE = 'annulee';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Partenaire::class)]
    #[ORM\JoinColumn(name: 'partenaire_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Partenaire $partenaire = null;

    #[ORM\ManyToOne(targetEntity: Produit::class)]
    #[ORM\JoinColumn(name: 'produit_id', referencedColumnName: 'id_produit', nullable: false, onDelete: 'CASCADE')]
    private ?Produit $produit = null;

    #[ORM\Column(type: 'string', length: 32, options: ['default' => 'demande'])]
    private string $statut = self::STATUT_DEMANDE;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartenaire(): ?Partenaire
    {
        return $this->partenaire;
    }

    public function setPartenaire(?Partenaire $partenaire): self
    {
        $this->partenaire = $partenaire;
        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;
        return $this;
    }

    public function getStatut(): string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}