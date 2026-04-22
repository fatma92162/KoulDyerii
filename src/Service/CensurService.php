<?php
// src/Service/CensureService.php

namespace App\Service;

class CensureService
{
    private array $motsInterdits = [
        'con', 'connard', 'connasse', 'pute', 'salope', 'merde', 'bordel', 'putain',
        'fuck', 'nique', 'enculé', 'batard', 'bâtard', 'chiant', 'chiante',
        'gros', 'grosse', 'pd', 'tarlouze', 'tafiole', 'bite', 'queue', 'couilles',
        'mort', 'morte', 'mourir', 'charmouta', '9ahba', 'tcharmout', 'hammam', 'zbib', 'zebi',
    ];

    public function censurer(string $texte): string
    {
        foreach ($this->motsInterdits as $mot) {
            $pattern = '/\b' . preg_quote($mot, '/') . '\b/iu';
            $texte = preg_replace($pattern, '***', $texte);
        }
        return $texte;
    }
}