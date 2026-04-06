<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "utilisateur")]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "idUtilisateur", type: "integer")]
    private int $idUtilisateur;

    #[ORM\Column(name: "nom", type: "string", length: 100)]
    private string $nom;

    #[ORM\Column(name: "email", type: "string", length: 100, unique: true)]
    private string $email;

    #[ORM\Column(name: "motDePasse", type: "string", length: 255)]
    private string $motDePasse;

    #[ORM\Column(name: "dateNaissance", type: "date", nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(name: "region", type: "string", length: 50, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(name: "role", type: "string", length: 20)]
    private string $role;

    #[ORM\Column(name: "empreinte", type: "text", nullable: true)]
    private ?string $empreinte = null;

    // Relations
    #[ORM\OneToMany(mappedBy: "utilisateur", targetEntity: Post::class)]
    private Collection $posts;

    #[ORM\OneToMany(mappedBy: "utilisateur", targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    // Getters et setters
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getEmpreinte(): ?string
    {
        return $this->empreinte;
    }

    public function setEmpreinte(?string $empreinte): self
    {
        $this->empreinte = $empreinte;
        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setUtilisateur($this);
        }
        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->removeElement($post)) {
            if ($post->getUtilisateur() === $this) {
                $post->setUtilisateur(null);
            }
        }
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
            $commentaire->setUtilisateur($this);
        }
        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            if ($commentaire->getUtilisateur() === $this) {
                $commentaire->setUtilisateur(null);
            }
        }
        return $this;
    }
}