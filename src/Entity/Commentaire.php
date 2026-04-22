<?php
// src/Entity/Commentaire.php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
#[ORM\Table(name: 'commentaire')]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(name: 'gif_url', length: 500, nullable: true)]
    private ?string $gif_url = null;

    // NOUVEAU : champ pour l'audio
    #[ORM\Column(name: 'audio_path', length: 500, nullable: true)]
    private ?string $audio_path = null;

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
    {
        return $this->id;
    }

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

    // Nouveau getter/setter pour l'audio
    public function getAudioPath(): ?string
    {
        return $this->audio_path;
    }

    public function setAudioPath(?string $audio_path): self
    {
        $this->audio_path = $audio_path;
        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
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
        return $this;
    }
}