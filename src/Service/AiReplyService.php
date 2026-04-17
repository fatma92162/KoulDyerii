<?php
// src/Service/AiReplyService.php

namespace App\Service;

use Gemini\Client;
use Psr\Log\LoggerInterface;

class AiReplyService
{
    public function __construct(
        private Client $gemini,
        private LoggerInterface $logger
    ) {}

    public function generateReply(string $commentContent, string $postTitle = ''): ?string
    {
        try {
            $prompt = "Tu es un assistant sympathique sur un réseau social culinaire tunisien. Réponds brièvement (max 2 phrases) à ce commentaire :\n";
            if ($postTitle) {
                $prompt .= "Publication : \"$postTitle\"\n";
            }
            $prompt .= "Commentaire : \"$commentContent\"\nRéponse :";

            // Appel à Gemini (adaptez selon votre bundle)
            $response = $this->gemini->geminiPro()->generateContent($prompt);
            $reply = $response->text();

            if ($reply) {
                $reply = trim($reply);
                if (strlen($reply) > 500) {
                    $reply = substr($reply, 0, 500) . '...';
                }
            }
            return $reply;
        } catch (\Exception $e) {
            $this->logger->error('Erreur génération réponse IA : ' . $e->getMessage());
            return null;
        }
    }
}