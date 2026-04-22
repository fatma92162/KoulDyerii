<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PlatRepository;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
#[ORM\Table(name: 'plat')]
class Plat
{
    /** Valeurs équivalentes « pending / approved / rejected » côté métier. */
    public const STATUT_PENDING = 'en_attente';
    public const STATUT_APPROVED = 'accepte';
    public const STATUT_REJECTED = 'refuse';

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

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'propose_par_id', referencedColumnName: 'idUtilisateur', nullable: true, onDelete: 'SET NULL')]
    private ?Utilisateur $proposePar = null;

    #[ORM\Column(name: 'reject_comment', type: 'text', nullable: true)]
    private ?string $rejectComment = null;

    #[ORM\Column(name: 'date_creation', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    // ✅ Nouveau : compteur de ventes (best-seller tracking)
    #[ORM\Column(name: 'sales_count', type: 'integer', options: ['default' => 0])]
    private int $salesCount = 0;

    // ✅ Nouveau : flag best-seller (activé quand salesCount >= 10)
    #[ORM\Column(name: 'is_best_seller', type: 'boolean', options: ['default' => false])]
    private bool $isBestSeller = false;

    // Propriété virtuelle (non mappée)
    private $partenaire;

    // ─── Getters & Setters existants (inchangés) ─────────────────────────────

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

    // ─── Nouveaux Getters & Setters (best-seller) ────────────────────────────

    public function getSalesCount(): int { return $this->salesCount; }
    public function setSalesCount(int $salesCount): self { $this->salesCount = max(0, $salesCount); return $this; }

    /**
     * Incrémente le compteur de ventes et met à jour le flag best-seller.
     */
    public function incrementSalesCount(): self
    {
        return $this->addSoldUnits(1);
    }

    /**
     * Ajoute des unités vendues (ex. quantité commandée) et met à jour le flag best-seller.
     */
    public function addSoldUnits(int $quantity): self
    {
        $q = max(0, $quantity);
        $this->salesCount += $q;
        if ($this->salesCount >= 10) {
            $this->isBestSeller = true;
        }
        return $this;
    }

    public function getIsBestSeller(): bool { return $this->isBestSeller; }
    public function setIsBestSeller(bool $isBestSeller): self { $this->isBestSeller = $isBestSeller; return $this; }

    public function getProposePar(): ?Utilisateur
    {
        return $this->proposePar;
    }

    public function setProposePar(?Utilisateur $proposePar): self
    {
        $this->proposePar = $proposePar;
        return $this;
    }

    public function getRejectComment(): ?string
    {
        return $this->rejectComment;
    }

    public function setRejectComment(?string $rejectComment): self
    {
        $this->rejectComment = $rejectComment;
        return $this;
    }
}