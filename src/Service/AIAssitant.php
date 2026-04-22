<?php
// src/Service/AIAssistant.php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class AIAssistant
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $apiKey
    ) {}

    public function ask(string $message, ?string $systemPrompt = null): string
    {
        $fullPrompt = $systemPrompt
            ? $systemPrompt . "\n\nQuestion: " . $message
            : $message;

        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';

        $response = $this->httpClient->request('POST', $url, [
            'headers' => [
                'x-goog-api-key' => $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $fullPrompt]
                        ]
                    ]
                ]
            ],
            'timeout' => 30,
        ]);

        $statusCode = $response->getStatusCode();
        $data = $response->toArray(false);

        if ($statusCode !== 200) {
            $errorMessage = $data['error']['message'] ?? 'Erreur Gemini inconnue';
            throw new \RuntimeException($errorMessage);
        }

        return $data['candidates'][0]['content']['parts'][0]['text']
            ?? 'Désolé, je n\'ai pas pu générer une réponse.';
    }
}