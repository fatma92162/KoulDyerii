<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Commentaire;
use App\Entity\Reaction;
use App\Entity\Hashtag;
use App\Entity\Story;
use App\Repository\PostRepository;
use App\Repository\CommentaireRepository;
use App\Repository\ReactionRepository;
use App\Repository\FavoriRepository;
use App\Repository\StoryRepository;
use App\Service\NotificationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;

#[Route('/posts')]
class PostController extends AbstractController
{
    private const REACTION_TYPES = ['like', 'love', 'haha', 'sad', 'angry'];

    public function __construct(
        private EntityManagerInterface $entityManager,
        private PostRepository $postRepository,
        private CommentaireRepository $commentaireRepository,
        private ReactionRepository $reactionRepository,
        private NotificationService $notificationService,
        private FavoriRepository $favoriRepository,
        private StoryRepository $storyRepository
    ) {}

    private function extractHashtags(string $content): ArrayCollection
    {
        $hashtags = new ArrayCollection();
        preg_match_all('/#([\p{L}0-9_]+)/u', $content, $matches);
        if (!empty($matches[1])) {
            foreach ($matches[1] as $tagName) {
                $tagName = strtolower($tagName);
                $hashtag = $this->entityManager->getRepository(Hashtag::class)->findOneBy(['name' => $tagName]);
                if (!$hashtag) {
                    $hashtag = new Hashtag();
                    $hashtag->setName($tagName);
                    $this->entityManager->persist($hashtag);
                }
                $hashtags->add($hashtag);
            }
        }
        return $hashtags;
    }

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
        if ($sort === 'pinned') {
            $qb->orderBy('p.is_pinned', 'DESC');
        } else {
            $qb->orderBy('p.is_pinned', 'DESC');
            switch ($sort) {
                case 'oldest':
                    $qb->addOrderBy('p.created_at', 'ASC');
                    break;
                case 'popular':
                    $qb->leftJoin('p.commentaires', 'c')
                       ->groupBy('p.id')
                       ->addOrderBy('COUNT(c.id)', 'DESC');
                    break;
                case 'recent':
                default:
                    $qb->addOrderBy('p.created_at', 'DESC');
                    break;
            }
        }
        $posts = $qb->getQuery()->getResult();
        $reactionsCount = [];
        $userReactions = [];
        $user = $this->getUser();
        foreach ($posts as $post) {
            $postCounts = [];
            foreach (self::REACTION_TYPES as $type) {
                $postCounts[$type] = $this->reactionRepository->countByPostAndType($post->getId(), $type);
            }
            $reactionsCount[$post->getId()] = $postCounts;
            if ($user) {
                $userReaction = $this->reactionRepository->userReactionForPost($user->getIdUtilisateur(), $post->getId());
                $userReactions[$post->getId()] = $userReaction ? $userReaction->getType() : null;
            }
        }

        $userFavoris = [];
        if ($user) {
            $favoris = $this->favoriRepository->findBy(['user' => $user]);
            $userFavoris = array_map(fn($f) => $f->getPost()->getId(), $favoris);
        }

