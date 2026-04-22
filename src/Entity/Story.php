<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\StoryRepository;

#[ORM\Entity(repositoryClass: StoryRepository::class)]
#[ORM\Table(name: 'story')]
class Story
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $media_path = null; // image ou vidéo

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $media_type = null; // 'image' ou 'video'

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    // Getters / Setters
    public function getId(): ?int { return $this->id; }
    public function getMediaPath(): ?string { return $this->media_path; }
    public function setMediaPath(?string $media_path): self { $this->media_path = $media_path; return $this; }
    public function getMediaType(): ?string { return $this->media_type; }
    public function setMediaType(?string $media_type): self { $this->media_type = $media_type; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->created_at; }
    public function setCreatedAt(?\DateTimeInterface $created_at): self { $this->created_at = $created_at; return $this; }
    public function getUtilisateur(): ?Utilisateur { return $this->utilisateur; }
    public function setUtilisateur(?Utilisateur $utilisateur): self { $this->utilisateur = $utilisateur; return $this; }
}