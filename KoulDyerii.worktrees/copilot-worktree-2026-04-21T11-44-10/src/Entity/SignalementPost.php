<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SignalementPostRepository::class)]
#[ORM\Table(name: 'signalement_post')]
class SignalementPost
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
    private ?int $post_id = null;

    public function getPost_id(): ?int
    {
        return $this->post_id;
    }

    public function setPost_id(?int $post_id): self
    {
        $this->post_id = $post_id;
        return $this;
    }

    #[ORM\Column(type: 'integer', nullable: false)]
    private ?int $user_id = null;

    public function getUser_id(): ?int
    {
        return $this->user_id;
    }

    public function setUser_id(?int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $raison = null;

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(?string $raison): self
    {
        $this->raison = $raison;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_signalement = null;

    public function getDate_signalement(): ?\DateTimeInterface
    {
        return $this->date_signalement;
    }

    public function setDate_signalement(?\DateTimeInterface $date_signalement): self
    {
        $this->date_signalement = $date_signalement;
        return $this;
    }

    public function getPostId(): ?int
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id): static
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getDateSignalement(): ?\DateTime
    {
        return $this->date_signalement;
    }

    public function setDateSignalement(\DateTime $date_signalement): static
    {
        $this->date_signalement = $date_signalement;

        return $this;
    }

}
