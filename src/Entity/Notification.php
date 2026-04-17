<?php
<<<<<<< HEAD
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: App\Repository\NotificationRepository::class)]
#[ORM\Table(name: 'notification')]
=======

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\Post;
use App\Entity\Commentaire;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
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
=======
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $user_id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "notificationsFrom")]
    #[ORM\JoinColumn(name: 'from_user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $from_user_id;

    #[ORM\Column(type: "string", length: 50)]
    private string $type;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Post $post_id;

    #[ORM\ManyToOne(targetEntity: Commentaire::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'commentaire_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Commentaire $commentaire_id;

    #[ORM\Column(type: "string", length: 255)]
    private string $message;

    #[ORM\Column(type: "boolean")]
    private bool $is_read;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    public function getFrom_user_id()
    {
        return $this->from_user_id;
    }

    public function setFrom_user_id($value)
    {
        $this->from_user_id = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function setPost_id($value)
    {
        $this->post_id = $value;
    }

    public function getCommentaire_id()
    {
        return $this->commentaire_id;
    }

    public function setCommentaire_id($value)
    {
        $this->commentaire_id = $value;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($value)
    {
        $this->message = $value;
    }

    public function getIs_read()
    {
        return $this->is_read;
    }

    public function setIs_read($value)
    {
        $this->is_read = $value;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($value)
    {
        $this->created_at = $value;
    }
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}