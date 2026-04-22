<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class AdminQuizGenerationAliasController extends AbstractController
{
    #[Route('/admin/formation/{id}/quiz/generate-ai', name: 'app_admin_formation_quiz_generate_alias', methods: ['POST'])]
    public function alias(int $id): RedirectResponse
    {
        return $this->redirectToRoute('app_admin_formations_generate_quiz_ai', ['id' => $id]);
    }
}
