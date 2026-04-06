<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
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
    {
        return $this->id;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): self
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
        return $this;
    }
}