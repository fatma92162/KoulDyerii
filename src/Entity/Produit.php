<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProduitRepository;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[ORM\Table(name: 'produit')]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_produit', type: 'integer')]
    private ?int $idProduit = null;

    #[ORM\Column(name: 'nom', type: 'string', length: 100)]
    private ?string $nom = null;

    #[ORM\Column(name: 'description', type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(name: 'prix', type: 'decimal', precision: 10, scale: 2)]
    private ?float $prix = null;

    #[ORM\Column(name: 'photo', type: 'string', length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(name: 'disponible', type: 'boolean', options: ['default' => true])]
    private ?bool $disponible = true;

    #[ORM\Column(name: 'id_vendeuse', type: 'integer', nullable: true)]
    private ?int $idVendeuse = null;

    #[ORM\Column(name: 'quantite', type: 'integer', options: ['default' => 0])]
    private ?int $quantite = 0;

    #[ORM\Column(name: 'bundle_active', type: 'boolean', options: ['default' => false])]
    private ?bool $bundleActive = false;

    #[ORM\Column(name: 'bundle_type', type: 'string', length: 50, nullable: true)]
    private ?string $bundleType = null;

    #[ORM\Column(name: 'bundle_buy_qty', type: 'integer', nullable: true)]
    private ?int $bundleBuyQty = null;

    #[ORM\Column(name: 'bundle_pay_qty', type: 'integer', nullable: true)]
    private ?int $bundlePayQty = null;

    #[ORM\Column(name: 'bundle_discount_percent', type: 'integer', nullable: true)]
    private ?int $bundleDiscountPercent = null;

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

    public function getDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;
        return $this;
    }

    public function getIdVendeuse(): ?int
    {
        return $this->idVendeuse;
    }

    public function setIdVendeuse(?int $idVendeuse): self
    {
        $this->idVendeuse = $idVendeuse;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = max(0, $quantite);
        return $this;
    }

    public function getBundleActive(): ?bool
    {
        return $this->bundleActive;
    }

    public function setBundleActive(bool $bundleActive): self
    {
        $this->bundleActive = $bundleActive;
        return $this;
    }

    public function getBundleType(): ?string
    {
        return $this->bundleType;
    }

    public function setBundleType(?string $bundleType): self
    {
        $this->bundleType = $bundleType ?: null;
        return $this;
    }

    public function getBundleBuyQty(): ?int
    {
        return $this->bundleBuyQty;
    }

    public function setBundleBuyQty(?int $bundleBuyQty): self
    {
        $this->bundleBuyQty = $bundleBuyQty;
        return $this;
    }

    public function getBundlePayQty(): ?int
    {
        return $this->bundlePayQty;
    }

    public function setBundlePayQty(?int $bundlePayQty): self
    {
        $this->bundlePayQty = $bundlePayQty;
        return $this;
    }

    public function getBundleDiscountPercent(): ?int
    {
        return $this->bundleDiscountPercent;
    }

    public function setBundleDiscountPercent(?int $bundleDiscountPercent): self
    {
        $this->bundleDiscountPercent = $bundleDiscountPercent;
        return $this;
    }
}