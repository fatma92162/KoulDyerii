<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/posts', name: 'admin_post_')]
class PostCrudController extends AbstractController
{
    #[Route(name: 'index', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'id');
        $order = $request->query->get('order', 'DESC');

        $qb = $em->getRepository(Post::class)->createQueryBuilder('p');
        if ($search) {
            $qb->andWhere('p.title LIKE :search OR p.content LIKE :search')
               ->setParameter('search', '%'.$search.'%');
        }
        $allowedSorts = ['id', 'title', 'created_at'];
        $sort = in_array($sort, $allowedSorts) ? $sort : 'id';
        $qb->orderBy('p.'.$sort, $order);

        $posts = $qb->getQuery()->getResult();

        return $this->render('post_crud/index.html.twig', [
            'posts' => $posts,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $post = new Post();
        $post->setUser_id(null);
        $post->setCreatedAt(new \DateTimeImmutable());

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($post);
            $em->flush();
            $this->addFlash('success', 'Article créé !');
            return $this->redirectToRoute('admin_forum');
        }

        return $this->render('post_crud/new.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Post $post): Response
    {
        return $this->render('post_crud/show.html.twig', ['post' => $post]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Post $post, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Article modifié');
            return $this->redirectToRoute('admin_forum');
        }

        return $this->render('post_crud/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Post $post, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $em->remove($post);
            $em->flush();
            $this->addFlash('success', 'Article supprimé');
        }
        return $this->redirectToRoute('admin_forum');
    }
}