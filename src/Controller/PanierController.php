<?php

namespace App\Controller;

use App\Repository\CodeReductionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produits')]
class PanierController extends AbstractController
{
    #[Route('/panier/appliquer-code', name: 'app_panier_appliquer_code', methods: ['POST'])]
    public function appliquerCode(
        Request $request,
        SessionInterface $session,
        CodeReductionRepository $codeReductionRepository
    ): JsonResponse {
        try {
            $data = json_decode($request->getContent(), true);

            if (!$data || empty($data['code'])) {
                return $this->json([
                    'success' => false,
                    'message' => 'Code invalide'
                ], 400);
            }

            $code = strtoupper(trim($data['code']));
            $montantTotal = (float) ($data['montant_total'] ?? 0);

            if ($montantTotal <= 0) {
                return $this->json([
                    'success' => false,
                    'message' => 'Montant du panier invalide'
                ], 400);
            }

            $user = $this->getUser();

            if ($user && method_exists($user, 'getIdUtilisateur')) {
                $codeReduction = $codeReductionRepository->findValidForUser($code, $user->getIdUtilisateur());
            } else {
                $codeReduction = $codeReductionRepository->findValidByCode($code);
            }

            if (!$codeReduction) {
                return $this->json([
                    'success' => false,
                    'message' => 'Code invalide ou expiré'
                ]);
            }

            $reduction = 0;

            if ($codeReduction->getType() === 'percentage') {
                $reduction = ($montantTotal * $codeReduction->getValeur()) / 100;
            } else {
                $reduction = $codeReduction->getValeur();
            }

            if ($reduction > $montantTotal) {
                $reduction = $montantTotal;
            }

            $reduction = round($reduction, 2);
            $nouveauTotal = round($montantTotal - $reduction, 2);

            $session->set('code_reduction', [
                'code' => $codeReduction->getCode(),
                'reduction' => $reduction,
                'nouveau_total' => $nouveauTotal
            ]);

            return $this->json([
                'success' => true,
                'message' => 'Code appliqué avec succès',
                'reduction' => $reduction,
                'nouveau_total' => $nouveauTotal
            ]);
        } catch (\Throwable $e) {
            return $this->json([
                'success' => false,
                'message' => 'Erreur serveur : ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/panier/retirer-code', name: 'app_panier_retirer_code', methods: ['POST'])]
    public function retirerCode(SessionInterface $session): JsonResponse
    {
        $session->remove('code_reduction');

        return $this->json([
            'success' => true
        ]);
    }
}
