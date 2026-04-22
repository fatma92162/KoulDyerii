<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Entity\Formation;
use App\Entity\InscriptionFormation;
use App\Entity\Question;
use App\Entity\Quiz;
use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use App\Repository\QuizRepository;
use App\Repository\UtilisateurRepository;
use App\Service\AIQuizGeneratorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/formations')]
class AdminFormationController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface         $entityManager,
        private FormationRepository            $formationRepository,
        private InscriptionFormationRepository $inscriptionRepository,
        private UtilisateurRepository          $utilisateurRepository,
        private QuizRepository                 $quizRepository,
        private AIQuizGeneratorService         $aiQuizGeneratorService,
        private string                         $stripePublicKey = ''
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    #[Route('/', name: 'app_admin_formations_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();

        $search  = $request->query->get('search', '');
        $statut  = $request->query->get('statut', '');
        $sort    = $request->query->get('sort', 'id_desc');

        $formations    = $this->formationRepository->findByFilters($search, $statut, $sort);
        $allFormations = $this->formationRepository->findAll();

        $stats = [
            'total'    => count($allFormations),
            'en_cours' => count($this->formationRepository->findBy(['statut' => 'en_cours'])),
            'termine'  => count($this->formationRepository->findBy(['statut' => 'termine'])),
            'annule'   => count($this->formationRepository->findBy(['statut' => 'annule'])),
            'payantes' => count(array_filter($allFormations, static fn (Formation $f): bool => (float) ($f->getPrix() ?? 0) > 0)),
            'gratuites'=> count(array_filter($allFormations, static fn (Formation $f): bool => (float) ($f->getPrix() ?? 0) <= 0)),
        ];

        return $this->render('admin_formations/index.html.twig', [
            'formations'   => $formations,
            'search'       => $search,
            'statutFiltre' => $statut,
            'sort'         => $sort,
            'stats'        => $stats,
            'stripeConfigured' => $this->stripePublicKey !== '',
        ]);
    }

    #[Route('/{id}/inscriptions', name: 'app_admin_formations_inscriptions', methods: ['GET'])]
    public function inscriptions(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $search       = $request->query->get('search', '');
        $statutFilter = $request->query->get('statut_filter', '');

        $inscriptions = $this->inscriptionRepository->findByFormation($id);

        // ✅ Charger les utilisateurs via le setter typé (plus de propriété dynamique)
        foreach ($inscriptions as $inscription) {
            $utilisateur = $this->utilisateurRepository->find($inscription->getIdUtilisateur());
            $inscription->setUtilisateur($utilisateur);
        }

        // Filtrage par recherche texte
        if (!empty($search)) {
            $inscriptions = array_filter($inscriptions, function ($inscription) use ($search) {
                $u = $inscription->getUtilisateur();
                if (!$u) {
                    return false;
                }
                return stripos($u->getNom(), $search) !== false
                    || stripos($u->getEmail(), $search) !== false;
            });
        }

        // Filtrage par statut
        if (!empty($statutFilter)) {
            $inscriptions = array_filter($inscriptions, fn($i) => $i->getStatut() === $statutFilter);
        }

        // ✅ Statistiques par statut
        $counts = $this->inscriptionRepository->countByStatutForFormation($id);

        return $this->render('admin_formations/inscriptions.html.twig', [
            'formation'    => $formation,
            'inscriptions' => array_values($inscriptions),
            'search'       => $search,
            'statutFilter' => $statutFilter,
            'counts'       => $counts,
        ]);
    }

    // ✅ Nouvelle route : Accepter une inscription
    #[Route('/inscription/{id}/accepter', name: 'app_admin_inscription_accepter', methods: ['POST'])]
    public function accepterInscription(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $inscription = $this->inscriptionRepository->find($id);

        if (!$inscription) {
            $this->addFlash('error', 'Inscription non trouvée.');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $inscription->setStatut(InscriptionFormation::STATUT_ACCEPTEE);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Inscription acceptée avec succès.');

        return $this->redirectToRoute('app_admin_formations_inscriptions', [
            'id' => $inscription->getIdFormation(),
        ]);
    }

    // ✅ Nouvelle route : Refuser une inscription
    #[Route('/inscription/{id}/refuser', name: 'app_admin_inscription_refuser', methods: ['POST'])]
    public function refuserInscription(int $id, Request $request): Response
    {
        $this->checkAdmin();

        $inscription = $this->inscriptionRepository->find($id);

        if (!$inscription) {
            $this->addFlash('error', 'Inscription non trouvée.');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $inscription->setStatut(InscriptionFormation::STATUT_REFUSEE);
        $this->entityManager->flush();

        $this->addFlash('warning', '❌ Inscription refusée.');

        return $this->redirectToRoute('app_admin_formations_inscriptions', [
            'id' => $inscription->getIdFormation(),
        ]);
    }

    #[Route('/new', name: 'app_admin_formations_new', methods: ['GET'])]
    public function new(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_formations/form.html.twig', [
            'formation' => null,
            'titre'     => 'Ajouter une formation',
            'errors'    => [],
            'videoUrl'  => '',
        ]);
    }

    #[Route('/create', name: 'app_admin_formations_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $this->checkAdmin();

        $titre       = trim($request->request->get('titre'));
        $description = trim($request->request->get('description'));
        $videoUrl    = trim((string) $request->request->get('video_url', ''));
        $prix        = $request->request->get('prix');
        $statut      = $request->request->get('statut', 'en_cours');

        $errors = $this->validateFormationData($titre, $description, $prix);
        if ($videoUrl !== '' && filter_var($videoUrl, FILTER_VALIDATE_URL) === false) {
            $errors['video_url'] = '❌ Le lien vidéo doit être une URL valide (YouTube/Vimeo).';
        }

        if (!empty($errors)) {
            return $this->render('admin_formations/form.html.twig', [
                'formation' => null,
                'titre'     => 'Ajouter une formation',
                'errors'    => $errors,
                'formData'  => compact('titre', 'description', 'prix', 'statut', 'videoUrl'),
                'videoUrl'  => $videoUrl,
            ]);
        }

        $formation = new Formation();
        $formation->setTitre($titre);
        $formation->setDescription($this->mergeVideoIntoDescription($description, $videoUrl));
        $formation->setPrix((float) $prix);
        $formation->setStatut($statut);
        $formation->setIdVendeuse($this->getUser()->getIdUtilisateur());

        $this->entityManager->persist($formation);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Formation ajoutée avec succès !');
        return $this->redirectToRoute('app_admin_formations_index');
    }

    #[Route('/{id}/edit', name: 'app_admin_formations_edit', methods: ['GET'])]
    public function edit(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        return $this->render('admin_formations/form.html.twig', [
            'formation'    => $formation,
            'titre'        => 'Modifier la formation',
            'errors'       => [],
            'search'       => $request->query->get('search', ''),
            'statutFiltre' => $request->query->get('statut', ''),
            'sort'         => $request->query->get('sort', 'id_desc'),
            'videoUrl'     => $this->extractVideoUrlFromText((string) ($formation->getDescription() ?? '')),
        ]);
    }

    #[Route('/{id}/update', name: 'app_admin_formations_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $titre       = trim($request->request->get('titre'));
        $description = trim($request->request->get('description'));
        $videoUrl    = trim((string) $request->request->get('video_url', ''));
        $prix        = $request->request->get('prix');
        $statut      = $request->request->get('statut', 'en_cours');

        $errors = $this->validateFormationData($titre, $description, $prix);
        if ($videoUrl !== '' && filter_var($videoUrl, FILTER_VALIDATE_URL) === false) {
            $errors['video_url'] = '❌ Le lien vidéo doit être une URL valide (YouTube/Vimeo).';
        }

        if (!empty($errors)) {
            return $this->render('admin_formations/form.html.twig', [
                'formation' => $formation,
                'titre'     => 'Modifier la formation',
                'errors'    => $errors,
                'formData'  => compact('titre', 'description', 'prix', 'statut', 'videoUrl'),
                'videoUrl'  => $videoUrl,
            ]);
        }

        $formation->setTitre($titre);
        $formation->setDescription($this->mergeVideoIntoDescription($description, $videoUrl));
        $formation->setPrix((float) $prix);
        $formation->setStatut($statut);

        $this->entityManager->flush();

        $this->addFlash('success', '✅ Formation modifiée avec succès !');

        return $this->redirectToRoute('app_admin_formations_index', [
            'search' => $request->query->get('search', ''),
            'statut' => $request->query->get('statut', ''),
            'sort'   => $request->query->get('sort', 'id_desc'),
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_formations_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $this->entityManager->remove($formation);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Formation supprimée avec succès !');

        return $this->redirectToRoute('app_admin_formations_index', [
            'search' => $request->query->get('search', ''),
            'statut' => $request->query->get('statut', ''),
            'sort'   => $request->query->get('sort', 'id_desc'),
        ]);
    }

    #[Route('/{id}/generate-quiz-ai', name: 'app_admin_formations_generate_quiz_ai', methods: ['POST'])]
    public function generateQuizWithAi(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $quiz = $this->quizRepository->findOneByFormation($formation);
        if (!$quiz) {
            $quiz = new Quiz();
            $quiz->setFormation($formation);
            $this->entityManager->persist($quiz);
        }

        $duration = (int) $request->request->get('duration', 240);
        $quiz->setDuration($duration);

        // Supprimer les anciennes questions
        foreach ($quiz->getQuestions() as $existing) {
            $this->entityManager->remove($existing);
        }
        $this->entityManager->flush();

        $generated = $this->aiQuizGeneratorService->generateQuestions(
            (string) $formation->getTitre(),
            (string) $formation->getDescription(),
            5
        );

        foreach ($generated as $item) {
            $question = new Question();
            $question->setQuiz($quiz);
            $question->setContent((string) $item['question']);
            $question->setCreatedAt(new \DateTimeImmutable());

            foreach ($item['answers'] as $answerData) {
                $answer = new Answer();
                $answer->setQuestion($question);
                $answer->setContent((string) $answerData['text']);
                $answer->setIsCorrect((bool) $answerData['isCorrect']);
                $answer->setCreatedAt(new \DateTimeImmutable());
                $question->addAnswer($answer);
            }

            $this->entityManager->persist($question);
        }

        $this->entityManager->flush();
        $this->addFlash('success', '🤖 Quiz de 5 questions généré avec succès par l\'IA.');

        return $this->redirectToRoute('app_admin_formations_index');
    }

    #[Route('/{id}/quiz-duration', name: 'app_admin_formations_quiz_duration', methods: ['POST'])]
    public function updateQuizDuration(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);

        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }

        $quiz = $this->quizRepository->findOneByFormation($formation);
        if (!$quiz) {
            $quiz = new Quiz();
            $quiz->setFormation($formation);
            $this->entityManager->persist($quiz);
        }

        $duration = (int) $request->request->get('duration', 240);
        $quiz->setDuration($duration);
        $this->entityManager->flush();

        $this->addFlash('success', '⏱️ Durée du quiz mise à jour.');
        return $this->redirectToRoute('app_admin_formations_index');
    }

    // ---- Helper privé ----

    private function validateFormationData(string $titre, string $description, mixed $prix): array
    {
        $errors = [];

        if (empty($titre)) {
            $errors['titre'] = '❌ Le titre est obligatoire';
        } elseif (strlen($titre) < 5) {
            $errors['titre'] = '❌ Le titre doit contenir au moins 5 caractères';
        } elseif (strlen($titre) > 200) {
            $errors['titre'] = '❌ Le titre ne peut pas dépasser 200 caractères';
        }

        if (empty($description)) {
            $errors['description'] = '❌ La description est obligatoire';
        } elseif (strlen($description) < 20) {
            $errors['description'] = '❌ La description doit contenir au moins 20 caractères';
        }

        if (empty($prix)) {
            $errors['prix'] = '❌ Le prix est obligatoire';
        } elseif (!is_numeric($prix) || $prix < 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif';
        }

        return $errors;
    }

    private function mergeVideoIntoDescription(string $description, string $videoUrl): string
    {
        $cleanDescription = trim((string) preg_replace('/\s*\[video:https?:\/\/[^\]\s]+\]\s*/i', ' ', $description));
        if ($videoUrl === '') {
            return $cleanDescription;
        }

        return trim($cleanDescription . ' [video:' . $videoUrl . ']');
    }

    private function extractVideoUrlFromText(string $description): string
    {
        if (preg_match('/\[video:(https?:\/\/[^\]\s]+)\]/i', $description, $m) === 1) {
            return $m[1];
        }

        return '';
    }
}
