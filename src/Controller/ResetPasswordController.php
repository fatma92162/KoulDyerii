<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\PasswordResetToken;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ResetPasswordController extends AbstractController
{
    #[Route('/mot-de-passe-oublie', name: 'app_forgot_password')]
    public function forgot(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $user = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

            if ($user) {
                // Supprimer les anciens tokens
                $oldTokens = $em->getRepository(PasswordResetToken::class)->findBy(['user' => $user]);
                foreach ($oldTokens as $token) {
                    $em->remove($token);
                }

                // Créer un nouveau token
                $token = new PasswordResetToken();
                $token->setUser($user);
                $token->setToken(bin2hex(random_bytes(32)));
                $token->setExpiresAt(new \DateTime('+1 hour'));

                $em->persist($token);
                $em->flush();

                // Envoyer l'email
                $resetLink = $this->generateUrl('app_reset_password', ['token' => $token->getToken()], 0);
                $emailMessage = (new Email())
                    ->from('no-reply@kouldyeri.com')
                    ->to($user->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->html("Cliquez sur ce lien pour réinitialiser votre mot de passe : <a href=\"$resetLink\">$resetLink</a>");

                $mailer->send($emailMessage);
                $this->addFlash('success', 'Un email vous a été envoyé avec le lien de réinitialisation.');
            } else {
                $this->addFlash('error', 'Aucun compte trouvé avec cet email.');
            }
            return $this->redirectToRoute('app_forgot_password');
        }

        return $this->render('reset_password/forgot.html.twig');
    }

    #[Route('/reinitialiser/{token}', name: 'app_reset_password')]
    public function reset(string $token, Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $tokenObj = $em->getRepository(PasswordResetToken::class)->findOneBy(['token' => $token]);
        if (!$tokenObj || $tokenObj->isExpired()) {
            $this->addFlash('error', 'Lien invalide ou expiré.');
            return $this->redirectToRoute('app_forgot_password');
        }

        $user = $tokenObj->getUser();

        if ($request->isMethod('POST')) {
            $newPassword = $request->request->get('password');
            $confirm = $request->request->get('confirm_password');

            if ($newPassword !== $confirm) {
                $this->addFlash('error', 'Les mots de passe ne correspondent pas.');
            } elseif (strlen($newPassword) < 6) {
                $this->addFlash('error', 'Le mot de passe doit faire au moins 6 caractères.');
            } else {
                // 1. Récupérer l'ID utilisateur
                $userId = $user->getIdUtilisateur();
                $this->addFlash('info', "ID utilisateur : $userId");

                // 2. Vérifier l'ancien hash en base
                $conn = $em->getConnection();
                $oldHash = $conn->fetchOne('SELECT motDePasse FROM utilisateur WHERE idUtilisateur = :id', ['id' => $userId]);
                $this->addFlash('info', "Ancien hash : " . ($oldHash ? substr($oldHash, 0, 30) . '...' : 'NULL'));

                // 3. Générer le nouveau hash
                $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                $this->addFlash('info', "Nouveau hash : " . substr($hashedPassword, 0, 30) . '...');

                // 4. Mise à jour directe via SQL
                $affected = $conn->executeStatement(
                    'UPDATE utilisateur SET motDePasse = :hash WHERE idUtilisateur = :id',
                    ['hash' => $hashedPassword, 'id' => $userId]
                );
                $this->addFlash('info', "Lignes mises à jour : $affected");

                if ($affected === 0) {
                    $this->addFlash('error', 'Aucune ligne modifiée. Vérifiez que la colonne "motDePasse" existe bien et que l\'ID est correct.');
                    return $this->redirectToRoute('app_reset_password', ['token' => $token]);
                }

                // 5. Vérifier après mise à jour
                $newHash = $conn->fetchOne('SELECT motDePasse FROM utilisateur WHERE idUtilisateur = :id', ['id' => $userId]);
                $this->addFlash('info', "Nouveau hash en base : " . ($newHash ? substr($newHash, 0, 30) . '...' : 'NULL'));

                // Supprimer le token
                $em->remove($tokenObj);
                $em->flush();

                $this->addFlash('success', 'Votre mot de passe a été réinitialisé. Connectez-vous.');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('reset_password/reset.html.twig', ['token' => $token]);
    }
}