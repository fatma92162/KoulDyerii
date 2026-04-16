<?php

namespace App\Entity;

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

    // RELATION VERS POINTS SOLDE
    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Pointssolde::class, cascade: ['persist', 'remove'])]
    private ?Pointssolde $pointsSolde = null;

    // Permission d'épingler
    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private ?bool $can_pin = false;

    // Téléphone pour déblocage SMS
    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private ?string $telephone = null;

    // ✅ Date de fin de bannissement (null = pas banni)
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $banned_until = null;

    // ✅ Version du token pour déconnexion multi-appareils
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private int $tokenVersion = 0;

    // Propriété virtuelle pour les points
    private ?int $pointsFidelite = null;

    // ========== CONSTRUCTEUR ==========
    
    public function __construct()
    {
        $this->can_pin = false;
    }

    // ========== GETTERS ET SETTERS ==========

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(?string $motDePasse): self
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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;
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

    // GETTER ET SETTER POUR CAN_PIN
    public function getCanPin(): ?bool
    {
        return $this->can_pin;
    }

    public function setCanPin(bool $can_pin): self
    {
        $this->can_pin = $can_pin;
        return $this;
    }

    // GETTER ET SETTER POUR TELEPHONE
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }

    // ✅ BANNISSEMENT
    public function getBannedUntil(): ?\DateTimeInterface
    {
        return $this->banned_until;
    }

    public function setBannedUntil(?\DateTimeInterface $banned_until): self
    {
        $this->banned_until = $banned_until;
        return $this;
    }

    public function isBanned(): bool
    {
        if ($this->banned_until === null) {
            return false;
        }
        return $this->banned_until > new \DateTime();
    }

    // ✅ VERSION DU TOKEN (pour déconnexion multi-appareils)
    public function getTokenVersion(): int
    {
        return $this->tokenVersion;
    }

    public function setTokenVersion(int $tokenVersion): self
    {
        $this->tokenVersion = $tokenVersion;
        return $this;
    }

    public function incrementTokenVersion(): self
    {
        $this->tokenVersion++;
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
    }
}