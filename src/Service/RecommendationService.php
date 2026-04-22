<?php

namespace App\Service;

use App\Entity\Partenaire;
use App\Repository\PlatRepository;
use App\Repository\ProduitRepository;
use Psr\Log\LoggerInterface;

/**
 * Service de recommandation de produits pour les partenaires.
 *
 * Stratégie :
 *  1. Extraire les mots-clés des plats du partenaire (nom + ingrédients + catégorie)
 *  2. Chercher des produits dont le nom/description contient ces mots-clés
 *  3. Si aucun match → fallback sur les top produits (meilleures ventes)
 */
class RecommendationService
{
    /** Nombre de recommandations retournées par défaut */
    private const DEFAULT_LIMIT = 6;

    /** Mots vides à exclure de l'extraction de mots-clés */
    private const STOP_WORDS = [
        'le', 'la', 'les', 'de', 'du', 'des', 'un', 'une', 'et', 'ou',
        'au', 'aux', 'en', 'sur', 'avec', 'sans', 'par', 'pour', 'dans',
        'notre', 'votre', 'son', 'ses', 'mon', 'mes',
    ];

    public function __construct(
        private ProduitRepository $produitRepository,
        private PlatRepository    $platRepository,
        private LoggerInterface   $logger
    ) {
    }

    /**
     * Retourne les produits recommandés pour un partenaire donné.
     * Utilise les plats du partenaire pour extraire des mots-clés contextuels.
     *
     * @return array<int, \App\Entity\Produit>
     */
    public function getRecommendationsForPartenaire(Partenaire $partenaire, int $limit = self::DEFAULT_LIMIT): array
    {
        // 1. Charger les plats du partenaire (1 requête)
        $plats = $this->platRepository->findByIdPartenaire($partenaire->getId());

        if (empty($plats)) {
            $this->logger->info('[RecommendationService] Partenaire {id} sans plats → top produits.', [
                'id' => $partenaire->getId(),
            ]);
            return $this->produitRepository->findTopProduits($limit);
        }

        // 2. Extraire les mots-clés des plats
        $keywords = $this->extractKeywords($plats);

        $this->logger->debug('[RecommendationService] Mots-clés extraits pour partenaire {id} : {kw}', [
            'id' => $partenaire->getId(),
            'kw' => implode(', ', $keywords),
        ]);

        // 3. Rechercher des produits correspondants
        $produits = $this->produitRepository->findByKeywords($keywords, $limit);

        // 4. Fallback si aucun résultat pertinent
        if (empty($produits)) {
            $this->logger->info('[RecommendationService] Aucun produit trouvé par mots-clés → fallback top produits.');
            return $this->produitRepository->findTopProduits($limit);
        }

        return $produits;
    }

    /**
     * Retourne directement les top produits (meilleures ventes), sans contexte.
     *
     * @return array<int, \App\Entity\Produit>
     */
    public function getTopProduits(int $limit = self::DEFAULT_LIMIT): array
    {
        return $this->produitRepository->findTopProduits($limit);
    }

    /**
     * Extrait les mots-clés significatifs depuis les plats du partenaire.
     * Analyse : nom du plat, ingrédients, catégorie.
     *
     * @param  \App\Entity\Plat[] $plats
     * @return string[]
     */
    private function extractKeywords(array $plats): array
    {
        $raw = [];

        foreach ($plats as $plat) {
            // Nom du plat
            if ($plat->getNom()) {
                $raw[] = $plat->getNom();
            }
            // Ingrédients (virgule/espace séparés)
            if ($plat->getIngredients()) {
                foreach (preg_split('/[\s,;]+/', $plat->getIngredients()) as $ingredient) {
                    $raw[] = $ingredient;
                }
            }
            // Catégorie
            if ($plat->getCategorie()) {
                $raw[] = $plat->getCategorie();
            }
        }

        // Normaliser : minuscules, supprimer les mots vides, dédupliquer
        $keywords = [];
        foreach ($raw as $word) {
            $word = mb_strtolower(trim($word));
            if (mb_strlen($word) >= 3 && !in_array($word, self::STOP_WORDS, true)) {
                $keywords[$word] = true;
            }
        }

        return array_keys($keywords);
    }
}
