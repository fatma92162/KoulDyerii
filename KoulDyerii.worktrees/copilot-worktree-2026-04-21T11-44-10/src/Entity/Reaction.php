<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReactionRepository;

#[ORM\Entity(repositoryClass: ReactionRepository::class)]
#[ORM\Table(name: 'reaction')]
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 20, nullable: false)]
    private ?string $type = null;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\ManyToOne(targetEntity: Post::class)]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id', nullable: true)]
    private ?Post $post = null;

    #[ORM\ManyToOne(targetEntity: Commentaire::class)]
    #[ORM\JoinColumn(name: 'commentaire_id', referencedColumnName: 'id', nullable: true)]
    private ?Commentaire $commentaire = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    // Getters et Setters...

    public function getId(): ?int { return $this->id; }
    public function getType(): ?string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(\DateTimeInterface $created_at): self { $this->created_at = $created_at; return $this; }
    public function getPost(): ?Post { return $this->post; }
    public function setPost(?Post $post): self { $this->post = $post; return $this; }
    public function getCommentaire(): ?Commentaire { return $this->commentaire; }
    public function setCommentaire(?Commentaire $commentaire): self { $this->commentaire = $commentaire; return $this; }
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): self { $this->utilisateur = $utilisateur; return $this; }
    
    // Champs pour compatibilité avec l'ancien code
    public function getPostId(): ?int { return $this->post?->getId(); }
    public function setPostId(int $postId): self { /* géré par la relation */ return $this; }
    public function getCommentaireId(): ?int { return $this->commentaire?->getId(); }
    public function setCommentaireId(int $commentaireId): self { /* géré par la relation */ return $this; }
    public function getUserId(): ?int { return $this->utilisateur?->getIdUtilisateur(); }
    public function setUserId(int $userId): self { /* géré par la relation */ return $this; }
}