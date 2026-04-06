<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use App\Entity\Commentaires;

#[ORM\Entity]
class Posts
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 150)]
    private string $title;

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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($value)
    {
        $this->title = $value;
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

    #[ORM\OneToMany(mappedBy: "post_id", targetEntity: Commentaires::class)]
    private Collection $commentairess;

        public function getCommentairess(): Collection
        {
            return $this->commentairess;
        }
    
        public function addCommentaires(Commentaires $commentaires): self
        {
            if (!$this->commentairess->contains($commentaires)) {
                $this->commentairess[] = $commentaires;
                $commentaires->setPost_id($this);
            }
    
            return $this;
        }
    
        public function removeCommentaires(Commentaires $commentaires): self
        {
            if ($this->commentairess->removeElement($commentaires)) {
                // set the owning side to null (unless already changed)
                if ($commentaires->getPost_id() === $this) {
                    $commentaires->setPost_id(null);
                }
            }
    
            return $this;
        }
}

