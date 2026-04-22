<?php
// src/Entity/Favori.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FavoriRepository;

#[ORM\Entity(repositoryClass: FavoriRepository::class)]
#[ORM\Table(name: 'favori')]
#[ORM\UniqueConstraint(name: 'unique_favori', columns: ['user_id', 'post_id'])]
class Favori
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $user = null;

    #[ORM\ManyToOne(targetEntity: Post::class)]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id', nullable: false)]
    private ?Post $post = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int { return $this->id; }
    public function getUser(): ?Utilisateur { return $this->user; }
    public function setUser(?Utilisateur $user): self { $this->user = $user; return $this; }
    public function getPost(): ?Post { return $this->post; }
    public function setPost(?Post $post): self { $this->post = $post; return $this; }
    public function getCreatedAt(): ?\DateTimeInterface { return $this->createdAt; }
    public function setCreatedAt(\DateTimeInterface $createdAt): self { $this->createdAt = $createdAt; return $this; }
}
