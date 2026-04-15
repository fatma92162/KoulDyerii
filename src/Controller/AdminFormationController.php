<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/formations')]
class AdminFormationController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private FormationRepository $formationRepository,
        private InscriptionFormationRepository $inscriptionRepository,
        private UtilisateurRepository $utilisateurRepository
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    #[Route('/', name: 'app_admin_formations_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();
        
        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $sort = $request->query->get('sort', 'id_desc');
        
        $formations = $this->formationRepository->findByFilters($search, $statut, $sort);
        
        $allFormations = $this->formationRepository->findAll();
        $stats = [
            'total' => count($allFormations),
            'en_cours' => count($this->formationRepository->findBy(['statut' => 'en_cours'])),
            'termine' => count($this->formationRepository->findBy(['statut' => 'termine'])),
            'annule' => count($this->formationRepository->findBy(['statut' => 'annule']))
        ];
        
        return $this->render('admin_formations/index.html.twig', [
            'formations' => $formations,
            'search' => $search,
            'statutFiltre' => $statut,
            'sort' => $sort,
            'stats' => $stats
        ]);
    }

    #[Route('/{id}/inscriptions', name: 'app_admin_formations_inscriptions', methods: ['GET'])]
    public function inscriptions(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $formation = $this->formationRepository->find($id);
        
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }
        
        $search = $request->query->get('search', '');
        
        $inscriptions = $this->inscriptionRepository->findByFormation($id);
        
        foreach ($inscriptions as $inscription) {
            $utilisateur = $this->utilisateurRepository->find($inscription->getIdUtilisateur());
            $inscription->utilisateur = $utilisateur;
        }
        
        if (!empty($search)) {
            $inscriptions = array_filter($inscriptions, function($inscription) use ($search) {
                return stripos($inscription->utilisateur->getNom(), $search) !== false ||
                       stripos($inscription->utilisateur->getEmail(), $search) !== false;
            });
        }
        
        return $this->render('admin_formations/inscriptions.html.twig', [
            'formation' => $formation,
            'inscriptions' => $inscriptions,
            'search' => $search
        ]);
    }

    #[Route('/new', name: 'app_admin_formations_new', methods: ['GET'])]
    public function new(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_formations/form.html.twig', [
            'formation' => null,
            'titre' => 'Ajouter une formation',
            'errors' => []
        ]);
    }

    #[Route('/create', name: 'app_admin_formations_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $this->checkAdmin();
        
        $titre = trim($request->request->get('titre'));
        $description = trim($request->request->get('description'));
        $prix = $request->request->get('prix');
        $statut = $request->request->get('statut', 'en_cours');
        
        $errors = [];
        
        if (empty($titre)) {
            $errors['titre'] = '❌ Le titre est obligatoire';
        } elseif (strlen($titre) < 5) {
            $errors['titre'] = '❌ Le titre doit contenir au moins 5 caractères';
        } elseif (strlen($titre) > 200) {
            $errors['titre'] = '❌ Le titre ne peut pas dépasser 200 caractères';
        }
        
        if (empty($description)) {
            $errors['description'] = '❌ La description est obligatoire';
        } elseif (strlen($description) < 20) {
            $errors['description'] = '❌ La description doit contenir au moins 20 caractères';
        }
        
        if (empty($prix)) {
            $errors['prix'] = '❌ Le prix est obligatoire';
        } elseif (!is_numeric($prix) || $prix < 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif';
        }
        
        if (!empty($errors)) {
            return $this->render('admin_formations/form.html.twig', [
                'formation' => null,
                'titre' => 'Ajouter une formation',
                'errors' => $errors,
                'formData' => compact('titre', 'description', 'prix', 'statut')
            ]);
        }
        
        $formation = new Formation();
        $formation->setTitre($titre);
        $formation->setDescription($description);
        $formation->setPrix((float) $prix);
        $formation->setStatut($statut);
        $formation->setIdVendeuse($this->getUser()->getIdUtilisateur());
        
        $this->entityManager->persist($formation);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Formation ajoutée avec succès !');
        return $this->redirectToRoute('app_admin_formations_index');
    }

    #[Route('/{id}/edit', name: 'app_admin_formations_edit', methods: ['GET'])]
    public function edit(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);
        
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }
        
        return $this->render('admin_formations/form.html.twig', [
            'formation' => $formation,
            'titre' => 'Modifier la formation',
            'errors' => [],
            'search' => $request->query->get('search', ''),
            'statutFiltre' => $request->query->get('statut', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/{id}/update', name: 'app_admin_formations_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);
        
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }
        
        $titre = trim($request->request->get('titre'));
        $description = trim($request->request->get('description'));
        $prix = $request->request->get('prix');  // ✅ Correction: supprimé la parenthèse fermante en trop
        $statut = $request->request->get('statut', 'en_cours');
        
        $errors = [];
        
        if (empty($titre)) {
            $errors['titre'] = '❌ Le titre est obligatoire';
        } elseif (strlen($titre) < 5) {
            $errors['titre'] = '❌ Le titre doit contenir au moins 5 caractères';
        } elseif (strlen($titre) > 200) {
            $errors['titre'] = '❌ Le titre ne peut pas dépasser 200 caractères';
        }
        
        if (empty($description)) {
            $errors['description'] = '❌ La description est obligatoire';
        } elseif (strlen($description) < 20) {
            $errors['description'] = '❌ La description doit contenir au moins 20 caractères';
        }
        
        if (empty($prix)) {
            $errors['prix'] = '❌ Le prix est obligatoire';
        } elseif (!is_numeric($prix) || $prix < 0) {
            $errors['prix'] = '❌ Le prix doit être un nombre positif';
        }
        
        if (!empty($errors)) {
            return $this->render('admin_formations/form.html.twig', [
                'formation' => $formation,
                'titre' => 'Modifier la formation',
                'errors' => $errors
            ]);
        }
        
        $formation->setTitre($titre);
        $formation->setDescription($description);
        $formation->setPrix((float) $prix);
        $formation->setStatut($statut);
        
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Formation modifiée avec succès !');
        
        return $this->redirectToRoute('app_admin_formations_index', [
            'search' => $request->query->get('search', ''),
            'statut' => $request->query->get('statut', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }

    #[Route('/{id}/delete', name: 'app_admin_formations_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $this->checkAdmin();
        $formation = $this->formationRepository->find($id);
        
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_admin_formations_index');
        }
        
        $this->entityManager->remove($formation);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Formation supprimée avec succès !');
        
        return $this->redirectToRoute('app_admin_formations_index', [
            'search' => $request->query->get('search', ''),
            'statut' => $request->query->get('statut', ''),
            'sort' => $request->query->get('sort', 'id_desc')
        ]);
    }
}