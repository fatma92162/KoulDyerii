<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Service\UtilisateurService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/utilisateur')]
class UtilisateurController extends AbstractController
{
    public function __construct(
        private UtilisateurService $service,
        private EntityManagerInterface $entityManager
    ) {}

    // ========================
    // ROUTES API (JSON)
    // ========================

    #[Route('/api', name: 'utilisateur_api_index', methods: ['GET'])]
    public function apiIndex(): JsonResponse
    {
        $utilisateurs = $this->service->getAll();
        return $this->json([
            'success' => true,
            'data' => array_map(fn($u) => [
                'id' => $u->getIdUtilisateur(),
                'nom' => $u->getNom(),
                'email' => $u->getEmail(),
                'role' => $u->getRole(),
                'region' => $u->getRegion(),
                'dateNaissance' => $u->getDateNaissance()?->format('Y-m-d'),
                'photo' => $u->getPhoto()
            ], $utilisateurs)
        ]);
    }

    #[Route('/api/{id}', name: 'utilisateur_api_show', methods: ['GET'])]
    public function apiShow(int $id): JsonResponse
    {
        $utilisateur = $this->service->getOne($id);
        if (!$utilisateur) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }
        return $this->json([
            'success' => true,
            'data' => [
                'id' => $utilisateur->getIdUtilisateur(),
                'nom' => $utilisateur->getNom(),
                'email' => $utilisateur->getEmail(),
                'role' => $utilisateur->getRole(),
                'region' => $utilisateur->getRegion(),
                'dateNaissance' => $utilisateur->getDateNaissance()?->format('Y-m-d'),
                'photo' => $utilisateur->getPhoto(),
                'empreinte' => $utilisateur->getEmpreinte()
            ]
        ]);
    }

    #[Route('/api', name: 'utilisateur_api_create', methods: ['POST'])]
    public function apiCreate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if (!isset($data['nom'], $data['email'], $data['motDePasse'])) {
            return $this->json(['success' => false, 'message' => 'Données manquantes (nom, email, motDePasse)'], 400);
        }
        $utilisateur = $this->service->create($data);
        return $this->json(['success' => true, 'id' => $utilisateur->getIdUtilisateur()], 201);
    }

    #[Route('/api/{id}', name: 'utilisateur_api_update', methods: ['PUT'])]
    public function apiUpdate(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $utilisateur = $this->service->update($id, $data);
        if (!$utilisateur) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }
        return $this->json(['success' => true]);
    }

    #[Route('/api/{id}', name: 'utilisateur_api_delete', methods: ['DELETE'])]
    public function apiDelete(int $id): JsonResponse
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }
        return $this->json(['success' => true]);
    }

    // ========================
    // ROUTES WEB (pages HTML)
    // ========================

    #[Route('/', name: 'app_utilisateur_liste')]
    public function liste(): Response
    {
        $utilisateurs = $this->service->getAll();
        return $this->render('utilisateur/liste.html.twig', [
            'utilisateurs' => $utilisateurs
        ]);
    }

    #[Route('/nouveau', name: 'app_utilisateur_nouveau')]
    public function nouveau(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $utilisateur = new Utilisateur();
        $formData = [];

        if ($request->isMethod('POST')) {
            $nom = $request->request->get('nom');
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $role = $request->request->get('role', 'user');

            $errors = [];
            if (empty($nom)) $errors['nom'] = 'Le nom est obligatoire';
            if (empty($email)) $errors['email'] = 'L\'email est obligatoire';
            if (empty($password)) $errors['password'] = 'Le mot de passe est obligatoire';
            if (strlen($password) < 4) $errors['password'] = 'Le mot de passe doit faire au moins 4 caractères';

            if (empty($errors)) {
                $utilisateur->setNom($nom);
                $utilisateur->setEmail($email);
                $utilisateur->setRole($role);
                $utilisateur->setMotDePasse($passwordHasher->hashPassword($utilisateur, $password));

                $this->entityManager->persist($utilisateur);
                $this->entityManager->flush();

                $this->addFlash('success', 'Utilisateur créé avec succès');
                return $this->redirectToRoute('app_utilisateur_liste');
            }
            $formData = ['nom' => $nom, 'email' => $email, 'role' => $role];
        }

        return $this->render('utilisateur/form.html.twig', [
            'utilisateur' => null,
            'titre' => 'Ajouter un utilisateur',
            'errors' => $errors ?? [],
            'formData' => $formData
        ]);
    }

    #[Route('/editer/{id}', name: 'app_utilisateur_editer')]
    public function editer(Request $request, Utilisateur $utilisateur): Response
    {
        // Vérifier les droits
        $user = $this->getUser();
        if ($user !== $utilisateur && $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Vous n\'avez pas le droit de modifier ce profil');
        }

        if ($request->isMethod('POST')) {
            $nom = $request->request->get('nom');
            $email = $request->request->get('email');
            $region = $request->request->get('region');
            $dateNaissance = $request->request->get('dateNaissance');
            $photoUrl = $request->request->get('photo'); // URL de l'avatar

            if ($nom) $utilisateur->setNom($nom);
            if ($email) $utilisateur->setEmail($email);
            if ($region) $utilisateur->setRegion($region);
            if ($dateNaissance) $utilisateur->setDateNaissance(new \DateTime($dateNaissance));
            if ($photoUrl) $utilisateur->setPhoto($photoUrl);

            $this->entityManager->flush();
            $this->addFlash('success', 'Profil mis à jour');
            return $this->redirectToRoute('app_mon_profil');
        }

        return $this->render('utilisateur/editer.html.twig', [
            'utilisateur' => $utilisateur
        ]);
    }

    #[Route('/supprimer/{id}', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function supprimer(Request $request, Utilisateur $utilisateur): Response
    {
        if (!$this->isCsrfTokenValid('delete' . $utilisateur->getIdUtilisateur(), $request->request->get('_token'))) {
            $this->addFlash('error', 'Token invalide');
            return $this->redirectToRoute('app_utilisateur_liste');
        }

        $this->entityManager->remove($utilisateur);
        $this->entityManager->flush();

        $this->addFlash('success', 'Utilisateur supprimé');
        return $this->redirectToRoute('app_utilisateur_liste');
    }
}