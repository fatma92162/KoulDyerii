<?php

namespace App\Entity;

use App\Repository\Inscription_formationRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\Formation;

#[ORM\Entity(repositoryClass: Inscription_formationRepository::class)]
#[ORM\Table(name: 'inscription_formation')]
class Inscription_formation
{
    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "inscription_formations")]
    #[ORM\JoinColumn(name: 'idClient', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $idClient;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Formation::class, inversedBy: "inscription_formations")]
    #[ORM\JoinColumn(name: 'idFormation', referencedColumnName: 'idFormation', onDelete: 'CASCADE')]
    private Formation $idFormation;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $dateInscription;

    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setIdClient($value)
    {
        $this->idClient = $value;
        return $this;
    }

    public function getIdFormation()
    {
        return $this->idFormation;
    }

    public function setIdFormation($value)
    {
        $this->idFormation = $value;
        return $this;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function setDateInscription($value)
    {
        $this->dateInscription = $value;
        return $this;
    }
}