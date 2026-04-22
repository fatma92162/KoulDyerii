<?php

namespace App\Controller;

use App\Entity\AbandonedCommande;
use App\Entity\Commande;
use App\Entity\VisitorActivity;
use App\Repository\AbandonedCommandeRepository;
use App\Repository\ProduitRepository;
use App\Repository\VisitorActivityRepository;
use App\Repository\CodeReductionRepository;
use App\Service\PointsFideliteService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produits')]
class ProduitController extends AbstractController
{
    public function __construct(
        private ProduitRepository $produitRepository,
        private EntityManagerInterface $entityManager,
        private AbandonedCommandeRepository $abandonedCommandeRepository,
        private CodeReductionRepository $codeReductionRepository,
        private PointsFideliteService $pointsService
    ) {}

    #[Route('/', name: 'app_produits_index', methods: ['GET'])]
    public function index(Request $request, VisitorActivityRepository $visitorActivityRepository): Response
    {
        if ($request->hasSession()) {
            $session = $request->getSession();

            if (!$session->isStarted()) {
                $session->start();
            }

            $sessionId = $session->getId();

            if ($sessionId) {
                $visitor = $visitorActivityRepository->findOneBy([
                    'sessionId' => $sessionId,
                ]);

                if (!$visitor) {
                    $visitor = new VisitorActivity();
                    $visitor->setSessionId($sessionId);
                    $visitor->setCreatedAt(new \DateTime());
                    $this->entityManager->persist($visitor);
                }

                $userAgent = strtolower($request->headers->get('User-Agent', ''));
                $isMobile = preg_match('/android|iphone|ipad|ipod|mobile|opera mini|iemobile|windows phone/', $userAgent);
                $deviceType = $isMobile ? 'mobile' : 'pc';

                $visitor->setIpAddress($request->getClientIp());
                $visitor->setRouteName($request->attributes->get('_route'));
                $visitor->setPageUrl($request->getPathInfo());
                $visitor->setDeviceType($deviceType);
                $visitor->setLastSeen(new \DateTime());

                $this->entityManager->flush();
            }
            $referer = strtolower((string) $request->headers->get('referer', ''));
$utmSource = strtolower(trim((string) $request->query->get('utm_source', '')));

$sourcePlatform = 'direct';

if ($utmSource !== '') {
    $sourcePlatform = $utmSource;
} elseif (str_contains($referer, 'instagram')) {
    $sourcePlatform = 'instagram';
} elseif (str_contains($referer, 'facebook') || str_contains($referer, 'fb.')) {
    $sourcePlatform = 'facebook';
} elseif (str_contains($referer, 'tiktok')) {
    $sourcePlatform = 'tiktok';
} elseif (str_contains($referer, 'google')) {
    $sourcePlatform = 'google';
} elseif ($referer !== '') {
    $sourcePlatform = 'other';
}

$visitor->setReferrerUrl($referer ?: null);
$visitor->setUtmSource($utmSource ?: null);
$visitor->setSourcePlatform($sourcePlatform);
        }

        $produits = $this->produitRepository->findDisponibles();

        $theme = $request->getSession()->get('produits_theme', 'aov');
        $customThemeConfig = $request->getSession()->get('produits_custom_theme', []);

        $template = match ($theme) {
            'conversion' => 'produits/index_conversion.html.twig',
            'custom' => 'produits/index_custom.html.twig',
            default => 'produits/index.html.twig',
        };

        return $this->render($template, [
            'produits' => $produits,
            'customThemeConfig' => $customThemeConfig,
        ]);
    }

