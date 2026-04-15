<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProduitRepository $produitRepository, UtilisateurRepository $utilisateurRepository): Response
    {
        // Page d'accueil accessible à tous (même sans connexion)
        $produits = $produitRepository->findBy(['disponible' => true], ['idProduit' => 'DESC'], 3);
        $admins = $utilisateurRepository->findBy(['role' => 'admin']);
        
        return $this->render('home/index.html.twig', [
            'produits' => $produits,
            'admins' => $admins
        ]);
    }
    
    #[Route('/contact', name: 'app_contact', methods: ['POST'])]
    public function contact(Request $request): Response
    {
        $nom = $request->request->get('nom');
        $email = $request->request->get('email');
        $sujet = $request->request->get('sujet');
        $message = $request->request->get('message');
        
        if (empty($nom) || empty($email) || empty($sujet) || empty($message)) {
            $this->addFlash('error', 'Tous les champs sont obligatoires.');
            return $this->redirectToRoute('app_home');
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->addFlash('error', 'Adresse email invalide.');
            return $this->redirectToRoute('app_home');
        }
        
        $this->addFlash('success', 'Votre message a été envoyé avec succès !');
        return $this->redirectToRoute('app_home');
    }
}