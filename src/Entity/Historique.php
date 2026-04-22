<?php

namespace App\Entity;

use App\Repository\HistoriqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueRepository::class)]
#[ORM\Table(name: 'historique')]
#[ORM\Index(name: 'idx_created_at', columns: ['created_at'])]
#[ORM\Index(name: 'idx_action', columns: ['action'])]
#[ORM\Index(name: 'idx_entity', columns: ['entity_type', 'entity_id'])]
class Historique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $action = null;     // create, update, delete, like, pin, signal, etc.

    #[ORM\Column(length: 50)]
    private ?string $entityType = null; // post, comment, user

    #[ORM\Column]
    private ?int $entityId = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $details = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: true)]
    private ?Utilisateur $user = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $ipAddress = null;

    // Getters / Setters
    public function getId(): ?int { return $this->id; }
    public function getAction(): ?string { return $this->action; }
    public function setAction(string $action): self { $this->action = $action; return $this; }
    public function getEntityType(): ?string { return $this->entityType; }
    public function setEntityType(string $entityType): self { $this->entityType = $entityType; return $this; }
    public function getEntityId(): ?int { return $this->entityId; }
    public function setEntityId(int $entityId): self { $this->entityId = $entityId; return $this; }
    public function getDetails(): ?string { return $this->details; }
    public function setDetails(?string $details): self { $this->details = $details; return $this; }
    public function getUser(): ?Utilisateur { return $this->user; }
    public function setUser(?Utilisateur $user): self { $this->user = $user; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
    public function getIpAddress(): ?string { return $this->ipAddress; }
    public function setIpAddress(?string $ipAddress): self { $this->ipAddress = $ipAddress; return $this; }
}