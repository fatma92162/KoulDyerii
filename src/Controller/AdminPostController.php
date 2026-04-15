<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Commentaire;
use App\Entity\Reaction;
use App\Repository\PostRepository;
use App\Repository\CommentaireRepository;
use App\Repository\ReactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/posts')]
class AdminPostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PostRepository $postRepository,
        private CommentaireRepository $commentaireRepository,
        private ReactionRepository $reactionRepository
    ) {}

    // ✅ Vérification du rôle admin
    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    // ✅ Liste des publications avec likes, recherche, tri et statistiques
    #[Route('/', name: 'app_admin_posts_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();
        
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');
        
        $qb = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.utilisateur', 'u')
            ->addSelect('u');
        
        // Recherche
        if (!empty($search)) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search OR u.nom LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Tri avec épinglés en premier
        switch ($sort) {
            case 'oldest':
                $qb->orderBy('p.is_pinned', 'DESC')
                   ->addOrderBy('p.created_at', 'ASC');
                break;
            case 'popular':
                $qb->leftJoin('p.commentaires', 'c')
                   ->groupBy('p.id')
                   ->orderBy('p.is_pinned', 'DESC')
                   ->addOrderBy('COUNT(c.id)', 'DESC');
                break;
            case 'pinned':
                $qb->orderBy('p.is_pinned', 'DESC')
                   ->addOrderBy('p.created_at', 'DESC');
                break;
            case 'recent':
            default:
                $qb->orderBy('p.is_pinned', 'DESC')
                   ->addOrderBy('p.created_at', 'DESC');
                break;
        }
        
        $posts = $qb->getQuery()->getResult();
        
        // Statistiques
        $totalPosts = count($this->postRepository->findAll());
        $pinnedPosts = count($this->postRepository->findBy(['is_pinned' => true]));
        $notPinnedPosts = $totalPosts - $pinnedPosts;
        
        $stats = [
            'total' => $totalPosts,
            'pinned' => $pinnedPosts,
            'not_pinned' => $notPinnedPosts,
            'with_comments' => 0,
            'with_images' => 0
        ];
        
        // Compter les posts avec commentaires et images
        foreach ($posts as $post) {
            if (count($post->getCommentaires()) > 0) {
                $stats['with_comments']++;
            }
            if ($post->getImagePath()) {
                $stats['with_images']++;
            }
        }
        
        // Récupérer les likes pour chaque post
        $likesCount = [];
        $userLikes = [];
        $user = $this->getUser();
        
        foreach ($posts as $post) {
            $likesCount[$post->getId()] = $this->reactionRepository->countByPost($post->getId());
            if ($user) {
                $userLikes[$post->getId()] = $this->reactionRepository->userHasReacted(
                    $user->getIdUtilisateur(), $post->getId()
                );
            }
        }
        
        return $this->render('admin_posts/index.html.twig', [
            'posts' => $posts,
            'likesCount' => $likesCount,
            'userLikes' => $userLikes,
            'search' => $search,
            'sort' => $sort,
            'stats' => $stats
        ]);
    }

    // ✅ Ajouter une publication (admin peut ajouter)
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

    // ✅ Créer une publication AVEC CONTRÔLE DE SAISIE
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

        $post->setIsPinned(!$post->isPinned());
        $this->entityManager->flush();

        return $this->json([
            'success' => true,
            'pinned' => $post->isPinned(),
            'message' => $post->isPinned() ? 'Post épinglé' : 'Post désépinglé'
        ]);
    }

    // ✅ Voir un post avec ses commentaires et likes
    #[Route('/{id}/show', name: 'app_admin_post_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $this->checkAdmin();
        
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_admin_posts_index');
        }

        $commentaires = $this->commentaireRepository->findBy(
            ['post' => $post], 
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
        foreach ($commentaires as $commentaire) {
            $commentLikesCount[$commentaire->getId()] = $this->reactionRepository->countByCommentaire($commentaire->getId());
            if ($user) {
                $userLikedComments[$commentaire->getId()] = $this->reactionRepository->userHasReacted(
                    $user->getIdUtilisateur(), null, $commentaire->getId()
                );
            }
        }

        return $this->render('admin_posts/show.html.twig', [
            'post' => $post,
            'commentaires' => $commentaires,
            'postLikesCount' => $postLikesCount,
            'userLikedPost' => $userLikedPost,
            'commentLikesCount' => $commentLikesCount,
            'userLikedComments' => $userLikedComments
        ]);
    }

    // ✅ Ajouter un commentaire
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
            $commentaires = $this->commentaireRepository->findBy(['post' => $post], ['created_at' => 'ASC']);
            $postLikesCount = $this->reactionRepository->countByPost($id);
            $commentLikesCount = [];
            $userLikedComments = [];
            foreach ($commentaires as $commentaire) {
                $commentLikesCount[$commentaire->getId()] = $this->reactionRepository->countByCommentaire($commentaire->getId());
                if ($user) {
                    $userLikedComments[$commentaire->getId()] = $this->reactionRepository->userHasReacted(
                        $user->getIdUtilisateur(), null, $commentaire->getId()
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

        $commentaire = new Commentaire();
        $commentaire->setContent($content);
        $commentaire->setUtilisateur($user);
        $commentaire->setPost($post);
        $commentaire->setCreatedAt(new \DateTime());

        $this->entityManager->persist($commentaire);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Votre commentaire a été ajouté !');
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

        $postId = $commentaire->getPost()->getId();
        $this->entityManager->remove($commentaire);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Commentaire supprimé avec succès !');
        return $this->redirectToRoute('app_admin_post_show', ['id' => $postId]);
    }
}