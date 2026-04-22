<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            $user = $this->getUser();
            // Si admin → liste des utilisateurs
            if ($user->getRole() === 'admin') {
                return $this->redirectToRoute('app_utilisateur_liste');
            }
            // Si user → page profil
            return $this->redirectToRoute('app_mon_profil');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/mon-profil', name: 'app_mon_profil')]
    public function monProfil(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        
        // Si admin, utiliser le template avec sidebar
        if ($user->getRole() === 'admin') {
            return $this->render('utilisateur/profil.html.twig', [
                'utilisateur' => $user
            ]);
        }
        
        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $user
        ]);
    }
}