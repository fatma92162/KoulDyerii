<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireHashtagRepository::class)]
#[ORM\Table(name: 'commentaire_hashtags')]
class CommentaireHashtag
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
    private ?int $commentaire_id = null;

    public function getCommentaire_id(): ?int
    {
        return $this->commentaire_id;
    }

    public function setCommentaire_id(?int $commentaire_id): self
    {
        $this->commentaire_id = $commentaire_id;
        return $this;
    }

    #[ORM\Column(type: 'string', nullable: false)]
    private ?string $hashtag = null;

    public function getHashtag(): ?string
    {
        return $this->hashtag;
    }

    public function setHashtag(?string $hashtag): self
    {
        $this->hashtag = $hashtag;
        return $this;
    }

    #[ORM\Column(type: 'datetime', nullable: false)]
    private ?\DateTimeInterface $created_at = null;

    public function getCreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreated_at(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getCommentaireId(): ?int
    {
        return $this->commentaire_id;
    }

    public function setCommentaireId(int $commentaire_id): static
    {
        $this->commentaire_id = $commentaire_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTime $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

}
