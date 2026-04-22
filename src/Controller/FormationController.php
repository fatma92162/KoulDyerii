<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\InscriptionFormation;
use App\Entity\QuizResult;
use App\Entity\Utilisateur;
use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use App\Repository\QuestionRepository;
use App\Repository\QuizRepository;
use App\Repository\QuizResultRepository;
use App\Service\AIQuizGeneratorService;
use App\Service\CertificateService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/formations')]
class FormationController extends AbstractController
{
    // ✅ Seuil de certification : 80%
    private const CERTIFICATION_THRESHOLD = 80.0;

    public function __construct(
        private EntityManagerInterface          $entityManager,
        private FormationRepository             $formationRepository,
        private InscriptionFormationRepository  $inscriptionRepository,
        private QuestionRepository              $questionRepository,
        private QuizRepository                  $quizRepository,
        private QuizResultRepository            $quizResultRepository,
        private AIQuizGeneratorService          $aiQuizGeneratorService,
        private CertificateService              $certificateService,
        private StripeClient                    $stripeClient,
        private LoggerInterface                 $logger
    ) {}

    #[Route('/', name: 'app_formations_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $allFormations = $this->formationRepository->findAll();
        $perPage = 9;
        $totalItems = count($allFormations);
        $totalPages = max(1, (int) ceil($totalItems / $perPage));
        $page = max(1, min((int) $request->query->get('page', 1), $totalPages));
        $offset = ($page - 1) * $perPage;
        $formations = array_slice($allFormations, $offset, $perPage);

        return $this->render('formations/index.html.twig', [
            'formations' => $formations,
            'page' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    // ⚠️ IMPORTANT : Cette route doit être AVANT la route /{id}
    #[Route('/mes-inscriptions', name: 'app_mes_inscriptions', methods: ['GET'])]
    public function mesInscriptions(): Response
    {
        $user = $this->getUser();

        if (!$user instanceof Utilisateur) {
            return $this->redirectToRoute('app_login');
        }

        $inscriptions = $this->inscriptionRepository->findByUtilisateur($user->getIdUtilisateur());

        // ✅ Charger les formations pour chaque inscription
        $formationIds = [];
        foreach ($inscriptions as $inscription) {
            $formation = $this->formationRepository->find($inscription->getIdFormation());
            $inscription->setFormation($formation);
            if ($formation) {
                $formationIds[] = $formation->getIdFormation();
            }
        }

        // ✅ Chargement en batch (1 seule requête) → évite N+1
        $quizResults = $this->quizResultRepository->findLastResultsForUserAndFormations($user, $formationIds);

        return $this->render('formations/mes_inscriptions.html.twig', [
            'inscriptions' => $inscriptions,
            'quizResults'  => $quizResults,   // map[formationId => QuizResult]
        ]);
    }

    #[Route('/{id}', name: 'app_formations_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            throw $this->createNotFoundException('Formation non trouvée');
        }

        $user        = $this->getUser();
        $dejaInscrit = false;
        $inscriptionStatut = null;
        $lastResult  = null;
        $rawDescription = (string) ($formation->getDescription() ?? '');
        $videoEmbedUrl = $this->extractVideoEmbedUrl($rawDescription);
        $formationDescription = $this->stripVideoTag($rawDescription);

        if ($user) {
            $inscription = $this->inscriptionRepository->findOneBy([
                'idFormation'   => $formation->getIdFormation(),
                'idUtilisateur' => $user->getIdUtilisateur(),
            ]);
            $dejaInscrit = $inscription !== null;
            $inscriptionStatut = $inscription?->getStatut();

            // ✅ Charger le dernier résultat du quiz pour afficher le score déjà obtenu
            $quiz = $formation->getQuiz();
            if ($quiz && $user instanceof Utilisateur) {
                $lastResult = $this->quizResultRepository->findLatestForUserAndQuiz($user, $quiz);
            }
        }

        return $this->render('formations/show.html.twig', [
            'formation'         => $formation,
            'dejaInscrit'       => $dejaInscrit,
            'inscriptionStatut' => $inscriptionStatut,
            'quizAvailable'     => $formation->getQuiz() !== null,
            'lastResult'        => $lastResult,
            'videoEmbedUrl'     => $videoEmbedUrl,
            'formationDescription' => $formationDescription,
        ]);
    }

