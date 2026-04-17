<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
use App\Repository\ReactionRepository;

#[ORM\Entity(repositoryClass: ReactionRepository::class)]
#[ORM\Table(name: 'reaction')]
=======
use App\Entity\Utilisateur;
use App\Entity\Commentaire;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
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
=======
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Commentaire::class, inversedBy: "reactions")]
    #[ORM\JoinColumn(name: 'commentaire_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Commentaire $commentaire_id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "reactions")]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $user_id;

    #[ORM\Column(type: "string", length: 10)]
    private string $type;

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

    public function getCommentaire_id()
    {
        return $this->commentaire_id;
    }

    public function setCommentaire_id($value)
    {
        $this->commentaire_id = $value;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value)
    {
        $this->type = $value;
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