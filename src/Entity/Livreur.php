<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\LivreurRepository;

#[ORM\Entity(repositoryClass: LivreurRepository::class)]
#[ORM\Table(name: 'livreur')]
class Livreur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_livreur', type: 'integer')]
    private ?int $idLivreur = null;

    #[ORM\Column(name: 'nom', type: 'string', length: 100)]
    private ?string $nom = null;

    #[ORM\Column(name: 'prenom', type: 'string', length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(name: 'telephone', type: 'string', length: 20)]
    private ?string $telephone = null;

    #[ORM\Column(name: 'disponibilite', type: 'boolean', options: ['default' => true])]
    private ?bool $disponibilite = true;

    // Getters et Setters
    public function getIdLivreur(): ?int { return $this->idLivreur; }
    public function getNom(): ?string { return $this->nom; }
    public function setNom(string $nom): self { $this->nom = $nom; return $this; }
    public function getPrenom(): ?string { return $this->prenom; }
    public function setPrenom(string $prenom): self { $this->prenom = $prenom; return $this; }
    public function getTelephone(): ?string { return $this->telephone; }
    public function setTelephone(string $telephone): self { $this->telephone = $telephone; return $this; }
    public function getDisponibilite(): ?bool { return $this->disponibilite; }
    public function setDisponibilite(bool $disponibilite): self { $this->disponibilite = $disponibilite; return $this; }
}