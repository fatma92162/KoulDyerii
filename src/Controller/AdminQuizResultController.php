<?php

namespace App\Controller;

use App\Repository\CertificateRepository;
use App\Repository\QuizResultRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminQuizResultController extends AbstractController
{
    private function checkAdmin(): void
    {
        $user = $this->getUser();
        if (!$user || !method_exists($user, 'getRole') || $user->getRole() !== 'admin') {
            throw $this->createAccessDeniedException('Acces admin requis.');
        }
    }

    public function __construct(
        private QuizResultRepository $quizResultRepository,
        private CertificateRepository $certificateRepository
    ) {}

    #[Route('/admin/results', name: 'app_admin_results', methods: ['GET'])]
    public function results(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_quiz/results.html.twig', ['results' => $this->quizResultRepository->findBy([], ['id' => 'DESC'])]);
    }

    #[Route('/admin/certificates', name: 'app_admin_certificates', methods: ['GET'])]
    public function certificates(): Response
    {
        $this->checkAdmin();
        return $this->render('admin_quiz/certificates.html.twig', ['certificates' => $this->certificateRepository->findBy([], ['id' => 'DESC'])]);
    }
}
