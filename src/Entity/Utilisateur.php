<?php

namespace App\Entity;

<<<<<<< HEAD
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'utilisateur')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', name: 'idUtilisateur')]
    private ?int $idUtilisateur = null;

    #[ORM\Column(type: 'string', nullable: false, name: 'nom')]
    private ?string $nom = null;

    #[ORM\Column(type: 'string', nullable: false, name: 'email')]
    private ?string $email = null;

    #[ORM\Column(type: 'string', nullable: false, name: 'motDePasse')]
    private ?string $motDePasse = null;

    #[ORM\Column(type: 'date', nullable: true, name: 'dateNaissance')]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(type: 'string', nullable: true, name: 'region')]
    private ?string $region = null;

    #[ORM\Column(type: 'string', nullable: false, name: 'role')]
    private ?string $role = null;

    #[ORM\Column(type: 'string', nullable: true, name: 'photo')]
    private ?string $photo = null;

    #[ORM\Column(type: 'text', nullable: true, name: 'empreinte')]
    private ?string $empreinte = null;

    // ✅ RELATION VERS POINTS SOLDE
    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Pointssolde::class, cascade: ['persist', 'remove'])]
    private ?Pointssolde $pointsSolde = null;

    // ✅ NOUVELLE PROPRIÉTÉ - Permission d'épingler
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private ?bool $can_pin = false;

    // Propriété virtuelle pour les points
    private ?int $pointsFidelite = null;

    // ========== CONSTRUCTEUR ==========
    
    public function __construct()
    {
        $this->can_pin = false; // Valeur par défaut
    }

    // ========== GETTERS ET SETTERS ==========

    public function getIdUtilisateur(): ?int
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->idUtilisateur;
    }

<<<<<<< HEAD
    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    public function getNom(): ?string
=======
    public function getNom(): string
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->nom;
    }

<<<<<<< HEAD
    public function setNom(?string $nom): self
=======
    public function setNom(string $nom): self
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        $this->nom = $nom;
        return $this;
    }

<<<<<<< HEAD
    public function getEmail(): ?string
=======
    public function getEmail(): string
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->email;
    }

<<<<<<< HEAD
    public function setEmail(?string $email): self
=======
    public function setEmail(string $email): self
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        $this->email = $email;
        return $this;
    }

<<<<<<< HEAD
    public function getMotDePasse(): ?string
=======
    public function getMotDePasse(): string
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->motDePasse;
    }

<<<<<<< HEAD
    public function setMotDePasse(?string $motDePasse): self
=======
    public function setMotDePasse(string $motDePasse): self
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
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

<<<<<<< HEAD
    public function getRole(): ?string
=======
    public function getRole(): string
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        return $this->role;
    }

<<<<<<< HEAD
    public function setRole(?string $role): self
=======
    public function setRole(string $role): self
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    {
        $this->role = $role;
        return $this;
    }

<<<<<<< HEAD
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }

=======
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    public function getEmpreinte(): ?string
    {
        return $this->empreinte;
    }

    public function setEmpreinte(?string $empreinte): self
    {
        $this->empreinte = $empreinte;
        return $this;
    }

<<<<<<< HEAD
    public function getPointsSolde(): ?Pointssolde
    {
        return $this->pointsSolde;
    }

    public function setPointsSolde(?Pointssolde $pointsSolde): self
    {
        $this->pointsSolde = $pointsSolde;
        return $this;
    }

    public function getPointsFidelite(): ?int
    {
        if ($this->pointsFidelite !== null) {
            return $this->pointsFidelite;
        }
        if ($this->pointsSolde) {
            return $this->pointsSolde->getSolde();
        }
        return 0;
    }

    public function setPointsFidelite(?int $pointsFidelite): self
    {
        $this->pointsFidelite = $pointsFidelite;
        return $this;
    }

    // ✅ GETTER ET SETTER POUR CAN_PIN
    public function getCanPin(): ?bool
    {
        return $this->can_pin;
    }

    public function setCanPin(bool $can_pin): self
    {
        $this->can_pin = $can_pin;
        return $this;
    }

    // ========== MÉTHODES REQUISES PAR UserInterface ==========

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->motDePasse;
    }

    public function getRoles(): array
    {
        return [$this->role];
    }

    public function eraseCredentials(): void
    {
        // Effacer les données sensibles si nécessaire
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function getUsername(): string
    {
        return $this->email;
=======
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
>>>>>>> c5068dc4fcc54b142830cfad3e0547f2bfd72acd
    }
}