<?php
// src/Entity/Abonnement.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AbonnementRepository;

#[ORM\Entity(repositoryClass: AbonnementRepository::class)]
#[ORM\Table(name: 'abonnement')]
class Abonnement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'utilisateur_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: 'string', length: 50)]
    private ?string $stripeSubscriptionId = null;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $plan = null;

    #[ORM\Column(type: 'integer')]
    private ?int $reduction = null;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $status = 'active';

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $endDate = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // Getters et setters
    public function getId(): ?int { return $this->id; }
    
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): self { $this->utilisateur = $utilisateur; return $this; }
    
    public function getStripeSubscriptionId(): ?string { return $this->stripeSubscriptionId; }
    public function setStripeSubscriptionId(string $stripeSubscriptionId): self { $this->stripeSubscriptionId = $stripeSubscriptionId; return $this; }
    
    public function getPlan(): ?string { return $this->plan; }
    public function setPlan(string $plan): self { $this->plan = $plan; return $this; }
    
    public function getReduction(): ?int { return $this->reduction; }
    public function setReduction(int $reduction): self { $this->reduction = $reduction; return $this; }
    
    public function getStatus(): ?string { return $this->status; }
    public function setStatus(string $status): self { $this->status = $status; return $this; }
    
    public function getStartDate(): ?\DateTimeInterface { return $this->startDate; }
    public function setStartDate(\DateTimeInterface $startDate): self { $this->startDate = $startDate; return $this; }
    
    public function getEndDate(): ?\DateTimeInterface { return $this->endDate; }
    public function setEndDate(\DateTimeInterface $endDate): self { $this->endDate = $endDate; return $this; }
    
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
    
    public function isActive(): bool
    {
        return $this->status === 'active' && $this->endDate > new \DateTime();
    }
}