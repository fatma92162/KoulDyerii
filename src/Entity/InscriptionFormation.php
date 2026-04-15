<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\InscriptionFormationRepository;

#[ORM\Entity(repositoryClass: InscriptionFormationRepository::class)]
#[ORM\Table(name: 'inscription_formation')]
class InscriptionFormation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_inscription', type: 'integer')]
    private ?int $idInscription = null;

    #[ORM\Column(name: 'id_formation', type: 'integer')]
    private ?int $idFormation = null;

    #[ORM\Column(name: 'id_utilisateur', type: 'integer')]
    private ?int $idUtilisateur = null;

    #[ORM\Column(name: 'date_inscription', type: 'datetime')]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(name: 'statut', type: 'string', length: 50, options: ['default' => 'en_attente'])]
    private ?string $statut = 'en_attente';

    // Propriété virtuelle pour la formation
    private $formation;

    // Getters et Setters
    public function getIdInscription(): ?int 
    { 
        return $this->idInscription; 
    }

    public function getIdFormation(): ?int 
    { 
        return $this->idFormation; 
    }

    public function setIdFormation(int $idFormation): self 
    { 
        $this->idFormation = $idFormation; 
        return $this; 
    }

    public function getIdUtilisateur(): ?int 
    { 
        return $this->idUtilisateur; 
    }

    public function setIdUtilisateur(int $idUtilisateur): self 
    { 
        $this->idUtilisateur = $idUtilisateur; 
        return $this; 
    }

    public function getDateInscription(): ?\DateTimeInterface 
    { 
        return $this->dateInscription; 
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self 
    { 
        $this->dateInscription = $dateInscription; 
        return $this; 
    }

    public function getStatut(): ?string 
    { 
        return $this->statut; 
    }

    public function setStatut(string $statut): self 
    { 
        $this->statut = $statut; 
        return $this; 
    }

    public function getFormation() 
    { 
        return $this->formation; 
    }

    public function setFormation($formation): self 
    { 
        $this->formation = $formation; 
        return $this; 
    }
}