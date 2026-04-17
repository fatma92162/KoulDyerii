<?php
<<<<<<< HEAD
// src/Entity/Post.php
=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
<<<<<<< HEAD
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\Table(name: 'post')]
=======
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
<<<<<<< HEAD
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $title = null;

    #[ORM\Column(type: 'text', nullable: false)]
    private ?string $content = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image_path = null;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: 'boolean', nullable: true, options: ['default' => false])]
    private ?bool $is_pinned = false;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    private ?string $gif_url = null;

    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $signalement_count = 0;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'post', cascade: ['remove'])]
    private Collection $commentaires;

    #[ORM\ManyToMany(targetEntity: Hashtag::class, inversedBy: 'posts', cascade: ['persist'])]
    #[ORM\JoinTable(name: 'post_hashtag')]
    private Collection $hashtags;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->hashtags = new ArrayCollection();
    }

    // ========== GETTERS & SETTERS ==========
    public function getId(): ?int { return $this->id; }
    public function getTitle(): ?string { return $this->title; }
    public function setTitle(?string $title): self { $this->title = $title; return $this; }
    public function getContent(): ?string { return $this->content; }
    public function setContent(?string $content): self { $this->content = $content; return $this; }
    public function getImagePath(): ?string { return $this->image_path; }
    public function setImagePath(?string $image_path): self { $this->image_path = $image_path; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(?\DateTimeInterface $created_at): self { $this->created_at = $created_at; return $this; }
    public function isPinned(): ?bool { return $this->is_pinned; }
    public function setIsPinned(?bool $is_pinned): self { $this->is_pinned = $is_pinned; return $this; }
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): self { $this->utilisateur = $utilisateur; return $this; }
    public function getCommentaires(): Collection { return $this->commentaires; }
    public function getGifUrl(): ?string { return $this->gif_url; }
    public function setGifUrl(?string $gif_url): self { $this->gif_url = $gif_url; return $this; }
    public function getSignalementCount(): int { return $this->signalement_count; }
    public function setSignalementCount(int $signalement_count): self { $this->signalement_count = $signalement_count; return $this; }
    public function incrementSignalementCount(): self { $this->signalement_count++; return $this; }
    public function getHashtags(): Collection { return $this->hashtags; }
    public function addHashtag(Hashtag $hashtag): self { if (!$this->hashtags->contains($hashtag)) { $this->hashtags->add($hashtag); } return $this; }
    public function removeHashtag(Hashtag $hashtag): self { $this->hashtags->removeElement($hashtag); return $this; }
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
}