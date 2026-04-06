<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\Post;
use App\Entity\Commentaire;

#[ORM\Entity]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $user_id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "notificationsFrom")]
    #[ORM\JoinColumn(name: 'from_user_id', referencedColumnName: 'idUtilisateur', onDelete: 'CASCADE')]
    private Utilisateur $from_user_id;

    #[ORM\Column(type: "string", length: 50)]
    private string $type;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Post $post_id;

    #[ORM\ManyToOne(targetEntity: Commentaire::class, inversedBy: "notifications")]
    #[ORM\JoinColumn(name: 'commentaire_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Commentaire $commentaire_id;

    #[ORM\Column(type: "string", length: 255)]
    private string $message;

    #[ORM\Column(type: "boolean")]
    private bool $is_read;

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

    public function getUser_id()
    {
        return $this->user_id;
    }

    public function setUser_id($value)
    {
        $this->user_id = $value;
    }

    public function getFrom_user_id()
    {
        return $this->from_user_id;
    }

    public function setFrom_user_id($value)
    {
        $this->from_user_id = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($value)
    {
        $this->type = $value;
    }

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function setPost_id($value)
    {
        $this->post_id = $value;
    }

    public function getCommentaire_id()
    {
        return $this->commentaire_id;
    }

    public function setCommentaire_id($value)
    {
        $this->commentaire_id = $value;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($value)
    {
        $this->message = $value;
    }

    public function getIs_read()
    {
        return $this->is_read;
    }

    public function setIs_read($value)
    {
        $this->is_read = $value;
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