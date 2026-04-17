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
        private AIAssistant $aiAssistant  // 👈 Injection du service IA
    ) {}

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
}
