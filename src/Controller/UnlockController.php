<?php
// src/Controller/UnlockController.php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Security\LoginAttemptService;
use App\Service\SmsCodeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UnlockController extends AbstractController
{
    #[Route('/unlock/request', name: 'app_unlock_request', methods: ['GET', 'POST'])]
    public function request(Request $request, LoginAttemptService $loginAttemptService, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $email = $session->get('last_blocked_email');
        if (!$email) {
            return $this->redirectToRoute('app_login');
        }

        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            // Option : mettre à jour l'email dans la base si différent
            $user = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);
            if (!$user) {
                $this->addFlash('error', 'Aucun compte trouvé avec cet email.');
                return $this->redirectToRoute('app_unlock_request');
            }
            return $this->redirectToRoute('app_unlock_verify', ['email' => $email]);
        }

        return $this->render('unlock/request.html.twig');
    }

    #[Route('/unlock/verify/{email}', name: 'app_unlock_verify', methods: ['GET', 'POST'])]
    public function verify(string $email, Request $request, SmsCodeService $codeService, LoginAttemptService $loginAttemptService): Response
    {
        $sessionEmail = $request->getSession()->get('last_blocked_email');
        if (!$sessionEmail) {
            return $this->redirectToRoute('app_login');
        }

        if ($request->isMethod('POST')) {
            $code = $request->request->get('code');
            if ($codeService->verifyCode($email, $code)) {
                $loginAttemptService->clearAttempts($sessionEmail);
                $codeService->deleteCode($email);
                $request->getSession()->remove('last_blocked_email');
                $this->addFlash('success', 'Compte débloqué. Vous pouvez vous connecter.');
                return $this->redirectToRoute('app_login');
            } else {
                $this->addFlash('error', 'Code invalide ou expiré.');
            }
        } else {
            $codeService->generateAndSendCode($email);
            $this->addFlash('info', 'Un email contenant le code de déblocage vient de vous être envoyé.');
        }

        return $this->render('unlock/verify.html.twig', ['email' => $email]);
    }
}