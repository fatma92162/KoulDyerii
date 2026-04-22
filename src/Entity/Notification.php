<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: App\Repository\NotificationRepository::class)]
#[ORM\Table(name: 'notification')]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer', name: 'user_id')]
    private int $userId;

    #[ORM\Column(type: 'integer', name: 'from_user_id', nullable: true)]
    private ?int $fromUserId = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $type;

    #[ORM\Column(type: 'text')]
    private string $message;

    #[ORM\Column(type: 'integer', name: 'post_id', nullable: true)]
    private ?int $postId = null;

    #[ORM\Column(type: 'integer', name: 'commentaire_id', nullable: true)]
    private ?int $commentaireId = null;

    #[ORM\Column(type: 'boolean', name: 'is_read', options: ['default' => false])]
    private bool $isRead = false;

    #[ORM\Column(type: 'datetime', name: 'created_at')]
    private \DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // ========== GETTERS & SETTERS ==========
    public function getId(): ?int { return $this->id; }

    public function getUserId(): int { return $this->userId; }
    public function setUserId(int $userId): self { $this->userId = $userId; return $this; }

    public function getFromUserId(): ?int { return $this->fromUserId; }
    public function setFromUserId(?int $fromUserId): self { $this->fromUserId = $fromUserId; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }

    public function getMessage(): string { return $this->message; }
    public function setMessage(string $message): self { $this->message = $message; return $this; }

    public function getPostId(): ?int { return $this->postId; }
    public function setPostId(?int $postId): self { $this->postId = $postId; return $this; }

    public function getCommentaireId(): ?int { return $this->commentaireId; }
    public function setCommentaireId(?int $commentaireId): self { $this->commentaireId = $commentaireId; return $this; }

    public function isRead(): bool { return $this->isRead; }
    public function setIsRead(bool $isRead): self { $this->isRead = $isRead; return $this; }

    public function getCreatedAt(): \DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
}