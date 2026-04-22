<?php

namespace App\Controller;

use App\Service\ExternalIntegrationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/integrations')]
class IntegrationApiController extends AbstractController
{
    public function __construct(
        private ExternalIntegrationService $externalIntegrationService
    ) {
    }

    #[Route('/openfoodfacts/{barcode}', name: 'app_integrations_openfoodfacts', methods: ['GET'])]
    public function openFoodFacts(string $barcode): JsonResponse
    {
        if (!$this->getUser()) {
            return $this->json(['ok' => false, 'message' => 'Non authentifié'], 401);
        }

        if (!preg_match('/^[0-9]{8,14}$/', $barcode)) {
            return $this->json(['ok' => false, 'message' => 'Code-barres invalide'], 400);
        }

        $result = $this->externalIntegrationService->fetchOpenFoodFacts($barcode);
        return $this->json($result, $result['ok'] ? 200 : 404);
    }

    #[Route('/geocode', name: 'app_integrations_geocode', methods: ['GET'])]
    public function geocode(Request $request): JsonResponse
    {
        if (!$this->getUser()) {
            return $this->json(['ok' => false, 'message' => 'Non authentifié'], 401);
        }

        $address = trim((string) $request->query->get('address', ''));
        if ($address === '') {
            return $this->json(['ok' => false, 'message' => 'Adresse obligatoire'], 400);
        }

        $result = $this->externalIntegrationService->geocodeAddress($address);
        return $this->json($result, $result['ok'] ? 200 : 400);
    }

    #[Route('/spoonacular/search', name: 'app_integrations_spoonacular_search', methods: ['GET'])]
    public function spoonacularSearch(Request $request): JsonResponse
    {
        if (!$this->getUser()) {
            return $this->json(['ok' => false, 'message' => 'Non authentifié'], 401);
        }

        $query = trim((string) $request->query->get('query', ''));
        $limit = (int) $request->query->get('limit', 5);
        if ($query === '') {
            return $this->json(['ok' => false, 'message' => 'Query obligatoire'], 400);
        }

        $result = $this->externalIntegrationService->searchSpoonacular($query, $limit);
        return $this->json($result, $result['ok'] ? 200 : 400);
    }
}
