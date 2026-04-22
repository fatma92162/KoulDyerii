<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\PartenaireRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Espace utilisateur : recommandations / top ventes (JSON ou Twig).
 * Pas API Platform : contrôleurs Symfony classiques.
 */
#[Route('/utilisateur/plats')]
class UserPlatController extends AbstractController
{
    public function __construct(
        private PlatRepository $platRepository,
        private PartenaireRepository $partenaireRepository,
    ) {
    }

    /**
     * JSON proche de votre ancien format partenaire / recommandations.
     *
     * Exemple : { "partenaire": "…", "recommendations": [ { "id", "nom", "prix", "ventes" } ], "total": n }
     */
    #[Route('/top-ventes.json', name: 'user_plats_top_ventes_json', methods: ['GET'])]
    public function topVentesJson(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            return $this->json(['error' => 'Authentification requise'], Response::HTTP_UNAUTHORIZED);
        }

        $limit = max(1, min(30, (int) $request->query->get('limit', 6)));
        $plats = $this->platRepository->findTopPlatsBySoldQuantity($limit);

        $partenaireNom = $user->getNom() ?? '';
        $recommendations = [];
        foreach ($plats as $plat) {
            $recommendations[] = [
                'id' => $plat->getId(),
                'nom' => $plat->getNom(),
                'description' => $plat->getDescription(),
                'prix' => $plat->getPrix(),
                'photo' => $plat->getImage(),
                'categorie' => $plat->getCategorie(),
                'ventes' => $plat->getSalesCount(),
            ];
        }

        return $this->json([
            'partenaire' => $partenaireNom,
            'recommendations' => $recommendations,
            'total' => count($recommendations),
        ]);
    }

    /**
     * Page Twig optionnelle : liste « meilleures ventes » pour choisir un plat.
     */
    #[Route('/top-ventes', name: 'user_plats_top_ventes', methods: ['GET'])]
    public function topVentesPage(Request $request): Response
    {
        $user = $this->getUser();
        if (!$user instanceof Utilisateur) {
            return $this->redirectToRoute('app_login');
        }

        $limit = max(1, min(30, (int) $request->query->get('limit', 12)));
        $plats = $this->platRepository->findTopPlatsBySoldQuantity($limit);
        foreach ($plats as $plat) {
            if ($plat->getIdPartenaire()) {
                $plat->setPartenaire($this->partenaireRepository->find($plat->getIdPartenaire()));
            }
        }

        return $this->render('plats_public/top_ventes_user.html.twig', [
            'plats' => $plats,
        ]);
    }
}
