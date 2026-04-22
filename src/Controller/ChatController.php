<?php

namespace App\Controller;

use App\Service\AIAssistant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    #[Route('/api/chat', name: 'api_chat', methods: ['POST'])]
    public function chat(Request $request, AIAssistant $assistant): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'Connectez-vous'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $message = trim($data['message'] ?? '');

        if ($message === '') {
            return $this->json(['error' => 'Message vide'], 400);
        }

        $points = method_exists($user, 'getPointsFidelite') ? $user->getPointsFidelite() : 0;

        $systemPrompt = "Tu es l'assistant de Koul Dyeri. "
            . "L'utilisateur a {$points} points. "
            . "Réponds en français, de manière utile, concise et claire. "
            . "Aide surtout pour les points, récompenses et le compte.";

        try {
            $reply = $assistant->ask($message, $systemPrompt);

            return $this->json(['reply' => $reply]);
        } catch (\Throwable $e) {
            return $this->json(['error' => 'Erreur: ' . $e->getMessage()], 500);
        }
    }
}