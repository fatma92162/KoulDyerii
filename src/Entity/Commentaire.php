<?php
<<<<<<< HEAD
// src/Entity/Commentaire.php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
#[ORM\Table(name: 'commentaire')]
=======

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(name: 'gif_url', length: 500, nullable: true)]
    private ?string $gif_url = null;

    // Relations
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id', nullable: false)]
    private ?Post $post = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    #[ORM\JoinColumn(name: 'parent_id', referencedColumnName: 'id', nullable: true)]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private Collection $replies;

    public function __construct()
    {
        $this->replies = new ArrayCollection();
    }

    // Getters et Setters

    public function getId(): ?int
=======
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: "commentaires")]
    #[ORM\JoinColumn(name: "post_id", referencedColumnName: "id", nullable: false)]
    private Post $post;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "idUtilisateur", nullable: true)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Le commentaire ne peut pas être vide.")]
    #[Assert\Length(min: 2, max: 1000, minMessage: "Le commentaire doit faire au moins 2 caractères.", maxMessage: "Le commentaire ne peut pas dépasser 1000 caractères.")]
    private string $content;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $created_at;

    public function getId(): int
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getGifUrl(): ?string
    {
        return $this->gif_url;
    }

    public function setGifUrl(?string $gif_url): self
    {
        $this->gif_url = $gif_url;
        return $this;
    }

    public function getPost(): ?Post
=======
    public function getPost(): Post
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->post;
    }

<<<<<<< HEAD
    public function setPost(?Post $post): self
=======
    public function setPost(Post $post): self
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        $this->post = $post;
        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;
        return $this;
    }

<<<<<<< HEAD
    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    public function getReplies(): Collection
    {
        return $this->replies;
    }

    public function addReply(self $reply): self
    {
        if (!$this->replies->contains($reply)) {
            $this->replies[] = $reply;
            $reply->setParent($this);
        }
        return $this;
    }

    public function removeReply(self $reply): self
    {
        if ($this->replies->removeElement($reply)) {
            if ($reply->getParent() === $this) {
                $reply->setParent(null);
            }
        }
=======
    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
        return $this;
    }
}