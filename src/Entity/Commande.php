<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
#[ORM\Table(name: 'commands')]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id', type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'product_id', type: 'integer', nullable: false)]
    private ?int $productId = null;

    #[ORM\Column(name: 'id_utilisateur', type: 'integer', nullable: true)]
    private ?int $idUtilisateur = null;

    #[ORM\Column(name: 'customer_name', type: 'string', length: 100, nullable: false)]
    private ?string $customerName = null;

    #[ORM\Column(name: 'phone', type: 'string', length: 20, nullable: false)]
    private ?string $phone = null;

    #[ORM\Column(name: 'location', type: 'string', length: 200, nullable: false)]
    private ?string $location = null;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name: 'status', type: 'string', length: 50, nullable: false)]
    private ?string $status = 'en_attente';

    #[ORM\Column(name: 'quantite', type: 'integer', options: ['default' => 1])]
    private ?int $quantite = 1;

    #[ORM\Column(name: 'total', type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $total = null;

    #[ORM\Column(name: 'cart_items', type: 'json', nullable: true)]
    private ?array $cartItems = null;

    #[ORM\Column(name: 'fdg_status', type: 'string', length: 50, nullable: true)]
    private ?string $fdgStatus = null;

    #[ORM\Column(name: 'fdg_barcode', type: 'string', length: 255, nullable: true)]
    private ?string $fdgBarcode = null;

    #[ORM\Column(name: 'fdg_print_link', type: 'text', nullable: true)]
    private ?string $fdgPrintLink = null;

    #[ORM\Column(name: 'fdg_sent_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $fdgSentAt = null;

    private ?array $cartSummary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    public function setCustomerName(?string $customerName): self
    {
        $this->customerName = $customerName;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total !== null ? (float) $this->total : null;
    }

    public function setTotal(null|float|int|string $total): self
    {
        $this->total = $total !== null ? (string) $total : null;
        return $this;
    }

    public function getCartItems(): ?array
    {
        return $this->cartItems;
    }

    public function setCartItems(?array $cartItems): self
    {
        $this->cartItems = $cartItems;
        return $this;
    }

    public function getFdgStatus(): ?string
    {
        return $this->fdgStatus;
    }

    public function setFdgStatus(?string $fdgStatus): self
    {
        $this->fdgStatus = $fdgStatus;
        return $this;
    }

    public function getFdgBarcode(): ?string
    {
        return $this->fdgBarcode;
    }

    public function setFdgBarcode(?string $fdgBarcode): self
    {
        $this->fdgBarcode = $fdgBarcode;
        return $this;
    }

    public function getFdgPrintLink(): ?string
    {
        return $this->fdgPrintLink;
    }

    public function setFdgPrintLink(?string $fdgPrintLink): self
    {
        $this->fdgPrintLink = $fdgPrintLink;
        return $this;
    }

    public function getFdgSentAt(): ?\DateTimeInterface
    {
        return $this->fdgSentAt;
    }

    public function setFdgSentAt(?\DateTimeInterface $fdgSentAt): self
    {
        $this->fdgSentAt = $fdgSentAt;
        return $this;
    }

    public function getCartSummary(): ?array
    {
        return $this->cartSummary;
    }

    public function setCartSummary(?array $cartSummary): self
    {
        $this->cartSummary = $cartSummary;
        return $this;
    }
}