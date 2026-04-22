<?php
// src/Service/StripeService.php

namespace App\Service;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Abonnement;
use App\Entity\Utilisateur;

class StripeService
{
    private $publicKey;
    private $secretKey;

    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->secretKey = (string) ($_ENV['STRIPE_SECRET_KEY'] ?? $_SERVER['STRIPE_SECRET_KEY'] ?? '');
        $this->publicKey = (string) ($_ENV['STRIPE_PUBLIC_KEY'] ?? $_SERVER['STRIPE_PUBLIC_KEY'] ?? '');
        
        if ($this->secretKey !== '') {
            Stripe::setApiKey($this->secretKey);
        }
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getPlansForDisplay(): array
    {
        return [
            '1_month' => [
                'name' => 'Abonnement 1 mois',
                'description' => '5% de réduction sur toutes vos commandes',
                'reduction' => 5,
                'price' => 9.99,
                'price_id' => null
            ],
            '2_months' => [
                'name' => 'Abonnement 2 mois',
                'description' => '10% de réduction sur toutes vos commandes',
                'reduction' => 10,
                'price' => 17.99,
                'price_id' => null
            ],
            '3_months' => [
                'name' => 'Abonnement 3 mois',
                'description' => '15% de réduction sur toutes vos commandes',
                'reduction' => 15,
                'price' => 24.99,
                'price_id' => null
            ],
            '6_months' => [
                'name' => 'Abonnement 6 mois',
                'description' => '40% de réduction sur toutes vos commandes',
                'reduction' => 40,
                'price' => 44.99,
                'price_id' => null
            ]
        ];
    }

    private function getDurationMonths(string $planKey): int
    {
        return match($planKey) {
            '1_month' => 1,
            '2_months' => 2,
            '3_months' => 3,
            '6_months' => 6,
            default => 1
        };
    }

    public function createCheckoutSession(Utilisateur $user, string $planKey): ?Session
    {
        $plans = $this->getPlansForDisplay();
        if (!isset($plans[$planKey])) {
            return null;
        }

        $plan = $plans[$planKey];
        $durationMonths = $this->getDurationMonths($planKey);

        // Créer ou récupérer le client Stripe
        $customer = $this->getOrCreateCustomer($user);

        $session = Session::create([
            'payment_method_types' => ['card'],
            'customer' => $customer->id,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $plan['name'],
                        'description' => $plan['description'],
                    ],
                    'unit_amount' => (int)($plan['price'] * 100),
                    'recurring' => [
                        'interval' => 'month',
                        'interval_count' => $durationMonths,
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => $_ENV['APP_URL'] . '/abonnement/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $_ENV['APP_URL'] . '/abonnement',
            'metadata' => [
                'user_id' => $user->getIdUtilisateur(),
                'plan' => $planKey,
                'reduction' => $plan['reduction'],
                'duration_months' => $durationMonths
            ]
        ]);

        return $session;
    }

    private function getOrCreateCustomer(Utilisateur $user): Customer
    {
        if ($user->getStripeCustomerId()) {
            try {
                return Customer::retrieve($user->getStripeCustomerId());
            } catch (\Exception $e) {
                // Customer n'existe plus, on en crée un nouveau
            }
        }

        $customer = Customer::create([
            'email' => $user->getEmail(),
            'name' => $user->getNom(),
            'metadata' => [
                'user_id' => $user->getIdUtilisateur()
            ]
        ]);

        $user->setStripeCustomerId($customer->id);
        $this->entityManager->flush();

        return $customer;
    }

    public function handleSuccessfulPayment(string $sessionId): bool
    {
        $session = Session::retrieve($sessionId);
        
        if ($session->payment_status !== 'paid') {
            return false;
        }

        $userId = $session->metadata['user_id'] ?? null;
        $plan = $session->metadata['plan'] ?? null;
        $reduction = (int)($session->metadata['reduction'] ?? 0);
        $durationMonths = (int)($session->metadata['duration_months'] ?? 1);

        if (!$userId || !$plan) {
            return false;
        }

        $user = $this->entityManager->getRepository(Utilisateur::class)->find($userId);
        if (!$user) {
            return false;
        }

        // Désactiver l'ancien abonnement
        $oldSubscription = $this->entityManager->getRepository(Abonnement::class)->findActiveByUser($user);
        if ($oldSubscription) {
            $oldSubscription->setStatus('cancelled');
        }

        // Créer le nouvel abonnement
        $subscription = new Abonnement();
        $subscription->setUtilisateur($user);
        $subscription->setStripeSubscriptionId($session->subscription);
        $subscription->setPlan($plan);
        $subscription->setReduction($reduction);
        $subscription->setStartDate(new \DateTime());
        $subscription->setEndDate((new \DateTime())->modify("+{$durationMonths} months"));
        $subscription->setStatus('active');

        $this->entityManager->persist($subscription);
        $this->entityManager->flush();

        return true;
    }
}