        $activeStories = $this->storyRepository->findActiveStories();
        $storiesByUser = [];
        foreach ($activeStories as $story) {
            $userId = $story->getUtilisateur()->getIdUtilisateur();
            if (!isset($storiesByUser[$userId])) {
                $storiesByUser[$userId] = $story;
            }
        }
        $stories = array_values($storiesByUser);

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'reactionsCount' => $reactionsCount,
            'userReactions' => $userReactions,
            'search' => $search,
            'sort' => $sort,
            'userFavoris' => $userFavoris,
            'stories' => $stories,
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
        $gifUrl = trim($request->request->get('gif_url', ''));
        $errors = [];
        $formData = ['title' => $title, 'content' => $content, 'gif_url' => $gifUrl];
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
        $imagePath = null;
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            try {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
                $maxFileSize = 2 * 1024 * 1024;
                if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
                    $errors['image'] = '❌ Format d\'image non autorisé. Utilisez JPG, PNG, GIF ou WEBP.';
                }
                if ($imageFile->getSize() > $maxFileSize) {
                    $errors['image'] = '❌ L\'image ne doit pas dépasser 2 Mo.';
                }
                if (!isset($errors['image'])) {
                    $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/posts';
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    $extension = 'jpg';
                    try {
                        $extension = $imageFile->guessExtension();
                    } catch (\LogicException $e) {
                        $this->addFlash('warning', 'Extension non détectée (fileinfo manquant), utilisation de .jpg par défaut.');
                    }
                    $newFileName = uniqid() . '_' . time() . '.' . $extension;
                    $imageFile->move($uploadDir, $newFileName);
                    $imagePath = '/uploads/posts/' . $newFileName;
                }
            } catch (\LogicException $e) {
                $this->addFlash('warning', 'Erreur technique (extension fileinfo manquante). L\'image n\'a pas été sauvegardée.');
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
        if (!empty($gifUrl)) {
            $post->setGifUrl($gifUrl);
        }
        if ($imagePath) {
            $post->setImagePath($imagePath);
        }
        $hashtags = $this->extractHashtags($content);
        foreach ($hashtags as $hashtag) {
            $post->addHashtag($hashtag);
        }
        try {
            $this->entityManager->persist($post);
            $this->entityManager->flush();
            $this->addFlash('success', '✅ Votre publication a été créée avec succès !');
        } catch (\Exception $e) {
            $this->addFlash('error', '❌ Erreur lors de l\'enregistrement : ' . $e->getMessage());
            return $this->render('post/form.html.twig', [
                'post' => null,
                'titre' => 'Créer une publication',
                'errors' => ['general' => $e->getMessage()],
                'formData' => $formData
            ]);
        }
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
            'formData' => [
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'gif_url' => $post->getGifUrl()
            ]
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
        $gifUrl = trim($request->request->get('gif_url', ''));
        $deleteImage = $request->request->get('delete_image');
        $errors = [];
        $formData = ['title' => $title, 'content' => $content, 'gif_url' => $gifUrl];
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
            try {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
                $maxFileSize = 2 * 1024 * 1024;
                if (!in_array($imageFile->getMimeType(), $allowedMimeTypes)) {
                    $errors['image'] = '❌ Format d\'image non autorisé.';
                }
                if ($imageFile->getSize() > $maxFileSize) {
                    $errors['image'] = '❌ L\'image ne doit pas dépasser 2 Mo.';
                }
            } catch (\LogicException $e) {
                $errors['image'] = '❌ Erreur technique (extension fileinfo manquante).';
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
        if (!empty($gifUrl)) {
            $post->setGifUrl($gifUrl);
        } else {
            $post->setGifUrl(null);
        }
        if ($deleteImage && $post->getImagePath()) {
            $oldImagePath = $this->getParameter('kernel.project_dir') . '/public' . $post->getImagePath();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $post->setImagePath(null);
        }
        if ($imageFile && $imageFile->getError() === UPLOAD_ERR_OK) {
            try {
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
                $extension = 'jpg';
                try {
                    $extension = $imageFile->guessExtension();
                } catch (\LogicException $e) {
                    $this->addFlash('warning', 'Extension non détectée (fileinfo manquant), utilisation de .jpg par défaut.');
                }
                $newFileName = uniqid() . '_' . time() . '.' . $extension;
                $imageFile->move($uploadDir, $newFileName);
                $post->setImagePath('/uploads/posts/' . $newFileName);
            } catch (\LogicException $e) {
                $this->addFlash('error', 'L\'image n\'a pas pu être sauvegardée (extension fileinfo manquante).');
            }
        }
        foreach ($post->getHashtags() as $oldTag) {
            $post->removeHashtag($oldTag);
        }
        $hashtags = $this->extractHashtags($content);
        foreach ($hashtags as $hashtag) {
            $post->addHashtag($hashtag);
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
        if ($post->getImagePath()) {
            $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $post->getImagePath();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        foreach ($post->getCommentaires() as $commentaire) {
            $this->entityManager->remove($commentaire);
        }
        $this->entityManager->remove($post);
        $this->entityManager->flush();
        $this->addFlash('success', '✅ Votre publication a été supprimée avec succès !');
        return $this->redirectToRoute('app_posts_index');
    }

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

    #[Route('/{id}/react', name: 'app_post_react', methods: ['POST'])]
    public function react(int $id, Request $request): Response
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
        $newType = $data['type'] ?? 'like';
        if (!in_array($newType, self::REACTION_TYPES)) {
            return $this->json(['success' => false, 'message' => 'Type de réaction invalide'], 400);
        }
        $existingReaction = $this->reactionRepository->userReactionForPost($user->getIdUtilisateur(), $id);
        $wasReacted = $existingReaction !== null;
        if ($existingReaction) {
            if ($existingReaction->getType() === $newType) {
                $this->entityManager->remove($existingReaction);
                $this->entityManager->flush();
                $userType = null;
            } else {
                $existingReaction->setType($newType);
                $this->entityManager->flush();
                $userType = $newType;
            }
        } else {
            $reaction = new Reaction();
            $reaction->setType($newType);
            $reaction->setCreatedAt(new \DateTime());
            $reaction->setPost($post);
            $reaction->setUtilisateur($user);
            $this->entityManager->persist($reaction);
            $this->entityManager->flush();
            $userType = $newType;
        }
        if (!$wasReacted && $userType !== null && $user->getIdUtilisateur() !== $post->getUtilisateur()->getIdUtilisateur()) {
            $reactionName = match ($newType) {
                'like' => 'a aimé',
                'love' => 'a adoré',
                'haha' => 'a trouvé hilarant',
                'sad' => 'est triste pour',
                'angry' => 'est en colère contre',
                default => 'a réagi à'
            };
            $this->notificationService->notify(
                $post->getUtilisateur(),
                $user,
                'reaction_' . $newType,
                "{$user->getNom()} {$reactionName} votre publication \"{$post->getTitle()}\"",
                $post->getId()
            );
        }
        $counts = [];
        foreach (self::REACTION_TYPES as $type) {
            $counts[$type] = $this->reactionRepository->countByPostAndType($id, $type);
        }
        return $this->json([
            'success' => true,
            'counts' => $counts,
            'userReaction' => $userType
        ]);
    }

    #[Route('/{id}/repost', name: 'app_post_repost', methods: ['POST'])]
    public function repost(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', '❌ Vous devez être connecté pour republier.');
            return $this->redirectToRoute('app_login');
        }
        $originalPost = $this->postRepository->find($id);
        if (!$originalPost) {
            $this->addFlash('error', 'Publication originale non trouvée.');
            return $this->redirectToRoute('app_posts_index');
        }
        $newPost = new Post();
        $newPost->setTitle($originalPost->getTitle());
        $originalAuthor = $originalPost->getUtilisateur()->getNom();
        $newContent = "Republié depuis @" . $originalAuthor . " :\n\n" . $originalPost->getContent();
        $newPost->setContent($newContent);
        $newPost->setUtilisateur($user);
        $newPost->setCreatedAt(new \DateTime());
        $newPost->setIsPinned(false);
        $newPost->setGifUrl($originalPost->getGifUrl());
        $newPost->setImagePath($originalPost->getImagePath());
        foreach ($originalPost->getHashtags() as $hashtag) {
            $newPost->addHashtag($hashtag);
        }
        $newHashtags = $this->extractHashtags($newContent);
        foreach ($newHashtags as $hashtag) {
            if (!$newPost->getHashtags()->contains($hashtag)) {
                $newPost->addHashtag($hashtag);
            }
        }
        $this->entityManager->persist($newPost);
        $this->entityManager->flush();
        if ($user->getIdUtilisateur() !== $originalPost->getUtilisateur()->getIdUtilisateur()) {
            $this->notificationService->notify(
                $originalPost->getUtilisateur(),
                $user,
                'repost',
                "{$user->getNom()} a republié votre publication \"{$originalPost->getTitle()}\"",
                $newPost->getId()
            );
        }
        $this->addFlash('success', '✅ Publication republiée avec succès !');
        return $this->redirectToRoute('app_posts_index');
    }

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

    #[Route('/{id}', name: 'app_post_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            $this->addFlash('error', 'Publication non trouvée');
            return $this->redirectToRoute('app_posts_index');
        }
        $commentaires = $this->commentaireRepository->findBy(['post' => $post], ['created_at' => 'ASC']);
        $user = $this->getUser();
        $reactionsCount = [];
        foreach (self::REACTION_TYPES as $type) {
            $reactionsCount[$type] = $this->reactionRepository->countByPostAndType($id, $type);
        }
        $userReaction = $user ? $this->reactionRepository->userReactionForPost($user->getIdUtilisateur(), $id) : null;
        $userReactionType = $userReaction ? $userReaction->getType() : null;
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
        $isFavori = $user ? $this->favoriRepository->isFavori($user->getIdUtilisateur(), $id) : false;
        return $this->render('post/show.html.twig', [
            'post' => $post,
            'commentaires' => $commentaires,
            'reactionsCount' => $reactionsCount,
            'userReaction' => $userReactionType,
            'commentLikesCount' => $commentLikesCount,
            'userLikedComments' => $userLikedComments,
            'isFavori' => $isFavori,
        ]);
    }

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
        $gifUrl = trim($request->request->get('gif_url', ''));
        $parentId = $request->request->get('parent_id');
        $errors = [];
        $formData = ['content' => $content, 'gif_url' => $gifUrl];
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
        if (!empty($gifUrl)) {
            $commentaire->setGifUrl($gifUrl);
        }
        if ($parentId) {
            $parentCommentaire = $this->commentaireRepository->find($parentId);
            if ($parentCommentaire) {
                $commentaire->setParent($parentCommentaire);
            }
        }
        $this->entityManager->persist($commentaire);
        $this->entityManager->flush();
        if ($user->getIdUtilisateur() !== $post->getUtilisateur()->getIdUtilisateur()) {
            $this->notificationService->notify(
                $post->getUtilisateur(),
                $user,
                'comment',
                "{$user->getNom()} a commenté votre publication \"{$post->getTitle()}\"",
                $post->getId(),
                $commentaire->getId()
            );
        }
        $this->addFlash('success', '✅ Votre commentaire a été ajouté !');
        return $this->redirectToRoute('app_post_show', ['id' => $id]);
    }

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
            if ($user->getIdUtilisateur() !== $commentaire->getUtilisateur()->getIdUtilisateur()) {
                $this->notificationService->notify(
                    $commentaire->getUtilisateur(),
                    $user,
                    'like_comment',
                    "{$user->getNom()} a aimé votre commentaire",
                    $commentaire->getPost()->getId(),
                    $commentaire->getId()
                );
            }
            return $this->json(['success' => true, 'liked' => true, 'count' => $likesCount]);
        }
    }

    #[Route('/hashtag/{name}', name: 'app_posts_hashtag', methods: ['GET'])]
    public function postsByHashtag(string $name, Request $request): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'recent');
        $qb = $this->postRepository->createQueryBuilder('p')
            ->leftJoin('p.utilisateur', 'u')
            ->leftJoin('p.hashtags', 'h')
            ->addSelect('u')
            ->where('h.name = :hashtag')
            ->setParameter('hashtag', $name);
        if (!empty($search)) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        $qb->orderBy('p.is_pinned', 'DESC');
        switch ($sort) {
            case 'oldest':
                $qb->addOrderBy('p.created_at', 'ASC');
                break;
            case 'popular':
                $qb->leftJoin('p.commentaires', 'c')
                   ->groupBy('p.id')
                   ->addOrderBy('COUNT(c.id)', 'DESC');
                break;
            case 'recent':
            default:
                $qb->addOrderBy('p.created_at', 'DESC');
                break;
        }
        $posts = $qb->getQuery()->getResult();
        $reactionsCount = [];
        $userReactions = [];
        $user = $this->getUser();
        foreach ($posts as $post) {
            $postCounts = [];
            foreach (self::REACTION_TYPES as $type) {
                $postCounts[$type] = $this->reactionRepository->countByPostAndType($post->getId(), $type);
            }
            $reactionsCount[$post->getId()] = $postCounts;
            if ($user) {
                $userReaction = $this->reactionRepository->userReactionForPost($user->getIdUtilisateur(), $post->getId());
                $userReactions[$post->getId()] = $userReaction ? $userReaction->getType() : null;
            }
        }
        $userFavoris = [];
        if ($user) {
            $favoris = $this->favoriRepository->findBy(['user' => $user]);
            $userFavoris = array_map(fn($f) => $f->getPost()->getId(), $favoris);
        }
        $activeStories = $this->storyRepository->findActiveStories();
        $storiesByUser = [];
        foreach ($activeStories as $story) {
            $userId = $story->getUtilisateur()->getIdUtilisateur();
            if (!isset($storiesByUser[$userId])) {
                $storiesByUser[$userId] = $story;
            }
        }
        $stories = array_values($storiesByUser);
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
            'reactionsCount' => $reactionsCount,
            'userReactions' => $userReactions,
            'search' => $search,
            'sort' => $sort,
            'hashtag' => $name,
            'userFavoris' => $userFavoris,
            'stories' => $stories,
        ]);
    }

    // =================== SIGNALEMENT ===================
    #[Route('/{id}/signal', name: 'app_post_signal', methods: ['POST'])]
    public function signal(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous pour signaler'], 401);
        }
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['success' => false, 'message' => 'Post non trouvé'], 404);
        }
        if ($post->getUtilisateur()->getIdUtilisateur() === $user->getIdUtilisateur()) {
            return $this->json(['success' => false, 'message' => 'Vous ne pouvez pas signaler votre propre publication'], 403);
        }
        $session = $request->getSession();
        $reportedPosts = $session->get('reported_posts', []);
        if (in_array($id, $reportedPosts)) {
            return $this->json(['success' => false, 'message' => 'Vous avez déjà signalé cette publication'], 403);
        }
        $currentCount = $post->getSignalementCount();
        $newCount = $currentCount + 1;
        $post->setSignalementCount($newCount);
        $deleted = false;
        if ($newCount >= 3) {
            if ($post->getImagePath()) {
                $imagePath = $this->getParameter('kernel.project_dir') . '/public' . $post->getImagePath();
                if (file_exists($imagePath)) unlink($imagePath);
            }
            foreach ($post->getCommentaires() as $commentaire) {
                $this->entityManager->remove($commentaire);
            }
            $this->entityManager->remove($post);
            $deleted = true;
        } else {
            $reportedPosts[] = $id;
            $session->set('reported_posts', $reportedPosts);
        }
        $this->entityManager->flush();
        if ($deleted) {
            return $this->json([
                'success' => true,
                'deleted' => true,
                'message' => 'Ce post a été supprimé suite à 3 signalements'
            ]);
        }
        return $this->json([
            'success' => true,
            'deleted' => false,
            'signalCount' => $newCount,
            'message' => "Publication signalée ($newCount/3)"
        ]);
    }

    // =================== FAVORIS ===================
    #[Route('/{id}/favori', name: 'app_post_favori', methods: ['POST'])]
    public function toggleFavori(int $id): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }
        $post = $this->postRepository->find($id);
        if (!$post) {
            return $this->json(['success' => false, 'message' => 'Post non trouvé'], 404);
        }
        $isFavori = $this->favoriRepository->toggleFavori($user->getIdUtilisateur(), $id);
        return $this->json([
            'success' => true,
            'isFavori' => $isFavori,
            'message' => $isFavori ? 'Ajouté aux favoris' : 'Retiré des favoris'
        ]);
    }

    // =================== STORIES (CORRIGÉ) ===================
    #[Route('/story/new', name: 'app_story_new', methods: ['GET'])]
    public function newStory(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED');
        return $this->render('post/story_form.html.twig', [
            'errors' => [],
        ]);
    }

    #[Route('/story/create', name: 'app_story_create', methods: ['POST'])]
    public function createStory(Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Connectez-vous pour publier une story.');
            return $this->redirectToRoute('app_login');
        }

        $mediaFile = $request->files->get('media');
        $errors = [];

        if (!$mediaFile || $mediaFile->getError() !== UPLOAD_ERR_OK) {
            $errors['media'] = 'Veuillez choisir une image ou une vidéo.';
        } else {
            $tempPath = $mediaFile->getPathname();
            if (!file_exists($tempPath) || !is_readable($tempPath)) {
                $errors['media'] = 'Erreur technique : le fichier uploadé est introuvable. Vérifiez la taille du fichier (max 10 Mo) et les permissions du répertoire temporaire.';
            } else {
                $maxFileSize = 10 * 1024 * 1024; // 10 Mo
                if ($mediaFile->getSize() > $maxFileSize) {
                    $errors['media'] = 'Fichier trop volumineux (max 10 Mo).';
                } else {
                    $originalName = $mediaFile->getClientOriginalName();
                    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'mp4'];
                    if (!in_array($extension, $allowedExtensions)) {
                        $errors['media'] = 'Format non autorisé (JPG, PNG, GIF, WEBP, MP4).';
                    } else {
                        // Déterminer le type média AVANT de déplacer
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                        $mediaType = in_array($extension, $imageExtensions) ? 'image' : 'video';
                    }
                }
            }
        }

        if (!empty($errors)) {
            return $this->render('post/story_form.html.twig', ['errors' => $errors]);
        }

        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/stories';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $newFileName = uniqid('story_') . '_' . time() . '.' . $extension;
        $mediaFile->move($uploadDir, $newFileName);
        $mediaPath = '/uploads/stories/' . $newFileName;

        $story = new Story();
        $story->setMediaPath($mediaPath);
        $story->setMediaType($mediaType);
        $story->setUtilisateur($user);
        $story->setCreatedAt(new \DateTime());
        $this->entityManager->persist($story);
        $this->entityManager->flush();

        $this->addFlash('success', 'Story publiée !');
        return $this->redirectToRoute('app_posts_index');
    }
}