    private function calculateBundleTotal($produit, int $quantite): float
    {
        $prix = (float) $produit->getPrix();

        if (
            method_exists($produit, 'getBundleActive') &&
            $produit->getBundleActive()
        ) {
            $bundleType = method_exists($produit, 'getBundleType') ? $produit->getBundleType() : null;
            $bundleBuyQty = method_exists($produit, 'getBundleBuyQty') ? $produit->getBundleBuyQty() : null;
            $bundlePayQty = method_exists($produit, 'getBundlePayQty') ? $produit->getBundlePayQty() : null;
            $bundleDiscountPercent = method_exists($produit, 'getBundleDiscountPercent') ? $produit->getBundleDiscountPercent() : null;

            if ($bundleType === 'discount' && $bundleDiscountPercent && $quantite >= 2) {
                return ($prix * $quantite) * (1 - ($bundleDiscountPercent / 100));
            }

            if (
                $bundleType === 'bxgy' &&
                $bundleBuyQty &&
                $bundlePayQty &&
                $quantite >= $bundleBuyQty
            ) {
                $sets = intdiv($quantite, $bundleBuyQty);
                $remaining = $quantite % $bundleBuyQty;

                return ($sets * $bundlePayQty * $prix) + ($remaining * $prix);
            }
        }

        return $prix * $quantite;
    }

    #[Route('/panier', name: 'app_panier_index', methods: ['GET'])]
    public function panier(Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        $panierDetails = [];
        $total = 0;

        foreach ($panier as $idProduit => $quantite) {
            $produit = $this->produitRepository->find($idProduit);

            if ($produit) {
                $sousTotal = $this->calculateBundleTotal($produit, (int) $quantite);

                $panierDetails[] = [
                    'produit' => $produit,
                    'quantite' => $quantite,
                    'sousTotal' => $sousTotal,
                ];

                $total += $sousTotal;
            }
        }

        $codeReduction = $session->get('code_reduction', null);
        $reduction = 0;
        $totalFinal = $total;

        if ($codeReduction && isset($codeReduction['reduction'])) {
            $reduction = (float) $codeReduction['reduction'];
            $totalFinal = max(0, $total - $reduction);
        }

        return $this->render('produits/panier.html.twig', [
            'panier' => $panierDetails,
            'total' => $total,
            'totalFinal' => $totalFinal,
            'reduction' => $reduction,
            'codeApplique' => $codeReduction !== null,
            'codeInfo' => $codeReduction
        ]);
    }

    #[Route('/panier/test-session', name: 'app_panier_test_session', methods: ['GET'])]
    public function testSession(Request $request): JsonResponse
    {
        $user = $this->getUser();

        return $this->json([
            'authenticated' => $user !== null,
            'user_id' => $user ? $user->getIdUtilisateur() : null,
            'session_id' => $request->getSession()->getId(),
            'cookies' => $request->cookies->all(),
        ]);
    }

    #[Route('/panier/appliquer-code', name: 'app_panier_appliquer_code', methods: ['POST'])]
    public function appliquerCode(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $data = json_decode($request->getContent(), true);
        $code = trim($data['code'] ?? '');
        $montantTotal = (float) ($data['montant_total'] ?? 0);

        if (empty($code)) {
            return $this->json(['success' => false, 'message' => 'Veuillez entrer un code'], 400);
        }

        $codeReduction = $this->codeReductionRepository->findOneBy(['code' => $code]);

        if (!$codeReduction) {
            return $this->json(['success' => false, 'message' => 'Code de réduction invalide'], 404);
        }

        if (!$codeReduction->isActif()) {
            return $this->json(['success' => false, 'message' => 'Ce code n\'est plus actif'], 400);
        }

        $now = new \DateTime();
        if ($codeReduction->getValiditeDebut() > $now) {
            return $this->json(['success' => false, 'message' => 'Ce code n\'est pas encore valide'], 400);
        }

        if ($codeReduction->getValiditeFin() < $now) {
            return $this->json(['success' => false, 'message' => 'Ce code a expiré'], 400);
        }

        if ($codeReduction->getUtilisationActuelle() >= $codeReduction->getUtilisationMax()) {
            return $this->json(['success' => false, 'message' => 'Ce code a déjà été utilisé'], 400);
        }

        if (
            $codeReduction->getUtilisateur() &&
            $codeReduction->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur()
        ) {
            return $this->json(['success' => false, 'message' => 'Ce code n\'est pas valide pour votre compte'], 400);
        }

        if ($codeReduction->getType() === 'percentage') {
            $reduction = $montantTotal * ($codeReduction->getValeur() / 100);
        } else {
            $reduction = min($codeReduction->getValeur(), $montantTotal);
        }

        $nouveauTotal = max(0, $montantTotal - $reduction);

        $session = $request->getSession();
        $session->set('code_reduction', [
            'id' => $codeReduction->getId(),
            'code' => $codeReduction->getCode(),
            'type' => $codeReduction->getType(),
            'valeur' => $codeReduction->getValeur(),
            'reduction' => $reduction,
            'montant_initial' => $montantTotal,
            'montant_final' => $nouveauTotal
        ]);

        return $this->json([
            'success' => true,
            'reduction' => round($reduction, 2),
            'nouveau_total' => round($nouveauTotal, 2),
            'message' => "Code appliqué ! Réduction de " . (
                $codeReduction->getType() === 'percentage'
                    ? $codeReduction->getValeur() . '%'
                    : $codeReduction->getValeur() . '€'
            )
        ]);
    }

