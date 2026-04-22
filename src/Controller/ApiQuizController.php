<?php

namespace App\Controller;

use App\Entity\QuizResult;
use App\Entity\Utilisateur;
use App\Repository\CertificateRepository;
use App\Repository\FormationRepository;
use App\Repository\QuestionRepository;
use App\Repository\QuizRepository;
use App\Service\AIQuizGeneratorService;
use App\Service\CertificateService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api')]
class ApiQuizController extends AbstractController
{
    public function __construct(
        private FormationRepository $formationRepository,
        private QuizRepository $quizRepository,
        private QuestionRepository $questionRepository,
        private CertificateRepository $certificateRepository,
        private EntityManagerInterface $entityManager,
        private CertificateService $certificateService,
        private AIQuizGeneratorService $aiQuizGeneratorService
    ) {}

    #[Route('/quiz/start/{formationId}', methods: ['POST'])]
    public function start(int $formationId, Request $request): JsonResponse
    {
        $formation = $this->formationRepository->find($formationId);
        $quiz = $formation ? $this->quizRepository->findOneByFormation($formation) : null;
        if (!$quiz) {
            return $this->json(['message' => 'Quiz not found'], 404);
        }
        $request->getSession()->set('quiz_started_at_' . $quiz->getId(), time());

        $questions = [];
        foreach ($this->questionRepository->findByQuizOrdered($quiz) as $question) {
            $answers = [];
            foreach ($question->getAnswers() as $answer) {
                $answers[] = ['id' => $answer->getId(), 'content' => $answer->getContent()];
            }
            $questions[] = ['id' => $question->getId(), 'content' => $question->getContent(), 'answers' => $answers];
        }

        return $this->json(['quizId' => $quiz->getId(), 'duration' => $quiz->getDuration(), 'questions' => $questions]);
    }

    #[Route('/quiz/submit', methods: ['POST'])]
    public function submit(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            return $this->json(['message' => 'Unauthorized'], 401);
        }

        $payload = json_decode((string) $request->getContent(), true);
        $quizId = (int) ($payload['quizId'] ?? 0);
        $answers = (array) ($payload['answers'] ?? []);
        $quiz = $this->quizRepository->find($quizId);
        if (!$quiz) {
            return $this->json(['message' => 'Quiz not found'], 404);
        }

        $startedAt = (int) $request->getSession()->get('quiz_started_at_' . $quiz->getId(), 0);
        if ($startedAt === 0 || (time() - $startedAt) > ($quiz->getDuration() + 5)) {
            return $this->json(['message' => 'Quiz expired'], 422);
        }

        $questions = $this->questionRepository->findByQuizOrdered($quiz);
        $score = 0;
        foreach ($questions as $question) {
            $selected = (int) ($answers[$question->getId()] ?? 0);
            foreach ($question->getAnswers() as $answer) {
                if ($answer->getId() === $selected && $answer->isCorrect()) {
                    $score++;
                    break;
                }
            }
        }

        $result = new QuizResult();
        $result->setUser($user)->setQuiz($quiz)->setScore($score)->setTotalQuestions(count($questions));
        $result->setPercentage(round(($score / max(1, count($questions))) * 100, 2));
        $result->setStartedAt((new \DateTimeImmutable())->setTimestamp($startedAt));
        $result->setSubmittedAt(new \DateTimeImmutable());
        $result->setCreatedAt(new \DateTimeImmutable());
        $this->entityManager->persist($result);
        // ✅ Seuil de certification : 80%
        if ($result->getPercentage() >= 80.0) {
            $this->certificateService->generateForResult($result);
        }
        $this->entityManager->flush();

        return $this->json([
            'resultId' => $result->getId(),
            'score' => $result->getScore(),
            'percentage' => $result->getPercentage(),
            'certificateId' => $result->getCertificate()?->getId(),
        ]);
    }

    #[Route('/certificate/{id}', methods: ['GET'])]
    public function certificate(int $id): JsonResponse
    {
        $certificate = $this->certificateRepository->find($id);
        if (!$certificate) {
            return $this->json(['message' => 'Certificate not found'], 404);
        }
        return $this->json([
            'id' => $certificate->getId(),
            'uid' => $certificate->getCertificateUid(),
            'createdAt' => $certificate->getCreatedAt()?->format(DATE_ATOM),
            'resultId' => $certificate->getQuizResult()?->getId(),
        ]);
    }

    #[Route('/admin/quiz/generate-ai/{formationId}', methods: ['POST'])]
    public function generateAi(int $formationId): JsonResponse
    {
        $user = $this->getUser();
        if (!$user || !method_exists($user, 'getRole') || $user->getRole() !== 'admin') {
            return $this->json(['message' => 'Forbidden'], 403);
        }

        $formation = $this->formationRepository->find($formationId);
        if (!$formation) {
            return $this->json(['message' => 'Formation not found'], 404);
        }

        $quiz = $this->quizRepository->findOneByFormation($formation);
        if (!$quiz) {
            $quiz = (new \App\Entity\Quiz())->setFormation($formation);
            $this->entityManager->persist($quiz);
        }

        foreach ($quiz->getQuestions() as $question) {
            $this->entityManager->remove($question);
        }
        $this->entityManager->flush();

        $generated = $this->aiQuizGeneratorService->generateQuestions((string) $formation->getTitre(), (string) $formation->getDescription(), 5);
        foreach ($generated as $item) {
            $q = (new \App\Entity\Question())->setQuiz($quiz)->setContent((string) $item['question'])->setCreatedAt(new \DateTimeImmutable());
            foreach ($item['answers'] as $a) {
                $q->addAnswer((new \App\Entity\Answer())->setContent((string) $a['text'])->setIsCorrect((bool) $a['isCorrect'])->setCreatedAt(new \DateTimeImmutable()));
            }
            $this->entityManager->persist($q);
        }
        $this->entityManager->flush();

        return $this->json(['message' => 'Quiz generated', 'quizId' => $quiz->getId()], 201);
    }
}
