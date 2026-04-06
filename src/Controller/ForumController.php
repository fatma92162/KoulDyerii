<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    #[Route('/forum', name: 'forum_list')]
    #[Route('/user/forum', name: 'user_forum')]
    #[Route('/admin/forum', name: 'admin_forum')]
    public function list(Request $request, EntityManagerInterface $em): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'created_at');
        $order = $request->query->get('order', 'DESC');
        $author = $request->query->get('author', '');

        $qb = $em->getRepository(Post::class)->createQueryBuilder('p');

        if ($search) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search')
               ->setParameter('search', '%'.$search.'%');
        }

        if ($author) {
            $qb->join('p.user_id', 'u')
               ->andWhere('u.nom LIKE :author OR u.email LIKE :author')
               ->setParameter('author', '%'.$author.'%');
        }

        if ($sort === 'title') {
            $qb->orderBy('p.title', $order);
        } elseif ($sort === 'created_at') {
            $qb->orderBy('p.created_at', $order);
        } else {
            $qb->orderBy('p.created_at', 'DESC');
        }

        $posts = $qb->getQuery()->getResult();

        $postId = $request->request->get('post_id');
        if ($postId && $request->isMethod('POST')) {
            $post = $em->getRepository(Post::class)->find($postId);
            if ($post) {
                $commentaire = new Commentaire();
                $commentaire->setPost($post);
                $commentaire->setUtilisateur(null);
                $commentaire->setCreatedAt(new \DateTimeImmutable());
                $form = $this->createForm(CommentaireType::class, $commentaire);
                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid()) {
                    $em->persist($commentaire);
                    $em->flush();
                    $this->addFlash('success', 'Commentaire ajouté.');
                    $currentRoute = $request->attributes->get('_route');
                    $params = array_filter(['search' => $search, 'sort' => $sort, 'order' => $order, 'author' => $author]);
                    return $this->redirectToRoute($currentRoute, $params);
                }
            }
        }

        $currentRoute = $request->attributes->get('_route');
        $role = 'public';
        if ($currentRoute === 'admin_forum') {
            $role = 'admin';
        } elseif ($currentRoute === 'user_forum') {
            $role = 'user';
        }

        $forms = [];
        foreach ($posts as $post) {
            $commentaire = new Commentaire();
            $commentaire->setPost($post);
            $forms[$post->getId()] = $this->createForm(CommentaireType::class, $commentaire)->createView();
        }

        return $this->render('forum/feed.html.twig', [
            'posts' => $posts,
            'forms' => $forms,
            'role' => $role,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
            'author' => $author,
            'current_route' => $currentRoute,   // ← indispensable pour le bouton "Réinitialiser"
        ]);
    }

    #[Route('/forum/{id}', name: 'forum_show')]
    public function show(Post $post): Response
    {
        return $this->redirectToRoute('forum_list');
    }
}