    #[Route('/panier/retirer-code', name: 'app_panier_retirer_code', methods: ['POST'])]
    public function retirerCode(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $session->remove('code_reduction');

        return $this->json(['success' => true, 'message' => 'Code retiré']);
    }

    #[Route('/panier/code-actif', name: 'app_panier_code_actif', methods: ['GET'])]
    public function codeActif(Request $request): JsonResponse
    {
        $session = $request->getSession();
        $codeReduction = $session->get('code_reduction', null);

        if ($codeReduction) {
            return $this->json([
                'code_applique' => true,
                'code' => $codeReduction['code'],
                'reduction' => $codeReduction['reduction'],
                'nouveau_total' => $codeReduction['montant_final']
            ]);
        }

        return $this->json(['code_applique' => false]);
    }

    #[Route('/panier/vider', name: 'app_panier_clear', methods: ['POST'])]
    public function viderPanier(Request $request): Response
    {
        $request->getSession()->remove('panier');
        $request->getSession()->remove('code_reduction');
        $this->addFlash('success', 'Panier vidé avec succès');

        return $this->redirectToRoute('app_panier_index');
    }

    #[Route('/abandoned/save', name: 'app_abandoned_commandes_save', methods: ['POST'])]
    public function saveAbandonedCommande(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!is_array($data)) {
            $data = $request->request->all();
        }

        $phone = trim((string) ($data['phone'] ?? ''));
        $customerName = trim((string) ($data['customer_name'] ?? ''));
        $location = trim((string) ($data['location'] ?? ''));
        $source = trim((string) ($data['source'] ?? 'panier'));
        $productId = isset($data['product_id']) && $data['product_id'] !== '' ? (int) $data['product_id'] : null;
        $draftId = isset($data['draft_id']) && $data['draft_id'] !== '' ? (int) $data['draft_id'] : null;

        if ($phone === '' || strlen($phone) < 6) {
            return $this->json([
                'saved' => false,
                'message' => 'Phone too short',
            ]);
        }

        $draft = null;

        if ($draftId > 0) {
            $draft = $this->abandonedCommandeRepository->find($draftId);
        }

        if (!$draft) {
            $draft = $this->abandonedCommandeRepository->findLatestDraftByPhone($phone, $source);
        }

        if (!$draft) {
            $draft = new AbandonedCommande();
            $draft->setCreatedAt(new \DateTime());
            $draft->setStatus('draft');
        }

        $draft->setUpdatedAt(new \DateTime());
        $draft->setPhone($phone);
        $draft->setCustomerName($customerName !== '' ? $customerName : null);
        $draft->setLocation($location !== '' ? $location : null);
        $draft->setSource($source);

        if ($source === 'panier') {
            $panier = $request->getSession()->get('panier', []);
            $cartData = [];

            foreach ($panier as $id => $quantite) {
                $cartData[] = [
                    'product_id' => (int) $id,
                    'quantity' => (int) $quantite,
                ];
            }

            $draft->setCartData($cartData);
            $draft->setProductId(null);
        } else {
            $draft->setProductId($productId);
            $draft->setCartData(null);
        }

        $this->entityManager->persist($draft);
        $this->entityManager->flush();

