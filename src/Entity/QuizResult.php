<?php

namespace App\Entity;

use App\Repository\QuizResultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizResultRepository::class)]
#[ORM\Table(name: 'quiz_result')]
class QuizResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUtilisateur', nullable: false, onDelete: 'CASCADE')]
    private ?Utilisateur $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'quiz_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Quiz $quiz = null;

    #[ORM\Column(type: 'integer')]
    private int $score = 0;

    #[ORM\Column(type: 'integer')]
    private int $totalQuestions = 0;

    #[ORM\Column(type: 'float')]
    private float $percentage = 0;

    #[ORM\Column(name: 'started_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $startedAt = null;

    #[ORM\Column(name: 'submitted_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $submittedAt = null;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToOne(mappedBy: 'quizResult', targetEntity: Certificate::class, cascade: ['persist', 'remove'])]
    private ?Certificate $certificate = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }
    public function getUser(): ?Utilisateur { return $this->user; }
    public function getQuiz(): ?Quiz { return $this->quiz; }
    public function getScore(): int { return $this->score; }
    public function getTotalQuestions(): int { return $this->totalQuestions; }
    public function getPercentage(): float { return $this->percentage; }
    public function getStartedAt(): ?\DateTimeImmutable { return $this->startedAt; }
    public function getSubmittedAt(): ?\DateTimeImmutable { return $this->submittedAt; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }
    public function getCertificate(): ?Certificate { return $this->certificate; }

    public function setUser(?Utilisateur $user): self { $this->user = $user; return $this; }
    public function setQuiz(?Quiz $quiz): self { $this->quiz = $quiz; return $this; }
    public function setScore(int $score): self { $this->score = $score; return $this; }
    public function setTotalQuestions(int $totalQuestions): self { $this->totalQuestions = $totalQuestions; return $this; }
    public function setPercentage(float $percentage): self { $this->percentage = $percentage; return $this; }
    public function setStartedAt(\DateTimeImmutable $startedAt): self { $this->startedAt = $startedAt; return $this; }
    public function setSubmittedAt(\DateTimeImmutable $submittedAt): self { $this->submittedAt = $submittedAt; return $this; }
    public function setCreatedAt(\DateTimeImmutable $createdAt): self { $this->createdAt = $createdAt; return $this; }
    public function setCertificate(?Certificate $certificate): self { $this->certificate = $certificate; return $this; }
}
