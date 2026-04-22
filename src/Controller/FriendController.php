<?php
// src/Controller/FriendController.php

namespace App\Controller;

use App\Entity\NotifRequest;
use App\Entity\Notification;
use App\Repository\NotifRequestRepository;
use App\Repository\PostRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/friend')]
class FriendController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private NotifRequestRepository $notifRequestRepository,
        private UtilisateurRepository $utilisateurRepository,
        private PostRepository $postRepository
    ) {}

    // Page avec tous les utilisateurs et bouton ajouter en ami
    #[Route('/requests', name: 'app_notif_requests_list')]
    public function requestsList(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Récupérer tous les utilisateurs sauf moi-même
        $allUsers = $this->utilisateurRepository->createQueryBuilder('u')
            ->where('u.idUtilisateur != :userId')
            ->setParameter('userId', $user->getIdUtilisateur())
            ->getQuery()
            ->getResult();

        // Pour chaque utilisateur, vérifier le statut de la relation
        $usersWithStatus = [];
        foreach ($allUsers as $otherUser) {
            $status = 'none'; // none, pending_sent, pending_received, friends
            
            // Vérifier si déjà amis
            if ($this->notifRequestRepository->areFriends($user, $otherUser)) {
                $status = 'friends';
            }
            // Vérifier si demande envoyée par moi
            elseif ($this->notifRequestRepository->hasPendingRequest($user, $otherUser)) {
                $status = 'pending_sent';
            }
            // Vérifier si demande reçue de l'autre
            elseif ($this->notifRequestRepository->hasPendingRequest($otherUser, $user)) {
                $status = 'pending_received';
            }
            
            $usersWithStatus[] = [
                'user' => $otherUser,
                'status' => $status
            ];
        }

        // Récupérer les demandes reçues (en attente)
        $pendingRequests = $this->notifRequestRepository->findPendingRequests($user->getIdUtilisateur());

        return $this->render('friend/requests.html.twig', [
            'users' => $usersWithStatus,
            'pendingRequests' => $pendingRequests,
        ]);
    }

    // Envoyer une demande d'ami
    #[Route('/send/{id}', name: 'app_friend_send', methods: ['POST'])]
    public function sendRequest(int $id): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $receiver = $this->utilisateurRepository->find($id);
        if (!$receiver) {
            return $this->json(['success' => false, 'message' => 'Utilisateur non trouvé'], 404);
        }

        if ($user->getIdUtilisateur() === $receiver->getIdUtilisateur()) {
            return $this->json(['success' => false, 'message' => 'Vous ne pouvez pas vous ajouter vous-même'], 403);
        }

        // Vérifier si une demande existe déjà
        if ($this->notifRequestRepository->hasPendingRequest($user, $receiver)) {
            return $this->json(['success' => false, 'message' => 'Demande déjà envoyée'], 400);
        }

        if ($this->notifRequestRepository->areFriends($user, $receiver)) {
            return $this->json(['success' => false, 'message' => 'Vous êtes déjà amis'], 400);
        }

        $notifRequest = new NotifRequest();
        $notifRequest->setSender($user);
        $notifRequest->setReceiver($receiver);
        $notifRequest->setStatus('pending');
        $notifRequest->setCreatedAt(new \DateTime());

        $this->entityManager->persist($notifRequest);
        $this->entityManager->flush();

        // Créer une notification pour le destinataire
        $notification = new Notification();
        $notification->setUserId($receiver->getIdUtilisateur());
        $notification->setFromUserId($user->getIdUtilisateur());
        $notification->setType('friend_request');
        $notification->setMessage("{$user->getNom()} vous a envoyé une demande d'ami");
        $notification->setCreatedAt(new \DateTime());
        $notification->setIsRead(false);
        $this->entityManager->persist($notification);
        $this->entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Demande envoyée avec succès'
        ]);
    }

    // Accepter une demande d'ami
    #[Route('/accept/{id}', name: 'app_friend_accept', methods: ['POST'])]
    public function acceptRequest(int $id): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $notifRequest = $this->notifRequestRepository->find($id);
        if (!$notifRequest) {
            return $this->json(['success' => false, 'message' => 'Demande non trouvée'], 404);
        }

        if ($notifRequest->getReceiver()->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            return $this->json(['success' => false, 'message' => 'Action non autorisée'], 403);
        }

        $notifRequest->setStatus('accepted');
        $this->entityManager->flush();

        // Notifier l'expéditeur
        $notification = new Notification();
        $notification->setUserId($notifRequest->getSender()->getIdUtilisateur());
        $notification->setFromUserId($user->getIdUtilisateur());
        $notification->setType('friend_accepted');
        $notification->setMessage("{$user->getNom()} a accepté votre demande d'ami");
        $notification->setCreatedAt(new \DateTime());
        $notification->setIsRead(false);
        $this->entityManager->persist($notification);
        $this->entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Demande acceptée'
        ]);
    }

    // Refuser une demande d'ami
    #[Route('/reject/{id}', name: 'app_friend_reject', methods: ['POST'])]
    public function rejectRequest(int $id): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $notifRequest = $this->notifRequestRepository->find($id);
        if (!$notifRequest) {
            return $this->json(['success' => false, 'message' => 'Demande non trouvée'], 404);
        }

        if ($notifRequest->getReceiver()->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            return $this->json(['success' => false, 'message' => 'Action non autorisée'], 403);
        }

        $notifRequest->setStatus('rejected');
        $this->entityManager->flush();

        return $this->json([
            'success' => true,
            'message' => 'Demande refusée'
        ]);
    }

    // Liste des amis
    #[Route('/friends', name: 'app_friends_list')]
    public function friendsList(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $friends = $this->notifRequestRepository->findAcceptedFriends($user->getIdUtilisateur());

        return $this->render('friend/friends.html.twig', [
            'friends' => $friends
        ]);
    }

    // ✅ Profil d'un ami
    #[Route('/profile/{id}', name: 'app_friend_profile')]
    public function friendProfile(int $id): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $friend = $this->utilisateurRepository->find($id);
        if (!$friend) {
            $this->addFlash('error', 'Utilisateur non trouvé');
            return $this->redirectToRoute('app_friends_list');
        }

        // Vérifier si l'utilisateur est ami avec cette personne
        $areFriends = $this->notifRequestRepository->areFriends($user, $friend);
        
        if (!$areFriends && $user->getIdUtilisateur() !== $friend->getIdUtilisateur()) {
            $this->addFlash('error', 'Vous devez être ami pour voir ce profil');
            return $this->redirectToRoute('app_friends_list');
        }

        // Récupérer les publications de l'ami
        $posts = $this->postRepository->findBy(
            ['utilisateur' => $friend],
            ['created_at' => 'DESC']
        );

        return $this->render('friend/profile.html.twig', [
            'friend' => $friend,
            'posts' => $posts,
            'areFriends' => $areFriends
        ]);
    }

    // ✅ Accepter une demande depuis le profil d'un utilisateur
    #[Route('/accept-from-user/{id}', name: 'app_friend_accept_from_user', methods: ['POST'])]
    public function acceptRequestFromUser(int $id): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        $request = $this->notifRequestRepository->findOneBy([
            'sender' => $id,
            'receiver' => $user,
            'status' => 'pending'
        ]);

        if (!$request) {
            return $this->json(['success' => false, 'message' => 'Demande non trouvée'], 404);
        }

        $request->setStatus('accepted');
        $this->entityManager->flush();

        // Notifier l'expéditeur
        $notification = new Notification();
        $notification->setUserId($request->getSender()->getIdUtilisateur());
        $notification->setFromUserId($user->getIdUtilisateur());
        $notification->setType('friend_accepted');
        $notification->setMessage("{$user->getNom()} a accepté votre demande d'ami");
        $notification->setCreatedAt(new \DateTime());
        $notification->setIsRead(false);
        $this->entityManager->persist($notification);
        $this->entityManager->flush();

        return $this->json(['success' => true, 'message' => 'Demande acceptée']);
    }

    // ✅ Supprimer un ami (retirer de la liste d'amis) - VERSION CORRIGÉE
    #[Route('/remove/{id}', name: 'app_friend_remove', methods: ['POST'])]
    public function removeFriend(int $id): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false, 'message' => 'Connectez-vous'], 401);
        }

        // Chercher la relation d'amitié dans les deux sens avec le statut 'accepted'
        $friendship = $this->notifRequestRepository->createQueryBuilder('n')
            ->where('(n.sender = :user AND n.receiver = :friend AND n.status = :status)')
            ->orWhere('(n.sender = :friend AND n.receiver = :user AND n.status = :status)')
            ->setParameter('user', $user)
            ->setParameter('friend', $id)
            ->setParameter('status', 'accepted')
            ->getQuery()
            ->getOneOrNullResult();

        if (!$friendship) {
            // Essayer de trouver une relation avec le statut 'pending' (au cas où)
            $pendingFriendship = $this->notifRequestRepository->createQueryBuilder('n')
                ->where('(n.sender = :user AND n.receiver = :friend)')
                ->orWhere('(n.sender = :friend AND n.receiver = :user)')
                ->setParameter('user', $user)
                ->setParameter('friend', $id)
                ->getQuery()
                ->getOneOrNullResult();
                
            if ($pendingFriendship) {
                // Si c'est une demande en attente, on la supprime aussi
                $this->entityManager->remove($pendingFriendship);
                $this->entityManager->flush();
                return $this->json([
                    'success' => true,
                    'message' => 'Demande d\'ami annulée'
                ]);
            }
            
            return $this->json(['success' => false, 'message' => 'Amitié non trouvée'], 404);
        }

        // Récupérer l'ami pour la notification
        $friend = $this->utilisateurRepository->find($id);
        
        // Supprimer la relation d'amitié
        $this->entityManager->remove($friendship);
        $this->entityManager->flush();

        // Créer une notification pour l'autre utilisateur
        if ($friend) {
            $notification = new Notification();
            $notification->setUserId($friend->getIdUtilisateur());
            $notification->setFromUserId($user->getIdUtilisateur());
            $notification->setType('friend_removed');
            $notification->setMessage("{$user->getNom()} vous a retiré de ses amis");
            $notification->setCreatedAt(new \DateTime());
            $notification->setIsRead(false);
            $this->entityManager->persist($notification);
            $this->entityManager->flush();
        }

        return $this->json([
            'success' => true,
            'message' => 'Ami retiré avec succès'
        ]);
    }
}