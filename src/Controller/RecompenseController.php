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
        
        // Récupérer les IDs des récompenses déjà obtenues non utilisées
        $idsRecompensesObtenues = [];
        foreach ($recompensesObtenues as $ro) {
            if (!$ro->isUtilise()) {
                $idsRecompensesObtenues[] = $ro->getRecompense()->getIdRecompense();
            }
        }
        
        return $this->render('recompenses/index.html.twig', [
            'pointsActuels' => $pointsActuels,
            'recompenses' => $recompenses,
            'recompensesAccessibles' => $recompensesAccessibles,
            'recompensesObtenues' => $recompensesObtenues,
            'prochaineRecompense' => $prochaineRecompense,
            'progression' => $progression,
            'idsRecompensesObtenues' => $idsRecompensesObtenues  // Ajouté pour le template
        ]);
    }

    #[Route('/echanger/{id}', name: 'app_recompenses_echanger', methods: ['POST'])]
    public function echanger(int $id, Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Veuillez vous connecter'], 401);
        }
        
        // Vérifier si l'utilisateur a déjà cette récompense non utilisée
        $recompensesObtenues = $this->recompenseService->getRecompensesObtenues($user);
        foreach ($recompensesObtenues as $recompenseObtenue) {
            if ($recompenseObtenue->getRecompense()->getIdRecompense() === $id && !$recompenseObtenue->isUtilise()) {
                return $this->json([
                    'success' => false, 
                    'message' => 'Vous possédez déjà cette récompense non utilisée. Veuillez l\'utiliser avant d\'en échanger une nouvelle.'
                ], 400);
            }
        }
        
        // Vérifier les points
        $pointsActuels = $this->pointsService->getSolde($user->getIdUtilisateur());
        $recompense = $this->recompenseService->getRecompenseById($id);
        
        if (!$recompense) {
            return $this->json(['success' => false, 'message' => 'Récompense non trouvée'], 404);
        }
        
        if ($pointsActuels < $recompense->getPointsRequis()) {
            return $this->json([
                'success' => false, 
                'message' => 'Points insuffisants. Vous avez ' . $pointsActuels . ' points, besoin de ' . $recompense->getPointsRequis() . ' points.'
            ], 400);
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
    
    #[Route('/utiliser/{code}', name: 'app_recompenses_utiliser', methods: ['POST'])]
    public function utiliserRecompense(string $code, Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Veuillez vous connecter'], 401);
        }
        
        $resultat = $this->recompenseService->utiliserRecompense($code, $user);
        
        if ($request->isXmlHttpRequest()) {
            return $this->json($resultat);
        }
        
        if ($resultat['success']) {
            $this->addFlash('success', $resultat['message']);
        } else {
            $this->addFlash('error', $resultat['message']);
        }
        
        return $this->redirectToRoute('app_mes_recompenses');
    }
}