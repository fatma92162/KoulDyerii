<?php

namespace App\Entity;

use App\Repository\QuizRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizRepository::class)]
#[ORM\Table(name: 'quiz')]
class Quiz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'quiz')]
    #[ORM\JoinColumn(name: 'formation_id', referencedColumnName: 'id_formation', nullable: false, onDelete: 'CASCADE', unique: true)]
    private ?Formation $formation = null;

    #[ORM\Column(type: 'integer')]
    private int $duration = 240;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'quiz', targetEntity: Question::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $questions;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getFormation(): ?Formation { return $this->formation; }
    public function getDuration(): int { return $this->duration; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
    public function getQuestions(): Collection { return $this->questions; }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;
        return $this;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = max(30, $duration);
        return $this;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions->add($question);
            $question->setQuiz($this);
        }

        return $this;
    }
}
