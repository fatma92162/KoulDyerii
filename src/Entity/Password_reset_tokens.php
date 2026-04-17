<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;

#[ORM\Entity]
class Password_reset_tokens
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "password_reset_tokenss")]
    #[ORM\JoinColumn(name: 'email', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $email;

    #[ORM\Column(type: "string", length: 100)]
    private string $token;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date_expiration;

    #[ORM\Column(type: "boolean")]
    private bool $utilise;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($value)
    {
        $this->token = $value;
    }

    public function getDate_expiration()
    {
        return $this->date_expiration;
    }

    public function setDate_expiration($value)
    {
        $this->date_expiration = $value;
    }

    public function getUtilise()
    {
        return $this->utilise;
    }

    public function setUtilise($value)
    {
        $this->utilise = $value;
    }
}