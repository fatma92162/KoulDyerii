<?php

namespace App\Controller;

use App\Repository\CommandRepository;
use App\Repository\LivraisonRepository;
use App\Service\DeliveryCallSessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/delivery-call')]
class DeliveryCallController extends AbstractController
{
    public function __construct(
        private LivraisonRepository $livraisonRepository,
        private CommandRepository $commandRepository,
        private DeliveryCallSessionService $callSessionService,
    ) {
    }

    #[Route('/{id}/start', name: 'app_delivery_call_start', methods: ['POST'])]
    public function start(int $id, Request $request): JsonResponse
    {
        if (!$this->isAdmin()) {
            return $this->jsonError('Acces refuse.', 403);
        }

        $livraison = $this->livraisonRepository->find($id);
        if (!$livraison) {
            return $this->jsonError('Livraison introuvable.', 404);
        }

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            return $this->jsonError('Payload invalide.', 400);
        }

        $offer = $payload['offer'] ?? null;
        if (!is_array($offer) || empty($offer['type']) || empty($offer['sdp'])) {
            return $this->jsonError('Offre WebRTC invalide.', 400);
        }

        $commande = $this->commandRepository->find($livraison->getIdCommande());
        $clientUserId = $commande && method_exists($commande, 'getIdUtilisateur') ? $commande->getIdUtilisateur() : null;

        $session = $this->callSessionService->startCall($id, $offer, [
            'caller' => 'livreur',
            'client_user_id' => $clientUserId,
            'livreur_id' => method_exists($livraison, 'getIdLivreur') ? $livraison->getIdLivreur() : null,
        ]);

        return new JsonResponse([
            'success' => true,
            'message' => 'Appel lance.',
            'status' => $session['status'],
        ]);
    }

    #[Route('/{id}/poll', name: 'app_delivery_call_poll', methods: ['GET'])]
    public function poll(int $id, Request $request): JsonResponse
    {
        $role = (string) $request->query->get('role', '');
        if (!in_array($role, ['client', 'livreur'], true)) {
            return $this->jsonError('Role invalide.', 400);
        }

        $livraison = $this->livraisonRepository->find($id);
        if (!$livraison) {
            return $this->jsonError('Livraison introuvable.', 404);
        }

        if (!$this->canAccessLivraison($livraison, $role)) {
            return $this->jsonError('Acces refuse.', 403);
        }

        $session = $this->callSessionService->getSession($id);

        return new JsonResponse([
            'success' => true,
            'session' => $session ? [
                'status' => $session['status'] ?? 'idle',
                'offer' => $role === 'client' ? ($session['offer'] ?? null) : null,
                'answer' => $role === 'livreur' ? ($session['answer'] ?? null) : null,
                'updated_at' => $session['updated_at'] ?? null,
                'decline_reason' => $session['decline_reason'] ?? null,
            ] : [
                'status' => 'idle',
                'offer' => null,
                'answer' => null,
                'updated_at' => null,
                'decline_reason' => null,
            ],
        ]);
    }

    #[Route('/{id}/accept', name: 'app_delivery_call_accept', methods: ['POST'])]
    public function accept(int $id, Request $request): JsonResponse
    {
        $livraison = $this->livraisonRepository->find($id);
        if (!$livraison) {
            return $this->jsonError('Livraison introuvable.', 404);
        }

        if (!$this->canAccessLivraison($livraison, 'client')) {
            return $this->jsonError('Acces refuse.', 403);
        }

        $payload = json_decode($request->getContent(), true);
        if (!is_array($payload)) {
            return $this->jsonError('Payload invalide.', 400);
        }

        $answer = $payload['answer'] ?? null;
        if (!is_array($answer) || empty($answer['type']) || empty($answer['sdp'])) {
            return $this->jsonError('Reponse WebRTC invalide.', 400);
        }

        try {
            $session = $this->callSessionService->acceptCall($id, $answer);
        } catch (\Throwable $e) {
            return $this->jsonError($e->getMessage(), 400);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'Appel accepte.',
            'status' => $session['status'],
        ]);
    }

    #[Route('/{id}/decline', name: 'app_delivery_call_decline', methods: ['POST'])]
    public function decline(int $id, Request $request): JsonResponse
    {
        $livraison = $this->livraisonRepository->find($id);
        if (!$livraison) {
            return $this->jsonError('Livraison introuvable.', 404);
        }

        if (!$this->canAccessLivraison($livraison, 'client')) {
            return $this->jsonError('Acces refuse.', 403);
        }

        $payload = json_decode($request->getContent(), true);
        $reason = is_array($payload) ? (string) ($payload['reason'] ?? 'declined') : 'declined';

        try {
            $session = $this->callSessionService->declineCall($id, $reason);
        } catch (\Throwable $e) {
            return $this->jsonError($e->getMessage(), 400);
        }

        return new JsonResponse([
            'success' => true,
            'message' => 'Appel refuse.',
            'status' => $session['status'],
        ]);
    }

    #[Route('/{id}/hangup', name: 'app_delivery_call_hangup', methods: ['POST'])]
    public function hangup(int $id, Request $request): JsonResponse
    {
        $livraison = $this->livraisonRepository->find($id);
        if (!$livraison) {
            return $this->jsonError('Livraison introuvable.', 404);
        }

        $payload = json_decode($request->getContent(), true);
        $role = is_array($payload) ? (string) ($payload['role'] ?? '') : '';

        if (!in_array($role, ['client', 'livreur'], true)) {
            return $this->jsonError('Role invalide.', 400);
        }

        if (!$this->canAccessLivraison($livraison, $role)) {
            return $this->jsonError('Acces refuse.', 403);
        }

        $session = $this->callSessionService->endCall($id);

        return new JsonResponse([
            'success' => true,
            'message' => 'Appel termine.',
            'status' => $session['status'],
        ]);
    }

    private function isAdmin(): bool
    {
        $user = $this->getUser();

        return $user && method_exists($user, 'getRole') && $user->getRole() === 'admin';
    }

    private function canAccessLivraison(object $livraison, string $role): bool
    {
        if ($role === 'livreur') {
            return $this->isAdmin();
        }

        $user = $this->getUser();
        if (!$user || !method_exists($user, 'getIdUtilisateur')) {
            return false;
        }

        if (!method_exists($livraison, 'getIdCommande')) {
            return false;
        }

        $commande = $this->commandRepository->find($livraison->getIdCommande());
        if (!$commande || !method_exists($commande, 'getIdUtilisateur')) {
            return false;
        }

        return (int) $commande->getIdUtilisateur() === (int) $user->getIdUtilisateur();
    }

    private function jsonError(string $message, int $status): JsonResponse
    {
        return new JsonResponse([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
