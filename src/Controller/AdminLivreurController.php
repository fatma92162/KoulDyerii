<?php

namespace App\Controller;

use App\Entity\Livreur;
use App\Repository\LivreurRepository;
use App\Service\DeliveryCallLogService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminLivreurController extends AbstractController
{
    public function __construct(
        private DeliveryCallLogService $deliveryCallLogService,
    ) {
    }

    #[Route('/admin/livreurs', name: 'app_admin_livreurs_liste', methods: ['GET'])]
    public function index(Request $request, LivreurRepository $livreurRepository): Response
    {
        $search = trim((string) $request->query->get('search', ''));
        $status = trim((string) $request->query->get('status', ''));
        $sort = trim((string) $request->query->get('sort', 'id_desc'));

        $livreurs = $livreurRepository->findAll();

        if ($search !== '') {
            $livreurs = array_filter($livreurs, function (Livreur $livreur) use ($search) {
                $searchLower = mb_strtolower($search);

                return
                    str_contains((string) $livreur->getIdLivreur(), $searchLower) ||
                    str_contains(mb_strtolower((string) $livreur->getNom()), $searchLower) ||
                    str_contains(mb_strtolower((string) $livreur->getPrenom()), $searchLower) ||
                    str_contains(mb_strtolower((string) $livreur->getTelephone()), $searchLower);
            });
        }

        if ($status !== '') {
            $livreurs = array_filter($livreurs, function (Livreur $livreur) use ($status) {
                if ($status === 'disponible') {
                    return $livreur->getDisponibilite() === true;
                }

                if ($status === 'indisponible') {
                    return $livreur->getDisponibilite() === false;
                }

                return true;
            });
        }

        $livreurs = array_values($livreurs);

        usort($livreurs, function (Livreur $a, Livreur $b) use ($sort) {
            return match ($sort) {
                'id_asc' => $a->getIdLivreur() <=> $b->getIdLivreur(),
                'id_desc' => $b->getIdLivreur() <=> $a->getIdLivreur(),
                'nom_asc' => strcasecmp((string) $a->getNom(), (string) $b->getNom()),
                'nom_desc' => strcasecmp((string) $b->getNom(), (string) $a->getNom()),
                'prenom_asc' => strcasecmp((string) $a->getPrenom(), (string) $b->getPrenom()),
                'prenom_desc' => strcasecmp((string) $b->getPrenom(), (string) $a->getPrenom()),
                'telephone_asc' => strcasecmp((string) $a->getTelephone(), (string) $b->getTelephone()),
                'telephone_desc' => strcasecmp((string) $b->getTelephone(), (string) $a->getTelephone()),
                'status_asc' => ($b->getDisponibilite() <=> $a->getDisponibilite()),
                'status_desc' => ($a->getDisponibilite() <=> $b->getDisponibilite()),
                default => $b->getIdLivreur() <=> $a->getIdLivreur(),
            };
        });

        $allLivreurs = $livreurRepository->findAll();
        $livreurCallStats = [];

        foreach ($allLivreurs as $livreur) {
            $livreurCallStats[$livreur->getIdLivreur()] = $this->deliveryCallLogService->getSummaryForLivreur((int) $livreur->getIdLivreur());
        }

        $stats = [
            'total' => count($allLivreurs),
            'disponibles' => count(array_filter($allLivreurs, fn (Livreur $l) => $l->getDisponibilite() === true)),
            'indisponibles' => count(array_filter($allLivreurs, fn (Livreur $l) => $l->getDisponibilite() === false)),
            'total_calls' => array_sum(array_map(static fn (array $summary) => (int) ($summary['total_calls'] ?? 0), $livreurCallStats)),
            'accepted_calls' => array_sum(array_map(static fn (array $summary) => (int) ($summary['accepted_count'] ?? 0), $livreurCallStats)),
            'declined_calls' => array_sum(array_map(static fn (array $summary) => (int) ($summary['declined_count'] ?? 0), $livreurCallStats)),
        ];

        return $this->render('admin_livraisons/livreurs_liste.html.twig', [
            'livreurs' => $livreurs,
            'search' => $search,
            'status' => $status,
            'sort' => $sort,
            'stats' => $stats,
            'livreurCallStats' => $livreurCallStats,
        ]);
    }

    #[Route('/admin/livreurs/new', name: 'app_admin_livreur_new', methods: ['GET'])]
    public function new(): Response
    {
        return $this->render('admin_livraisons/livreur_form.html.twig', [
            'livreur' => null,
            'isEdit' => false,
        ]);
    }

    #[Route('/admin/livreurs/create', name: 'app_admin_livreur_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livreur = new Livreur();

        $livreur->setNom(trim((string) $request->request->get('nom')));
        $livreur->setPrenom(trim((string) $request->request->get('prenom')));
        $livreur->setTelephone(trim((string) $request->request->get('telephone')));
        $livreur->setDisponibilite($request->request->getBoolean('disponibilite'));

        $entityManager->persist($livreur);
        $entityManager->flush();

        $this->addFlash('success', 'Livreur ajouté avec succès.');

        return $this->redirectToRoute('app_admin_livreurs_liste');
    }

    #[Route('/admin/livreurs/{idLivreur}/edit', name: 'app_admin_livreur_edit', methods: ['GET'])]
    public function edit(Livreur $livreur): Response
    {
        return $this->render('admin_livraisons/livreur_form.html.twig', [
            'livreur' => $livreur,
            'isEdit' => true,
        ]);
    }

    #[Route('/admin/livreurs/{idLivreur}/update', name: 'app_admin_livreur_update', methods: ['POST'])]
    public function update(Request $request, Livreur $livreur, EntityManagerInterface $entityManager): Response
    {
        $livreur->setNom(trim((string) $request->request->get('nom')));
        $livreur->setPrenom(trim((string) $request->request->get('prenom')));
        $livreur->setTelephone(trim((string) $request->request->get('telephone')));
        $livreur->setDisponibilite($request->request->getBoolean('disponibilite'));

        $entityManager->flush();

        $this->addFlash('success', 'Livreur modifié avec succès.');

        return $this->redirectToRoute('app_admin_livreurs_liste');
    }

    #[Route('/admin/livreurs/{idLivreur}/delete', name: 'app_admin_livreur_delete', methods: ['POST'])]
    public function delete(Request $request, Livreur $livreur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete_livreur_' . $livreur->getIdLivreur(), (string) $request->request->get('_token'))) {
            $entityManager->remove($livreur);
            $entityManager->flush();

            $this->addFlash('success', 'Livreur supprimé avec succès.');
        } else {
            $this->addFlash('error', 'Token CSRF invalide.');
        }

        return $this->redirectToRoute('app_admin_livreurs_liste');
    }
}

