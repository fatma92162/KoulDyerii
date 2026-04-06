<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "posts")]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE', nullable: true)]
    private ?Utilisateur $user_id = null;

    #[ORM\Column(type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le titre est obligatoire.")]
    #[Assert\Length(min: 3, max: 255, minMessage: "Le titre doit faire au moins 3 caractères.", maxMessage: "Le titre ne peut pas dépasser 255 caractères.")]
    private string $title;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank(message: "Le contenu est obligatoire.")]
    #[Assert\Length(min: 10, minMessage: "Le contenu doit faire au moins 10 caractères.")]
    private string $content;

    #[ORM\Column(type: "string", length: 500, nullable: true)]
    private ?string $image_path = null;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $created_at;

    #[ORM\OneToMany(mappedBy: "post", targetEntity: Commentaire::class, orphanRemoval: true)]
    #[ORM\OrderBy(["created_at" => "DESC"])]  // Tri des commentaires du plus récent au plus ancien
    private Collection $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser_id(): ?Utilisateur
    {
        return $this->user_id;
    }

    public function setUser_id(?Utilisateur $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
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

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(?string $image_path): self
    {
        $this->image_path = $image_path;
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

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setPost($this);
        }
        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            if ($commentaire->getPost() === $this) {
                $commentaire->setPost(null);
            }
        }
        return $this;
    }
}