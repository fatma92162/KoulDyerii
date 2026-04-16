<?php
// src/Twig/CensorshipExtension.php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CensorshipExtension extends AbstractExtension
{
    private array $badWords = [
        'fuck you',
        'fuck',
        'merde',
        'putain',
        'connard',
        'salope',
        'bordel',
        'enculé',
        'bite',
        'nique',
        'niquer',
        'fdp',
        'pd',
        'trou du cul',
        'batard',
        'bâtard',
        'pute',
        'prostituée',
        'suce',
        'sucer',
        'branleur',
        'branleuse',
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
        
        // Trier par longueur décroissante pour remplacer les expressions longues d'abord
        usort($this->badWords, function($a, $b) {
            return strlen($b) - strlen($a);
        });

        foreach ($this->badWords as $word) {
            // Remplacer par trois étoiles
            $censored = preg_replace('/\b' . preg_quote($word, '/') . '\b/i', '***', $censored);
        }
        
        return $censored;
    }
}