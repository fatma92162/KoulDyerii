<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExternalIntegrationService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $mapboxApiKey = '',
        private string $spoonacularApiKey = ''
    ) {
    }

    /**
     * @return array{ok: bool, message?: string, data?: array<string, mixed>}
     */
    public function fetchOpenFoodFacts(string $barcode): array
    {
        $response = $this->httpClient->request('GET', 'https://world.openfoodfacts.org/api/v2/product/' . rawurlencode($barcode) . '.json');
        $status = $response->getStatusCode();
        $payload = $response->toArray(false);

        if ($status !== 200 || !isset($payload['product'])) {
            return [
                'ok' => false,
                'message' => 'Produit introuvable sur OpenFoodFacts.',
            ];
        }

        $product = $payload['product'];
        $categories = [];
        if (!empty($product['categories_tags']) && is_array($product['categories_tags'])) {
            $categories = array_values(array_filter(array_map(static fn ($c) => str_replace('en:', '', (string) $c), $product['categories_tags'])));
        }

        return [
            'ok' => true,
            'data' => [
                'name' => (string) ($product['product_name'] ?? ''),
                'ingredients' => (string) ($product['ingredients_text'] ?? ''),
                'brands' => (string) ($product['brands'] ?? ''),
                'categories' => $categories,
            ],
        ];
    }

    /**
     * @return array{ok: bool, message?: string, data?: array<string, mixed>}
     */
    public function geocodeAddress(string $address): array
    {
        if ($this->mapboxApiKey === '') {
            return [
                'ok' => false,
                'message' => 'MAPBOX_API_KEY non configurée.',
            ];
        }

        $response = $this->httpClient->request('GET', 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . rawurlencode($address) . '.json', [
            'query' => [
                'access_token' => $this->mapboxApiKey,
                'limit' => 1,
                'language' => 'fr',
            ],
        ]);

        $status = $response->getStatusCode();
        $payload = $response->toArray(false);

        if ($status !== 200 || empty($payload['features'][0])) {
            return [
                'ok' => false,
                'message' => 'Adresse non trouvée.',
            ];
        }

        $feature = $payload['features'][0];
        $center = $feature['center'] ?? [null, null];

        return [
            'ok' => true,
            'data' => [
                'label' => (string) ($feature['place_name'] ?? ''),
                'longitude' => isset($center[0]) ? (float) $center[0] : null,
                'latitude' => isset($center[1]) ? (float) $center[1] : null,
            ],
        ];
    }

    /**
     * @return array{ok: bool, message?: string, data?: array<int, array<string, mixed>>}
     */
    public function searchSpoonacular(string $query, int $limit = 5): array
    {
        if ($this->spoonacularApiKey === '') {
            return [
                'ok' => false,
                'message' => 'SPOONACULAR_API_KEY non configurée.',
            ];
        }

        $response = $this->httpClient->request('GET', 'https://api.spoonacular.com/recipes/complexSearch', [
            'query' => [
                'apiKey' => $this->spoonacularApiKey,
                'query' => $query,
                'number' => max(1, min($limit, 10)),
                'addRecipeInformation' => false,
            ],
        ]);

        $status = $response->getStatusCode();
        $payload = $response->toArray(false);

        if ($status !== 200 || !isset($payload['results']) || !is_array($payload['results'])) {
            return [
                'ok' => false,
                'message' => 'Aucun résultat Spoonacular.',
            ];
        }

        $items = array_map(static fn (array $r): array => [
            'id' => (int) ($r['id'] ?? 0),
            'title' => (string) ($r['title'] ?? ''),
            'image' => (string) ($r['image'] ?? ''),
        ], $payload['results']);

        return [
            'ok' => true,
            'data' => $items,
        ];
    }
}
