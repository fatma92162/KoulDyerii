<?php
// src/Controller/MessageController.php
namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use App\Repository\UtilisateurRepository;
use App\Service\AIAssistant;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messages')]
class MessageController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private UtilisateurRepository $utilisateurRepository,
        private AIAssistant $aiAssistant
    ) {}

    // ==================== READ: Liste des conversations ====================
    #[Route('/', name: 'app_messages_inbox')]
    public function inbox(MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $conversations = $messageRepo->findConversationsForUser($user->getIdUtilisateur());
        $others = [];
        foreach ($conversations as $conv) {
            $other = $this->utilisateurRepository->find($conv['other_user_id']);
            $others[$conv['other_user_id']] = $other;
        }

        return $this->render('message/inbox.html.twig', [
            'conversations' => $conversations,
            'others' => $others,
        ]);
    }

    // ==================== READ: Voir une conversation + CREATE: Envoyer message ====================
    #[Route('/with/{id}', name: 'app_messages_conversation', methods: ['GET', 'POST'])]
    public function conversation(int $id, Request $request, MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $otherUser = $this->utilisateurRepository->find($id);
        if (!$otherUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Marquer comme lus les messages reçus de cet utilisateur
        $messageRepo->markAsReadBetween($user->getIdUtilisateur(), $otherUser->getIdUtilisateur());

        // CREATE: Envoyer un nouveau message
        if ($request->isMethod('POST')) {
            $content = trim($request->request->get('content'));
            if (!empty($content)) {
                // 1. Sauvegarder le message de l'utilisateur
                $userMessage = new Message();
                $userMessage->setSender($user);
                $userMessage->setRecipient($otherUser);
                $userMessage->setContent($content);
                $this->entityManager->persist($userMessage);
                $this->entityManager->flush();
                $this->addFlash('success', 'Message envoyé.');

                // 2. Si le destinataire est l'Assistant IA, générer une réponse automatique
                if (strpos($otherUser->getNom(), 'Assistant IA') !== false || $otherUser->getRole() === 'assistant') {
                    try {
                        $aiReply = $this->aiAssistant->ask($content);
                        $aiMessage = new Message();
                        $aiMessage->setSender($otherUser);
                        $aiMessage->setRecipient($user);
                        $aiMessage->setContent($aiReply);
                        $this->entityManager->persist($aiMessage);
                        $this->entityManager->flush();
                        $this->addFlash('info', 'L\'assistant IA vous a répondu.');
                    } catch (\Exception $e) {
                        $this->addFlash('warning', 'L\'assistant IA n\'a pas pu répondre pour le moment.');
                    }
                }

                return $this->redirectToRoute('app_messages_conversation', ['id' => $id]);
            }
        }

        $messages = $messageRepo->getMessagesBetween($user->getIdUtilisateur(), $otherUser->getIdUtilisateur());

        return $this->render('message/conversation.html.twig', [
            'otherUser' => $otherUser,
            'messages' => $messages,
        ]);
    }

    // ==================== UPDATE: Modifier un message ====================
    #[Route('/{id}/edit', name: 'app_messages_edit', methods: ['GET', 'POST'])]
    public function edit(int $id, Request $request, MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $message = $messageRepo->find($id);
        
        // Vérifier que l'utilisateur est bien l'expéditeur du message
        if (!$message || $message->getSender()->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            throw $this->createNotFoundException('Message non trouvé ou accès non autorisé');
        }
        
        // Vérifier que le message n'est pas trop vieux (optionnel: modifier uniquement dans les 5 minutes)
        $now = new \DateTime();
        $diff = $now->getTimestamp() - $message->getCreatedAt()->getTimestamp();
        if ($diff > 300) { // 5 minutes
            $this->addFlash('warning', 'Vous ne pouvez modifier un message que dans les 5 minutes suivant son envoi.');
            return $this->redirectToRoute('app_messages_conversation', ['id' => $message->getRecipient()->getIdUtilisateur()]);
        }
        
        if ($request->isMethod('POST')) {
            $content = trim($request->request->get('content'));
            if (!empty($content)) {
                $message->setContent($content);
                $this->entityManager->flush();
                $this->addFlash('success', 'Message modifié avec succès.');
                return $this->redirectToRoute('app_messages_conversation', ['id' => $message->getRecipient()->getIdUtilisateur()]);
            } else {
                $this->addFlash('error', 'Le message ne peut pas être vide.');
            }
        }
        
        return $this->render('message/edit.html.twig', [
            'message' => $message,
        ]);
    }

    // ==================== DELETE: Supprimer un message ====================
    #[Route('/{id}/delete', name: 'app_messages_delete', methods: ['POST'])]
    public function delete(int $id, Request $request, MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $message = $messageRepo->find($id);
        
        // Vérifier que l'utilisateur est soit l'expéditeur soit le destinataire
        if (!$message || ($message->getSender()->getIdUtilisateur() !== $user->getIdUtilisateur() && $message->getRecipient()->getIdUtilisateur() !== $user->getIdUtilisateur())) {
            throw $this->createNotFoundException('Message non trouvé ou accès non autorisé');
        }
        
        // Vérifier le token CSRF
        if ($this->isCsrfTokenValid('delete' . $message->getId(), $request->request->get('_token'))) {
            $otherUserId = ($message->getSender()->getIdUtilisateur() === $user->getIdUtilisateur()) 
                ? $message->getRecipient()->getIdUtilisateur() 
                : $message->getSender()->getIdUtilisateur();
                
            $this->entityManager->remove($message);
            $this->entityManager->flush();
            $this->addFlash('success', 'Message supprimé avec succès.');
            
            return $this->redirectToRoute('app_messages_conversation', ['id' => $otherUserId]);
        }
        
        $this->addFlash('error', 'Token invalide.');
        return $this->redirectToRoute('app_messages_inbox');
    }

    // ==================== DELETE: Supprimer plusieurs messages ====================
    #[Route('/bulk-delete', name: 'app_messages_bulk_delete', methods: ['POST'])]
    public function bulkDelete(Request $request, MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $messageIds = $request->request->all('message_ids');
        
        if (empty($messageIds)) {
            $this->addFlash('warning', 'Aucun message sélectionné.');
            return $this->redirectToRoute('app_messages_inbox');
        }
        
        // Vérifier le token CSRF
        if (!$this->isCsrfTokenValid('bulk_delete', $request->request->get('_token'))) {
            $this->addFlash('error', 'Token invalide.');
            return $this->redirectToRoute('app_messages_inbox');
        }
        
        $deleted = 0;
        $otherUserId = null;
        
        foreach ($messageIds as $id) {
            $message = $messageRepo->find($id);
            if ($message && ($message->getSender()->getIdUtilisateur() === $user->getIdUtilisateur() || $message->getRecipient()->getIdUtilisateur() === $user->getIdUtilisateur())) {
                $otherUserId = ($message->getSender()->getIdUtilisateur() === $user->getIdUtilisateur()) 
                    ? $message->getRecipient()->getIdUtilisateur() 
                    : $message->getSender()->getIdUtilisateur();
                $this->entityManager->remove($message);
                $deleted++;
            }
        }
        
        $this->entityManager->flush();
        $this->addFlash('success', "$deleted message(s) supprimé(s) avec succès.");
        
        if ($otherUserId && $deleted > 0) {
            return $this->redirectToRoute('app_messages_conversation', ['id' => $otherUserId]);
        }
        
        return $this->redirectToRoute('app_messages_inbox');
    }

    // ==================== DELETE: Supprimer toute une conversation ====================
    #[Route('/conversation/{id}/delete', name: 'app_messages_delete_conversation', methods: ['POST'])]
    public function deleteConversation(int $id, Request $request, MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $otherUser = $this->utilisateurRepository->find($id);
        if (!$otherUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        // Vérifier le token CSRF
        if (!$this->isCsrfTokenValid('delete_conversation', $request->request->get('_token'))) {
            $this->addFlash('error', 'Token invalide.');
            return $this->redirectToRoute('app_messages_inbox');
        }
        
        $deleted = $messageRepo->deleteConversation($user->getIdUtilisateur(), $otherUser->getIdUtilisateur());
        $this->entityManager->flush();
        
        $this->addFlash('success', "Conversation avec {$otherUser->getNom()} supprimée ($deleted message(s)).");
        
        return $this->redirectToRoute('app_messages_inbox');
    }

    // ==================== READ: Messages non lus ====================
    #[Route('/unread', name: 'app_messages_unread')]
    public function unread(MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $unreadMessages = $messageRepo->findUnreadForUser($user->getIdUtilisateur());
        
        return $this->render('message/unread.html.twig', [
            'messages' => $unreadMessages,
        ]);
    }

    // ==================== UPDATE: Marquer comme lu ====================
    #[Route('/{id}/mark-read', name: 'app_messages_mark_read', methods: ['POST'])]
    public function markAsRead(int $id, MessageRepository $messageRepo, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['success' => false], 401);
        }
        
        $message = $messageRepo->find($id);
        if ($message && $message->getRecipient()->getIdUtilisateur() === $user->getIdUtilisateur()) {
            $message->setIsRead(true);
            $this->entityManager->flush();
            
            if ($request->isXmlHttpRequest()) {
                return $this->json(['success' => true]);
            }
        }
        
        if ($request->isXmlHttpRequest()) {
            return $this->json(['success' => false]);
        }
        
        return $this->redirectToRoute('app_messages_inbox');
    }

    // ==================== CREATE: Nouvelle conversation ====================
    #[Route('/new/{id}', name: 'app_messages_new', methods: ['GET', 'POST'])]
    public function newConversation(int $id, Request $request): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $recipient = $this->utilisateurRepository->find($id);
        if (!$recipient) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        if ($request->isMethod('POST')) {
            $content = trim($request->request->get('content'));
            if (!empty($content)) {
                $message = new Message();
                $message->setSender($user);
                $message->setRecipient($recipient);
                $message->setContent($content);
                $this->entityManager->persist($message);
                $this->entityManager->flush();
                $this->addFlash('success', 'Message envoyé.');
                
                return $this->redirectToRoute('app_messages_conversation', ['id' => $recipient->getIdUtilisateur()]);
            }
        }
        
        return $this->render('message/new.html.twig', [
            'recipient' => $recipient,
        ]);
    }

    // ==================== API: Récupérer les messages (AJAX) ====================
    #[Route('/api/conversation/{id}', name: 'app_messages_api', methods: ['GET'])]
    public function getMessagesApi(int $id, MessageRepository $messageRepo): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Non autorisé'], 401);
        }
        
        $otherUser = $this->utilisateurRepository->find($id);
        if (!$otherUser) {
            return $this->json(['error' => 'Utilisateur non trouvé'], 404);
        }
        
        $messages = $messageRepo->getMessagesBetween($user->getIdUtilisateur(), $otherUser->getIdUtilisateur());
        
        $data = [];
        foreach ($messages as $message) {
            $data[] = [
                'id' => $message->getId(),
                'content' => $message->getContent(),
                'createdAt' => $message->getCreatedAt()->format('Y-m-d H:i:s'),
                'isMine' => $message->getSender()->getIdUtilisateur() === $user->getIdUtilisateur(),
                'isRead' => $message->isRead(),
            ];
        }
        
        return $this->json($data);
    }
}