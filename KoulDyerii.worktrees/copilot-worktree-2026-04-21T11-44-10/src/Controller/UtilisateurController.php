<?php

namespace App\Controller;

use App\Service\UtilisateurService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/utilisateur')]
class UtilisateurController extends AbstractController
{
    public function __construct(private UtilisateurService $service) {}

    // GET /api/utilisateur - Liste tous les utilisateurs
    #[Route('/', name: 'utilisateur_index', methods: ['GET'])]
    public function index(): JsonResponse
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

    // GET /api/utilisateur/{id} - Affiche un utilisateur
    #[Route('/{id}', name: 'utilisateur_show', methods: ['GET'])]
    public function show(int $id): JsonResponse
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

    // POST /api/utilisateur - Crée un utilisateur
    #[Route('/', name: 'utilisateur_create', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['nom'], $data['email'], $data['motDePasse'])) {
            return $this->json([
                'success' => false,
                'message' => 'Données manquantes (nom, email, motDePasse)'
            ], 400);
        }
        
        $utilisateur = $this->service->create($data);
        
        return $this->json([
            'success' => true,
            'id' => $utilisateur->getIdUtilisateur()
        ], 201);
    }

    // PUT /api/utilisateur/{id} - Modifie un utilisateur
    #[Route('/{id}', name: 'utilisateur_update', methods: ['PUT'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $utilisateur = $this->service->update($id, $data);
        
        if (!$utilisateur) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }
        
        return $this->json(['success' => true]);
    }

    // DELETE /api/utilisateur/{id} - Supprime un utilisateur
    #[Route('/{id}', name: 'utilisateur_delete', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $deleted = $this->service->delete($id);
        
        if (!$deleted) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }
        
        return $this->json(['success' => true]);
    }
}