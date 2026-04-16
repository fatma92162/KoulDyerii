<?php

namespace App\Controller;

use App\Service\UtilisateurService;
use App\Service\PointsFideliteService;
use App\Repository\HistoriqueConnexionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Nucleos\DompdfBundle\Factory\DompdfFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

#[Route('/utilisateur')]
class UtilisateurWebController extends AbstractController
{
    public function __construct(
        private UtilisateurService $service,
        private PointsFideliteService $pointsService,
        private TokenStorageInterface $tokenStorage,
        private EntityManagerInterface $entityManager,
        private HistoriqueConnexionRepository $historiqueRepository
    ) {}

    #[Route('/', name: 'app_utilisateur_liste', methods: ['GET'])]
    public function liste(): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        
        $utilisateurs = $this->service->getAll();
        
        foreach ($utilisateurs as $utilisateur) {
            $points = $this->pointsService->getSolde($utilisateur->getIdUtilisateur());
            $utilisateur->setPointsFidelite($points);
        }
        
        return $this->render('utilisateur/index_admin.html.twig', [
            'utilisateurs' => $utilisateurs
        ]);
    }

    #[Route('/mon-profil', name: 'app_mon_profil', methods: ['GET'])]
    public function monProfil(): Response
    {
        $user = $this->getUser();
        $utilisateur = $this->service->getOne($user->getIdUtilisateur());
        $points = $this->pointsService->getSolde($user->getIdUtilisateur());

        if ($user->getRole() === 'admin') {
            return $this->render('utilisateur/profil_admin.html.twig', [
                'utilisateur' => $utilisateur,
                'points' => $points
            ]);
        }

        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $utilisateur,
            'points' => $points
        ]);
    }

    // ✅ NOUVEAU : Historique des connexions de l'utilisateur connecté
    #[Route('/mon-historique', name: 'app_historique_index', methods: ['GET'])]
    public function monHistorique(): Response
    {
        $user = $this->getUser();

        $historique = $this->historiqueRepository->findBy(
            ['utilisateur' => $user],
            ['dateConnexion' => 'DESC']
        );

        return $this->render('utilisateur/historique.html.twig', [
            'historique' => $historique,
            'utilisateur' => $user,
        ]);
    }

    #[Route('/nouveau', name: 'app_utilisateur_nouveau', methods: ['GET'])]
    public function nouveau(): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        return $this->render('utilisateur/form_admin.html.twig', [
            'utilisateur' => null,
            'titre' => 'Ajouter un utilisateur'
        ]);
    }

    #[Route('/create', name: 'app_utilisateur_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        
        $data = [
            'nom' => $request->request->get('nom'),
            'email' => $request->request->get('email'),
            'motDePasse' => $request->request->get('motDePasse'),
            'role' => $request->request->get('role'),
            'region' => $request->request->get('region'),
            'dateNaissance' => $request->request->get('dateNaissance'),
        ];
        
        // Gestion de la photo/avatar
        $photoFile = $request->files->get('photo');
        $avatarUrl = $request->request->get('avatar_url');
        
        if ($photoFile && $photoFile->getError() === UPLOAD_ERR_OK) {
            // Upload d'une vraie photo
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profiles';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $extension = $photoFile->guessExtension();
            $newFileName = uniqid() . '_' . time() . '.' . $extension;
            $photoFile->move($uploadDir, $newFileName);
            $data['photo'] = '/uploads/profiles/' . $newFileName;
        } elseif ($avatarUrl) {
            // Utilisation d'un avatar (URL)
            $data['photo'] = $avatarUrl;
        }
        
        $utilisateur = $this->service->create($data);
        
        // Créer automatiquement un solde de points pour le nouvel utilisateur
        $this->pointsService->ajouterPoints($utilisateur->getIdUtilisateur(), 0, 'Création du compte');
        
        $this->addFlash('success', 'Utilisateur créé avec succès !');
        return $this->redirectToRoute('app_utilisateur_liste');
    }

    #[Route('/{id}/editer', name: 'app_utilisateur_editer', methods: ['GET', 'POST'])]
    public function editer(int $id, Request $request): Response
    {
        $user = $this->getUser();
        $utilisateur = $this->service->getOne($id);

        if (!$utilisateur) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_utilisateur_liste');
        }

        if ($user->getRole() !== 'admin' && $user->getIdUtilisateur() !== $id) {
            return $this->redirectToRoute('app_mon_profil');
        }

        if ($request->isMethod('POST')) {
            $data = [
                'nom' => $request->request->get('nom'),
                'email' => $request->request->get('email'),
                'region' => $request->request->get('region'),
                'dateNaissance' => $request->request->get('dateNaissance'),
            ];

            if ($request->request->get('motDePasse')) {
                $data['motDePasse'] = $request->request->get('motDePasse');
            }

            // Gestion de la photo/avatar
            $photoFile = $request->files->get('photo');
            $avatarUrl = $request->request->get('avatar_url');
            
            if ($photoFile && $photoFile->getError() === UPLOAD_ERR_OK) {
                // Upload d'une nouvelle photo
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profiles';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                // Supprimer l'ancienne photo si c'était un fichier local
                if ($utilisateur->getPhoto() && str_starts_with($utilisateur->getPhoto(), '/uploads/')) {
                    $oldPath = $this->getParameter('kernel.project_dir') . '/public' . $utilisateur->getPhoto();
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                $extension = $photoFile->guessExtension();
                $newFileName = uniqid() . '_' . time() . '.' . $extension;
                $photoFile->move($uploadDir, $newFileName);
                $data['photo'] = '/uploads/profiles/' . $newFileName;
            } elseif ($avatarUrl) {
                // Utilisation d'un avatar (URL)
                $data['photo'] = $avatarUrl;
            }
            // Si aucun fichier ni avatar, on ne modifie pas la photo

            $this->service->update($id, $data);
            $this->addFlash('success', 'Utilisateur modifié avec succès !');

            if ($user->getIdUtilisateur() === $id) {
                $this->entityManager->refresh($user);
                $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
                $this->tokenStorage->setToken($token);
                return $this->redirectToRoute('app_mon_profil');
            }

            return $this->redirectToRoute('app_utilisateur_liste');
        }

        $points = $this->pointsService->getSolde($id);

        if ($user->getRole() === 'admin') {
            return $this->render('utilisateur/form_admin.html.twig', [
                'utilisateur' => $utilisateur,
                'titre' => 'Modifier un utilisateur',
                'points' => $points
            ]);
        }

        return $this->render('utilisateur/form.html.twig', [
            'utilisateur' => $utilisateur,
            'titre' => 'Modifier mon profil',
            'points' => $points
        ]);
    }

    #[Route('/{id}/update', name: 'app_utilisateur_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $user = $this->getUser();
        $utilisateur = $this->service->getOne($id);

        if (!$utilisateur) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_utilisateur_liste');
        }

        if ($user->getRole() !== 'admin' && $user->getIdUtilisateur() !== $id) {
            return $this->redirectToRoute('app_mon_profil');
        }

        $data = [
            'nom' => $request->request->get('nom'),
            'email' => $request->request->get('email'),
            'region' => $request->request->get('region'),
            'dateNaissance' => $request->request->get('dateNaissance'),
        ];

        if ($request->request->get('motDePasse')) {
            $data['motDePasse'] = $request->request->get('motDePasse');
        }

        // Gestion de la photo/avatar
        $photoFile = $request->files->get('photo');
        $avatarUrl = $request->request->get('avatar_url');
        
        if ($photoFile && $photoFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profiles';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            if ($utilisateur->getPhoto() && str_starts_with($utilisateur->getPhoto(), '/uploads/')) {
                $oldPath = $this->getParameter('kernel.project_dir') . '/public' . $utilisateur->getPhoto();
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $extension = $photoFile->guessExtension();
            $newFileName = uniqid() . '_' . time() . '.' . $extension;
            $photoFile->move($uploadDir, $newFileName);
            $data['photo'] = '/uploads/profiles/' . $newFileName;
        } elseif ($avatarUrl) {
            $data['photo'] = $avatarUrl;
        }

        $this->service->update($id, $data);
        $this->addFlash('success', 'Utilisateur modifié avec succès !');

        if ($user->getIdUtilisateur() === $id) {
            $this->entityManager->refresh($user);
            $token = new UsernamePasswordToken($user, 'main', $user->getRoles());
            $this->tokenStorage->setToken($token);
            return $this->redirectToRoute('app_mon_profil');
        }

        return $this->redirectToRoute('app_utilisateur_liste');
    }

    #[Route('/{id}/delete', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->redirectToRoute('app_mon_profil');
        }
        
        $utilisateur = $this->service->getOne($id);
        if (!$utilisateur) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_utilisateur_liste');
        }
        
        // Supprimer la photo locale si elle existe
        if ($utilisateur->getPhoto() && str_starts_with($utilisateur->getPhoto(), '/uploads/')) {
            $oldPath = $this->getParameter('kernel.project_dir') . '/public' . $utilisateur->getPhoto();
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }
        
        // Supprimer les enregistrements liés dans la table portefeuille
        $conn = $this->entityManager->getConnection();
        $conn->executeStatement('DELETE FROM portefeuille WHERE idUtilisateur = :id', ['id' => $id]);
        
        // Supprimer le solde de points
        $this->pointsService->supprimerSolde($id);
        
        // Supprimer l'utilisateur
        $this->service->delete($id);
        
        $this->entityManager->flush();
        
        $this->addFlash('success', 'Utilisateur supprimé avec succès !');
        return $this->redirectToRoute('app_utilisateur_liste');
    }

    #[Route('/{id}/ajouter-points', name: 'app_utilisateur_ajouter_points', methods: ['POST'])]
    public function ajouterPoints(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->json(['success' => false, 'message' => 'Accès refusé'], 403);
        }

        $utilisateur = $this->service->getOne($id);
        if (!$utilisateur) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }

        $points = (int) $request->request->get('points', 0);
        $operation = $request->request->get('operation', 'add');

        if ($operation === 'add') {
            $this->pointsService->ajouterPoints($id, $points, 'Ajout manuel par admin');
            $nouveauxPoints = $this->pointsService->getSolde($id);
        } else {
            $soldeActuel = $this->pointsService->getSolde($id);
            $difference = $points - $soldeActuel;
            if ($difference > 0) {
                $this->pointsService->ajouterPoints($id, $difference, 'Ajustement manuel par admin');
            } elseif ($difference < 0) {
                $this->pointsService->retirerPoints($id, abs($difference), 'Ajustement manuel par admin');
            }
            $nouveauxPoints = $points;
        }
        
        return $this->json([
            'success' => true, 
            'points' => $nouveauxPoints,
            'message' => "Points mis à jour : $nouveauxPoints"
        ]);
    }

    /**
     * ✅ Bannir un utilisateur (route appelée via AJAX)
     */
    #[Route('/{id}/ban', name: 'app_utilisateur_ban', methods: ['POST'])]
    public function ban(int $id, Request $request): JsonResponse
    {
        $user = $this->getUser();
        if ($user->getRole() !== 'admin') {
            return $this->json(['success' => false, 'message' => 'Accès refusé'], 403);
        }

        $utilisateur = $this->service->getOne($id);
        if (!$utilisateur) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $banUntil = $data['banned_until'] ?? null;

        if ($banUntil && $banUntil !== '2999-12-31 23:59:59') {
            $utilisateur->setBannedUntil(new \DateTime($banUntil));
        } elseif ($banUntil === '2999-12-31 23:59:59') {
            $utilisateur->setBannedUntil(new \DateTime('2999-12-31 23:59:59'));
        } else {
            $utilisateur->setBannedUntil(null);
        }

        $this->entityManager->flush();

        return $this->json(['success' => true, 'message' => 'Statut de bannissement mis à jour']);
    }

    /**
     * ✅ Exporter la liste des utilisateurs en PDF (avec filtres et tri)
     */
    #[Route('/export-pdf', name: 'app_utilisateur_export_pdf', methods: ['GET'])]
    public function exportPdf(Request $request, DompdfFactoryInterface $dompdfFactory): Response
    {
        $search = $request->query->get('search', '');
        $emailFilter = $request->query->get('email', '');
        $roleFilter = $request->query->get('role', '');
        $regionFilter = $request->query->get('region', '');
        $sort = $request->query->get('sort', 'id-asc');

        $utilisateurs = $this->service->getAll();

        $filtered = array_filter($utilisateurs, function($u) use ($search, $emailFilter, $roleFilter, $regionFilter) {
            $matchSearch = true;
            if ($search) {
                $searchLower = strtolower($search);
                $matchSearch = strpos(strtolower($u->getNom()), $searchLower) !== false ||
                               strpos((string)$u->getIdUtilisateur(), $searchLower) !== false;
            }
            $matchEmail = !$emailFilter || strpos(strtolower($u->getEmail()), strtolower($emailFilter)) !== false;
            $matchRole = !$roleFilter || $u->getRole() === $roleFilter;
            $matchRegion = !$regionFilter || strpos(strtolower($u->getRegion() ?? ''), strtolower($regionFilter)) !== false;
            return $matchSearch && $matchEmail && $matchRole && $matchRegion;
        });

        if ($sort) {
            [$col, $dir] = explode('-', $sort);
            usort($filtered, function($a, $b) use ($col, $dir) {
                if ($col === 'points') {
                    $valA = $this->pointsService->getSolde($a->getIdUtilisateur());
                    $valB = $this->pointsService->getSolde($b->getIdUtilisateur());
                    return $dir === 'asc' ? $valA - $valB : $valB - $valA;
                }
                $getter = 'get' . ucfirst($col);
                $valA = method_exists($a, $getter) ? $a->$getter() : '';
                $valB = method_exists($b, $getter) ? $b->$getter() : '';
                if ($col === 'id') {
                    return $dir === 'asc' ? $valA - $valB : $valB - $valA;
                }
                return $dir === 'asc' ? strcmp($valA, $valB) : strcmp($valB, $valA);
            });
        }

        foreach ($filtered as $u) {
            $points = $this->pointsService->getSolde($u->getIdUtilisateur());
            $u->setPointsFidelite($points);
        }

        $html = $this->renderView('utilisateur/export_pdf.html.twig', [
            'utilisateurs' => $filtered,
            'filters' => [
                'search' => $search,
                'email' => $emailFilter,
                'role' => $roleFilter,
                'region' => $regionFilter,
            ],
            'sort' => $sort,
            'date' => new \DateTime(),
        ]);

        $dompdf = $dompdfFactory->create();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="utilisateurs_' . date('Y-m-d_Hi') . '.pdf"',
        ]);
    }

    /**
     * 🤖 Assistant de recherche en langage naturel (chatbot)
     */
    #[Route('/chat-search', name: 'app_utilisateur_chat_search', methods: ['POST'])]
    public function chatSearch(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $query = strtolower($data['query'] ?? '');

        $filters = [
            'search' => '',
            'email' => '',
            'role' => '',
            'region' => '',
            'sort' => ''
        ];

        if (strpos($query, 'admin') !== false) {
            $filters['role'] = 'admin';
        } elseif (strpos($query, 'user') !== false) {
            $filters['role'] = 'user';
        }

        $regions = ['Tunis', 'Ariana', 'Ben Arous', 'Manouba', 'Nabeul', 'Zaghouan', 'Bizerte', 'Béja', 'Jendouba', 'Le Kef', 'Siliana', 'Sousse', 'Monastir', 'Mahdia', 'Sfax', 'Kairouan', 'Kasserine', 'Sidi Bouzid', 'Gabès', 'Médenine', 'Tataouine', 'Gafsa', 'Tozeur', 'Kébili'];
        foreach ($regions as $region) {
            if (stripos($query, strtolower($region)) !== false) {
                $filters['region'] = $region;
                break;
            }
        }

        if (preg_match('/(?:nom|name)[:\s]+(\w+)/i', $query, $matches)) {
            $filters['search'] = $matches[1];
        } elseif (preg_match('/\b(\d+)\b/', $query, $matches)) {
            $filters['search'] = $matches[1];
        } elseif (preg_match('/(?:affiche|montre|cherche).*?(\w+)/i', $query, $matches)) {
            $filters['search'] = $matches[1];
        }

        if (preg_match('/[\w\.-]+@[\w\.-]+\.\w+/', $query, $matches)) {
            $filters['email'] = $matches[0];
        }

        if (strpos($query, 'points') !== false) {
            if (strpos($query, 'décroissant') !== false || strpos($query, 'desc') !== false) {
                $filters['sort'] = 'points-desc';
            } else {
                $filters['sort'] = 'points-asc';
            }
        } elseif (strpos($query, 'id') !== false) {
            if (strpos($query, 'décroissant') !== false || strpos($query, 'desc') !== false) {
                $filters['sort'] = 'id-desc';
            } else {
                $filters['sort'] = 'id-asc';
            }
        } elseif (strpos($query, 'nom') !== false) {
            if (strpos($query, 'décroissant') !== false || strpos($query, 'desc') !== false) {
                $filters['sort'] = 'nom-desc';
            } else {
                $filters['sort'] = 'nom-asc';
            }
        }

        return $this->json(['filters' => $filters]);
    }
}