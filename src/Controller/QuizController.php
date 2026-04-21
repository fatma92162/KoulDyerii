<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/quiz')]
class QuizController extends AbstractController
{
    #[Route('/', name: 'app_quiz_index', methods: ['GET'])]
    public function index(
        InscriptionFormationRepository $inscriptionRepository,
        FormationRepository $formationRepository,
        RequestStack $requestStack
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $inscriptions = $inscriptionRepository->findBy(['idClient' => $user->getIdUtilisateur()], ['id' => 'DESC']);
        $scores = $requestStack->getSession()?->get('quiz_scores', []) ?? [];

        $quizItems = [];
        foreach ($inscriptions as $inscription) {
            $formation = $formationRepository->find($inscription->getIdFormation());
            $score = $inscription->getQuizScore();
            if ($score === null && isset($scores[$inscription->getId()])) {
                $score = (int) $scores[$inscription->getId()];
            }

            $quizItems[] = [
                'inscriptionId' => $inscription->getId(),
                'formationTitre' => $formation?->getTitre() ?? 'Formation',
                'score' => $score,
                'eligible' => $score !== null && $score >= 80,
            ];
        }

        return $this->render('quiz/index.html.twig', [
            'quizItems' => $quizItems,
        ]);
    }

    #[Route('/{id}/soumettre', name: 'app_quiz_submit', methods: ['POST'], requirements: ['id' => '\d+'])]
    public function submit(
        int $id,
        Request $request,
        InscriptionFormationRepository $inscriptionRepository,
        RequestStack $requestStack,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $inscription = $inscriptionRepository->find($id);
        if (!$inscription || $inscription->getIdClient() !== $user->getIdUtilisateur()) {
            throw $this->createNotFoundException('Inscription non trouvée.');
        }

        $score = (int) $request->request->get('score', 0);
        if ($score < 0) {
            $score = 0;
        } elseif ($score > 100) {
            $score = 100;
        }

        $session = $requestStack->getSession();
        $scores = $session?->get('quiz_scores', []) ?? [];
        $scores[$id] = $score;
        $session?->set('quiz_scores', $scores);
        $inscription->setQuizScore($score);
        $entityManager->flush();

        if ($score >= 80) {
            $this->addFlash('success', 'Quiz validé avec ' . $score . '%. Votre certification et le QR code sont disponibles.');
            return $this->redirectToRoute('app_certification_qr', ['id' => $id]);
        }

        $this->addFlash('error', 'Résultat ' . $score . '%. Le minimum pour le certificat est 80%.');
        return $this->redirectToRoute('app_quiz_index');
    }
}
