<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Posts;

#[ORM\Entity]
class Commentaires
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Posts::class, inversedBy: "commentairess")]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Posts $post_id;

    #[ORM\Column(type: "string", length: 100)]
    private string $author;

    #[ORM\Column(type: "text")]
    private string $content;

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

    public function getPost_id()
    {
        return $this->post_id;
    }

    public function setPost_id($value)
    {
        $this->post_id = $value;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($value)
    {
        $this->author = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
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

