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

#[Route('/posts')]
class PostController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PostRepository $postRepository,
        private CommentaireRepository $commentaireRepository,
        private ReactionRepository $reactionRepository
    ) {}

    // ✅ INDEX AVEC TRI ET RECHERCHE
    #[Route('/', name: 'app_posts_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');
        
        $qb = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.utilisateur', 'u')
            ->addSelect('u');
        
        if (!empty($search)) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search')
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
                $qb->orderBy('p.is_pinned', 'DESC');
                break;
            case 'recent':
            default:
                $qb->orderBy('p.created_at', 'DESC');
                break;
        }
        
        if ($sort !== 'pinned') {
            $qb->addOrderBy('p.is_pinned', 'DESC');
        }
        
        $posts = $qb->getQuery()->getResult();
        
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

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'likesCount' => $likesCount,
            'userLikes' => $userLikes,
            'search' => $search,
            'sort' => $sort
        ]);
    }

    #[Route('/new', name: 'app_post_new', methods: ['GET'])]
    public function new(): Response
    {
        return $this->render('post/form.html.twig', [
            'post' => null,
            'titre' => 'Créer une publication',
            'errors' => [],
            'formData' => []
        ]);
    }

    // ✅ CRÉER UN POST AVEC CONTRÔLE DE SAISIE
    #[Route('/create', name: 'app_post_create', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', '❌ Vous devez être connecté pour publier.');
            return $this->redirectToRoute('app_login');
        }

        $title = trim($request->request->get('title'));
        $content = trim($request->request->get('content'));
        $errors = [];
        $formData = ['title' => $title, 'content' => $content];

        // Validation du titre
        if (empty($title)) {
            $errors['title'] = '❌ Le titre est obligatoire.';
        } elseif (strlen($title) < 3) {
            $errors['title'] = '❌ Le titre doit contenir au moins 3 caractères.';
        } elseif (strlen($title) > 100) {
            $errors['title'] = '❌ Le titre ne peut pas dépasser 100 caractères.';
        }

        // Validation du contenu
        if (empty($content)) {
            $errors['content'] = '❌ Le contenu est obligatoire.';
        } elseif (strlen($content) < 10) {
            $errors['content'] = '❌ Le contenu doit contenir au moins 10 caractères.';
        } elseif (strlen($content) > 5000) {
            $errors['content'] = '❌ Le contenu ne peut pas dépasser 5000 caractères.';
        }

        // Validation de l'image
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
            return $this->render('post/form.html.twig', [
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
        return $this->redirectToRoute('app_posts_index');
    }

    #[Route('/{id}/edit', name: 'app_post_edit', methods: ['GET'])]
    public function edit(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_posts_index');
        }

        $user = $this->getUser();
        if (!$user || ($post->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette publication.');
            return $this->redirectToRoute('app_posts_index');
        }

        return $this->render('post/form.html.twig', [
            'post' => $post,
            'titre' => 'Modifier la publication',
            'errors' => [],
            'formData' => ['title' => $post->getTitle(), 'content' => $post->getContent()]
        ]);
    }

    #[Route('/{id}/update', name: 'app_post_update', methods: ['POST'])]
    public function update(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_posts_index');
        }

        $user = $this->getUser();
        if (!$user || ($post->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier cette publication.');
            return $this->redirectToRoute('app_posts_index');
        }

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
            return $this->render('post/form.html.twig', [
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

        $this->addFlash('success', '✅ Votre publication a été modifiée avec succès !');
        return $this->redirectToRoute('app_posts_index');
    }

    #[Route('/{id}/delete', name: 'app_post_delete', methods: ['POST'])]
    public function delete(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_posts_index');
        }

        $user = $this->getUser();
        if (!$user || ($post->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer cette publication.');
            return $this->redirectToRoute('app_posts_index');
        }

        foreach ($post->getCommentaires() as $commentaire) {
            $this->entityManager->remove($commentaire);
        }
        
        $this->entityManager->remove($post);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Votre publication a été supprimée avec succès !');
        return $this->redirectToRoute('app_posts_index');
    }

    // ✅ ÉPINGLER/DÉSÉPINGLER UN POST
    #[Route('/{id}/pin', name: 'app_post_pin', methods: ['POST'])]
    public function pin(int $id, Request $request): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['success' => false, 'message' => 'Post non trouvé'], 404);
        }

        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous pour épingler'], 401);
        }

        $post->setIsPinned(!$post->isPinned());
        $this->entityManager->flush();

        return $this->json([
            'success' => true, 
            'pinned' => $post->isPinned(),
            'message' => $post->isPinned() ? 'Post épinglé avec succès' : 'Post désépinglé avec succès'
        ]);
    }

    // ✅ MODIFIER UN COMMENTAIRE
    #[Route('/comment/{id}/edit', name: 'app_comment_edit', methods: ['GET'])]
    public function editComment(int $id): Response
    {
        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé');
            return $this->redirectToRoute('app_posts_index');
        }

        $user = $this->getUser();
        if (!$user || ($commentaire->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
            return $this->redirectToRoute('app_post_show', ['id' => $commentaire->getPost()->getId()]);
        }

        return $this->render('post/edit_comment.html.twig', [
            'commentaire' => $commentaire,
            'errors' => [],
            'formData' => ['content' => $commentaire->getContent()]
        ]);
    }

    // ✅ METTRE À JOUR UN COMMENTAIRE
    #[Route('/comment/{id}/update', name: 'app_comment_update', methods: ['POST'])]
    public function updateComment(int $id, Request $request): Response
    {
        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé');
            return $this->redirectToRoute('app_posts_index');
        }

        $user = $this->getUser();
        if (!$user || ($commentaire->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
            return $this->redirectToRoute('app_post_show', ['id' => $commentaire->getPost()->getId()]);
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
            return $this->render('post/edit_comment.html.twig', [
                'commentaire' => $commentaire,
                'errors' => $errors,
                'formData' => $formData
            ]);
        }

        $commentaire->setContent($content);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Votre commentaire a été modifié avec succès !');
        return $this->redirectToRoute('app_post_show', ['id' => $commentaire->getPost()->getId()]);
    }

    // ✅ SUPPRIMER UN COMMENTAIRE
    #[Route('/comment/{id}/delete', name: 'app_comment_delete', methods: ['POST'])]
    public function deleteComment(int $id, Request $request): Response
    {
        $commentaire = $this->commentaireRepository->find($id);
        if (!$commentaire) {
            $this->addFlash('error', 'Commentaire non trouvé');
            return $this->redirectToRoute('app_posts_index');
        }

        $user = $this->getUser();
        if (!$user || ($commentaire->getUtilisateur()->getIdUtilisateur() !== $user->getIdUtilisateur() && $user->getRole() !== 'admin')) {
            $this->addFlash('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
            return $this->redirectToRoute('app_post_show', ['id' => $commentaire->getPost()->getId()]);
        }

        $postId = $commentaire->getPost()->getId();
        $this->entityManager->remove($commentaire);
        $this->entityManager->flush();

        $this->addFlash('success', '✅ Votre commentaire a été supprimé avec succès !');
        return $this->redirectToRoute('app_post_show', ['id' => $postId]);
    }

    // ✅ AFFICHER UN POST
    #[Route('/{id}', name: 'app_post_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_posts_index');
        }

        $commentaires = $this->commentaireRepository->findBy(['post' => $post], ['created_at' => 'ASC']);
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

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'commentaires' => $commentaires,
            'postLikesCount' => $postLikesCount,
            'userLikedPost' => $userLikedPost,
            'commentLikesCount' => $commentLikesCount,
            'userLikedComments' => $userLikedComments
        ]);
    }

    // ✅ AJOUTER UN COMMENTAIRE AVEC CONTRÔLE DE SAISIE
    #[Route('/{id}/comment', name: 'app_post_comment', methods: ['POST'])]
    public function comment(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', '❌ Vous devez être connecté pour commenter.');
            return $this->redirectToRoute('app_login');
        }

        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_posts_index');
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

        $commentaires = $this->commentaireRepository->findBy(['post' => $post], ['created_at' => 'ASC']);
        $postLikesCount = $this->reactionRepository->countByPost($id);
        $userLikedPost = $user ? $this->reactionRepository->userHasReacted($user->getIdUtilisateur(), $id) : false;

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

        if (!empty($errors)) {
            return $this->render('post/show.html.twig', [
                'post' => $post,
                'commentaires' => $commentaires,
                'postLikesCount' => $postLikesCount,
                'userLikedPost' => $userLikedPost,
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
        return $this->redirectToRoute('app_post_show', ['id' => $id]);
    }

    // ✅ LIKE POST
    #[Route('/{id}/like', name: 'app_post_like', methods: ['POST'])]
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

    // ✅ LIKE COMMENTAIRE
    #[Route('/comment/{id}/like', name: 'app_comment_like', methods: ['POST'])]
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
}