<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\LigneCommandePlat;
use App\Entity\Plat;
use App\Entity\Utilisateur;
use App\Repository\PlatRepository;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Pages publiques des plats pour les utilisateurs.
 * Affiche les plats approuvés ; « meilleures ventes » = quantités sur ligne_commande_plat.
 */
#[Route('/plats')]
class PlatPublicController extends AbstractController
{
    private const SESSION_PANIER_PLATS = 'panier_plats';

    public function __construct(
        private PlatRepository $platRepository,
        private PartenaireRepository $partenaireRepository,
        private EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/panier', name: 'app_plat_panier', methods: ['GET'])]
    public function panier(Request $request): Response
    {
        $panier = $this->getPanierPlats($request);
        $details = [];
        $total = 0.0;

        foreach ($panier as $platId => $qty) {
            $plat = $this->platRepository->find((int) $platId);
            if (!$plat || $plat->getStatut() !== Plat::STATUT_APPROVED) {
                continue;
            }
            if ($plat->getIdPartenaire()) {
                $plat->setPartenaire($this->partenaireRepository->find($plat->getIdPartenaire()));
            }
            $prix = (float) $plat->getPrix();
            $sous = $prix * (int) $qty;
            $total += $sous;
            $details[] = ['plat' => $plat, 'quantite' => (int) $qty, 'sous_total' => $sous];
        }

        return $this->render('plats_public/panier.html.twig', [
            'lignes' => $details,
            'total' => $total,
        ]);
    }

    #[Route('/panier/commander', name: 'app_plat_panier_commander', methods: ['POST'])]
    public function commanderPanierPlats(Request $request): Response
    {
        $panier = $this->getPanierPlats($request);
        if ($panier === []) {
            $this->addFlash('error', 'Votre panier plats est vide.');
            return $this->redirectToRoute('app_plat_panier');
        }

        $customerName = trim((string) $request->request->get('customer_name'));
        $phone = trim((string) $request->request->get('phone'));
        $location = trim((string) $request->request->get('location'));

        if ($customerName === '' || $phone === '' || $location === '') {
            $this->addFlash('error', 'Veuillez remplir tous les champs.');
            return $this->redirectToRoute('app_plat_panier');
        }

        $lignesData = [];
        foreach ($panier as $platId => $qty) {
            $plat = $this->platRepository->find((int) $platId);
            if (!$plat || $plat->getStatut() !== Plat::STATUT_APPROVED) {
                continue;
            }
            $lignesData[] = ['plat' => $plat, 'q' => max(1, (int) $qty)];
        }

        if ($lignesData === []) {
            $this->addFlash('error', 'Aucun plat valide dans le panier.');
            return $this->redirectToRoute('app_plat_panier');
        }

        $commande = new Commande();
        $commande->setProductId(null);
        $commande->setCustomerName($customerName);
        $commande->setPhone($phone);
        $commande->setLocation($location);
        $commande->setCreatedAt(new \DateTime());
        $commande->setStatus('en_attente');

        $user = $this->getUser();
        if ($user instanceof Utilisateur) {
            $commande->setIdUtilisateur($user->getIdUtilisateur());
        }

        $this->entityManager->persist($commande);

        foreach ($lignesData as $row) {
            $plat = $row['plat'];
            $q = $row['q'];
            $ligne = new LigneCommandePlat();
            $ligne->setPlat($plat);
            $ligne->setQuantite($q);
            $commande->addLignePlat($ligne);
            $plat->addSoldUnits($q);
        }

        $this->entityManager->flush();

        $request->getSession()->remove(self::SESSION_PANIER_PLATS);
        $this->addFlash('success', '✅ Votre commande de plats a bien été enregistrée !');
        return $this->redirectToRoute('app_plats_public');
    }

    #[Route('/panier/vider', name: 'app_plat_panier_vider', methods: ['POST'])]
    public function viderPanierPlats(Request $request): Response
    {
        $request->getSession()->remove(self::SESSION_PANIER_PLATS);
        $this->addFlash('info', 'Panier plats vidé.');
        return $this->redirectToRoute('app_plat_panier');
    }

    #[Route('/panier/{id}/maj', name: 'app_plat_panier_maj', methods: ['POST'])]
    public function majLignePanierPlat(int $id, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $this->getPanierPlats($request);
        if (!isset($panier[$id])) {
            return $this->redirectToRoute('app_plat_panier');
        }
        $q = max(1, (int) $request->request->get('quantite', 1));
        $panier[$id] = $q;
        $session->set(self::SESSION_PANIER_PLATS, $panier);
        $this->addFlash('success', 'Quantité mise à jour.');
        return $this->redirectToRoute('app_plat_panier');
    }

    #[Route('/panier/{id}/supprimer', name: 'app_plat_panier_supprimer', methods: ['POST'])]
    public function supprimerLignePanierPlat(int $id, Request $request): Response
    {
        $session = $request->getSession();
        $panier = $this->getPanierPlats($request);
        unset($panier[$id]);
        $session->set(self::SESSION_PANIER_PLATS, $panier);
        $this->addFlash('success', 'Plat retiré du panier.');
        return $this->redirectToRoute('app_plat_panier');
    }

    #[Route('/', name: 'app_plats_public', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $search = $request->query->get('search', '');
        $categorie = $request->query->get('categorie', '');
        $page = max(1, (int) $request->query->get('page', 1));
        $perPage = 9;

        $plats = $this->platRepository->findApprovedPlats();
        $bestSellers = $this->platRepository->findTopPlatsBySoldQuantity(6);

        if (!empty($search)) {
            $plats = array_filter($plats, static fn ($p) =>
                stripos((string) $p->getNom(), $search) !== false ||
                stripos((string) $p->getDescription(), $search) !== false ||
                stripos((string) $p->getIngredients(), $search) !== false
            );
        }
        if (!empty($categorie)) {
            $plats = array_filter($plats, static fn ($p) =>
                strcasecmp((string) $p->getCategorie(), $categorie) === 0
            );
        }

        foreach ($plats as $plat) {
            if ($plat->getIdPartenaire()) {
                $plat->setPartenaire($this->partenaireRepository->find($plat->getIdPartenaire()));
            }
        }
        foreach ($bestSellers as $plat) {
            if ($plat->getIdPartenaire()) {
                $plat->setPartenaire($this->partenaireRepository->find($plat->getIdPartenaire()));
            }
        }

        $categories = array_unique(array_filter(
            array_map(fn ($p) => $p->getCategorie(), $plats)
        ));
        sort($categories);

        $panierCount = array_sum($this->getPanierPlats($request));

        $plats = array_values($plats);
        $totalItems = count($plats);
        $totalPages = max(1, (int) ceil($totalItems / $perPage));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * $perPage;
        $pagedPlats = array_slice($plats, $offset, $perPage);

        return $this->render('plats_public/index.html.twig', [
            'plats' => $pagedPlats,
            'bestSellers' => $bestSellers,
            'search' => $search,
            'categorie' => $categorie,
            'categories' => $categories,
            'panierPlatsCount' => $panierCount,
            'page' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    /**
     * Ajoute le plat au panier (session) puis redirige.
     */
    #[Route('/{id}/select', name: 'app_plat_select', methods: ['POST'])]
    public function selectPlat(int $id, Request $request): Response
    {
        $plat = $this->platRepository->find($id);

        if (!$plat || $plat->getStatut() !== Plat::STATUT_APPROVED) {
            $this->addFlash('error', 'Plat non disponible.');
            return $this->redirectToRoute('app_plats_public');
        }

        $session = $request->getSession();
        $panier = $this->getPanierPlats($request);
        $add = max(1, (int) $request->request->get('quantite', 1));
        $panier[$id] = ($panier[$id] ?? 0) + $add;
        $session->set(self::SESSION_PANIER_PLATS, $panier);

        $this->addFlash('success', sprintf('« %s » ajouté au panier plats.', $plat->getNom()));
        return $this->redirectToRoute('app_plats_public');
    }

    /**
     * @return array<int, int> platId => quantité
     */
    private function getPanierPlats(Request $request): array
    {
        $raw = $request->getSession()->get(self::SESSION_PANIER_PLATS, []);
        if (!is_array($raw)) {
            return [];
        }
        $out = [];
        foreach ($raw as $k => $v) {
            $out[(int) $k] = (int) $v;
        }
        return $out;
    }
}
