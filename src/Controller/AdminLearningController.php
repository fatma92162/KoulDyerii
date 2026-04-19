<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use App\Repository\PartenaireRepository;
use App\Repository\PlatRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
class AdminLearningController extends AbstractController
{
    #[Route('/formations', name: 'app_admin_formations', methods: ['GET'])]
    public function formations(FormationRepository $formationRepository): Response
    {
        $this->denyAdminOnly();

        return $this->render('admin/formations.html.twig', [
            'formations' => $formationRepository->findAll(),
        ]);
    }

    #[Route('/partenariats', name: 'app_admin_partenariats', methods: ['GET'])]
    public function partenariats(PartenaireRepository $partenaireRepository, PlatRepository $platRepository): Response
    {
        $this->denyAdminOnly();

        $partenaires = $partenaireRepository->findAll();
        $plats = $platRepository->findAll();

        $totalActifs = 0;
        foreach ($partenaires as $partenaire) {
            if (($partenaire->getStatut() ?? '') === 'actif') {
                $totalActifs++;
            }
        }

        return $this->render('admin/partenariats.html.twig', [
            'partenaires' => $partenaires,
            'plats' => $plats,
            'totalActifs' => $totalActifs,
        ]);
    }

    #[Route('/quiz', name: 'app_admin_quiz', methods: ['GET'])]
    public function quiz(
        InscriptionFormationRepository $inscriptionRepository,
        FormationRepository $formationRepository,
        UtilisateurRepository $utilisateurRepository
    ): Response {
        $this->denyAdminOnly();

        $inscriptions = $inscriptionRepository->findBy([], ['id' => 'DESC']);
        $items = [];
        $nbEligibles = 0;

        foreach ($inscriptions as $inscription) {
            $formation = $formationRepository->find($inscription->getIdFormation());
            $user = $utilisateurRepository->find($inscription->getIdClient());
            $score = $inscription->getQuizScore();
            $eligible = $score !== null && $score >= 80;
            if ($eligible) {
                $nbEligibles++;
            }

            $items[] = [
                'inscriptionId' => $inscription->getId(),
                'utilisateur' => $user?->getNom() ?? ('User #' . $inscription->getIdClient()),
                'formation' => $formation?->getTitre() ?? 'Formation',
                'score' => $score,
                'eligible' => $eligible,
            ];
        }

        return $this->render('admin/quiz.html.twig', [
            'items' => $items,
            'nbEligibles' => $nbEligibles,
            'total' => count($items),
        ]);
    }

    #[Route('/certifications', name: 'app_admin_certifications', methods: ['GET'])]
    public function certifications(
        InscriptionFormationRepository $inscriptionRepository,
        FormationRepository $formationRepository,
        UtilisateurRepository $utilisateurRepository
    ): Response {
        $this->denyAdminOnly();

        $inscriptions = $inscriptionRepository->findBy([], ['id' => 'DESC']);
        $items = [];

        foreach ($inscriptions as $inscription) {
            $ownerUserId = $inscription->getIdClient();
            $formation = $formationRepository->find($inscription->getIdFormation());
            $user = $utilisateurRepository->find($ownerUserId);
            $score = $inscription->getQuizScore();
            $eligible = $score === null || $score >= 80;

            $items[] = [
                'inscriptionId' => $inscription->getId(),
                'utilisateur' => $user?->getNom() ?? ('User #' . $ownerUserId),
                'formation' => $formation?->getTitre() ?? 'Formation',
                'score' => $score,
                'eligible' => $eligible,
                'certificateId' => 'CERT-' . strtoupper(substr(hash('sha256', $inscription->getId() . '|' . $ownerUserId), 0, 10)),
            ];
        }

        return $this->render('admin/certifications.html.twig', [
            'items' => $items,
        ]);
    }

    private function denyAdminOnly(): void
    {
        $user = $this->getUser();
        if (!$user || !method_exists($user, 'getRole') || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }
}
