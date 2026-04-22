<?php

namespace App\Entity;

use App\Repository\CertificateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CertificateRepository::class)]
#[ORM\Table(name: 'certificate')]
class Certificate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'certificate')]
    #[ORM\JoinColumn(name: 'quiz_result_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?QuizResult $quizResult = null;

    #[ORM\Column(name: 'certificate_uid', type: 'string', length: 100, unique: true)]
    private ?string $certificateUid = null;

    #[ORM\Column(name: 'public_token', type: 'string', length: 36, unique: true, nullable: true)]
    private ?string $publicToken = null;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int { return $this->id; }
    public function getQuizResult(): ?QuizResult { return $this->quizResult; }
    public function getCertificateUid(): ?string { return $this->certificateUid; }
    public function getPublicToken(): ?string { return $this->publicToken; }
    public function getCreatedAt(): ?\DateTimeImmutable { return $this->createdAt; }

    public function setQuizResult(?QuizResult $quizResult): self { $this->quizResult = $quizResult; return $this; }
    public function setCertificateUid(string $certificateUid): self { $this->certificateUid = $certificateUid; return $this; }
    public function setPublicToken(?string $publicToken): self { $this->publicToken = $publicToken; return $this; }
}
