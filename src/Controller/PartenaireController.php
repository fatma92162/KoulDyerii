<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Entity\Plat;
use App\Repository\PartenaireRepository;
use App\Repository\PlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/partenaire')]
class PartenaireController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PartenaireRepository $partenaireRepository,
        private PlatRepository $platRepository
    ) {}

    #[Route('/', name: 'app_partenaire_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);
        
        return $this->render('partenaire/index.html.twig', [
            'partenaire' => $partenaire
        ]);
    }

    #[Route('/devenir', name: 'app_partenaire_devenir', methods: ['GET'])]
    public function devenirPartenaire(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);
        
        if ($partenaire) {
            $this->addFlash('info', 'Vous êtes déjà partenaire ou avez une demande en cours');
            return $this->redirectToRoute('app_partenaire_index');
        }
        
        return $this->render('partenaire/devenir.html.twig', [
            'errors' => [],
            'formData' => []
        ]);
    }

    #[Route('/devenir/submit', name: 'app_partenaire_submit', methods: ['POST'])]
    public function submitDemande(Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $nom = trim($request->request->get('nom'));
        $type = trim($request->request->get('type'));
        $telephone = trim($request->request->get('telephone'));
        $adresse = trim($request->request->get('adresse'));
        $description = trim($request->request->get('description'));
        
        $errors = [];
        
        if (empty($nom)) {
            $errors['nom'] = '❌ Le nom est obligatoire';
        }
        if (empty($type)) {
            $errors['type'] = '❌ Le type est obligatoire';
        }
        if (empty($telephone)) {
            $errors['telephone'] = '❌ Le téléphone est obligatoire';
        } elseif (!preg_match('/^[0-9]{8}$/', $telephone)) {
            $errors['telephone'] = '❌ Le téléphone doit contenir 8 chiffres';
        }
        if (empty($adresse)) {
            $errors['adresse'] = '❌ L\'adresse est obligatoire';
        }
        
        if (!empty($errors)) {
            return $this->render('partenaire/devenir.html.twig', [
                'errors' => $errors,
                'formData' => compact('nom', 'type', 'telephone', 'adresse', 'description')
            ]);
        }
        
        $partenaire = new Partenaire();
        $partenaire->setIdUtilisateur($user->getIdUtilisateur());
        $partenaire->setNom($nom);
        $partenaire->setType($type);
        $partenaire->setTelephone($telephone);
        $partenaire->setAdresse($adresse);
        $partenaire->setDescription($description);
        $partenaire->setStatut('en_attente');
        $partenaire->setDateDemande(new \DateTime());
        
        // Gestion du logo
        $logoFile = $request->files->get('logo');
        if ($logoFile && $logoFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/partenaires';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newFileName = uniqid() . '_' . time() . '.' . $logoFile->guessExtension();
            $logoFile->move($uploadDir, $newFileName);
            $partenaire->setLogo('/uploads/partenaires/' . $newFileName);
        }
        
        $this->entityManager->persist($partenaire);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Votre demande a été envoyée. Un administrateur va l\'examiner.');
        return $this->redirectToRoute('app_partenaire_index');
    }

    // ✅ ANNULER LA DEMANDE DE PARTENARIAT
    #[Route('/annuler', name: 'app_partenaire_annuler', methods: ['POST'])]
    public function annulerDemande(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);
        
        if (!$partenaire) {
            $this->addFlash('error', 'Aucune demande de partenariat trouvée');
            return $this->redirectToRoute('app_partenaire_index');
        }
        
        // Vérifier que la demande est encore en attente
        if ($partenaire->getStatut() !== 'en_attente') {
            $this->addFlash('error', 'Cette demande ne peut plus être annulée car elle a déjà été traitée');
            return $this->redirectToRoute('app_partenaire_index');
        }
        
        $this->entityManager->remove($partenaire);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Votre demande de partenariat a été annulée avec succès');
        return $this->redirectToRoute('app_partenaire_index');
    }

    #[Route('/ajouter-plat', name: 'app_partenaire_ajouter_plat', methods: ['GET', 'POST'])]
    public function ajouterPlat(Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);
        
        if (!$partenaire || $partenaire->getStatut() !== 'accepte') {
            $this->addFlash('error', 'Vous devez être un partenaire accepté pour ajouter des plats');
            return $this->redirectToRoute('app_partenaire_index');
        }
        
        if ($request->isMethod('POST')) {
            $nom = trim($request->request->get('nom'));
            $description = trim($request->request->get('description'));
            $prix = $request->request->get('prix');
            $ingredients = trim($request->request->get('ingredients'));
            $categorie = $request->request->get('categorie');
            
            $errors = [];
            
            if (empty($nom)) {
                $errors['nom'] = '❌ Le nom du plat est obligatoire';
            }
            if (empty($prix) || !is_numeric($prix) || $prix <= 0) {
                $errors['prix'] = '❌ Le prix doit être un nombre positif';
            }
            
            $imageFile = $request->files->get('image');
            
            if (!empty($errors)) {
                return $this->render('partenaire/ajouter_plat.html.twig', [
                    'errors' => $errors,
                    'formData' => compact('nom', 'description', 'prix', 'ingredients', 'categorie')
                ]);
            }
            
            $plat = new Plat();
            $plat->setNom($nom);
            $plat->setDescription($description);
            $plat->setPrix((float) $prix);
            $plat->setIngredients($ingredients);
            $plat->setCategorie($categorie);
            $plat->setIdPartenaire($partenaire->getId());
            $plat->setStatut('en_attente');
            $plat->setDateCreation(new \DateTime());
            
            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/plats';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
                $imageFile->move($uploadDir, $newFileName);
                $plat->setImage('/uploads/plats/' . $newFileName);
            }
            
            $this->entityManager->persist($plat);
            $this->entityManager->flush();
            
            $this->addFlash('success', '✅ Votre plat a été ajouté et sera visible après validation');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }
        
        return $this->render('partenaire/ajouter_plat.html.twig', [
            'errors' => [],
            'formData' => []
        ]);
    }

    // ✅ MODIFIER UN PLAT
    #[Route('/plat/{id}/modifier', name: 'app_partenaire_plat_modifier', methods: ['GET', 'POST'])]
    public function modifierPlat(int $id, Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $plat = $this->platRepository->find($id);
        
        if (!$plat) {
            $this->addFlash('error', 'Plat non trouvé');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }
        
        $partenaire = $this->partenaireRepository->find($plat->getIdPartenaire());
        
        if (!$partenaire || $partenaire->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous ne pouvez pas modifier ce plat');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }
        
        if ($request->isMethod('POST')) {
            $nom = trim($request->request->get('nom'));
            $description = trim($request->request->get('description'));
            $prix = $request->request->get('prix');
            $ingredients = trim($request->request->get('ingredients'));
            $categorie = $request->request->get('categorie');
            $deleteImage = $request->request->get('delete_image');
            
            $errors = [];
            $formData = compact('nom', 'description', 'prix', 'ingredients', 'categorie');
            
            if (empty($nom)) {
                $errors['nom'] = '❌ Le nom du plat est obligatoire';
            }
            if (empty($prix) || !is_numeric($prix) || $prix <= 0) {
                $errors['prix'] = '❌ Le prix doit être un nombre positif';
            }
            
            $imageFile = $request->files->get('image');
            
            if (!empty($errors)) {
                return $this->render('partenaire/modifier_plat.html.twig', [
                    'plat' => $plat,
                    'errors' => $errors,
                    'formData' => $formData
                ]);
            }
            
            $plat->setNom($nom);
            $plat->setDescription($description);
            $plat->setPrix((float) $prix);
            $plat->setIngredients($ingredients);
            $plat->setCategorie($categorie);
            
            // Gestion de la suppression d'image
            if ($deleteImage && $plat->getImage()) {
                $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $plat->getImage();
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $plat->setImage(null);
            }
            
            // Gestion de la nouvelle image
            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/plats';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                if ($plat->getImage()) {
                    $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $plat->getImage();
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                
                $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
                $imageFile->move($uploadDir, $newFileName);
                $plat->setImage('/uploads/plats/' . $newFileName);
            }
            
            $this->entityManager->flush();
            
            $this->addFlash('success', '✅ Plat modifié avec succès');
            return $this->redirectToRoute('app_partenaire_mes_plats', [
                'search' => $request->query->get('search', ''),
                'statut' => $request->query->get('statut', ''),
                'sort' => $request->query->get('sort', 'date_desc')
            ]);
        }
        
        return $this->render('partenaire/modifier_plat.html.twig', [
            'plat' => $plat,
            'errors' => [],
            'formData' => [
                'nom' => $plat->getNom(),
                'description' => $plat->getDescription(),
                'prix' => $plat->getPrix(),
                'ingredients' => $plat->getIngredients(),
                'categorie' => $plat->getCategorie()
            ]
        ]);
    }

    #[Route('/mes-plats', name: 'app_partenaire_mes_plats', methods: ['GET'])]
    public function mesPlats(Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $partenaire = $this->partenaireRepository->findOneBy(['idUtilisateur' => $user->getIdUtilisateur()]);
        
        if (!$partenaire) {
            return $this->redirectToRoute('app_partenaire_index');
        }
        
        $search = $request->query->get('search', '');
        $statut = $request->query->get('statut', '');
        $sort = $request->query->get('sort', 'date_desc');
        
        $plats = $this->platRepository->findByFilters($partenaire->getId(), $search, $statut, $sort);
        
        foreach ($plats as $plat) {
            $plat->setPartenaire($partenaire);
        }
        
        $allPlats = $this->platRepository->findBy(['idPartenaire' => $partenaire->getId()]);
        $stats = [
            'total' => count($allPlats),
            'en_attente' => count($this->platRepository->findBy(['idPartenaire' => $partenaire->getId(), 'statut' => 'en_attente'])),
            'accepte' => count($this->platRepository->findBy(['idPartenaire' => $partenaire->getId(), 'statut' => 'accepte'])),
            'refuse' => count($this->platRepository->findBy(['idPartenaire' => $partenaire->getId(), 'statut' => 'refuse']))
        ];
        
        return $this->render('partenaire/mes_plats.html.twig', [
            'plats' => $plats,
            'partenaire' => $partenaire,
            'search' => $search,
            'statut' => $statut,
            'sort' => $sort,
            'stats' => $stats
        ]);
    }

    #[Route('/plat/{id}/supprimer', name: 'app_partenaire_plat_supprimer', methods: ['POST'])]
    public function supprimerPlat(int $id, Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $plat = $this->platRepository->find($id);
        
        if (!$plat) {
            $this->addFlash('error', 'Plat non trouvé');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }
        
        $partenaire = $this->partenaireRepository->find($plat->getIdPartenaire());
        
        if (!$partenaire || $partenaire->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous ne pouvez pas supprimer ce plat');
            return $this->redirectToRoute('app_partenaire_mes_plats');
        }
        
        // Supprimer l'image associée
        if ($plat->getImage()) {
            $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $plat->getImage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $this->entityManager->remove($plat);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Plat supprimé avec succès');
        
        return $this->redirectToRoute('app_partenaire_mes_plats', [
            'search' => $request->query->get('search', ''),
            'statut' => $request->query->get('statut', ''),
            'sort' => $request->query->get('sort', 'date_desc')
        ]);
    }
}