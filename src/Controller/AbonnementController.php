<?php
// src/Controller/AbonnementController.php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Repository\AbonnementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/abonnement')]
class AbonnementController extends AbstractController
{
    public function __construct(
        private AbonnementRepository $abonnementRepository,
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/', name: 'app_abonnement_index')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Plans d'abonnement
        $plans = [
            '1_month' => [
                'name' => 'Abonnement 1 mois',
                'description' => '5% de réduction sur toutes vos commandes',
                'reduction' => 5,
                'price' => 9.99,
                'stripe_link' => 'https://buy.stripe.com/test_eVq9AUaXs0g5c0C4CTabK01'
            ],
            '2_months' => [
                'name' => 'Abonnement 2 mois',
                'description' => '10% de réduction sur toutes vos commandes',
                'reduction' => 10,
                'price' => 17.99,
                'stripe_link' => 'https://buy.stripe.com/test_28EeVe2qW1k97Km9XdabK02'
            ],
            '3_months' => [
                'name' => 'Abonnement 3 mois',
                'description' => '15% de réduction sur toutes vos commandes',
                'reduction' => 15,
                'price' => 24.99,
                'stripe_link' => 'https://buy.stripe.com/test_fZu7sM5D85Apd4G0mDabK03'
            ],
            '6_months' => [
                'name' => 'Abonnement 6 mois',
                'description' => '40% de réduction sur toutes vos commandes',
                'reduction' => 40,
                'price' => 44.99,
                'stripe_link' => 'https://buy.stripe.com/test_28E8wQe9E4wld4GedtabK04'
            ]
        ];
        
        $currentSubscription = $this->abonnementRepository->findActiveByUser($user);
        $currentReduction = $currentSubscription ? $currentSubscription->getReduction() : 0;

        return $this->render('abonnement/index.html.twig', [
            'plans' => $plans,
            'currentSubscription' => $currentSubscription,
            'currentReduction' => $currentReduction,
        ]);
    }

    #[Route('/checkout/{plan}', name: 'app_abonnement_checkout')]
    public function checkout(string $plan): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $plans = [
            '1_month' => 'https://buy.stripe.com/test_eVq9AUaXs0g5c0C4CTabK01',
            '2_months' => 'https://buy.stripe.com/test_28EeVe2qW1k97Km9XdabK02',
            '3_months' => 'https://buy.stripe.com/test_fZu7sM5D85Apd4G0mDabK03',
            '6_months' => 'https://buy.stripe.com/test_28E8wQe9E4wld4GedtabK04',
        ];

        $stripeLink = $plans[$plan] ?? $plans['1_month'];
        
        // Rediriger vers Stripe
        return $this->redirect($stripeLink);
    }

    #[Route('/success', name: 'app_abonnement_success')]
    public function success(Request $request): Response
    {
        // Cette route sera appelée après un paiement réussi
        // Vous pouvez ajouter la logique pour activer l'abonnement ici
        
        $this->addFlash('success', 'Votre abonnement a été activé avec succès !');
        return $this->redirectToRoute('app_abonnement_index');
    }

    #[Route('/cancel', name: 'app_abonnement_cancel')]
    public function cancel(): Response
    {
        $user = $this->getUser();
        $subscription = $this->abonnementRepository->findActiveByUser($user);
        
        if ($subscription) {
            $subscription->setStatus('cancelled');
            $this->entityManager->flush();
            $this->addFlash('success', 'Votre abonnement a été annulé.');
        }

        return $this->redirectToRoute('app_abonnement_index');
    }
}