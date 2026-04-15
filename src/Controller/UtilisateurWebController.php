<?php

namespace App\Controller;

use App\Service\UtilisateurService;
use App\Service\PointsFideliteService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

#[Route('/utilisateur')]
class UtilisateurWebController extends AbstractController
{
    public function __construct(
        private UtilisateurService $service,
        private PointsFideliteService $pointsService,
        private TokenStorageInterface $tokenStorage,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/', name: 'app_utilisateur_liste', methods: ['GET'])]
    public function liste(): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        
        $utilisateurs = $this->service->getAll();
        
        // Ajouter les points pour chaque utilisateur
        foreach ($utilisateurs as $utilisateur) {
            $points = $this->pointsService->getSolde($utilisateur->getIdUtilisateur());
            $utilisateur->setPointsFidelite($points);
        }
        
        return $this->render('utilisateur/index_admin.html.twig', [
            'utilisateurs' => $utilisateurs
        ]);
    }

    #[Route('/mon-profil', name: 'app_mon_profil', methods: ['GET'])]
    public function monProfil(): Response
    {
        $user = $this->getUser();
        $utilisateur = $this->service->getOne($user->getIdUtilisateur());
        $points = $this->pointsService->getSolde($user->getIdUtilisateur());

        if ($user->getRole() === 'admin') {
            return $this->render('utilisateur/profil_admin.html.twig', [
                'utilisateur' => $utilisateur,
                'points' => $points
            ]);
        }

        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $utilisateur,
            'points' => $points
        ]);
    }

    #[Route('/nouveau', name: 'app_utilisateur_nouveau', methods: ['GET'])]
    public function nouveau(): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        return $this->render('utilisateur/form_admin.html.twig', [
            'utilisateur' => null,
            'titre' => 'Ajouter un utilisateur'
        ]);
    }

    #[Route('/create', name: 'app_utilisateur_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        
        $data = [
            'nom' => $request->request->get('nom'),
            'email' => $request->request->get('email'),
            'motDePasse' => $request->request->get('motDePasse'),
            'role' => $request->request->get('role'),
            'region' => $request->request->get('region'),
            'dateNaissance' => $request->request->get('dateNaissance')
        ];
        
        $utilisateur = $this->service->create($data);
        
        // Créer automatiquement un solde de points pour le nouvel utilisateur
        $this->pointsService->ajouterPoints($utilisateur->getIdUtilisateur(), 0, 'Création du compte');
        
        $this->addFlash('success', 'Utilisateur créé avec succès !');
        return $this->redirectToRoute('app_utilisateur_liste');
    }

    #[Route('/{id}/editer', name: 'app_utilisateur_editer', methods: ['GET', 'POST'])]
    public function editer(int $id, Request $request): Response
    {
        $user = $this->getUser();
        $utilisateur = $this->service->getOne($id);

        if (!$utilisateur) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_utilisateur_liste');
        }

        if ($user->getRole() !== 'admin' && $user->getIdUtilisateur() !== $id) {
            return $this->redirectToRoute('app_mon_profil');
        }

        if ($request->isMethod('POST')) {
            $data = [
                'nom' => $request->request->get('nom'),
                'email' => $request->request->get('email'),
                'region' => $request->request->get('region'),
                'dateNaissance' => $request->request->get('dateNaissance')
            ];

            if ($request->request->get('motDePasse')) {
                $data['motDePasse'] = $request->request->get('motDePasse');
            }

            $this->service->update($id, $data);
            $this->addFlash('success', 'Utilisateur modifié avec succès !');

            if ($user->getIdUtilisateur() === $id) {
                $this->entityManager->refresh($user);
                $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
                $this->tokenStorage->setToken($token);
                return $this->redirectToRoute('app_mon_profil');
            }

            return $this->redirectToRoute('app_utilisateur_liste');
        }

        $points = $this->pointsService->getSolde($id);

        if ($user->getRole() === 'admin') {
            return $this->render('utilisateur/form_admin.html.twig', [
                'utilisateur' => $utilisateur,
                'titre' => 'Modifier un utilisateur',
                'points' => $points
            ]);
        }

        return $this->render('utilisateur/form.html.twig', [
            'utilisateur' => $utilisateur,
            'titre' => 'Modifier mon profil',
            'points' => $points
        ]);
    }

    #[Route('/{id}/update', name: 'app_utilisateur_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $user = $this->getUser();
        $utilisateur = $this->service->getOne($id);

        if (!$utilisateur) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_utilisateur_liste');
        }

        if ($user->getRole() !== 'admin' && $user->getIdUtilisateur() !== $id) {
            return $this->redirectToRoute('app_mon_profil');
        }

        $data = [
            'nom' => $request->request->get('nom'),
            'email' => $request->request->get('email'),
            'region' => $request->request->get('region'),
            'dateNaissance' => $request->request->get('dateNaissance')
        ];

        if ($request->request->get('motDePasse')) {
            $data['motDePasse'] = $request->request->get('motDePasse');
        }

        $this->service->update($id, $data);
        $this->addFlash('success', 'Utilisateur modifié avec succès !');

        if ($user->getIdUtilisateur() === $id) {
            $this->entityManager->refresh($user);
            $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
            $this->tokenStorage->setToken($token);
            return $this->redirectToRoute('app_mon_profil');
        }

        return $this->redirectToRoute('app_utilisateur_liste');
    }

    #[Route('/{id}/delete', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        
        // Supprimer également le solde de points
        $this->pointsService->supprimerSolde($id);
        
        $this->service->delete($id);
        $this->addFlash('success', 'Utilisateur supprimé avec succès !');
        return $this->redirectToRoute('app_utilisateur_liste');
    }

    #[Route('/{id}/ajouter-points', name: 'app_utilisateur_ajouter_points', methods: ['POST'])]
    public function ajouterPoints(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->json(['success' => false, 'message' => 'Accès refusé'], 403);
        }

        $utilisateur = $this->service->getOne($id);
        if (!$utilisateur) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }

        $points = (int) $request->request->get('points', 0);
        $operation = $request->request->get('operation', 'add');

        if ($operation === 'add') {
            $this->pointsService->ajouterPoints($id, $points, 'Ajout manuel par admin');
            $nouveauxPoints = $this->pointsService->getSolde($id);
        } else {
            $soldeActuel = $this->pointsService->getSolde($id);
            $difference = $points - $soldeActuel;
            if ($difference > 0) {
                $this->pointsService->ajouterPoints($id, $difference, 'Ajustement manuel par admin');
            } elseif ($difference < 0) {
                $this->pointsService->retirerPoints($id, abs($difference), 'Ajustement manuel par admin');
            }
            $nouveauxPoints = $points;
        }
        
        return $this->json([
            'success' => true, 
            'points' => $nouveauxPoints,
            'message' => "Points mis à jour : $nouveauxPoints"
        ]);
    }
}