<?php

namespace App\Entity;

use App\Repository\AbandonedCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbandonedCommandeRepository::class)]
#[ORM\Table(name: 'abandoned_commands')]
class AbandonedCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'product_id', type: 'integer', nullable: true)]
    private ?int $productId = null;

    #[ORM\Column(name: 'cart_data', type: 'json', nullable: true)]
    private ?array $cartData = null;

    #[ORM\Column(name: 'customer_name', type: 'string', length: 255, nullable: true)]
    private ?string $customerName = null;

    #[ORM\Column(name: 'phone', type: 'string', length: 50, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(name: 'location', type: 'string', length: 255, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(name: 'source', type: 'string', length: 50)]
    private ?string $source = 'panier';

    #[ORM\Column(name: 'status', type: 'string', length: 50)]
    private ?string $status = 'draft';

    #[ORM\Column(name: 'converted_to_commande_id', type: 'integer', nullable: true)]
    private ?int $convertedToCommandeId = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(name: 'updated_at', type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

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

    public function getCartData(): ?array
    {
        return $this->cartData;
    }

    public function setCartData(?array $cartData): self
    {
        $this->cartData = $cartData;
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

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getConvertedToCommandeId(): ?int
    {
        return $this->convertedToCommandeId;
    }

    public function setConvertedToCommandeId(?int $convertedToCommandeId): self
    {
        $this->convertedToCommandeId = $convertedToCommandeId;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}