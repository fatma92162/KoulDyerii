<?php
// src/Twig/CensorshipExtension.php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CensorshipExtension extends AbstractExtension
{
    // Liste des mots à censurer
    private array $badWords = [
        'fuck',
        'fuck you',
        'merde',
        'putain',
        'connard',
        'salope',
        'bordel',
        'enculé',
        'bite',
        'nique',
        // Ajoutez d'autres mots ici
    ];

    public function getFilters(): array
    {
        return [
            new TwigFilter('censor', [$this, 'censorText'], ['is_safe' => ['html']]),
        ];
    }

    public function censorText(?string $text): string
    {
        if (empty($text)) {
            return '';
        }

        $censored = $text;
        foreach ($this->badWords as $word) {
            // Remplacer par des astérisques (même longueur)
            $replacement = str_repeat('*', mb_strlen($word));
            // Insensible à la casse
            $censored = preg_replace('/\b' . preg_quote($word, '/') . '\b/i', $replacement, $censored);
        }
        return $censored;
    }
}