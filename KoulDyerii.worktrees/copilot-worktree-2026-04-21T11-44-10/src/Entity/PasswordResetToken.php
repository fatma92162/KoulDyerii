<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PasswordResetTokenRepository::class)]
#[ORM\Table(name: 'password_reset_tokens')]
class PasswordResetToken
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $email = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $token = null;

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_expiration = null;

    public function getDate_expiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDate_expiration(?\DateTimeInterface $date_expiration): self
    {
        $this->date_expiration = $date_expiration;
        return $this;
    }

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $utilise = null;

    public function getUtilise(): ?bool
    {
        return $this->utilise;
    }

    public function setUtilise(?bool $utilise): self
    {
        $this->utilise = $utilise;
        return $this;
    }

    public function getDateExpiration(): ?\DateTime
    {
        return $this->date_expiration;
    }

    public function setDateExpiration(\DateTime $date_expiration): static
    {
        $this->date_expiration = $date_expiration;

        return $this;
    }

    public function isUtilise(): ?bool
    {
        return $this->utilise;
    }

}
