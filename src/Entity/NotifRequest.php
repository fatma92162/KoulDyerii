<?php
// src/Entity/NotifRequest.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NotifRequestRepository;

#[ORM\Entity(repositoryClass: NotifRequestRepository::class)]
#[ORM\Table(name: 'notif_request')]
class NotifRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'sender_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $sender = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'receiver_id', referencedColumnName: 'idUtilisateur', nullable: false)]
    private ?Utilisateur $receiver = null;

    #[ORM\Column(type: 'string', length: 20, options: ['default' => 'pending'])]
    private ?string $status = 'pending';

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // ========== GETTERS & SETTERS ==========
    public function getId(): ?int 
    { 
        return $this->id; 
    }

    public function getSender(): ?Utilisateur 
    { 
        return $this->sender; 
    }

    public function setSender(?Utilisateur $sender): self 
    { 
        $this->sender = $sender; 
        return $this; 
    }

    public function getReceiver(): ?Utilisateur 
    { 
        return $this->receiver; 
    }

    public function setReceiver(?Utilisateur $receiver): self 
    { 
        $this->receiver = $receiver; 
        return $this; 
    }

    public function getStatus(): ?string 
    { 
        return $this->status; 
    }

    public function setStatus(string $status): self 
    { 
        $this->status = $status; 
        return $this; 
    }

    public function getCreatedAt(): ?\DateTimeInterface 
    { 
        return $this->createdAt; 
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self 
    { 
        $this->createdAt = $createdAt; 
        return $this; 
    }
}