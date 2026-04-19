<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/formations')]
class FormationController extends AbstractController
{
    #[Route('/', name: 'app_formations_index', methods: ['GET'])]
    public function index(FormationRepository $formationRepository): Response
    {
        return $this->render('formations/index.html.twig', [
            'formations' => $formationRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_formations_show', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function show(int $id, FormationRepository $formationRepository): Response
    {
        $formation = $formationRepository->find($id);
        if (!$formation) {
            throw $this->createNotFoundException('Formation non trouvée.');
        }

        return $this->render('formations/show.html.twig', [
            'formation' => $formation,
        ]);
    }
}
