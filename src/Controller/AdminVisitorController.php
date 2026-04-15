<?php

namespace App\Controller;

use App\Repository\VisitorActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/visitors')]
class AdminVisitorController extends AbstractController
{
    #[Route('/count', name: 'app_admin_visitors_count', methods: ['GET'])]
    public function count(VisitorActivityRepository $visitorActivityRepository): JsonResponse
    {
        $user = $this->getUser();
        if (!$user || $user->getRole() !== 'admin') {
            return $this->json(['error' => 'Unauthorized'], 403);
        }

        return $this->json([
            'onlineVisitors' => $visitorActivityRepository->countOnlineVisitors(5),
        ]);
    }
}