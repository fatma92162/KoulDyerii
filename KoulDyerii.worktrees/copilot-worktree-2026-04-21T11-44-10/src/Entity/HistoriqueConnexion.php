<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueConnexionRepository::class)]
#[ORM\Table(name: 'historique_connexions')]
class HistoriqueConnexion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $idUtilisateur = null;

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_connexion = null;

    public function getDate_connexion(): ?\DateTimeInterface
    {
        return $this->date_connexion;
    }

    public function setDate_connexion(?\DateTimeInterface $date_connexion): self
    {
        $this->date_connexion = $date_connexion;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $lieu_connexion = null;

    public function getLieu_connexion(): ?string
    {
        return $this->lieu_connexion;
    }

    public function setLieu_connexion(?string $lieu_connexion): self
    {
        $this->lieu_connexion = $lieu_connexion;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $adresse_ip = null;

    public function getAdresse_ip(): ?string
    {
        return $this->adresse_ip;
    }

    public function setAdresse_ip(?string $adresse_ip): self
    {
        $this->adresse_ip = $adresse_ip;
        return $this;
    }

    public function getDateConnexion(): ?\DateTime
    {
        return $this->date_connexion;
    }

    public function setDateConnexion(\DateTime $date_connexion): static
    {
        $this->date_connexion = $date_connexion;

        return $this;
    }

    public function getLieuConnexion(): ?string
    {
        return $this->lieu_connexion;
    }

    public function setLieuConnexion(?string $lieu_connexion): static
    {
        $this->lieu_connexion = $lieu_connexion;

        return $this;
    }

    public function getAdresseIp(): ?string
    {
        return $this->adresse_ip;
    }

    public function setAdresseIp(?string $adresse_ip): static
    {
        $this->adresse_ip = $adresse_ip;

        return $this;
    }

}
