<?php

namespace App\Entity;

use App\Repository\InscriptionFormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionFormationRepository::class)]
#[ORM\Table(name: 'inscription_formation')]
class InscriptionFormation
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
    private ?int $idClient = null;

    public function getIdClient(): ?int
    {
        return $this->idClient;
    }

    public function setIdClient(?int $idClient): self
    {
        $this->idClient = $idClient;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $idFormation = null;

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(?int $idFormation): self
    {
        $this->idFormation = $idFormation;
        return $this;
    }

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateInscription = null;

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(?\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }

    #[ORM\Column(name: 'quiz_score', type: 'integer', nullable: true)]
    private ?int $quizScore = null;

    public function getQuizScore(): ?int
    {
        return $this->quizScore;
    }

    public function setQuizScore(?int $quizScore): self
    {
        $this->quizScore = $quizScore;
        return $this;
    }

}
