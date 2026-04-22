<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Post;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/commentaires', name: 'admin_commentaire_')]
class CommentaireCrudController extends AbstractController
{
    #[Route(name: 'index', methods: ['GET'])]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'id');
        $order = $request->query->get('order', 'DESC');

        $qb = $em->getRepository(Commentaire::class)->createQueryBuilder('c')
            ->leftJoin('c.post', 'p')->addSelect('p');

        if ($search) {
            $qb->andWhere('c.content LIKE :search OR p.title LIKE :search')
               ->setParameter('search', '%'.$search.'%');
        }

        $allowedSorts = ['id', 'content', 'created_at'];
        $sort = in_array($sort, $allowedSorts) ? $sort : 'id';
        $qb->orderBy('c.'.$sort, $order);

        $commentaires = $qb->getQuery()->getResult();

        return $this->render('commentaire_crud/index.html.twig', [
            'commentaires' => $commentaires,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
        ]);
    }

    #[Route('/new/{post_id}', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, int $post_id): Response
    {
        $post = $em->getRepository(Post::class)->find($post_id);
        if (!$post) throw $this->createNotFoundException('Post non trouvé');

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
            return $this->redirectToRoute('admin_forum');
        }

        return $this->render('commentaire_crud/new.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    // Route SHOW : cruciale pour le template index
    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Commentaire $commentaire): Response
    {
        return $this->render('commentaire_crud/show.html.twig', [
            'commentaire' => $commentaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Commentaire $commentaire, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Commentaire modifié.');
            return $this->redirectToRoute('admin_forum');
        }

        return $this->render('commentaire_crud/edit.html.twig', [
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Commentaire $commentaire, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commentaire->getId(), $request->request->get('_token'))) {
            $em->remove($commentaire);
            $em->flush();
            $this->addFlash('success', 'Commentaire supprimé.');
        }
        return $this->redirectToRoute('admin_forum');
    }
}