<?php
// src/Controller/GoogleController.php

namespace App\Controller;

use App\Entity\Pointssolde;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GoogleController extends AbstractController
{
    private string $clientId;
    private string $clientSecret;
    private string $redirectUri;

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $redirectUri
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
    }

    #[Route('/auth/google', name: 'app_google')]
    public function connect(): Response
    {
        // Construire l'URL d'autorisation Google
        $params = [
            'client_id'     => $this->clientId,
            'redirect_uri'  => $this->redirectUri,
            'response_type' => 'code',
            'scope'         => 'openid email profile',
            'prompt'        => 'select_account',
            'access_type'   => 'online',
        ];

        $url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query($params);
        return new RedirectResponse($url);
    }

    #[Route('/auth/google/check', name: 'app_google_check')]
    public function check(
        Request $request,
        HttpClientInterface $httpClient,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher,
        Security $security
    ): Response {
        // 1. Vérifier le paramètre d'erreur
        if ($request->query->has('error')) {
            $this->addFlash('error', 'Connexion Google annulée : ' . $request->query->get('error'));
            return $this->redirectToRoute('app_login');
        }

        // 2. Récupérer le code d'autorisation
        $code = $request->query->get('code');
        if (!$code) {
            $this->addFlash('error', 'Code d\'autorisation manquant.');
            return $this->redirectToRoute('app_login');
        }

        try {
            // 4. Échanger le code contre un access_token
            $tokenResponse = $httpClient->request('POST', 'https://oauth2.googleapis.com/token', [
                'body' => [
                    'code'          => $code,
                    'client_id'     => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'redirect_uri'  => $this->redirectUri,
                    'grant_type'    => 'authorization_code',
                ],
            ]);

            $tokenData = $tokenResponse->toArray();

            if (!isset($tokenData['access_token'])) {
                throw new \RuntimeException('Pas d\'access_token dans la réponse Google : ' . json_encode($tokenData));
            }

            $accessToken = $tokenData['access_token'];

            // 5. Récupérer les informations utilisateur depuis Google
            $userInfoResponse = $httpClient->request('GET', 'https://www.googleapis.com/oauth2/v2/userinfo', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                ],
            ]);

            $userData = $userInfoResponse->toArray();

            $email    = $userData['email'] ?? null;
            $nom      = $userData['name'] ?? ($userData['given_name'] ?? 'Utilisateur Google');
            $googleId = $userData['id'] ?? null;
            $avatar   = $userData['picture'] ?? null;

            if (!$email) {
                throw new \RuntimeException('Impossible de récupérer l\'email depuis Google.');
            }

            // 6. Rechercher ou créer l'utilisateur en base
            $existingUser = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

            if (!$existingUser) {
                $user = new Utilisateur();
                $user->setNom($nom);
                $user->setEmail($email);
                $user->setRole('user');
                $user->setPhoto($avatar);
                $user->setGoogleId($googleId);
                $user->setGoogleAvatar($avatar);

                // Mot de passe aléatoire sécurisé
                $randomPassword = bin2hex(random_bytes(16));
                $user->setMotDePasse($passwordHasher->hashPassword($user, $randomPassword));

                $em->persist($user);

                // Initialisation des points de fidélité
                $points = new Pointssolde();
                $points->setUtilisateur($user);
                $points->setSolde(0);
                $points->setDateCreation(new \DateTime());
                $points->setDateModification(new \DateTime());
                $em->persist($points);

                $em->flush();
                $existingUser = $user;
            } else {
                // Mise à jour des informations Google
                $updated = false;
                if ($avatar && !$existingUser->getPhoto()) {
                    $existingUser->setPhoto($avatar);
                    $updated = true;
                }
                if ($avatar && !$existingUser->getGoogleAvatar()) {
                    $existingUser->setGoogleAvatar($avatar);
                    $updated = true;
                }
                if (!$existingUser->getGoogleId() && $googleId) {
                    $existingUser->setGoogleId($googleId);
                    $updated = true;
                }
                if ($updated) {
                    $em->flush();
                }
            }

            // 7. Authentifier l'utilisateur avec Symfony
            $security->login($existingUser, 'form_login', 'main');

            $this->addFlash('success', 'Connexion avec Google réussie ! Bienvenue ' . $existingUser->getNom() . ' !');
            return $this->redirectToRoute('app_home');

        } catch (\Exception $e) {
            $this->addFlash('error', 'Erreur lors de la connexion Google: ' . $e->getMessage());
            return $this->redirectToRoute('app_login');
        }
    }
}