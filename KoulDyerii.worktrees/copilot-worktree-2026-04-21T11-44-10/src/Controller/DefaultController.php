<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Si utilisateur connecté
        if ($this->getUser()) {
            $user = $this->getUser();
            // Admin → liste des utilisateurs
            if ($user->getRole() === 'admin') {
                return $this->redirectToRoute('app_utilisateur_liste');
            }
            // User → page profil
            return $this->redirectToRoute('app_mon_profil');
        }
        
        // Non connecté → page d'accueil
        return $this->render('default/index.html.twig');
    }
}