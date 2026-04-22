<?php
// src/Controller/AdminPostController.php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Commentaire;
use App\Entity\Reaction;
use App\Entity\AdminNotification;
use App\Repository\PostRepository;
use App\Repository\CommentaireRepository;
use App\Repository\ReactionRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\HistoriqueRepository;
use App\Service\AiReplyService;
use App\Service\HistoriqueService;
use App\Service\AdminNotificationService;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/posts')]
class AdminPostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PostRepository $postRepository,
        private CommentaireRepository $commentaireRepository,
        private ReactionRepository $reactionRepository,
        private Connection $connection,
        private AiReplyService $aiReplyService,
        private UtilisateurRepository $utilisateurRepository,
        private HistoriqueService $historiqueService,
        private HistoriqueRepository $historiqueRepository,
        private AdminNotificationService $adminNotif
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    // ✅ Liste des publications + données pour les graphiques + sidebar notifications
    #[Route('/', name: 'app_admin_posts_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();
        
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');
        
        $qb = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.utilisateur', 'u')
            ->addSelect('u');
        
        if (!empty($search)) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search OR u.nom LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        switch ($sort) {
            case 'oldest':
                $qb->orderBy('p.is_pinned', 'DESC')->addOrderBy('p.created_at', 'ASC');
                break;
            case 'popular':
                $qb->leftJoin('p.commentaires', 'c')
                   ->groupBy('p.id')
                   ->orderBy('p.is_pinned', 'DESC')
                   ->addOrderBy('COUNT(c.id)', 'DESC');
                break;
            case 'pinned':
                $qb->orderBy('p.is_pinned', 'DESC')->addOrderBy('p.created_at', 'DESC');
                break;
            default:
                $qb->orderBy('p.is_pinned', 'DESC')->addOrderBy('p.created_at', 'DESC');
                break;
        }
        
        $posts = $qb->getQuery()->getResult();
        
        // Statistiques des cartes
        $totalPosts = count($this->postRepository->findAll());
        $pinnedPosts = count($this->postRepository->findBy(['is_pinned' => true]));
        $stats = [
            'total' => $totalPosts,
            'pinned' => $pinnedPosts,
            'not_pinned' => $totalPosts - $pinnedPosts,
            'with_comments' => 0,
            'with_images' => 0
        ];
        foreach ($posts as $post) {
            if (count($post->getCommentaires()) > 0) $stats['with_comments']++;
            if ($post->getImagePath()) $stats['with_images']++;
        }
        
        // Likes
        $likesCount = [];
        $userLikes = [];
        $user = $this->getUser();
        foreach ($posts as $post) {
            $likesCount[$post->getId()] = $this->reactionRepository->countByPost($post->getId());
            if ($user) {
                $userLikes[$post->getId()] = $this->reactionRepository->userHasReacted($user->getIdUtilisateur(), $post->getId());
            }
        }

        // ---------- Données pour les graphiques ----------
        $sqlPosts = "SELECT DATE(created_at) as date, COUNT(*) as count FROM post WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY date ASC";
        $postsData = $this->connection->executeQuery($sqlPosts)->fetchAllAssociative();
        $postsDates = array_column($postsData, 'date');
        $postsCounts = array_column($postsData, 'count');

        $sqlComments = "SELECT DATE(created_at) as date, COUNT(*) as count FROM commentaire WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY date ASC";
        $commentsData = $this->connection->executeQuery($sqlComments)->fetchAllAssociative();
        $commentsDates = array_column($commentsData, 'date');
        $commentsCounts = array_column($commentsData, 'count');

        $sqlLikes = "SELECT DATE(created_at) as date, COUNT(*) as count FROM reaction WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY date ASC";
        $likesData = $this->connection->executeQuery($sqlLikes)->fetchAllAssociative();
        $likesDates = array_column($likesData, 'date');
        $likesCounts = array_column($likesData, 'count');

        $sqlTopUsers = "SELECT u.nom, (COUNT(DISTINCT p.id) + COUNT(DISTINCT c.id)) as total_activity FROM utilisateur u LEFT JOIN post p ON p.user_id = u.idUtilisateur LEFT JOIN commentaire c ON c.user_id = u.idUtilisateur GROUP BY u.idUtilisateur ORDER BY total_activity DESC LIMIT 5";
        $topUsers = $this->connection->executeQuery($sqlTopUsers)->fetchAllAssociative();
        $topUsersNames = array_column($topUsers, 'nom');
        $topUsersActivity = array_column($topUsers, 'total_activity');

        $totalPostsCount = $this->postRepository->count([]);
        $pinnedPostsCount = $this->postRepository->count(['is_pinned' => true]);
        $unpinnedPostsCount = $totalPostsCount - $pinnedPostsCount;

        $sqlImg = "SELECT COUNT(*) as count FROM post WHERE image_path IS NOT NULL";
        $withImage = $this->connection->executeQuery($sqlImg)->fetchOne();
        $withoutImage = $totalPostsCount - $withImage;

        $totalComments = $this->commentaireRepository->count([]);
        $totalLikes = $this->reactionRepository->count([]);
        $avgComments = $totalPostsCount > 0 ? round($totalComments / $totalPostsCount, 2) : 0;
        $avgLikes = $totalPostsCount > 0 ? round($totalLikes / $totalPostsCount, 2) : 0;

        // --- Récupération des notifications pour la sidebar ---
        $notifications = $this->entityManager
            ->getRepository(AdminNotification::class)
            ->findBy([], ['createdAt' => 'DESC'], 20);
        $unreadCount = $this->entityManager
            ->getRepository(AdminNotification::class)
            ->count(['isRead' => false]);

        return $this->render('admin_posts/index.html.twig', [
            'posts' => $posts,
            'likesCount' => $likesCount,
            'userLikes' => $userLikes,
            'search' => $search,
            'sort' => $sort,
            'stats' => $stats,
            'postsDates' => json_encode($postsDates),
            'postsCounts' => json_encode($postsCounts),
            'commentsDates' => json_encode($commentsDates),
            'commentsCounts' => json_encode($commentsCounts),
            'likesDates' => json_encode($likesDates),
            'likesCounts' => json_encode($likesCounts),
            'topUsersNames' => json_encode($topUsersNames),
            'topUsersActivity' => json_encode($topUsersActivity),
            'pinnedPosts' => $pinnedPostsCount,
            'unpinnedPosts' => $unpinnedPostsCount,
            'withImage' => $withImage,
            'withoutImage' => $withoutImage,
            'totalComments' => $totalComments,
            'totalLikes' => $totalLikes,
            'avgComments' => $avgComments,
            'avgLikes' => $avgLikes,
            // Variables pour les notifications
            'notifications' => $notifications,
            'unreadNotificationsCount' => $unreadCount,
        ]);
    }

    // ✅ EXPORT CSV
    #[Route('/export', name: 'app_admin_posts_export', methods: ['GET'])]
    public function exportPosts(Request $request): Response
    {
        $this->checkAdmin();

        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');

        $qb = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.utilisateur', 'u')
            ->addSelect('u');

        if (!empty($search)) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search OR u.nom LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        switch ($sort) {
            case 'oldest':
                $qb->orderBy('p.created_at', 'ASC');
                break;
            case 'popular':
                $qb->leftJoin('p.commentaires', 'c')
                   ->groupBy('p.id')
                   ->orderBy('COUNT(c.id)', 'DESC');
                break;
            case 'pinned':
                $qb->orderBy('p.is_pinned', 'DESC')->addOrderBy('p.created_at', 'DESC');
                break;
            default:
                $qb->orderBy('p.created_at', 'DESC');
                break;
        }

        $posts = $qb->getQuery()->getResult();

        $data = [];
        foreach ($posts as $post) {
            $title = str_replace(["\r\n", "\n", "\r"], ' ', $post->getTitle());
            $content = strip_tags($post->getContent());
            $content = str_replace(["\r\n", "\n", "\r"], ' ', $content);
            $author = str_replace(["\r\n", "\n", "\r"], ' ', $post->getUtilisateur()->getNom());

            $data[] = [
                'ID' => $post->getId(),
                'Titre' => $title,
                'Contenu' => $content,
                'Auteur' => $author,
                'Date création' => $post->getCreatedAt()->format('d/m/Y H:i'),
                'Commentaires' => $post->getCommentaires()->count(),
                'Likes' => $this->reactionRepository->countByPost($post->getId()),
                'Signalements' => $post->getSignalementCount(),
                'Épinglé' => $post->isPinned() ? 'Oui' : 'Non',
                'Image' => $post->getImagePath() ? 'Oui' : 'Non',
            ];
        }

        $handle = fopen('php://temp', 'r+');
        fwrite($handle, "\xEF\xBB\xBF");
        $headers = array_keys($data[0] ?? []);
        fputcsv($handle, $headers, "\t");
        foreach ($data as $row) {
            fputcsv($handle, $row, "\t");
        }
        rewind($handle);
        $csvContent = stream_get_contents($handle);
        fclose($handle);

        $filename = 'export_posts_' . date('Y-m-d_His') . '.csv';

        return new Response($csvContent, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    // ✅ Route pour la modale des statistiques (chargée en AJAX)
    #[Route('/stats-modal', name: 'app_admin_stats_modal', methods: ['GET'])]
    public function statsModal(): Response
    {
        $this->checkAdmin();

        $sqlPosts = "SELECT DATE(created_at) as date, COUNT(*) as count FROM post WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY date ASC";
        $postsData = $this->connection->executeQuery($sqlPosts)->fetchAllAssociative();
        $postsDates = array_column($postsData, 'date');
        $postsCounts = array_column($postsData, 'count');

        $sqlComments = "SELECT DATE(created_at) as date, COUNT(*) as count FROM commentaire WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY date ASC";
        $commentsData = $this->connection->executeQuery($sqlComments)->fetchAllAssociative();
        $commentsDates = array_column($commentsData, 'date');
        $commentsCounts = array_column($commentsData, 'count');

        $sqlLikes = "SELECT DATE(created_at) as date, COUNT(*) as count FROM reaction WHERE created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY) GROUP BY DATE(created_at) ORDER BY date ASC";
        $likesData = $this->connection->executeQuery($sqlLikes)->fetchAllAssociative();
        $likesDates = array_column($likesData, 'date');
        $likesCounts = array_column($likesData, 'count');

        $sqlTopUsers = "SELECT u.nom, (COUNT(DISTINCT p.id) + COUNT(DISTINCT c.id)) as total_activity FROM utilisateur u LEFT JOIN post p ON p.user_id = u.idUtilisateur LEFT JOIN commentaire c ON c.user_id = u.idUtilisateur GROUP BY u.idUtilisateur ORDER BY total_activity DESC LIMIT 5";
        $topUsers = $this->connection->executeQuery($sqlTopUsers)->fetchAllAssociative();
        $topUsersNames = array_column($topUsers, 'nom');
        $topUsersActivity = array_column($topUsers, 'total_activity');

        $totalPosts = $this->postRepository->count([]);
        $pinnedPosts = $this->postRepository->count(['is_pinned' => true]);
        $unpinnedPosts = $totalPosts - $pinnedPosts;
        $sqlImg = "SELECT COUNT(*) as count FROM post WHERE image_path IS NOT NULL";
        $withImage = $this->connection->executeQuery($sqlImg)->fetchOne();
        $withoutImage = $totalPosts - $withImage;

        $totalComments = $this->commentaireRepository->count([]);
        $totalLikes = $this->reactionRepository->count([]);
        $avgComments = $totalPosts > 0 ? round($totalComments / $totalPosts, 2) : 0;
        $avgLikes = $totalPosts > 0 ? round($totalLikes / $totalPosts, 2) : 0;

        return $this->render('admin_parts/stats_modal_content.html.twig', [
            'postsDates' => json_encode($postsDates),
            'postsCounts' => json_encode($postsCounts),
            'commentsDates' => json_encode($commentsDates),
            'commentsCounts' => json_encode($commentsCounts),
            'likesDates' => json_encode($likesDates),
            'likesCounts' => json_encode($likesCounts),
            'topUsersNames' => json_encode($topUsersNames),
            'topUsersActivity' => json_encode($topUsersActivity),
            'pinnedPosts' => $pinnedPosts,
            'unpinnedPosts' => $unpinnedPosts,
            'withImage' => $withImage,
            'withoutImage' => $withoutImage,
            'totalPosts' => $totalPosts,
            'totalComments' => $totalComments,
            'totalLikes' => $totalLikes,
            'avgComments' => $avgComments,
            'avgLikes' => $avgLikes,
        ]);
    }

    // ✅ Ajouter une publication
    #[Route('/new', name: 'app_admin_post_new', methods: ['GET'])]
    public function new(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_posts/form.html.twig', [
            'post' => null,
            'titre' => 'Créer une publication',
            'errors' => [],
            'formData' => []
        ]);
    }

    // ✅ Créer une publication
    #[Route('/create', name: 'app_admin_post_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $this->checkAdmin();
        
        $user = $this->getUser();
        $title = trim($request->request->get('title'));
        $content = trim($request->request->get('content'));
        $errors = [];
        $formData = ['title' => $title, 'content' => $content];

        if (empty($title)) {
            $errors['title'] = '❌ Le titre est obligatoire.';
        } elseif (strlen($title) < 3) {
            $errors['title'] = '❌ Le titre doit contenir au moins 3 caractères.';
        } elseif (strlen($title) > 100) {
            $errors['title'] = '❌ Le titre ne peut pas dépasser 100 caractères.';
        }

        if (empty($content)) {
            $errors['content'] = '❌ Le contenu est obligatoire.';
        } elseif (strlen($content) < 10) {
            $errors['content'] = '❌ Le contenu doit contenir au moins 10 caractères.';
        } elseif (strlen($content) > 5000) {
            $errors['content'] = '❌ Le contenu ne peut pas dépasser 5000 caractères.';
        }

        $imageFile = $request->files->get('image');
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
            $maxFileSize = 2 * 1024 * 1024;
            
            if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
                $errors['image'] = '❌ Format d\'image non autorisé. Utilisez JPG, PNG, GIF ou WEBP.';
            }
            if ($imageFile->getSize() > $maxFileSize) {
                $errors['image'] = '❌ L\'image ne doit pas dépasser 2 Mo.';
            }
        }

        if (!empty($errors)) {
            return $this->render('admin_posts/form.html.twig', [
                'post' => null,
                'titre' => 'Créer une publication',
                'errors' => $errors,
                'formData' => $formData
            ]);
        }

        $post = new Post();
        $post->setTitle($title);
        $post->setContent($content);
        $post->setUtilisateur($user);
        $post->setCreatedAt(new \DateTime());
        $post->setIsPinned(false);

        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/posts';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
            $imageFile->move($uploadDir, $newFileName);
            $post->setImagePath('/uploads/posts/' . $newFileName);
        }

        $this->entityManager->persist($post);
        $this->entityManager->flush();

        // 📜 Historique : création du post
        $this->historiqueService->log(
            'create',
            'post',
            $post->getId(),
            $user,
            "Titre: {$post->getTitle()}"
        );

        // 📢 Notification admin : nouveau post
        $this->adminNotif->notifyNewPost($post->getId(), $post->getTitle());

        $this->addFlash('success', '✅ Votre publication a été créée avec succès !');
        return $this->redirectToRoute('app_admin_posts_index');
    }

    // ✅ Modifier un post
    #[Route('/{id}/edit', name: 'app_admin_post_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $user = $this->getUser();
        if ($post->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin') {
            $this->addFlash('error', 'Vous ne pouvez modifier que vos propres publications.');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        if ($request->isMethod('POST')) {
            $oldTitle = $post->getTitle();
            $oldContent = $post->getContent();

            $title = trim($request->request->get('title'));
            $content = trim($request->request->get('content'));
            $deleteImage = $request->request->get('delete_image');
            $errors = [];
            $formData = ['title' => $title, 'content' => $content];

            if (empty($title)) {
                $errors['title'] = '❌ Le titre est obligatoire.';
            } elseif (strlen($title) < 3) {
                $errors['title'] = '❌ Le titre doit contenir au moins 3 caractères.';
            } elseif (strlen($title) > 100) {
                $errors['title'] = '❌ Le titre ne peut pas dépasser 100 caractères.';
            }

            if (empty($content)) {
                $errors['content'] = '❌ Le contenu est obligatoire.';
            } elseif (strlen($content) < 10) {
                $errors['content'] = '❌ Le contenu doit contenir au moins 10 caractères.';
            } elseif (strlen($content) > 5000) {
                $errors['content'] = '❌ Le contenu ne peut pas dépasser 5000 caractères.';
            }

            $imageFile = $request->files->get('image');
            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
                $maxFileSize = 2 * 1024 * 1024;
                
                if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
                    $errors['image'] = '❌ Format d\'image non autorisé.';
                }
                if ($imageFile->getSize() > $maxFileSize) {
                    $errors['image'] = '❌ L\'image ne doit pas dépasser 2 Mo.';
                }
            }

            if (!empty($errors)) {
                return $this->render('admin_posts/edit.html.twig', [
                    'post' => $post,
                    'titre' => 'Modifier la publication',
                    'errors' => $errors,
                    'formData' => $formData
                ]);
            }

            $post->setTitle($title);
            $post->setContent($content);

            if ($deleteImage && $post->getImagePath()) {
                $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $post->getImagePath();
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $post->setImagePath(null);
            }

            if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
                $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/posts';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                
                if ($post->getImagePath()) {
                    $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $post->getImagePath();
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                
                $newFileName = uniqid() . '_' . time() . '.' . $imageFile->guessExtension();
                $imageFile->move($uploadDir, $newFileName);
                $post->setImagePath('/uploads/posts/' . $newFileName);
            }

            $this->entityManager->flush();

            // 📜 Historique : modification du post
            $details = "Ancien titre: {$oldTitle} → Nouveau: {$title}";
            if ($oldContent !== $content) {
                $details .= " | Contenu modifié";
            }
            $this->historiqueService->log(
                'update',
                'post',
                $post->getId(),
                $user,
                $details
            );

            $this->addFlash('success', '✅ Publication modifiée avec succès !');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        return $this->render('admin_posts/edit.html.twig', [
            'post' => $post,
            'titre' => 'Modifier la publication',
            'errors' => [],
            'formData' => ['title' => $post->getTitle(), 'content' => $post->getContent()]
        ]);
    }

    // ✅ Supprimer un post
    #[Route('/{id}/delete', name: 'app_admin_post_delete', methods: ['POST'])]
    public function delete(int $id): Response
    {
        $this->checkAdmin();
        
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $user = $this->getUser();
        if ($post->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin') {
            $this->addFlash('error', 'Vous ne pouvez supprimer que vos propres publications.');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        // 📜 Historique : suppression du post (avant suppression)
        $this->historiqueService->log(
            'delete',
            'post',
            $post->getId(),
            $user,
            "Titre: {$post->getTitle()}"
        );

        foreach ($post->getCommentaires() as $commentaire) {
            $this->entityManager->remove($commentaire);
        }
        
        $this->entityManager->remove($post);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Publication supprimée avec succès !');
        return $this->redirectToRoute('app_admin_posts_index');
    }

    // ✅ Épingler/Désépingler un post
    #[Route('/{id}/pin', name: 'app_admin_post_pin', methods: ['POST'])]
    public function pin(int $id): Response
    {
        $this->checkAdmin();
        
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['success' => false, 'message' => 'Post non trouvé'], 404);
        }

        $oldState = $post->isPinned();
        $post->setIsPinned(!$oldState);
        $this->entityManager->flush();

        // 📜 Historique : épinglage / désépinglage
        $user = $this->getUser();
        $this->historiqueService->log(
            'pin',
            'post',
            $post->getId(),
            $user,
            $post->isPinned() ? 'Post épinglé' : 'Post désépinglé'
        );

        return $this->json([
            'success' => true,
            'pinned' => $post->isPinned(),
            'message' => $post->isPinned() ? 'Post épinglé' : 'Post désépinglé'
        ]);
    }

    // ✅ Voir un post avec ses commentaires, likes et historique
    #[Route('/{id}/show', name: 'app_admin_post_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $this->checkAdmin();
        
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        // Charger uniquement les commentaires racine (sans parent)
        $commentaires = $this->commentaireRepository->findBy(
            ['post' => $post, 'parent' => null],
            ['created_at' => 'ASC']
        );
        
        $postLikesCount = $this->reactionRepository->countByPost($id);
        $userLikedPost = false;
        $user = $this->getUser();
        
        if ($user) {
            $userLikedPost = $this->reactionRepository->userHasReacted($user->getIdUtilisateur(), $id);
        }
        
        $commentLikesCount = [];
        $userLikedComments = [];
        
        // Récupération récursive de tous les commentaires pour compter les likes (y compris les réponses)
        $allComments = $this->commentaireRepository->findBy(['post' => $post]);
        foreach ($allComments as $commentaire) {
            $commentLikesCount[$commentaire->getId()] = $this->reactionRepository->countByCommentaire($commentaire->getId());
            if ($user) {
                $userLikedComments[$commentaire->getId()] = $this->reactionRepository->userHasReacted(
                    $user->getIdUtilisateur(), null, $commentaire->getId()
                );
            }
        }

        // 📜 Récupérer l'historique lié à ce post et à ses commentaires
        $historique = $this->historiqueRepository->createQueryBuilder('h')
            ->where('h.entityType = :typePost AND h.entityId = :postId')
            ->orWhere('h.entityType = :typeComment AND h.entityId IN (:commentIds)')
            ->setParameter('typePost', 'post')
            ->setParameter('postId', $post->getId())
            ->setParameter('typeComment', 'comment')
            ->setParameter('commentIds', array_map(fn($c) => $c->getId(), $allComments))
            ->orderBy('h.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('admin_posts/show.html.twig', [
            'post' => $post,
            'commentaires' => $commentaires,
            'postLikesCount' => $postLikesCount,
            'userLikedPost' => $userLikedPost,
            'commentLikesCount' => $commentLikesCount,
            'userLikedComments' => $userLikedComments,
            'historique' => $historique
        ]);
    }

    // ✅ Ajouter un commentaire ou une réponse (avec gestion parent_id)
    #[Route('/{id}/comment', name: 'app_admin_post_comment', methods: ['POST'])]
    public function comment(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $user = $this->getUser();
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $content = trim($request->request->get('content'));
        $parentId = $request->request->get('parent_id');
        $errors = [];
        $formData = ['content' => $content];

        if (empty($content)) {
            $errors['content'] = '❌ Le commentaire ne peut pas être vide.';
        } elseif (strlen($content) < 2) {
            $errors['content'] = '❌ Le commentaire doit contenir au moins 2 caractères.';
        } elseif (strlen($content) > 1000) {
            $errors['content'] = '❌ Le commentaire ne peut pas dépasser 1000 caractères.';
        }

        if (!empty($errors)) {
            // Recharger la page avec les erreurs
            $commentaires = $this->commentaireRepository->findBy(['post' => $post, 'parent' => null], ['created_at' => 'ASC']);
            $postLikesCount = $this->reactionRepository->countByPost($id);
            $commentLikesCount = [];
            $userLikedComments = [];
            foreach ($commentaires as $c) {
                $commentLikesCount[$c->getId()] = $this->reactionRepository->countByCommentaire($c->getId());
                if ($user) {
                    $userLikedComments[$c->getId()] = $this->reactionRepository->userHasReacted(
                        $user->getIdUtilisateur(), null, $c->getId()
                    );
                }
            }
            
            return $this->render('admin_posts/show.html.twig', [
                'post' => $post,
                'commentaires' => $commentaires,
                'postLikesCount' => $postLikesCount,
                'userLikedPost' => $this->reactionRepository->userHasReacted($user->getIdUtilisateur(), $id),
                'commentLikesCount' => $commentLikesCount,
                'userLikedComments' => $userLikedComments,
                'errors' => $errors,
                'formData' => $formData
            ]);
        }

        // Création du commentaire
        $commentaire = new Commentaire();
        $commentaire->setContent($content);
        $commentaire->setUtilisateur($user);
        $commentaire->setPost($post);
        $commentaire->setCreatedAt(new \DateTime());

        if ($parentId) {
            $parentCommentaire = $this->commentaireRepository->find($parentId);
            if ($parentCommentaire) {
                $commentaire->setParent($parentCommentaire);
            }
        }

        $this->entityManager->persist($commentaire);
        $this->entityManager->flush();

        // 📜 Historique : ajout d'un commentaire
        $this->historiqueService->log(
            'comment',
            'comment',
            $commentaire->getId(),
            $user,
            "Post #{$post->getId()} : {$content}"
        );

        // 📢 Notification admin : commentaire important (si critères remplis)
        $this->adminNotif->notifyImportantComment($commentaire->getId(), $content, $post->getId());

        // Génération de la réponse automatique par IA (optionnel)
        $botUser = $this->utilisateurRepository->findOneBy(['email' => 'bot@example.com']);
        if (!$botUser) {
            $botUser = $user;
        }

        $aiReply = $this->aiReplyService->generateReply($content, $post->getTitle());
        if ($aiReply) {
            $reply = new Commentaire();
            $reply->setContent($aiReply);
            $reply->setUtilisateur($botUser);
            $reply->setPost($post);
            $reply->setCreatedAt(new \DateTime());
            $this->entityManager->persist($reply);
            $this->entityManager->flush();

            // 📜 Historique : réponse IA
            $this->historiqueService->log(
                'comment',
                'comment',
                $reply->getId(),
                $botUser,
                "Réponse IA à commentaire #{$commentaire->getId()} : {$aiReply}"
            );

            $this->addFlash('success', '✅ Votre commentaire a été ajouté, et une réponse automatique a été générée.');
        } else {
            $this->addFlash('success', '✅ Votre commentaire a été ajouté.');
        }

        return $this->redirectToRoute('app_admin_post_show', ['id' => $id]);
    }

    // ✅ LIKE sur un post (admin)
    #[Route('/{id}/like', name: 'app_admin_post_like', methods: ['POST'])]
    public function like(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['success' => false, 'message' => 'Post non trouvé'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $type = $data['type'] ?? 'like';

        $existingReaction = $this->entityManager->getRepository(Reaction::class)
            ->findOneBy(['post' => $post, 'utilisateur' => $user]);

        if ($existingReaction) {
            $this->entityManager->remove($existingReaction);
            $this->entityManager->flush();
            $likesCount = $this->reactionRepository->countByPost($id);
            // 📜 Historique : unlike
            $this->historiqueService->log(
                'like',
                'post',
                $post->getId(),
                $user,
                "A retiré son like"
            );
            return $this->json(['success' => true, 'liked' => false, 'count' => $likesCount]);
        } else {
            $reaction = new Reaction();
            $reaction->setType($type);
            $reaction->setCreatedAt(new \DateTime());
            $reaction->setPost($post);
            $reaction->setUtilisateur($user);

            $this->entityManager->persist($reaction);
            $this->entityManager->flush();
            $likesCount = $this->reactionRepository->countByPost($id);
            // 📜 Historique : like
            $this->historiqueService->log(
                'like',
                'post',
                $post->getId(),
                $user,
                "A aimé la publication"
            );
            return $this->json(['success' => true, 'liked' => true, 'count' => $likesCount]);
        }
    }

    // ✅ LIKE sur un commentaire (admin)
    #[Route('/comment/{id}/like', name: 'app_admin_comment_like', methods: ['POST'])]
    public function likeComment(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            return $this->json(['success' => false, 'message' => 'Commentaire non trouvé'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $type = $data['type'] ?? 'like';

        $existingReaction = $this->entityManager->getRepository(Reaction::class)
            ->findOneBy(['commentaire' => $commentaire, 'utilisateur' => $user]);

        if ($existingReaction) {
            $this->entityManager->remove($existingReaction);
            $this->entityManager->flush();
            $likesCount = $this->reactionRepository->countByCommentaire($id);
            // 📜 Historique : unlike commentaire
            $this->historiqueService->log(
                'like',
                'comment',
                $commentaire->getId(),
                $user,
                "A retiré son like du commentaire"
            );
            return $this->json(['success' => true, 'liked' => false, 'count' => $likesCount]);
        } else {
            $reaction = new Reaction();
            $reaction->setType($type);
            $reaction->setCreatedAt(new \DateTime());
            $reaction->setCommentaire($commentaire);
            $reaction->setUtilisateur($user);

            $this->entityManager->persist($reaction);
            $this->entityManager->flush();
            $likesCount = $this->reactionRepository->countByCommentaire($id);
            // 📜 Historique : like commentaire
            $this->historiqueService->log(
                'like',
                'comment',
                $commentaire->getId(),
                $user,
                "A aimé le commentaire"
            );
            return $this->json(['success' => true, 'liked' => true, 'count' => $likesCount]);
        }
    }

    // ✅ Modifier un commentaire
    #[Route('/comment/{id}/edit', name: 'app_admin_comment_edit', methods: ['GET'])]
    public function editComment(int $id): Response
    {
        $this->checkAdmin();
        
        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $user = $this->getUser();
        if ($commentaire->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin') {
            $this->addFlash('error', 'Vous ne pouvez modifier que vos propres commentaires.');
            return $this->redirectToRoute('app_admin_post_show', ['id' => $commentaire->getPost()->getId()]);
        }

        return $this->render('admin_posts/edit_comment.html.twig', [
            'commentaire' => $commentaire,
            'errors' => [],
            'formData' => ['content' => $commentaire->getContent()]
        ]);
    }

    // ✅ Mettre à jour un commentaire
    #[Route('/comment/{id}/update', name: 'app_admin_comment_update', methods: ['POST'])]
    public function updateComment(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $user = $this->getUser();
        if ($commentaire->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin') {
            $this->addFlash('error', 'Vous ne pouvez modifier que vos propres commentaires.');
            return $this->redirectToRoute('app_admin_post_show', ['id' => $commentaire->getPost()->getId()]);
        }

        $oldContent = $commentaire->getContent();
        $content = trim($request->request->get('content'));
        $errors = [];
        $formData = ['content' => $content];

        if (empty($content)) {
            $errors['content'] = '❌ Le commentaire ne peut pas être vide.';
        } elseif (strlen($content) < 2) {
            $errors['content'] = '❌ Le commentaire doit contenir au moins 2 caractères.';
        } elseif (strlen($content) > 1000) {
            $errors['content'] = '❌ Le commentaire ne peut pas dépasser 1000 caractères.';
        }

        if (!empty($errors)) {
            return $this->render('admin_posts/edit_comment.html.twig', [
                'commentaire' => $commentaire,
                'errors' => $errors,
                'formData' => $formData
            ]);
        }

        $commentaire->setContent($content);
        $this->entityManager->flush();

        // 📜 Historique : modification du commentaire
        $this->historiqueService->log(
            'update',
            'comment',
            $commentaire->getId(),
            $user,
            "Ancien: {$oldContent} → Nouveau: {$content}"
        );

        $this->addFlash('success', '✅ Commentaire modifié avec succès !');
        return $this->redirectToRoute('app_admin_post_show', ['id' => $commentaire->getPost()->getId()]);
    }

    // ✅ Supprimer un commentaire
    #[Route('/comment/{id}/delete', name: 'app_admin_comment_delete', methods: ['POST'])]
    public function deleteComment(int $id): Response
    {
        $this->checkAdmin();
        
        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $user = $this->getUser();
        if ($commentaire->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin') {
            $this->addFlash('error', 'Vous ne pouvez supprimer que vos propres commentaires.');
            return $this->redirectToRoute('app_admin_post_show', ['id' => $commentaire->getPost()->getId()]);
        }

        // 📜 Historique : suppression du commentaire
        $this->historiqueService->log(
            'delete',
            'comment',
            $commentaire->getId(),
            $user,
            "Contenu: {$commentaire->getContent()}"
        );

        $postId = $commentaire->getPost()->getId();
        $this->entityManager->remove($commentaire);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Commentaire supprimé avec succès !');
        return $this->redirectToRoute('app_admin_post_show', ['id' => $postId]);
    }

    // ✅ Réinitialiser le compteur de signalements
    #[Route('/{id}/reset-signals', name: 'app_admin_post_reset_signals', methods: ['POST'])]
    public function resetSignals(int $id): Response
    {
        $this->checkAdmin();
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['success' => false, 'message' => 'Post non trouvé'], 404);
        }
        $oldCount = $post->getSignalementCount();
        $post->setSignalementCount(0);
        $this->entityManager->flush();

        // 📜 Historique : réinitialisation des signalements
        $user = $this->getUser();
        $this->historiqueService->log(
            'signal',
            'post',
            $post->getId(),
            $user,
            "Réinitialisation des signalements (était {$oldCount})"
        );

        return $this->json(['success' => true]);
    }

    // ⭐ Liste des notifications administrateur (page dédiée, optionnelle)
    #[Route('/notifications', name: 'app_admin_notifications', methods: ['GET'])]
    public function notifications(): Response
    {
        $this->checkAdmin();

        $notifications = $this->entityManager
            ->getRepository(AdminNotification::class)
            ->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin_parts/notifications.html.twig', [
            'notifications' => $notifications,
        ]);
    }

    // ⭐ Marquer une notification comme lue (AJAX)
    #[Route('/notifications/mark-read/{id}', name: 'app_admin_notification_mark_read', methods: ['POST'])]
    public function markNotificationRead(int $id): JsonResponse
    {
        $this->checkAdmin();

        $notif = $this->entityManager->getRepository(AdminNotification::class)->find($id);
        if ($notif) {
            $notif->setIsRead(true);
            $this->entityManager->flush();
            return $this->json(['success' => true]);
        }

        return $this->json(['success' => false], 404);
    }
}