    #[Route('/{id}/checkout', name: 'app_formations_checkout', methods: ['POST'])]
    public function checkout(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            $this->addFlash('error', 'Vous devez être connecté pour payer une formation.');
            return $this->redirectToRoute('app_login');
        }

        $formation = $this->formationRepository->find($id);
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée.');
            return $this->redirectToRoute('app_formations_index');
        }

        $prix = (float) ($formation->getPrix() ?? 0);
        if ($prix <= 0) {
            $this->addFlash('info', 'Cette formation est gratuite. Utilisez le bouton d’inscription.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $successUrl = $this->generateUrl('app_formations_checkout_success', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL);
        $cancelUrl = $this->generateUrl('app_formations_checkout_cancel', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL);

        $cleanDescription = trim(preg_replace('/\s+/', ' ', $this->stripVideoTag((string) ($formation->getDescription() ?? ''))) ?? '');
        if ($cleanDescription === '') {
            $cleanDescription = 'Formation culinaire Koul Dyeri';
        }

        $customerEmail = trim((string) $user->getEmail());
        $checkoutPayload = [
            'mode' => 'payment',
            'success_url' => $successUrl . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $cancelUrl,
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => (int) round($prix * 100),
                    'product_data' => [
                        'name' => 'Formation: ' . (string) $formation->getTitre(),
                        'description' => mb_substr($cleanDescription, 0, 180),
                    ],
                ],
            ]],
            'metadata' => [
                'formation_id' => (string) $formation->getIdFormation(),
                'user_id' => (string) $user->getIdUtilisateur(),
            ],
        ];
        if (filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
            $checkoutPayload['customer_email'] = $customerEmail;
        }

        try {
            $checkoutSession = $this->stripeClient->checkout->sessions->create([
                ...$checkoutPayload,
            ]);
        } catch (ApiErrorException $e) {
            $message = $e->getMessage();
            $this->logger->error('Stripe checkout error', [
                'formation_id' => $formation->getIdFormation(),
                'user_id' => $user->getIdUtilisateur(),
                'message' => $message,
            ]);
            if (stripos($message, 'api key') !== false) {
                $this->addFlash('error', 'Erreur Stripe: clé API invalide ou manquante.');
            } else {
                $this->addFlash('error', 'Erreur Stripe: ' . $message);
            }
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        } catch (\Throwable $e) {
            $this->logger->error('Stripe checkout fatal error', [
                'formation_id' => $formation->getIdFormation(),
                'user_id' => $user->getIdUtilisateur(),
                'message' => $e->getMessage(),
            ]);
            $this->addFlash('error', 'Erreur Stripe: impossible de démarrer le paiement.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        return $this->redirect($checkoutSession->url);
    }

    #[Route('/{id}/checkout/success', name: 'app_formations_checkout_success', methods: ['GET'])]
    public function checkoutSuccess(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            return $this->redirectToRoute('app_login');
        }

        $formation = $this->formationRepository->find($id);
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée.');
            return $this->redirectToRoute('app_formations_index');
        }

        $sessionId = trim((string) $request->query->get('session_id', ''));
        if ($sessionId === '') {
            $this->addFlash('error', 'Session de paiement invalide.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        try {
            $checkoutSession = $this->stripeClient->checkout->sessions->retrieve($sessionId);
        } catch (ApiErrorException $e) {
            $this->addFlash('error', 'Impossible de valider le paiement Stripe.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $paid = ($checkoutSession->payment_status ?? '') === 'paid';
        $sessionFormationId = (int) ($checkoutSession->metadata['formation_id'] ?? 0);
        $sessionUserId = (int) ($checkoutSession->metadata['user_id'] ?? 0);
        if (!$paid || $sessionFormationId !== $formation->getIdFormation() || $sessionUserId !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Paiement non confirmé pour cette formation.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $existingInscription = $this->inscriptionRepository->findOneBy([
            'idFormation' => $formation->getIdFormation(),
            'idUtilisateur' => $user->getIdUtilisateur(),
        ]);

        if (!$existingInscription) {
            $inscription = new InscriptionFormation();
            $inscription->setIdFormation($formation->getIdFormation());
            $inscription->setIdUtilisateur($user->getIdUtilisateur());
            $inscription->setDateInscription(new \DateTimeImmutable());
            $inscription->setStatut(InscriptionFormation::STATUT_ACCEPTEE);
            $this->entityManager->persist($inscription);
        } elseif ($existingInscription->getStatut() !== InscriptionFormation::STATUT_ACCEPTEE) {
            $existingInscription->setStatut(InscriptionFormation::STATUT_ACCEPTEE);
        }

        $this->entityManager->flush();

        $this->addFlash('success', '✅ Paiement validé. Votre inscription est confirmée.');
        return $this->redirectToRoute('app_mes_inscriptions');
    }

    #[Route('/{id}/checkout/cancel', name: 'app_formations_checkout_cancel', methods: ['GET'])]
    public function checkoutCancel(int $id): Response
    {
        $this->addFlash('info', 'Paiement annulé.');
        return $this->redirectToRoute('app_formations_show', ['id' => $id]);
    }

    #[Route('/{id}/quiz', name: 'app_formations_quiz_start', methods: ['GET'])]
    #[Route('/formation/{id}/quiz/start', name: 'app_formation_quiz_start', methods: ['GET'])]
    public function startQuiz(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            $this->addFlash('error', 'Veuillez vous connecter pour démarrer le quiz.');
            return $this->redirectToRoute('app_login');
        }

        $formation = $this->formationRepository->find($id);
        if (!$formation) {
            throw $this->createNotFoundException('Formation non trouvée.');
        }

        $quiz = $this->quizRepository->findOneByFormation($formation);
        if (!$quiz) {
            $this->addFlash('warning', 'Quiz non disponible pour cette formation.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $questions = $this->questionRepository->findByQuizOrdered($quiz);
        if ($questions === []) {
            $this->addFlash('warning', 'Aucune question configurée pour ce quiz.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $request->getSession()->set('quiz_started_at_' . $quiz->getId(), time());

        return $this->render('quiz/start.html.twig', [
            'formation' => $formation,
            'quiz'      => $quiz,
            'questions' => $questions,
        ]);
    }

    #[Route('/{id}/quiz/submit', name: 'app_formations_quiz_submit', methods: ['POST'])]
    #[Route('/formation/{id}/quiz/submit', name: 'app_formation_quiz_submit', methods: ['POST'])]
    public function submitQuiz(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            return $this->redirectToRoute('app_login');
        }

        $formation = $this->formationRepository->find($id);
        if (!$formation) {
            throw $this->createNotFoundException('Formation non trouvée.');
        }

        $quiz = $this->quizRepository->findOneByFormation($formation);
        if (!$quiz) {
            $this->addFlash('error', 'Quiz indisponible.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $questions = $this->questionRepository->findByQuizOrdered($quiz);
        if ($questions === []) {
            $this->addFlash('error', 'Aucune question configurée pour cette formation.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $startedAt = (int) $request->getSession()->get('quiz_started_at_' . $quiz->getId(), 0);
        if ($startedAt === 0 || (time() - $startedAt) > ($quiz->getDuration() + 5)) {
            $this->addFlash('error', 'Le délai du quiz est dépassé. Veuillez recommencer.');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $submitted  = (array) $request->request->all('answers');
        $scoreCount = 0;

        foreach ($questions as $question) {
            $selectedAnswerId = (int) ($submitted[$question->getId()] ?? 0);
            foreach ($question->getAnswers() as $answer) {
                if ($answer->getId() === $selectedAnswerId && $answer->isCorrect()) {
                    $scoreCount++;
                    break;
                }
            }
        }

        $totalQuestions = count($questions);
        $percentage     = round(($scoreCount / max($totalQuestions, 1)) * 100, 2);

        $result = new QuizResult();
        $result->setUser($user);
        $result->setQuiz($quiz);
        $result->setScore($scoreCount);
        $result->setTotalQuestions($totalQuestions);
        $result->setPercentage($percentage);
        $result->setStartedAt((new \DateTimeImmutable())->setTimestamp($startedAt));
        $result->setSubmittedAt(new \DateTimeImmutable());
        $result->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($result);

        // ✅ Seuil de certification : 80%
        if ($percentage >= self::CERTIFICATION_THRESHOLD) {
            $this->certificateService->generateForResult($result);
            $this->addFlash('success', sprintf(
                '🎉 Félicitations ! Vous avez obtenu %.0f%% (%d/%d). Votre certificat est disponible !',
                $percentage,
                $scoreCount,
                $totalQuestions
            ));
        } else {
            $this->addFlash('warning', sprintf(
                '📊 Votre score : %.0f%% (%d/%d). Le seuil de certification est de %d%%. Continuez vos révisions !',
                $percentage,
                $scoreCount,
                $totalQuestions,
                (int) self::CERTIFICATION_THRESHOLD
            ));
        }

        $this->entityManager->flush();

        $publicPdfUrl = null;
        if ($result->getCertificate()) {
            $publicPdfUrl = $this->certificateService->getPublicPdfUrl($result->getCertificate());
        }

        // ✅ CORRECTION : Chemin du template corrigé
        return $this->render('formations/quiz_result.html.twig', [
            'formation'             => $formation,
            'quiz'                  => $quiz,
            'result'                => $result,
            'threshold'             => self::CERTIFICATION_THRESHOLD,
            'feedback'              => $this->aiQuizGeneratorService->generateFeedback($percentage),
            'publicPdfUrl'          => $publicPdfUrl,
        ]);
    }

    #[Route('/{id}/inscrire', name: 'app_formations_inscrire', methods: ['POST'])]
    public function inscrire(int $id, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour vous inscrire');
            return $this->redirectToRoute('app_login');
        }

        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_formations_index');
        }

        // Vérifier si déjà inscrit
        $existingInscription = $this->inscriptionRepository->findOneBy([
            'idFormation'   => $formation->getIdFormation(),
            'idUtilisateur' => $user->getIdUtilisateur(),
        ]);

        if ($existingInscription) {
            $this->addFlash('warning', 'Vous êtes déjà inscrit à cette formation');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }

        $inscription = new InscriptionFormation();
        $inscription->setIdFormation($formation->getIdFormation());
        $inscription->setIdUtilisateur($user->getIdUtilisateur());
        $inscription->setDateInscription(new \DateTimeImmutable());
        $inscription->setStatut(InscriptionFormation::STATUT_EN_ATTENTE);

        $this->entityManager->persist($inscription);
        $this->entityManager->flush();

        $this->addFlash('success', '⏳ Votre demande d\'inscription à la formation "' . $formation->getTitre() . '" a été envoyée. En attente de validation par l\'administrateur.');
        return $this->redirectToRoute('app_mes_inscriptions');
    }

    #[Route('/inscription/{id}/annuler', name: 'app_inscription_annuler', methods: ['POST'])]
    public function annulerInscription(int $id): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $inscription = $this->inscriptionRepository->find($id);

        if (!$inscription || $inscription->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Inscription non trouvée ou accès refusé');
            return $this->redirectToRoute('app_mes_inscriptions');
        }

        // ✅ Ne pas permettre d'annuler une inscription déjà acceptée
        if ($inscription->isAcceptee()) {
            $this->addFlash('error', 'Vous ne pouvez pas annuler une inscription déjà acceptée. Contactez l\'administrateur.');
            return $this->redirectToRoute('app_mes_inscriptions');
        }

        $this->entityManager->remove($inscription);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Inscription annulée avec succès');
        return $this->redirectToRoute('app_mes_inscriptions');
    }

    private function extractVideoEmbedUrl(?string $text): ?string
    {
        if ($text === null || $text === '') {
            return null;
        }

        if (preg_match('/\[video:(https?:\/\/[^\]\s]+)\]/i', $text, $m) === 1) {
            $text = $m[1];
        }

        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]{11})/', $text, $m) === 1) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        if (preg_match('/vimeo\.com\/([0-9]+)/', $text, $m) === 1) {
            return 'https://player.vimeo.com/video/' . $m[1];
        }

        return null;
    }

    private function stripVideoTag(string $text): string
    {
        return trim((string) preg_replace('/\s*\[video:https?:\/\/[^\]\s]+\]\s*/i', ' ', $text));
    }
}
