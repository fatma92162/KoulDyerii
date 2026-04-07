<?php

namespace App\Controller;

use App\Service\PointsFideliteService;
use App\Service\RecompenseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recompenses')]
class RecompenseController extends AbstractController
{
    public function __construct(
        private PointsFideliteService $pointsService,
        private RecompenseService $recompenseService
    ) {}

    #[Route('/', name: 'app_recompenses_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $pointsActuels = $this->pointsService->getSolde($user->getIdUtilisateur());
        $recompenses = $this->recompenseService->getRecompensesDisponibles();
        $recompensesAccessibles = $this->recompenseService->getRecompensesAccessibles($pointsActuels);
        $recompensesObtenues = $this->recompenseService->getRecompensesObtenues($user);
        $prochaineRecompense = $this->recompenseService->getProchaineRecompense($pointsActuels);
        $progression = $this->recompenseService->getProgression($pointsActuels, $prochaineRecompense);
        
        return $this->render('recompenses/index.html.twig', [
            'pointsActuels' => $pointsActuels,
            'recompenses' => $recompenses,
            'recompensesAccessibles' => $recompensesAccessibles,
            'recompensesObtenues' => $recompensesObtenues,
            'prochaineRecompense' => $prochaineRecompense,
            'progression' => $progression
        ]);
    }

    #[Route('/echanger/{id}', name: 'app_recompenses_echanger', methods: ['POST'])]
    public function echanger(int $id, Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Non connecté'], 401);
        }
        
        $resultat = $this->recompenseService->echangerRecompense($user, $id, $this->pointsService);
        
        if ($request->isXmlHttpRequest()) {
            return $this->json($resultat);
        }
        
        if ($resultat['success']) {
            $this->addFlash('success', $resultat['message']);
        } else {
            $this->addFlash('error', $resultat['message']);
        }
        
        return $this->redirectToRoute('app_recompenses_index');
    }

    #[Route('/mes-recompenses', name: 'app_mes_recompenses', methods: ['GET'])]
    public function mesRecompenses(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $recompensesObtenues = $this->recompenseService->getRecompensesObtenues($user);
        
        return $this->render('recompenses/mes_recompenses.html.twig', [
            'recompensesObtenues' => $recompensesObtenues
        ]);
    }
}