        return $this->json([
            'saved' => true,
            'draft_id' => $draft->getId(),
        ]);
    }

    #[Route('/conversion-order', name: 'app_produits_conversion_order', methods: ['POST'])]
    public function conversionOrder(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $productId = (int) $request->request->get('product_id');
        $customerName = trim((string) $request->request->get('customer_name'));
        $phone = trim((string) $request->request->get('phone'));
        $city = trim((string) $request->request->get('city'));
        $location = trim((string) $request->request->get('location'));
        $quantite = max(1, (int) $request->request->get('quantite', 1));

        if (!$productId || $customerName === '' || $phone === '' || $city === '' || $location === '') {
            return $this->json([
                'success' => false,
                'message' => 'Veuillez remplir toutes les informations.'
            ], 400);
        }

        $produit = $this->produitRepository->find($productId);

        if (!$produit) {
            return $this->json([
                'success' => false,
                'message' => 'Produit introuvable.'
            ], 404);
        }

        if (!$produit->getDisponible()) {
            return $this->json([
                'success' => false,
                'message' => 'Ce produit n\'est pas disponible.'
            ], 400);
        }

        $stock = method_exists($produit, 'getQuantite') ? (int) $produit->getQuantite() : 0;
        if ($stock <= 0) {
            return $this->json([
                'success' => false,
                'message' => 'Impossible de commander : produit en rupture de stock.'
            ], 400);
        }

        if ($quantite > $stock) {
            return $this->json([
                'success' => false,
                'message' => 'Stock insuffisant pour "' . $produit->getNom() . '".'
            ], 400);
        }

        $commande = new Commande();
        $commande->setProductId($productId);
        $commande->setCustomerName($customerName);
        $commande->setPhone($phone);
        $commande->setLocation($city . ' - ' . $location);
        $commande->setCreatedAt(new \DateTime());
        $commande->setStatus('en_attente');

        $total = $this->calculateBundleTotal($produit, $quantite);

        if (method_exists($commande, 'setQuantite')) {
            $commande->setQuantite($quantite);
        }

        if (method_exists($commande, 'setTotal')) {
            $commande->setTotal($total);
        }

        if (method_exists($commande, 'setCartItems')) {
            $commande->setCartItems([[
                'product_id' => $productId,
                'quantite' => $quantite,
                'sous_total' => $total
            ]]);
        }

        if ($this->getUser()) {
            $user = $this->getUser();
            $userId = method_exists($user, 'getIdUtilisateur') ? $user->getIdUtilisateur() : $user->getId();

            if (method_exists($commande, 'setIdUtilisateur')) {
                $commande->setIdUtilisateur($userId);
            }
        }

        $entityManager->persist($commande);

        if (method_exists($produit, 'getQuantite') && method_exists($produit, 'setQuantite')) {
            $newQuantite = max(0, (int) $produit->getQuantite() - $quantite);
            $produit->setQuantite($newQuantite);

            if ($newQuantite <= 0) {
                $produit->setDisponible(false);
            }

            $entityManager->persist($produit);
        }

        $entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Commande enregistrée avec succès.',
            'redirect' => $this->generateUrl('app_mes_commandes_index')
        ]);
    }

    #[Route('/panier/commander', name: 'app_panier_commander', methods: ['POST'])]
    public function commanderPanier(Request $request): Response
    {
        $panier = $request->getSession()->get('panier', []);

        if (empty($panier)) {
            $this->addFlash('error', 'Votre panier est vide.');
            return $this->redirectToRoute('app_panier_index');
        }

        $customerName = trim((string) $request->request->get('customer_name'));
        $phone = trim((string) $request->request->get('phone'));
        $location = trim((string) $request->request->get('location'));
        $draftId = (int) $request->request->get('abandoned_draft_id', 0);

        if ($customerName === '' || $phone === '' || $location === '') {
            $this->addFlash('error', 'Veuillez remplir tous les champs.');
            return $this->redirectToRoute('app_panier_index');
        }

        $user = $this->getUser();
        $total = 0;
        $cartItems = [];
        $firstProductId = null;

        $codeReduction = $request->getSession()->get('code_reduction', null);
        $reduction = 0;

        foreach ($panier as $productId => $quantite) {
            $produit = $this->produitRepository->find($productId);

            if (!$produit) {
                continue;
            }

            $stock = method_exists($produit, 'getQuantite') ? (int) $produit->getQuantite() : 0;

            if ($quantite > $stock) {
                $this->addFlash('error', 'Stock insuffisant pour le produit "' . $produit->getNom() . '".');
                return $this->redirectToRoute('app_panier_index');
            }

            if ($firstProductId === null) {
                $firstProductId = $produit->getIdProduit();
            }

            $sousTotal = $this->calculateBundleTotal($produit, (int) $quantite);
            $total += $sousTotal;

            $cartItems[] = [
                'product_id' => $produit->getIdProduit(),
                'nom' => $produit->getNom(),
                'prix' => (float) $produit->getPrix(),
                'quantite' => (int) $quantite,
                'sous_total' => $sousTotal,
                'photo' => $produit->getPhoto(),
            ];
        }

        if (empty($cartItems)) {
            $this->addFlash('error', 'Impossible de créer la commande.');
            return $this->redirectToRoute('app_panier_index');
        }

        if ($codeReduction) {
            $reduction = (float) $codeReduction['reduction'];
            $total = max(0, $total - $reduction);
        }

        $commande = new Commande();
        $commande->setProductId($firstProductId);
        $commande->setCustomerName($customerName);
        $commande->setPhone($phone);
        $commande->setLocation($location);
        $commande->setCreatedAt(new \DateTime());
        $commande->setStatus('en_attente');

        if (method_exists($commande, 'setQuantite')) {
            $commande->setQuantite(array_sum(array_column($cartItems, 'quantite')));
        }

        if (method_exists($commande, 'setTotal')) {
            $commande->setTotal((float) $total);
        }

        if (method_exists($commande, 'setCartItems')) {
            $commande->setCartItems($cartItems);
        }

        if ($codeReduction) {
            if (method_exists($commande, 'setCodeReduction')) {
                $commande->setCodeReduction($codeReduction['code']);
            }

            if (method_exists($commande, 'setReductionAmount')) {
                $commande->setReductionAmount($reduction);
            }

            $codeEntity = $this->codeReductionRepository->find($codeReduction['id']);
            if ($codeEntity) {
                $codeEntity->setUtilisationActuelle($codeEntity->getUtilisationActuelle() + 1);
                $this->entityManager->persist($codeEntity);
            }
        }

        if ($user) {
            if (method_exists($user, 'getIdUtilisateur')) {
                $commande->setIdUtilisateur($user->getIdUtilisateur());
            } elseif (method_exists($user, 'getId')) {
                $commande->setIdUtilisateur($user->getId());
            }
        }

        $this->entityManager->persist($commande);

        foreach ($panier as $productId => $quantite) {
            $produit = $this->produitRepository->find($productId);

            if (!$produit) {
                continue;
            }

            if (method_exists($produit, 'getQuantite') && method_exists($produit, 'setQuantite')) {
                $newQuantite = max(0, (int) $produit->getQuantite() - (int) $quantite);
                $produit->setQuantite($newQuantite);

                if ($newQuantite <= 0) {
                    $produit->setDisponible(false);
                }

                $this->entityManager->persist($produit);
            }
        }

        $this->entityManager->flush();

        if ($draftId > 0) {
            $draft = $this->abandonedCommandeRepository->find($draftId);

            if ($draft) {
                $draft->setStatus('converted');
                $draft->setUpdatedAt(new \DateTime());
                $draft->setConvertedToCommandeId($commande->getId());
                $this->entityManager->flush();
            }
        }

        if ($user && $this->pointsService) {
            $this->pointsService->ajouterPoints($user->getIdUtilisateur(), floor($total / 10), 'Achat de produits');
        }

        $request->getSession()->remove('panier');
        $request->getSession()->remove('code_reduction');

        $this->addFlash('success', '✅ Votre commande panier a été envoyée avec succès !');
        return $this->redirectToRoute('app_panier_index');
    }

    #[Route('/panier/{id}/modifier', name: 'app_panier_update', methods: ['POST'])]
    public function modifierPanier(int $id, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!isset($panier[$id])) {
            $this->addFlash('error', 'Produit non trouvé dans le panier');
            return $this->redirectToRoute('app_panier_index');
        }

        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            unset($panier[$id]);
            $session->set('panier', $panier);
            $this->addFlash('error', 'Produit introuvable');
            return $this->redirectToRoute('app_panier_index');
        }

        $quantite = (int) $request->request->get('quantite', 1);
        $stock = method_exists($produit, 'getQuantite') ? (int) $produit->getQuantite() : 0;

        if ($quantite <= 0) {
            unset($panier[$id]);
            $this->addFlash('success', 'Produit retiré du panier');
        } elseif ($quantite > $stock) {
            $this->addFlash('error', 'Stock insuffisant pour "' . $produit->getNom() . '".');
        } else {
            $panier[$id] = $quantite;
            $this->addFlash('success', 'Quantité mise à jour');
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('app_panier_index');
    }

    #[Route('/panier/{id}/supprimer', name: 'app_panier_remove', methods: ['POST'])]
    public function supprimerDuPanier(int $id, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (isset($panier[$id])) {
            unset($panier[$id]);
            $session->set('panier', $panier);
            $this->addFlash('success', 'Produit supprimé du panier');
        }

        return $this->redirectToRoute('app_panier_index');
    }

    #[Route('/{id}/ajouter-panier', name: 'app_panier_add', methods: ['POST'])]
    public function ajouterPanier(int $id, Request $request): JsonResponse
    {
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            return $this->json([
                'success' => false,
                'message' => 'Produit non trouvé'
            ], 404);
        }

        if (!$produit->getDisponible()) {
            return $this->json([
                'success' => false,
                'message' => 'Ce produit n\'est pas disponible'
            ], 400);
        }

        $quantiteDemandee = max(1, (int) $request->request->get('quantite', 1));
        $stock = method_exists($produit, 'getQuantite') ? (int) $produit->getQuantite() : 0;

        $session = $request->getSession();
        $panier = $session->get('panier', []);

        $dejaDansPanier = isset($panier[$id]) ? (int) $panier[$id] : 0;
        $nouvelleQuantite = $dejaDansPanier + $quantiteDemandee;

        if ($nouvelleQuantite > $stock) {
            return $this->json([
                'success' => false,
                'message' => 'Stock insuffisant pour "' . $produit->getNom() . '".'
            ], 400);
        }

        $panier[$id] = $nouvelleQuantite;
        $session->set('panier', $panier);

        return $this->json([
            'success' => true,
            'message' => '🛒 Produit ajouté au panier',
            'quantite' => $nouvelleQuantite
        ]);
    }

    #[Route('/{id<\d+>}/commander', name: 'app_produits_commander', methods: ['POST'])]
    public function commander(int $id, Request $request): Response
    {
        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour commander');
            return $this->redirectToRoute('app_login');
        }

        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            $this->addFlash('error', 'Produit non trouvé');
            return $this->redirectToRoute('app_produits_index');
        }

        if (!$produit->getDisponible()) {
            $this->addFlash('error', 'Ce produit n\'est pas disponible');
            return $this->redirectToRoute('app_produits_index');
        }

        $customerName = trim((string) $request->request->get('customer_name'));
        $phone = trim((string) $request->request->get('phone'));
        $location = trim((string) $request->request->get('location'));
        $draftId = (int) $request->request->get('abandoned_draft_id', 0);
        $quantite = max(1, (int) $request->request->get('quantite', 1));

        if ($customerName === '' || $phone === '' || $location === '') {
            $this->addFlash('error', 'Tous les champs sont obligatoires');
            return $this->redirectToRoute('app_produits_show', ['id' => $id]);
        }

        $stock = method_exists($produit, 'getQuantite') ? (int) $produit->getQuantite() : 0;
        if ($quantite > $stock) {
            $this->addFlash('error', 'Stock insuffisant pour "' . $produit->getNom() . '".');
            return $this->redirectToRoute('app_produits_index');
        }

        $total = $this->calculateBundleTotal($produit, $quantite);

        $commande = new Commande();
        $commande->setProductId($produit->getIdProduit());
        $commande->setCustomerName($customerName);
        $commande->setPhone($phone);
        $commande->setLocation($location);
        $commande->setCreatedAt(new \DateTime());
        $commande->setStatus('en_attente');

        if (method_exists($commande, 'setQuantite')) {
            $commande->setQuantite($quantite);
        }

        if (method_exists($commande, 'setTotal')) {
            $commande->setTotal($total);
        }

        if (method_exists($commande, 'setCartItems')) {
            $commande->setCartItems([[
                'product_id' => $produit->getIdProduit(),
                'quantite' => $quantite,
                'sous_total' => $total
            ]]);
        }

        if (method_exists($user, 'getIdUtilisateur')) {
            $commande->setIdUtilisateur($user->getIdUtilisateur());
        } elseif (method_exists($user, 'getId')) {
            $commande->setIdUtilisateur($user->getId());
        }

        $this->entityManager->persist($commande);

        if (method_exists($produit, 'getQuantite') && method_exists($produit, 'setQuantite')) {
            $newQuantite = max(0, (int) $produit->getQuantite() - $quantite);
            $produit->setQuantite($newQuantite);

            if ($newQuantite <= 0) {
                $produit->setDisponible(false);
            }

            $this->entityManager->persist($produit);
        }

        $this->entityManager->flush();

        if ($draftId > 0) {
            $draft = $this->abandonedCommandeRepository->find($draftId);

            if ($draft) {
                $draft->setStatus('converted');
                $draft->setUpdatedAt(new \DateTime());
                $draft->setConvertedToCommandeId($commande->getId());
                $this->entityManager->flush();
            }
        }

        $this->addFlash('success', '✅ Votre commande a été envoyée avec succès !');

        return $this->redirectToRoute('app_produits_index');
    }

    #[Route('/{id}', name: 'app_produits_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Produit non trouvé');
        }

        return $this->render('produits/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    #[Route('/panier/mini-data', name: 'app_panier_mini_data', methods: ['GET'])]
    public function miniPanierData(Request $request): JsonResponse
    {
        $panier = $request->getSession()->get('panier', []);
        $items = [];
        $total = 0;
        $count = 0;

        foreach ($panier as $idProduit => $quantite) {
            $produit = $this->produitRepository->find($idProduit);

            if (!$produit) {
                continue;
            }

            $prix = (float) $produit->getPrix();
            $sousTotal = $this->calculateBundleTotal($produit, (int) $quantite);

            $items[] = [
                'id' => $produit->getIdProduit(),
                'nom' => $produit->getNom(),
                'photo' => $produit->getPhoto(),
                'prix' => number_format($prix, 2, ',', ' ') . ' TND',
                'quantite' => (int) $quantite,
                'sous_total' => number_format($sousTotal, 2, ',', ' ') . ' TND',
            ];

            $total += $sousTotal;
            $count += (int) $quantite;
        }

        return $this->json([
            'items' => $items,
            'count' => $count,
            'total' => number_format($total, 2, ',', ' ') . ' TND',
        ]);
    }

    #[Route('/panier/mini-update/{id}', name: 'app_panier_mini_update', methods: ['POST'])]
    public function miniPanierUpdate(int $id, Request $request): JsonResponse
    {
        $session = $request->getSession();
        $panier = $session->get('panier', []);
        $action = $request->request->get('action', '');

        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            return $this->json(['success' => false, 'message' => 'Produit introuvable'], 404);
        }

        if (!isset($panier[$id])) {
            $panier[$id] = 0;
        }

        $stock = method_exists($produit, 'getQuantite') ? (int) $produit->getQuantite() : 0;

        if ($action === 'plus') {
            if ($panier[$id] + 1 > $stock) {
                return $this->json(['success' => false, 'message' => 'Stock insuffisant'], 400);
            }
            $panier[$id]++;
        } elseif ($action === 'minus') {
            $panier[$id]--;
            if ($panier[$id] <= 0) {
                unset($panier[$id]);
            }
        }

        $session->set('panier', $panier);

        return $this->json(['success' => true]);
    }
}
