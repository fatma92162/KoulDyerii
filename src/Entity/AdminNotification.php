<?php
// src/Entity/AdminNotification.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]  // ← plus de repositoryClass
class AdminNotification
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private string $type; // 'post_new', 'content_reported', 'important_comment'

    #[ORM\Column(type: 'text')]
    private string $message;

    #[ORM\Column]
    private bool $isRead = false;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(nullable: true)]
    private ?int $entityId = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $entityType = null;

    // Getters et setters...
    public function getId(): ?int { return $this->id; }
    public function getType(): string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }
    public function getMessage(): string { return $this->message; }
    public function setMessage(string $message): self { $this->message = $message; return $this; }
    public function isRead(): bool { return $this->isRead; }
    public function setIsRead(bool $isRead): self { $this->isRead = $isRead; return $this; }
    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
    public function getEntityId(): ?int { return $this->entityId; }
    public function setEntityId(?int $entityId): self { $this->entityId = $entityId; return $this; }
    public function getEntityType(): ?string { return $this->entityType; }
    public function setEntityType(?string $entityType): self { $this->entityType = $entityType; return $this; }
}