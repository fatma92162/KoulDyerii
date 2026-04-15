<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
class StatistiqueController extends AbstractController
{
    public function __construct(private UtilisateurRepository $userRepo) {}

    #[Route('/statistiques', name: 'app_admin_statistiques')]
    public function index(): Response
    {
        // Vérifier manuellement si l'utilisateur est admin
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs.');
        }
        
        // Statistiques globales
        $totalUsers = count($this->userRepo->findAll());
        $totalAdmins = count($this->userRepo->findBy(['role' => 'admin']));
        $totalClients = count($this->userRepo->findBy(['role' => 'user']));
        
        // Pourcentage
        $pourcentageAdmin = $totalUsers > 0 ? round(($totalAdmins / $totalUsers) * 100, 1) : 0;
        $pourcentageClient = $totalUsers > 0 ? round(($totalClients / $totalUsers) * 100, 1) : 0;
        
        // Statistiques par région
        $regions = [
            'Tunis', 'Ariana', 'Ben Arous', 'Manouba', 'Nabeul', 'Zaghouan',
            'Bizerte', 'Béja', 'Jendouba', 'Le Kef', 'Siliana', 'Sousse',
            'Monastir', 'Mahdia', 'Sfax', 'Kairouan', 'Kasserine', 'Sidi Bouzid',
            'Gabès', 'Médenine', 'Tataouine', 'Gafsa', 'Tozeur', 'Kébili'
        ];
        
        $statsRegions = [];
        foreach ($regions as $region) {
            $count = count($this->userRepo->findBy(['region' => $region]));
            if ($count > 0) {
                $statsRegions[$region] = $count;
            }
        }
        
        arsort($statsRegions);
        
        // Évolution des inscriptions
        $evolution = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = new \DateTime("-$i months");
            $mois = $date->format('F Y');
            $debut = (clone $date)->modify('first day of this month')->format('Y-m-d');
            $fin = (clone $date)->modify('last day of this month')->format('Y-m-d');
            
            $qb = $this->userRepo->createQueryBuilder('u');
            $count = $qb->select('COUNT(u.idUtilisateur)')
                ->where('u.dateNaissance BETWEEN :debut AND :fin')
                ->setParameter('debut', $debut)
                ->setParameter('fin', $fin)
                ->getQuery()
                ->getSingleScalarResult();
            
            $evolution[] = [
                'mois' => $mois,
                'inscriptions' => $count
            ];
        }
        
        // Derniers utilisateurs
        $derniersUsers = $this->userRepo->findBy([], ['idUtilisateur' => 'DESC'], 5);
        
        return $this->render('admin/statistiques.html.twig', [
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalClients' => $totalClients,
            'pourcentageAdmin' => $pourcentageAdmin,
            'pourcentageClient' => $pourcentageClient,
            'statsRegions' => $statsRegions,
            'evolution' => $evolution,
            'derniersUsers' => $derniersUsers
        ]);
    }
}