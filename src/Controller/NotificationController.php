<?php

namespace App\Controller;

use App\Repository\NotificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotificationController extends AbstractController
{
    #[Route('/notifications', name: 'app_notifications_index')]
    public function index(NotificationRepository $repo): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $notifications = $repo->findRecentByUser($user->getIdUtilisateur(), 50);

        return $this->render('notification/index.html.twig', [
            'notifications' => $notifications
        ]);
    }

    #[Route('/notification/{id}/read', name: 'app_notification_read', methods: ['POST'])]
    public function markAsRead(int $id, NotificationRepository $repo, EntityManagerInterface $em): JsonResponse
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'Non connecté'], 401);
        }

        $notif = $repo->find($id);

        if (!$notif || $notif->getUserId() !== $user->getIdUtilisateur()) {
            return $this->json(['error' => 'Accès interdit'], 403);
        }

        $notif->setIsRead(true);
        $em->flush();

        return $this->json(['success' => true]);
    }
}
