<?php
namespace App\Controller;

use App\Repository\FavoriRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavoriController extends AbstractController
{
    #[Route('/mes-favoris', name: 'app_mes_favoris')]
    public function index(FavoriRepository $favoriRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $favoris = $favoriRepo->findFavorisByUser($user->getIdUtilisateur());
        return $this->render('favori/index.html.twig', [
            'favoris' => $favoris,
        ]);
    }
}