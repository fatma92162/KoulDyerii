<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Service\ClipdropImageEditor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/produits')]
class AdminProduitController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ProduitRepository $produitRepository,
        private ClipdropImageEditor $clipdropImageEditor,
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();

        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    #[Route('/', name: 'app_admin_produits_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();

        $search = $request->query->get('search', '');
        $disponible = $request->query->get('disponible', '');
        $sort = $request->query->get('sort', 'id_desc');

        $produits = $this->produitRepository->findByFilters($search, $disponible, $sort);

        $allProduits = $this->produitRepository->findAll();
        $totalProduits = count($allProduits);
        $totalDisponibles = $this->produitRepository->countDisponibles();
        $totalIndisponibles = $totalProduits - $totalDisponibles;

        $catalogValue = 0.0;
        $availableValue = 0.0;
        $totalQuantity = 0;
        $availableQuantity = 0;

        foreach ($allProduits as $produit) {
            $prix = (float) $produit->getPrix();
            $quantite = method_exists($produit, 'getQuantite') ? (int) ($produit->getQuantite() ?? 0) : 0;

            $catalogValue += $prix * $quantite;
            $totalQuantity += $quantite;

            if ($produit->getDisponible()) {
                $availableValue += $prix * $quantite;
                $availableQuantity += $quantite;
            }
        }

        $stats = [
            'total' => $totalProduits,
            'disponibles' => $totalDisponibles,
            'indisponibles' => $totalIndisponibles,
            'catalog_value' => $catalogValue,
            'available_value' => $availableValue,
            'total_quantity' => $totalQuantity,
            'available_quantity' => $availableQuantity,
        ];

        return $this->render('admin_produits/index.html.twig', [
            'produits' => $produits,
            'search' => $search,
            'disponible' => $disponible,
            'sort' => $sort,
            'stats' => $stats,
            'currentTheme' => $request->getSession()->get('produits_theme', 'aov'),
            'customThemeConfig' => $request->getSession()->get('produits_custom_theme', []),
        ]);
    }

    #[Route('/new', name: 'app_admin_produits_new', methods: ['GET'])]
    public function new(): Response
    {
        $this->checkAdmin();

        return $this->render('admin_produits/form.html.twig', [
            'produit' => null,
            'titre' => 'Ajouter un produit',
            'errors' => [],
            'formData' => []
        ]);
    }

    #[Route('/create', name: 'app_admin_produits_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $this->checkAdmin();

        $nom = trim((string) $request->request->get('nom'));
        $description = trim((string) $request->request->get('description'));
        $prix = $request->request->get('prix');
        $quantite = (int) $request->request->get('quantite', 0);
        $disponible = $request->request->get('disponible') === 'on';

        $bundleActive = $request->request->get('bundle_active') === 'on';
        $bundleType = trim((string) $request->request->get('bundle_type', ''));
        $bundleBuyQty = $request->request->get('bundle_buy_qty') !== '' ? (int) $request->request->get('bundle_buy_qty') : null;
        $bundlePayQty = $request->request->get('bundle_pay_qty') !== '' ? (int) $request->request->get('bundle_pay_qty') : null;
        $bundleDiscountPercent = $request->request->get('bundle_discount_percent') !== '' ? (int) $request->request->get('bundle_discount_percent') : null;

        $errors = [];
        $formData = compact(
            'nom',
            'description',
            'prix',
            'quantite',
            'disponible',
            'bundleActive',
            'bundleType',
            'bundleBuyQty',
            'bundlePayQty',
            'bundleDiscountPercent'
        );

        if (empty($nom)) {
            $errors['nom'] = '❌ Le nom du produit est obligatoire.';
        } elseif (strlen($nom) < 3) {
            $errors['nom'] = '❌ Le nom doit contenir au moins 3 caractères.';
        } elseif (strlen($nom) > 100) {
            $errors['nom'] = '❌ Le nom ne peut pas dépasser 100 caractères.';
        }

        if (!empty($description) && strlen($description) < 10) {
            $errors['description'] = '❌ La description doit contenir au moins 10 caractères.';
        }

        if ($prix === null || $prix === '') {
            $errors['prix'] = '❌ Le prix est obligatoire.';
        } elseif (!is_numeric($prix) || (float) $prix <= 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif.';
        }

        if ($quantite < 0) {
            $errors['quantite'] = '❌ La quantité doit être positive ou nulle.';
        }

        if ($bundleActive) {
            if (!in_array($bundleType, ['discount', 'bxgy'], true)) {
                $errors['bundle_type'] = '❌ Choisissez un type de bundle valide.';
            }

            if ($bundleType === 'discount') {
                if ($bundleDiscountPercent === null || $bundleDiscountPercent <= 0 || $bundleDiscountPercent >= 100) {
                    $errors['bundle_discount_percent'] = '❌ La réduction doit être entre 1 et 99%.';
                }
            }

            if ($bundleType === 'bxgy') {
                if ($bundleBuyQty === null || $bundleBuyQty < 2) {
                    $errors['bundle_buy_qty'] = '❌ Acheter X doit être au moins 2.';
                }

                if ($bundlePayQty === null || $bundlePayQty < 1) {
                    $errors['bundle_pay_qty'] = '❌ Payer Y doit être au moins 1.';
                }

                if ($bundleBuyQty !== null && $bundlePayQty !== null && $bundlePayQty >= $bundleBuyQty) {
                    $errors['bundle_pay_qty'] = '❌ Payer Y doit être inférieur à Acheter X.';
                }
            }
        }

        $imageFile = $request->files->get('photo');
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $maxFileSize = 2 * 1024 * 1024;

            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes, true)) {
                $errors['photo'] = '❌ Format d\'image non autorisé. Utilisez JPG, PNG, GIF ou WEBP.';
            }

            if ($imageFile->getSize() > $maxFileSize) {
                $errors['photo'] = '❌ L\'image ne doit pas dépasser 2 Mo.';
            }
        }

        if (!empty($errors)) {
            return $this->render('admin_produits/form.html.twig', [
                'produit' => null,
                'titre' => 'Ajouter un produit',
                'errors' => $errors,
                'formData' => $formData
            ]);
        }

        $produit = new Produit();
        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix((float) $prix);
        $produit->setDisponible($disponible);
        $produit->setIdVendeuse($this->getUser()->getIdUtilisateur());

        if (method_exists($produit, 'setQuantite')) {
            $produit->setQuantite($quantite);
        }

        if (method_exists($produit, 'setBundleActive')) {
            $produit->setBundleActive($bundleActive);
        }
        if (method_exists($produit, 'setBundleType')) {
            $produit->setBundleType($bundleActive ? $bundleType : null);
        }
        if (method_exists($produit, 'setBundleBuyQty')) {
            $produit->setBundleBuyQty($bundleActive ? $bundleBuyQty : null);
        }
        if (method_exists($produit, 'setBundlePayQty')) {
            $produit->setBundlePayQty($bundleActive ? $bundlePayQty : null);
        }
        if (method_exists($produit, 'setBundleDiscountPercent')) {
            $produit->setBundleDiscountPercent($bundleActive ? $bundleDiscountPercent : null);
        }

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/produits';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadDir, $newFileName);
            $produit->setPhoto('/uploads/produits/' . $newFileName);
        }

        $this->entityManager->persist($produit);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Produit ajouté avec succès !');
        return $this->redirectToRoute('app_admin_produits_index');
    }

    #[Route('/{id}/edit', name: 'app_admin_produits_edit', methods: ['GET'])]
    public function edit(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            $this->addFlash('error', 'Produit non trouvé');
            return $this->redirectToRoute('app_admin_produits_index');
        }

        return $this->render('admin_produits/form.html.twig', [
            'produit' => $produit,
            'titre' => 'Modifier le produit',
            'errors' => [],
            'formData' => [],
            'search' => $request->query->get('search', ''),
            'disponible' => $request->query->get('disponible', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/{id}/update', name: 'app_admin_produits_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            $this->addFlash('error', 'Produit non trouvé');
            return $this->redirectToRoute('app_admin_produits_index');
        }

        $nom = trim((string) $request->request->get('nom'));
        $description = trim((string) $request->request->get('description'));
        $prix = $request->request->get('prix');
        $quantite = (int) $request->request->get('quantite', 0);
        $disponible = $request->request->get('disponible') === 'on';
        $deleteImage = $request->request->get('delete_image');

        $bundleActive = $request->request->get('bundle_active') === 'on';
        $bundleType = trim((string) $request->request->get('bundle_type', ''));
        $bundleBuyQty = $request->request->get('bundle_buy_qty') !== '' ? (int) $request->request->get('bundle_buy_qty') : null;
        $bundlePayQty = $request->request->get('bundle_pay_qty') !== '' ? (int) $request->request->get('bundle_pay_qty') : null;
        $bundleDiscountPercent = $request->request->get('bundle_discount_percent') !== '' ? (int) $request->request->get('bundle_discount_percent') : null;

        $errors = [];
        $formData = compact(
            'nom',
            'description',
            'prix',
            'quantite',
            'disponible',
            'bundleActive',
            'bundleType',
            'bundleBuyQty',
            'bundlePayQty',
            'bundleDiscountPercent'
        );

        if (empty($nom)) {
            $errors['nom'] = '❌ Le nom du produit est obligatoire.';
        } elseif (strlen($nom) < 3) {
            $errors['nom'] = '❌ Le nom doit contenir au moins 3 caractères.';
        } elseif (strlen($nom) > 100) {
            $errors['nom'] = '❌ Le nom ne peut pas dépasser 100 caractères.';
        }

        if (!empty($description) && strlen($description) < 10) {
            $errors['description'] = '❌ La description doit contenir au moins 10 caractères.';
        }

        if ($prix === null || $prix === '') {
            $errors['prix'] = '❌ Le prix est obligatoire.';
        } elseif (!is_numeric($prix) || (float) $prix <= 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif.';
        }

        if ($quantite < 0) {
            $errors['quantite'] = '❌ La quantité doit être positive ou nulle.';
        }

        if ($bundleActive) {
            if (!in_array($bundleType, ['discount', 'bxgy'], true)) {
                $errors['bundle_type'] = '❌ Choisissez un type de bundle valide.';
            }

            if ($bundleType === 'discount') {
                if ($bundleDiscountPercent === null || $bundleDiscountPercent <= 0 || $bundleDiscountPercent >= 100) {
                    $errors['bundle_discount_percent'] = '❌ La réduction doit être entre 1 et 99%.';
                }
            }

            if ($bundleType === 'bxgy') {
                if ($bundleBuyQty === null || $bundleBuyQty < 2) {
                    $errors['bundle_buy_qty'] = '❌ Acheter X doit être au moins 2.';
                }

                if ($bundlePayQty === null || $bundlePayQty < 1) {
                    $errors['bundle_pay_qty'] = '❌ Payer Y doit être au moins 1.';
                }

                if ($bundleBuyQty !== null && $bundlePayQty !== null && $bundlePayQty >= $bundleBuyQty) {
                    $errors['bundle_pay_qty'] = '❌ Payer Y doit être inférieur à Acheter X.';
                }
            }
        }

        $imageFile = $request->files->get('photo');
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];

            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes, true)) {
                $errors['photo'] = '❌ Format d\'image non autorisé.';
            }
        }

        if (!empty($errors)) {
            return $this->render('admin_produits/form.html.twig', [
                'produit' => $produit,
                'titre' => 'Modifier le produit',
                'errors' => $errors,
                'formData' => $formData
            ]);
        }

        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix((float) $prix);
        $produit->setDisponible($disponible);
        $produit->setIdVendeuse($this->getUser()->getIdUtilisateur());

        if (method_exists($produit, 'setQuantite')) {
            $produit->setQuantite($quantite);
        }

        if (method_exists($produit, 'setBundleActive')) {
            $produit->setBundleActive($bundleActive);
        }
        if (method_exists($produit, 'setBundleType')) {
            $produit->setBundleType($bundleActive ? $bundleType : null);
        }
        if (method_exists($produit, 'setBundleBuyQty')) {
            $produit->setBundleBuyQty($bundleActive ? $bundleBuyQty : null);
        }
        if (method_exists($produit, 'setBundlePayQty')) {
            $produit->setBundlePayQty($bundleActive ? $bundlePayQty : null);
        }
        if (method_exists($produit, 'setBundleDiscountPercent')) {
            $produit->setBundleDiscountPercent($bundleActive ? $bundleDiscountPercent : null);
        }

        if ($deleteImage && $produit->getPhoto()) {
            $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $produit->getPhoto();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $produit->setPhoto(null);
        }

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/produits';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($produit->getPhoto()) {
                $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $produit->getPhoto();
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadDir, $newFileName);
            $produit->setPhoto('/uploads/produits/' . $newFileName);
        }

        $this->entityManager->flush();

        $this->addFlash('success', '✅ Produit modifié avec succès !');

        return $this->redirectToRoute('app_admin_produits_index', [
            'search' => $request->query->get('search', ''),
            'disponible' => $request->query->get('disponible', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_produits_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $this->checkAdmin();
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            $this->addFlash('error', 'Produit non trouvé');
            return $this->redirectToRoute('app_admin_produits_index');
        }

        if ($produit->getPhoto()) {
            $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $produit->getPhoto();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $this->entityManager->remove($produit);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Produit supprimé avec succès !');
        return $this->redirectToRoute('app_admin_produits_index');
    }

    #[Route('/set-theme/{theme}', name: 'app_admin_produits_set_theme', methods: ['POST'])]
    public function setTheme(string $theme, Request $request): Response
    {
        $this->checkAdmin();

        $allowedThemes = ['aov', 'conversion', 'custom'];

        if (!in_array($theme, $allowedThemes, true)) {
            $this->addFlash('error', 'Thème invalide.');
            return $this->redirectToRoute('app_admin_produits_index');
        }

        $request->getSession()->set('produits_theme', $theme);

        $this->addFlash('success', '✅ Thème produit changé vers : ' . strtoupper($theme));
        return $this->redirectToRoute('app_admin_produits_index');
    }

    #[Route('/save-custom-theme', name: 'app_admin_produits_save_custom_theme', methods: ['POST'])]
    public function saveCustomTheme(Request $request): JsonResponse
    {
        $this->checkAdmin();

        $data = json_decode($request->getContent(), true);
        if (!is_array($data)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Payload invalide.'
            ], 400);
        }

        $title = trim((string) ($data['title'] ?? 'My custom layout'));
        $style = (string) ($data['style'] ?? 'premium');
        $showBundles = (bool) ($data['showBundles'] ?? true);
        $showTestimonials = (bool) ($data['showTestimonials'] ?? true);
        $order = is_array($data['order'] ?? null) ? $data['order'] : [];

        $allowedStyles = ['premium', 'clean', 'conversion'];
        if (!in_array($style, $allowedStyles, true)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Style de thème invalide.'
            ], 400);
        }

        $allowedBlocks = ['hero', 'featured', 'bundles', 'testimonials', 'cta'];
        $normalizedOrder = [];
        foreach ($order as $block) {
            if (is_string($block) && in_array($block, $allowedBlocks, true) && !in_array($block, $normalizedOrder, true)) {
                $normalizedOrder[] = $block;
            }
        }

        foreach ($allowedBlocks as $block) {
            if (!in_array($block, $normalizedOrder, true)) {
                $normalizedOrder[] = $block;
            }
        }

        $request->getSession()->set('produits_custom_theme', [
            'title' => $title !== '' ? $title : 'My custom layout',
            'style' => $style,
            'showBundles' => $showBundles,
            'showTestimonials' => $showTestimonials,
            'order' => $normalizedOrder,
        ]);
        $request->getSession()->set('produits_theme', 'custom');

        return new JsonResponse([
            'success' => true,
            'message' => 'Thème personnalisé sauvegardé.'
        ]);
    }

    #[Route('/ajouter-ajax', name: 'app_admin_produit_ajax', methods: ['POST'])]
    public function ajouterAjax(Request $request): JsonResponse
    {
        $this->checkAdmin();

        $nom = trim((string) $request->request->get('nom'));
        $description = trim((string) $request->request->get('description'));
        $prix = $request->request->get('prix');
        $quantite = (int) $request->request->get('quantite', 0);
        $disponible = $request->request->get('disponible') === 'on';

        $bundleActive = $request->request->get('bundle_active') === 'on';
        $bundleType = trim((string) $request->request->get('bundle_type', ''));
        $bundleBuyQty = $request->request->get('bundle_buy_qty') !== '' ? (int) $request->request->get('bundle_buy_qty') : null;
        $bundlePayQty = $request->request->get('bundle_pay_qty') !== '' ? (int) $request->request->get('bundle_pay_qty') : null;
        $bundleDiscountPercent = $request->request->get('bundle_discount_percent') !== '' ? (int) $request->request->get('bundle_discount_percent') : null;

        if ($nom === '' || $prix === null || $prix === '' || !is_numeric($prix) || (float) $prix <= 0 || $quantite < 0) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Données invalides.'
            ], 400);
        }

        if ($bundleActive) {
            if (!in_array($bundleType, ['discount', 'bxgy'], true)) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Type de bundle invalide.'
                ], 400);
            }

            if ($bundleType === 'discount' && ($bundleDiscountPercent === null || $bundleDiscountPercent <= 0 || $bundleDiscountPercent >= 100)) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Réduction bundle invalide.'
                ], 400);
            }

            if ($bundleType === 'bxgy') {
                if ($bundleBuyQty === null || $bundleBuyQty < 2 || $bundlePayQty === null || $bundlePayQty < 1 || $bundlePayQty >= $bundleBuyQty) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Configuration Buy X Pay Y invalide.'
                    ], 400);
                }
            }
        }

        $imageFile = $request->files->get('photo');

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $maxFileSize = 2 * 1024 * 1024;

            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes, true)) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Format image non autorisé.'
                ], 400);
            }

            if ($imageFile->getSize() > $maxFileSize) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Image trop volumineuse.'
                ], 400);
            }
        }

        $produit = new Produit();
        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix((float) $prix);
        $produit->setDisponible($disponible);
        $produit->setIdVendeuse($this->getUser()->getIdUtilisateur());

        if (method_exists($produit, 'setQuantite')) {
            $produit->setQuantite($quantite);
        }

        if (method_exists($produit, 'setBundleActive')) {
            $produit->setBundleActive($bundleActive);
        }
        if (method_exists($produit, 'setBundleType')) {
            $produit->setBundleType($bundleActive ? $bundleType : null);
        }
        if (method_exists($produit, 'setBundleBuyQty')) {
            $produit->setBundleBuyQty($bundleActive ? $bundleBuyQty : null);
        }
        if (method_exists($produit, 'setBundlePayQty')) {
            $produit->setBundlePayQty($bundleActive ? $bundlePayQty : null);
        }
        if (method_exists($produit, 'setBundleDiscountPercent')) {
            $produit->setBundleDiscountPercent($bundleActive ? $bundleDiscountPercent : null);
        }

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/produits';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadDir, $newFileName);
            $produit->setPhoto('/uploads/produits/' . $newFileName);
        }

        $this->entityManager->persist($produit);
        $this->entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Produit ajouté avec succès.'
        ]);
    }

    #[Route('/modifier-ajax', name: 'app_admin_produit_ajax_update', methods: ['POST'])]
    public function modifierAjax(Request $request): JsonResponse
    {
        $this->checkAdmin();

        $id = (int) $request->request->get('id');
        $produit = $this->produitRepository->find($id);

        if (!$produit) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Produit introuvable.'
            ], 404);
        }

        $nom = trim((string) $request->request->get('nom'));
        $description = trim((string) $request->request->get('description'));
        $prix = $request->request->get('prix');
        $quantite = (int) $request->request->get('quantite', 0);
        $disponible = $request->request->get('disponible') === 'on';

        $bundleActive = $request->request->get('bundle_active') === 'on';
        $bundleType = trim((string) $request->request->get('bundle_type', ''));
        $bundleBuyQty = $request->request->get('bundle_buy_qty') !== '' ? (int) $request->request->get('bundle_buy_qty') : null;
        $bundlePayQty = $request->request->get('bundle_pay_qty') !== '' ? (int) $request->request->get('bundle_pay_qty') : null;
        $bundleDiscountPercent = $request->request->get('bundle_discount_percent') !== '' ? (int) $request->request->get('bundle_discount_percent') : null;

        if ($nom === '' || $prix === null || $prix === '' || !is_numeric($prix) || (float) $prix <= 0 || $quantite < 0) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Données invalides.'
            ], 400);
        }

        if ($bundleActive) {
            if (!in_array($bundleType, ['discount', 'bxgy'], true)) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Type de bundle invalide.'
                ], 400);
            }

            if ($bundleType === 'discount' && ($bundleDiscountPercent === null || $bundleDiscountPercent <= 0 || $bundleDiscountPercent >= 100)) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Réduction bundle invalide.'
                ], 400);
            }

            if ($bundleType === 'bxgy') {
                if ($bundleBuyQty === null || $bundleBuyQty < 2 || $bundlePayQty === null || $bundlePayQty < 1 || $bundlePayQty >= $bundleBuyQty) {
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'Configuration Buy X Pay Y invalide.'
                    ], 400);
                }
            }
        }

        $imageFile = $request->files->get('photo');

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $maxFileSize = 2 * 1024 * 1024;

            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes, true)) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Format image non autorisé.'
                ], 400);
            }

            if ($imageFile->getSize() > $maxFileSize) {
                return new JsonResponse([
                    'success' => false,
                    'message' => 'Image trop volumineuse.'
                ], 400);
            }
        }

        $produit->setNom($nom);
        $produit->setDescription($description);
        $produit->setPrix((float) $prix);
        $produit->setDisponible($disponible);
        $produit->setIdVendeuse($this->getUser()->getIdUtilisateur());

        if (method_exists($produit, 'setQuantite')) {
            $produit->setQuantite($quantite);
        }

        if (method_exists($produit, 'setBundleActive')) {
            $produit->setBundleActive($bundleActive);
        }
        if (method_exists($produit, 'setBundleType')) {
            $produit->setBundleType($bundleActive ? $bundleType : null);
        }
        if (method_exists($produit, 'setBundleBuyQty')) {
            $produit->setBundleBuyQty($bundleActive ? $bundleBuyQty : null);
        }
        if (method_exists($produit, 'setBundlePayQty')) {
            $produit->setBundlePayQty($bundleActive ? $bundlePayQty : null);
        }
        if (method_exists($produit, 'setBundleDiscountPercent')) {
            $produit->setBundleDiscountPercent($bundleActive ? $bundleDiscountPercent : null);
        }

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/produits';

            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if ($produit->getPhoto()) {
                $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $produit->getPhoto();
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadDir, $newFileName);
            $produit->setPhoto('/uploads/produits/' . $newFileName);
        }

        $this->entityManager->flush();

        return new JsonResponse([
            'success' => true,
            'message' => 'Produit modifié avec succès.'
        ]);
    }
    #[Route('/ai-edit-ajax', name: 'app_admin_produit_ai_edit', methods: ['POST'])]
    public function aiEditAjax(Request $request): JsonResponse
    {
        $this->checkAdmin();

        $id = (int) $request->request->get('id');
        $action = (string) $request->request->get('action', 'remove_background');
        $prompt = trim((string) $request->request->get('prompt', ''));
        $applyToProduct = filter_var($request->request->get('apply_to_product', '1'), FILTER_VALIDATE_BOOL);

        if (!in_array($action, ['remove_background', 'replace_background'], true)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Action IA invalide.'
            ], 400);
        }

        if ($action === 'replace_background' && $prompt === '') {
            return new JsonResponse([
                'success' => false,
                'message' => 'Le prompt est obligatoire pour remplacer le fond.'
            ], 400);
        }

        $produit = $this->produitRepository->find($id);
        if (!$produit) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Produit introuvable.'
            ], 404);
        }

        if (!$produit->getPhoto()) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Ce produit n\'a pas encore d\'image.'
            ], 400);
        }

        $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $produit->getPhoto();
        if (!is_file($imagePath)) {
            return new JsonResponse([
                'success' => false,
                'message' => 'Image source introuvable sur le serveur.'
            ], 404);
        }

        try {
            $result = $this->clipdropImageEditor->edit($imagePath, $action, $prompt !== '' ? $prompt : null);
            $servedPath = $this->generateUrl('app_admin_produit_ai_image', [
                'filename' => $result['filename'],
            ]);

            if ($applyToProduct) {
                $produit->setPhoto($servedPath);
                $this->entityManager->flush();
            }

            return new JsonResponse([
                'success' => true,
                'message' => $applyToProduct
                    ? 'Image IA gÃ©nÃ©rÃ©e et appliquÃ©e au produit.'
                    : 'Image IA gÃ©nÃ©rÃ©e avec succÃ¨s.',
                'result' => [
                    'public_path' => $servedPath,
                    'updated_product_image' => $applyToProduct,
                ],
            ]);
        } catch (\Throwable $e) {
            return new JsonResponse([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    #[Route('/ai-image/{filename}', name: 'app_admin_produit_ai_image', methods: ['GET'])]
    public function serveAiImage(string $filename): Response
    {
        $safeFilename = basename($filename);
        $path = $this->getParameter('kernel.project_dir') . '/public/uploads/ai-edits/' . $safeFilename;

        if (!is_file($path)) {
            throw $this->createNotFoundException('Image IA introuvable.');
        }

        $response = new BinaryFileResponse($path);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_INLINE, $safeFilename);
        $response->headers->set('Content-Type', mime_content_type($path) ?: 'image/png');

        return $response;
    }

}
