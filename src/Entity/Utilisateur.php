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

    // ✅ RELATION VERS POINTS SOLDE - Version simplifiée
    #[ORM\OneToOne(mappedBy: 'utilisateur', targetEntity: Pointssolde::class, cascade: ['persist', 'remove'])]
    private ?Pointssolde $pointsSolde = null;

    // Propriété virtuelle pour les points
    private ?int $pointsFidelite = null;

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