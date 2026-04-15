<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Repository\PartenaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/partenaires')]
class AdminPartenaireController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PartenaireRepository $partenaireRepository
    ) {}

    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
    }

    #[Route('/', name: 'app_admin_partenaires_index', methods: ['GET'])]
    public function index(Request $request): Response
    {
        $this->checkAdmin();
        
        $statut = $request->query->get('statut', '');
        $search = $request->query->get('search', '');
        
        if (!empty($statut)) {
            $partenaires = $this->partenaireRepository->findByStatut($statut);
        } else {
            $partenaires = $this->partenaireRepository->findAll();
        }
        
        // Filtrer par recherche
        if (!empty($search)) {
            $partenaires = array_filter($partenaires, function($p) use ($search) {
                return stripos($p->getNom(), $search) !== false || 
                       stripos($p->getType(), $search) !== false ||
                       stripos($p->getTelephone(), $search) !== false;
            });
        }
        
        $stats = [
            'total' => count($this->partenaireRepository->findAll()),
            'en_attente' => count($this->partenaireRepository->findByStatut('en_attente')),
            'accepte' => count($this->partenaireRepository->findByStatut('accepte')),
            'refuse' => count($this->partenaireRepository->findByStatut('refuse'))
        ];
        
        return $this->render('admin_partenaire/index.html.twig', [
            'partenaires' => $partenaires,
            'stats' => $stats,
            'statutFiltre' => $statut,
            'search' => $search
        ]);
    }

    #[Route('/{id}/accepter', name: 'app_admin_partenaire_accepter', methods: ['POST'])]
    public function accepter(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $partenaire = $this->partenaireRepository->find($id);
        
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }
        
        $partenaire->setStatut('accepte');
        $partenaire->setDateValidation(new \DateTime());
        
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Partenaire accepté avec succès !');
        
        return $this->redirectToRoute('app_admin_partenaires_index', [
            'statut' => $request->query->get('statut', ''),
            'search' => $request->query->get('search', '')
        ]);
    }

    #[Route('/{id}/refuser', name: 'app_admin_partenaire_refuser', methods: ['POST'])]
    public function refuser(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $partenaire = $this->partenaireRepository->find($id);
        
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }
        
        $motif = $request->request->get('motif', '');
        $partenaire->setStatut('refuse');
        $partenaire->setDateValidation(new \DateTime());
        
        $this->entityManager->flush();
        
        $this->addFlash('info', '❌ Partenaire refusé' . ($motif ? ' : ' . $motif : ''));
        
        return $this->redirectToRoute('app_admin_partenaires_index', [
            'statut' => $request->query->get('statut', ''),
            'search' => $request->query->get('search', '')
        ]);
    }

    #[Route('/{id}/supprimer', name: 'app_admin_partenaire_supprimer', methods: ['POST'])]
    public function supprimer(int $id, Request $request): Response
    {
        $this->checkAdmin();
        
        $partenaire = $this->partenaireRepository->find($id);
        
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }
        
        $this->entityManager->remove($partenaire);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Partenaire supprimé avec succès !');
        
        return $this->redirectToRoute('app_admin_partenaires_index', [
            'statut' => $request->query->get('statut', ''),
            'search' => $request->query->get('search', '')
        ]);
    }

    #[Route('/{id}/voir', name: 'app_admin_partenaire_voir', methods: ['GET'])]
    public function voir(int $id): Response
    {
        $this->checkAdmin();
        
        $partenaire = $this->partenaireRepository->find($id);
        
        if (!$partenaire) {
            $this->addFlash('error', 'Partenaire non trouvé');
            return $this->redirectToRoute('app_admin_partenaires_index');
        }
        
        return $this->render('admin_partenaire/voir.html.twig', [
            'partenaire' => $partenaire
        ]);
    }
}