<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotifAbnAbonnementRepository::class)]
#[ORM\Table(name: 'notif_abn_abonnements')]
class NotifAbnAbonnement
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
    private ?int $idAbonne = null;

    public function getIdAbonne(): ?int
    {
        return $this->idAbonne;
    }

    public function setIdAbonne(?int $idAbonne): self
    {
        $this->idAbonne = $idAbonne;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $idCible = null;

    public function getIdCible(): ?int
    {
        return $this->idCible;
    }

    public function setIdCible(?int $idCible): self
    {
        $this->idCible = $idCible;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $dateAbonnement = null;

    public function getDateAbonnement(): ?\DateTimeInterface
    {
        return $this->dateAbonnement;
    }

    public function setDateAbonnement(?\DateTimeInterface $dateAbonnement): self
    {
        $this->dateAbonnement = $dateAbonnement;
        return $this;
    }

}
