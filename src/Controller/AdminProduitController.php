<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/produits')]
class AdminProduitController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ProduitRepository $produitRepository
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
        
        // Récupérer les paramètres de recherche et tri
        $search = $request->query->get('search', '');
        $disponible = $request->query->get('disponible', '');
        $sort = $request->query->get('sort', 'id_desc');
        
        // Récupérer les produits filtrés et triés
        $produits = $this->produitRepository->findByFilters($search, $disponible, $sort);
        
        // Compter les statistiques
        $stats = [
            'total' => $this->produitRepository->countAll(),
            'disponibles' => $this->produitRepository->countDisponibles(),
            'indisponibles' => $this->produitRepository->countAll() - $this->produitRepository->countDisponibles()
        ];
        
        return $this->render('admin_produits/index.html.twig', [
            'produits' => $produits,
            'search' => $search,
            'disponible' => $disponible,
            'sort' => $sort,
            'stats' => $stats
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
        
        $nom = trim($request->request->get('nom'));
        $description = trim($request->request->get('description'));
        $prix = $request->request->get('prix');
        $disponible = $request->request->get('disponible') === 'on';
        
        $errors = [];
        $formData = compact('nom', 'description', 'prix', 'disponible');
        
        // Validation
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
        
        if (empty($prix)) {
            $errors['prix'] = '❌ Le prix est obligatoire.';
        } elseif (!is_numeric($prix) || $prix <= 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif.';
        }
        
        // Validation de l'image
        $imageFile = $request->files->get('photo');
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $maxFileSize = 2 * 1024 * 1024;
            
            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
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
        
        // Gestion de l'image
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
        
        $nom = trim($request->request->get('nom'));
        $description = trim($request->request->get('description'));
        $prix = $request->request->get('prix');
        $disponible = $request->request->get('disponible') === 'on';
        $deleteImage = $request->request->get('delete_image');
        
        $errors = [];
        $formData = compact('nom', 'description', 'prix', 'disponible');
        
        // Validation
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
        
        if (empty($prix)) {
            $errors['prix'] = '❌ Le prix est obligatoire.';
        } elseif (!is_numeric($prix) || $prix <= 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif.';
        }
        
        $imageFile = $request->files->get('photo');
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
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
        
        // Gestion de la suppression d'image
        if ($deleteImage && $produit->getPhoto()) {
            $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $produit->getPhoto();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $produit->setPhoto(null);
        }
        
        // Gestion de la nouvelle image
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
        
        // Rediriger avec les filtres
        return $this->redirectToRoute('app_admin_produits_index', [
            'search' => $request->query->get('search', ''),
            'disponible' => $request->query->get('disponible', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_produits_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $produit = $this->produitRepository->find($id);
        
        if (!$produit) {
            $this->addFlash('error', 'Produit non trouvé');
            return $this->redirectToRoute('app_admin_produits_index');
        }
        
        // Supprimer l'image associée
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
}