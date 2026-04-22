<?php

namespace App\Controller;

use App\Service\PointsFideliteService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    public function __construct(
        private PointsFideliteService $pointsService
    ) {}

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        if ($this->getUser()) {
            $user = $this->getUser();
            if ($user->getRole() === 'admin') {
                return $this->redirectToRoute('app_utilisateur_liste');
            }
            return $this->redirectToRoute('app_home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Génération du CAPTCHA Mathématique
        $num1 = random_int(1, 10);
        $num2 = random_int(1, 10);
        $request->getSession()->set('math_captcha_result', $num1 + $num2);

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'captcha_num1' => $num1,
            'captcha_num2' => $num2
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
        $points = $this->pointsService->getSolde($user->getIdUtilisateur());
        
        if ($user->getRole() === 'admin') {
            return $this->render('utilisateur/profil_admin.html.twig', [
                'utilisateur' => $user,
                'points' => $points
            ]);
        }
        
        return $this->render('utilisateur/profil.html.twig', [
            'utilisateur' => $user,
            'points' => $points
        ]);
    }

    #[Route(path: '/deconnecter-tous-appareils', name: 'app_logout_all_devices')]
    public function logoutAllDevices(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $user->incrementTokenVersion();
        $em->flush();

        $request->getSession()->invalidate();
        $this->container->get('security.token_storage')->setToken(null);

        $this->addFlash('success', 'Vous avez été déconnecté de tous vos appareils.');
        return $this->redirectToRoute('app_login');
    }
}