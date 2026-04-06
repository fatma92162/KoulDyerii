<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\Commentaire;

#[ORM\Entity]
class Reaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Commentaire::class, inversedBy: "reactions")]
    #[ORM\JoinColumn(name: 'commentaire_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Commentaire $commentaire_id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "reactions")]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $user_id;

    #[ORM\Column(type: "string", length: 10)]
    private string $type;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getCommentaire_id()
    {
        return $this->commentaire_id;
    }

    public function setCommentaire_id($value)
    {
        $this->commentaire_id = $value;
    }

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($value)
    {
        $this->created_at = $value;
    }
}