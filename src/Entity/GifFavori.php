<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GifFavoriRepository::class)]
#[ORM\Table(name: 'gif_favoris')]
class GifFavori
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

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $gif_url = null;

    public function getGif_url(): ?string
    {
        return $this->gif_url;
    }

    public function setGif_url(?string $gif_url): self
    {
        $this->gif_url = $gif_url;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $gif_title = null;

    public function getGif_title(): ?string
    {
        return $this->gif_title;
    }

    public function setGif_title(?string $gif_title): self
    {
        $this->gif_title = $gif_title;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $date_ajout = null;

    public function getDate_ajout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDate_ajout(?\DateTimeInterface $date_ajout): self
    {
        $this->date_ajout = $date_ajout;
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

    public function getGifUrl(): ?string
    {
        return $this->gif_url;
    }

    public function setGifUrl(string $gif_url): static
    {
        $this->gif_url = $gif_url;

        return $this;
    }

    public function getGifTitle(): ?string
    {
        return $this->gif_title;
    }

    public function setGifTitle(?string $gif_title): static
    {
        $this->gif_title = $gif_title;

        return $this;
    }

    public function getDateAjout(): ?\DateTime
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTime $date_ajout): static
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

}
