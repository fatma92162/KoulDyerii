<?php

namespace App\Controller;

use App\Entity\Livreur;
use App\Entity\Livraison;
use App\Entity\Command;
use App\Repository\CommandRepository;
use App\Repository\LivreurRepository;
use App\Repository\LivraisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/livraisons')]
class AdminLivraisonController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CommandRepository $commandRepository,
        private LivreurRepository $livreurRepository,
        private LivraisonRepository $livraisonRepository
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    // ==================== INDEX ====================
    #[Route('/', name: 'app_admin_livraisons_index', methods: ['GET'])]
    public function index(): Response
    {
        $this->checkAdmin();
        
        $commandes = $this->commandRepository->findBy(['status' => 'acceptee'], ['createdAt' => 'DESC']);
        $livreurs = $this->livreurRepository->findDisponibles();
        $livraisons = $this->livraisonRepository->findAll();
        $tousLivreurs = $this->livreurRepository->findAll();
        
        return $this->render('admin_livraisons/index.html.twig', [
            'commandes' => $commandes,
            'livreurs' => $livreurs,
            'livraisons' => $livraisons,
            'tousLivreurs' => $tousLivreurs
        ]);
    }

    // ==================== CRUD LIVREUR AVEC RECHERCHE ET TRI ====================
    
    #[Route('/livreurs', name: 'app_admin_livreurs_liste', methods: ['GET'])]
    public function listeLivreurs(Request $request): Response
    {
        $this->checkAdmin();
        
        $search = $request->query->get('search', '');
        $status = $request->query->get('status', '');
        $sort = $request->query->get('sort', 'id_desc');
        
        $livreurs = $this->livreurRepository->findByFilters($search, $status, $sort);
        
        $stats = [
            'total' => count($this->livreurRepository->findAll()),
            'disponibles' => count($this->livreurRepository->findBy(['disponibilite' => true])),
            'indisponibles' => count($this->livreurRepository->findBy(['disponibilite' => false]))
        ];
        
        return $this->render('admin_livraisons/livreurs_liste.html.twig', [
            'livreurs' => $livreurs,
            'search' => $search,
            'status' => $status,
            'sort' => $sort,
            'stats' => $stats
        ]);
    }

    #[Route('/livreur/new', name: 'app_admin_livreur_new', methods: ['GET'])]
    public function nouveauLivreur(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_livraisons/livreur_form.html.twig', [
            'livreur' => null,
            'titre' => 'Ajouter un livreur'
        ]);
    }

    #[Route('/livreur/create', name: 'app_admin_livreur_create', methods: ['POST'])]
    public function createLivreur(Request $request): Response
    {
        $this->checkAdmin();
        
        $nom = trim($request->request->get('nom'));
        $prenom = trim($request->request->get('prenom'));
        $telephone = trim($request->request->get('telephone'));
        $disponibilite = $request->request->get('disponibilite') === 'on' ? true : false;
        
        $errors = [];
        
        if (empty($nom)) {
            $errors['nom'] = 'Le nom est obligatoire';
        }
        if (empty($prenom)) {
            $errors['prenom'] = 'Le prénom est obligatoire';
        }
        if (empty($telephone)) {
            $errors['telephone'] = 'Le téléphone est obligatoire';
        } elseif (!preg_match('/^[0-9]{8}$/', $telephone)) {
            $errors['telephone'] = 'Le téléphone doit contenir 8 chiffres';
        }
        
        if (!empty($errors)) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }
            return $this->redirectToRoute('app_admin_livreur_new');
        }
        
        $livreur = new Livreur();
        $livreur->setNom($nom);
        $livreur->setPrenom($prenom);
        $livreur->setTelephone($telephone);
        $livreur->setDisponibilite($disponibilite);
        
        $this->entityManager->persist($livreur);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livreur ajouté avec succès !');
        return $this->redirectToRoute('app_admin_livreurs_liste');
    }

    #[Route('/livreur/{id}/edit', name: 'app_admin_livreur_edit', methods: ['GET'])]
    public function editLivreur(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $livreur = $this->livreurRepository->find($id);
        
        if (!$livreur) {
            $this->addFlash('error', 'Livreur non trouvé');
            return $this->redirectToRoute('app_admin_livreurs_liste');
        }
        
        return $this->render('admin_livraisons/livreur_form.html.twig', [
            'livreur' => $livreur,
            'titre' => 'Modifier le livreur',
            'search' => $request->query->get('search', ''),
            'status' => $request->query->get('status', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/livreur/{id}/update', name: 'app_admin_livreur_update', methods: ['POST'])]
    public function updateLivreur(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $livreur = $this->livreurRepository->find($id);
        
        if (!$livreur) {
            $this->addFlash('error', 'Livreur non trouvé');
            return $this->redirectToRoute('app_admin_livreurs_liste');
        }
        
        $nom = trim($request->request->get('nom'));
        $prenom = trim($request->request->get('prenom'));
        $telephone = trim($request->request->get('telephone'));
        $disponibilite = $request->request->get('disponibilite') === 'on' ? true : false;
        
        $errors = [];
        
        if (empty($nom)) {
            $errors['nom'] = 'Le nom est obligatoire';
        }
        if (empty($prenom)) {
            $errors['prenom'] = 'Le prénom est obligatoire';
        }
        if (empty($telephone)) {
            $errors['telephone'] = 'Le téléphone est obligatoire';
        } elseif (!preg_match('/^[0-9]{8}$/', $telephone)) {
            $errors['telephone'] = 'Le téléphone doit contenir 8 chiffres';
        }
        
        if (!empty($errors)) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }
            return $this->redirectToRoute('app_admin_livreur_edit', ['id' => $id]);
        }
        
        $livreur->setNom($nom);
        $livreur->setPrenom($prenom);
        $livreur->setTelephone($telephone);
        $livreur->setDisponibilite($disponibilite);
        
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livreur modifié avec succès !');
        
        return $this->redirectToRoute('app_admin_livreurs_liste', [
            'search' => $request->query->get('search', ''),
            'status' => $request->query->get('status', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/livreur/{id}/delete', name: 'app_admin_livreur_delete', methods: ['POST'])]
    public function deleteLivreur(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $livreur = $this->livreurRepository->find($id);
        
        if (!$livreur) {
            $this->addFlash('error', 'Livreur non trouvé');
            return $this->redirectToRoute('app_admin_livreurs_liste');
        }
        
        $this->entityManager->remove($livreur);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livreur supprimé avec succès !');
        return $this->redirectToRoute('app_admin_livreurs_liste');
    }

    // ==================== AFFECTATION LIVREUR ====================
    
    #[Route('/affecter/{id}', name: 'app_admin_livraison_affecter', methods: ['POST'])]
    public function affecterLivreur(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $commande = $this->commandRepository->find($id);
        if (!$commande) {
            $this->addFlash('error', 'Commande non trouvée');
            return $this->redirectToRoute('app_admin_livraisons_index');
        }
        
        $livreurId = $request->request->get('livreur_id');
        $livreur = $this->livreurRepository->find($livreurId);
        
        if (!$livreur) {
            $this->addFlash('error', 'Livreur non trouvé');
            return $this->redirectToRoute('app_admin_livraisons_index');
        }
        
        $existingLivraison = $this->livraisonRepository->findOneBy(['idCommande' => $commande->getId()]);
        if ($existingLivraison) {
            $this->addFlash('error', 'Une livraison est déjà affectée à cette commande');
            return $this->redirectToRoute('app_admin_livraisons_index');
        }
        
        $livraison = new Livraison();
        $livraison->setIdCommande($commande->getId());
        $livraison->setIdLivreur($livreur->getIdLivreur());
        $livraison->setAdresse($commande->getLocation());
        $livraison->setStatutLivraison('en_cours');
        
        $this->entityManager->persist($livraison);
        $livreur->setDisponibilite(false);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livreur affecté avec succès à la commande #' . $commande->getId());
        return $this->redirectToRoute('app_admin_livraisons_index');
    }

    // ==================== CRUD LIVRAISON ====================
    
    #[Route('/livraisons', name: 'app_admin_livraisons_liste', methods: ['GET'])]
    public function listeLivraisons(Request $request): Response
    {
        $this->checkAdmin();
        
        $search = $request->query->get('search', '');
        $status = $request->query->get('status', '');
        $sort = $request->query->get('sort', 'id_desc');
        
        $livraisons = $this->livraisonRepository->findByFilters($search, $status, $sort);
        
        foreach ($livraisons as $livraison) {
            $livreur = $this->livreurRepository->find($livraison->getIdLivreur());
            $livraison->livreur = $livreur;
        }
        
        $allLivraisons = $this->livraisonRepository->findAll();
        $stats = [
            'total' => count($allLivraisons),
            'en_cours' => count($this->livraisonRepository->findBy(['statutLivraison' => 'en_cours'])),
            'livree' => count($this->livraisonRepository->findBy(['statutLivraison' => 'livree'])),
            'annulee' => count($this->livraisonRepository->findBy(['statutLivraison' => 'annulee']))
        ];
        
        return $this->render('admin_livraisons/livraisons_liste.html.twig', [
            'livraisons' => $livraisons,
            'search' => $search,
            'statusFilter' => $status,
            'sort' => $sort,
            'stats' => $stats
        ]);
    }

    #[Route('/livraison/new', name: 'app_admin_livraison_new', methods: ['GET'])]
    public function nouvelleLivraison(): Response
    {
        $this->checkAdmin();
        
        $commandes = $this->commandRepository->findBy(['status' => 'acceptee'], ['createdAt' => 'DESC']);
        $livreurs = $this->livreurRepository->findDisponibles();
        
        return $this->render('admin_livraisons/livraison_form.html.twig', [
            'livraison' => null,
            'commandes' => $commandes,
            'livreurs' => $livreurs,
            'titre' => 'Ajouter une livraison',
            'errors' => []
        ]);
    }

    #[Route('/livraison/create', name: 'app_admin_livraison_create', methods: ['POST'])]
    public function createLivraison(Request $request): Response
    {
        $this->checkAdmin();
        
        $idCommande = $request->request->get('id_commande');
        $idLivreur = $request->request->get('id_livreur');
        $adresse = trim($request->request->get('adresse'));
        $statutLivraison = $request->request->get('statut_livraison', 'en_cours');
        
        $errors = [];
        
        if (empty($idCommande)) {
            $errors['id_commande'] = '❌ Veuillez sélectionner une commande';
        } else {
            $commande = $this->commandRepository->find($idCommande);
            if (!$commande) {
                $errors['id_commande'] = '❌ Commande non trouvée';
            } else {
                $existingLivraison = $this->livraisonRepository->findOneBy(['idCommande' => $idCommande]);
                if ($existingLivraison) {
                    $errors['id_commande'] = '❌ Une livraison existe déjà pour cette commande';
                }
            }
        }
        
        if (empty($idLivreur)) {
            $errors['id_livreur'] = '❌ Veuillez sélectionner un livreur';
        } else {
            $livreur = $this->livreurRepository->find($idLivreur);
            if (!$livreur) {
                $errors['id_livreur'] = '❌ Livreur non trouvé';
            } elseif (!$livreur->getDisponibilite()) {  // ✅ CORRECTION
                $errors['id_livreur'] = '❌ Ce livreur n\'est pas disponible';
            }
        }
        
        if (empty($adresse)) {
            $errors['adresse'] = '❌ L\'adresse de livraison est obligatoire';
        } elseif (strlen($adresse) < 5) {
            $errors['adresse'] = '❌ L\'adresse doit contenir au moins 5 caractères';
        } elseif (strlen($adresse) > 500) {
            $errors['adresse'] = '❌ L\'adresse ne peut pas dépasser 500 caractères';
        }
        
        if (!empty($errors)) {
            $commandes = $this->commandRepository->findBy(['status' => 'acceptee'], ['createdAt' => 'DESC']);
            $livreurs = $this->livreurRepository->findDisponibles();
            
            return $this->render('admin_livraisons/livraison_form.html.twig', [
                'livraison' => null,
                'commandes' => $commandes,
                'livreurs' => $livreurs,
                'titre' => 'Ajouter une livraison',
                'errors' => $errors,
                'formData' => [
                    'id_commande' => $idCommande,
                    'id_livreur' => $idLivreur,
                    'adresse' => $adresse,
                    'statut_livraison' => $statutLivraison
                ]
            ]);
        }
        
        $commande = $this->commandRepository->find($idCommande);
        $livreur = $this->livreurRepository->find($idLivreur);
        
        $livraison = new Livraison();
        $livraison->setIdCommande($idCommande);
        $livraison->setIdLivreur($idLivreur);
        $livraison->setAdresse($adresse);
        $livraison->setStatutLivraison($statutLivraison);
        
        $this->entityManager->persist($livraison);
        $livreur->setDisponibilite(false);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livraison ajoutée avec succès !');
        return $this->redirectToRoute('app_admin_livraisons_liste');
    }

    #[Route('/livraison/{id}/edit', name: 'app_admin_livraison_edit', methods: ['GET'])]
    public function editLivraison(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $livraison = $this->livraisonRepository->find($id);
        
        if (!$livraison) {
            $this->addFlash('error', 'Livraison non trouvée');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }
        
        $commandes = $this->commandRepository->findAll();
        $livreurs = $this->livreurRepository->findAll();
        
        return $this->render('admin_livraisons/livraison_form.html.twig', [
            'livraison' => $livraison,
            'commandes' => $commandes,
            'livreurs' => $livreurs,
            'titre' => 'Modifier la livraison',
            'search' => $request->query->get('search', ''),
            'statusFilter' => $request->query->get('status', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/livraison/{id}/update', name: 'app_admin_livraison_update', methods: ['POST'])]
    public function updateLivraison(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $livraison = $this->livraisonRepository->find($id);
        
        if (!$livraison) {
            $this->addFlash('error', 'Livraison non trouvée');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }
        
        $ancienLivreurId = $livraison->getIdLivreur();
        $nouveauLivreurId = $request->request->get('id_livreur');
        $adresse = trim($request->request->get('adresse'));
        $statutLivraison = $request->request->get('statut_livraison');
        $idCommande = $request->request->get('id_commande');
        
        $errors = [];
        
        if (empty($adresse)) {
            $errors['adresse'] = '❌ L\'adresse est obligatoire';
        } elseif (strlen($adresse) < 5) {
            $errors['adresse'] = '❌ L\'adresse doit contenir au moins 5 caractères';
        }
        
        if (empty($nouveauLivreurId)) {
            $errors['id_livreur'] = '❌ Veuillez sélectionner un livreur';
        } else {
            $livreur = $this->livreurRepository->find($nouveauLivreurId);
            if (!$livreur) {
                $errors['id_livreur'] = '❌ Livreur non trouvé';
            }
        }
        
        if (!empty($errors)) {
            $commandes = $this->commandRepository->findAll();
            $livreurs = $this->livreurRepository->findAll();
            
            return $this->render('admin_livraisons/livraison_form.html.twig', [
                'livraison' => $livraison,
                'commandes' => $commandes,
                'livreurs' => $livreurs,
                'titre' => 'Modifier la livraison',
                'errors' => $errors
            ]);
        }
        
        $livraison->setAdresse($adresse);
        $livraison->setStatutLivraison($statutLivraison);
        $livraison->setIdCommande($idCommande);
        $livraison->setIdLivreur($nouveauLivreurId);
        
        if ($ancienLivreurId != $nouveauLivreurId) {
            $ancienLivreur = $this->livreurRepository->find($ancienLivreurId);
            if ($ancienLivreur) {
                $ancienLivreur->setDisponibilite(true);
            }
            
            $nouveauLivreur = $this->livreurRepository->find($nouveauLivreurId);
            if ($nouveauLivreur && $statutLivraison == 'en_cours') {
                $nouveauLivreur->setDisponibilite(false);
            }
        }
        
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livraison modifiée avec succès !');
        
        return $this->redirectToRoute('app_admin_livraisons_liste', [
            'search' => $request->query->get('search', ''),
            'status' => $request->query->get('status', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/livraison/{id}/delete', name: 'app_admin_livraison_delete', methods: ['POST'])]
    public function deleteLivraison(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $livraison = $this->livraisonRepository->find($id);
        
        if (!$livraison) {
            $this->addFlash('error', 'Livraison non trouvée');
            return $this->redirectToRoute('app_admin_livraisons_liste');
        }
        
        $livreur = $this->livreurRepository->find($livraison->getIdLivreur());
        if ($livreur) {
            $livreur->setDisponibilite(true);
        }
        
        $this->entityManager->remove($livraison);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livraison supprimée avec succès !');
        
        return $this->redirectToRoute('app_admin_livraisons_liste', [
            'search' => $request->query->get('search', ''),
            'status' => $request->query->get('status', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/livraison/{id}/terminer', name: 'app_admin_livraison_terminer', methods: ['POST'])]
    public function terminerLivraison(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $livraison = $this->livraisonRepository->find($id);
        if (!$livraison) {
            $this->addFlash('error', 'Livraison non trouvée');
            return $this->redirectToRoute('app_admin_livraisons_index');
        }
        
        $livraison->setStatutLivraison('livree');
        
        $livreur = $this->livreurRepository->find($livraison->getIdLivreur());
        if ($livreur) {
            $livreur->setDisponibilite(true);
        }
        
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Livraison terminée avec succès !');
        
        return $this->redirectToRoute('app_admin_livraisons_index');
    }
}