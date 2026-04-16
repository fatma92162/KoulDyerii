<?php

namespace App\Controller;

use App\Entity\AbandonedCommande;
use App\Entity\Commande;
use App\Entity\VisitorActivity;
use App\Repository\AbandonedCommandeRepository;
use App\Repository\ProduitRepository;
use App\Repository\VisitorActivityRepository;
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
        private AbandonedCommandeRepository $abandonedCommandeRepository
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
        }

        $produits = $this->produitRepository->findDisponibles();

        return $this->render('produits/index.html.twig', [
            'produits' => $produits,
        ]);
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
                $sousTotal = $produit->getPrix() * $quantite;
                $panierDetails[] = [
                    'produit' => $produit,
                    'quantite' => $quantite,
                    'sousTotal' => $sousTotal,
                ];
                $total += $sousTotal;
            }
        }

        return $this->render('produits/panier.html.twig', [
            'panier' => $panierDetails,
            'total' => $total,
        ]);
    }

    #[Route('/panier/vider', name: 'app_panier_clear', methods: ['POST'])]
    public function viderPanier(Request $request): Response
    {
        $request->getSession()->remove('panier');
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
        $createdCount = 0;
        $firstCommandeId = null;

        foreach ($panier as $productId => $quantite) {
            $produit = $this->produitRepository->find($productId);

            if (!$produit) {
                continue;
            }

            for ($i = 0; $i < (int) $quantite; $i++) {
                $commande = new Commande();
                $commande->setProductId($produit->getIdProduit());
                $commande->setCustomerName($customerName);
                $commande->setPhone($phone);
                $commande->setLocation($location);
                $commande->setCreatedAt(new \DateTime());
                $commande->setStatus('en_attente');

                if ($user) {
                    if (method_exists($user, 'getIdUtilisateur')) {
                        $commande->setIdUtilisateur($user->getIdUtilisateur());
                    } elseif (method_exists($user, 'getId')) {
                        $commande->setIdUtilisateur($user->getId());
                    }
                }

                $this->entityManager->persist($commande);
                $this->entityManager->flush();

                if ($firstCommandeId === null) {
                    $firstCommandeId = $commande->getId();
                }

                $createdCount++;
            }
        }

        if ($createdCount === 0) {
            $this->addFlash('error', 'Impossible de créer la commande.');
            return $this->redirectToRoute('app_panier_index');
        }

        if ($draftId > 0) {
            $draft = $this->abandonedCommandeRepository->find($draftId);

            if ($draft) {
                $draft->setStatus('converted');
                $draft->setUpdatedAt(new \DateTime());
                $draft->setConvertedToCommandeId($firstCommandeId);
                $this->entityManager->flush();
            }
        }

        $request->getSession()->remove('panier');

        $this->addFlash('success', $createdCount . ' commande(s) créée(s) avec succès.');
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

        $quantite = (int) $request->request->get('quantite', 1);

        if ($quantite <= 0) {
            unset($panier[$id]);
            $this->addFlash('success', 'Produit retiré du panier');
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
    public function ajouterPanier(int $id, Request $request): Response
    {
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            $this->addFlash('error', 'Produit non trouvé');
            return $this->redirectToRoute('app_produits_index');
        }

        if (!$produit->getDisponible()) {
            $this->addFlash('error', 'Ce produit n\'est pas disponible');
            return $this->redirectToRoute('app_produits_index');
        }

        $quantite = max(1, (int) $request->request->get('quantite', 1));

        $session = $request->getSession();
        $panier = $session->get('panier', []);

        if (!isset($panier[$id])) {
            $panier[$id] = 0;
        }

        $panier[$id] += $quantite;
        $session->set('panier', $panier);

        $this->addFlash('success', '🛒 Produit ajouté au panier');

        return $this->redirectToRoute('app_produits_index');
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

        if ($customerName === '' || $phone === '' || $location === '') {
            $this->addFlash('error', 'Tous les champs sont obligatoires');
            return $this->redirectToRoute('app_produits_show', ['id' => $id]);
        }

        $commande = new Commande();
        $commande->setProductId($produit->getIdProduit());
        $commande->setCustomerName($customerName);
        $commande->setPhone($phone);
        $commande->setLocation($location);
        $commande->setCreatedAt(new \DateTime());
        $commande->setStatus('en_attente');

        if (method_exists($user, 'getIdUtilisateur')) {
            $commande->setIdUtilisateur($user->getIdUtilisateur());
        } elseif (method_exists($user, 'getId')) {
            $commande->setIdUtilisateur($user->getId());
        }

        $this->entityManager->persist($commande);
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
}