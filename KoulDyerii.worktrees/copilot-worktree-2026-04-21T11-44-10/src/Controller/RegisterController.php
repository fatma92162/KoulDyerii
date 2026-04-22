<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        $errors = [];
        $formData = [];

        // Liste des 24 gouvernorats de Tunisie
        $gouvernorats = [
            'Tunis', 'Ariana', 'Ben Arous', 'Manouba',
            'Nabeul', 'Zaghouan', 'Bizerte', 'Béja',
            'Jendouba', 'Le Kef', 'Siliana', 'Sousse',
            'Monastir', 'Mahdia', 'Sfax', 'Kairouan',
            'Kasserine', 'Sidi Bouzid', 'Gabès', 'Médenine',
            'Tataouine', 'Gafsa', 'Tozeur', 'Kébili'
        ];

        if ($request->isMethod('POST')) {
            $nom = trim($request->request->get('nom'));
            $email = trim($request->request->get('email'));
            $password = $request->request->get('password');
            $confirmPassword = $request->request->get('confirm_password');
            $region = $request->request->get('region');
            $role = $request->request->get('role');
            $dateNaissance = $request->request->get('dateNaissance');
            
            // Gestion de la photo
            $photoFile = $request->files->get('photo');
            $photoPath = null;

            $formData = [
                'nom' => $nom,
                'email' => $email,
                'region' => $region,
                'role' => $role,
                'dateNaissance' => $dateNaissance
            ];

            // Validation du nom
            if (empty($nom)) {
                $errors['nom'] = 'Le nom est obligatoire';
            } elseif (strlen($nom) < 2) {
                $errors['nom'] = 'Le nom doit contenir au moins 2 caractères';
            } elseif (strlen($nom) > 50) {
                $errors['nom'] = 'Le nom ne peut pas dépasser 50 caractères';
            }

            // Validation de l'email
            if (empty($email)) {
                $errors['email'] = 'L\'email est obligatoire';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Veuillez entrer un email valide';
            } else {
                $existingUser = $em->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);
                if ($existingUser) {
                    $errors['email'] = 'Cet email est déjà utilisé';
                }
            }

            // Validation du mot de passe
            if (empty($password)) {
                $errors['password'] = 'Le mot de passe est obligatoire';
            } elseif (strlen($password) < 4) {
                $errors['password'] = 'Le mot de passe doit contenir au moins 4 caractères';
            } elseif (strlen($password) > 255) {
                $errors['password'] = 'Le mot de passe ne peut pas dépasser 255 caractères';
            }

            // Validation de la confirmation du mot de passe
            if ($password !== $confirmPassword) {
                $errors['confirm_password'] = 'Les mots de passe ne correspondent pas';
            }

            // Validation de la région
            if (!empty($region) && !in_array($region, $gouvernorats)) {
                $errors['region'] = 'Veuillez sélectionner un gouvernorat valide';
            }

            // Validation du rôle
            if (!in_array($role, ['admin', 'user'])) {
                $errors['role'] = 'Rôle invalide';
            }

            // Validation de la date de naissance
            if (!empty($dateNaissance)) {
                $date = \DateTime::createFromFormat('Y-m-d', $dateNaissance);
                if (!$date || $date > new \DateTime()) {
                    $errors['dateNaissance'] = 'Date de naissance invalide';
                }
            }

            // Validation et upload de la photo
            if ($photoFile && $photoFile->getError() === UPLOAD_ERR_OK) {
                $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/webp'];
                $maxFileSize = 2 * 1024 * 1024; // 2 MB
                
                if (!in_array($photoFile->getMimeType(), $allowedMimeTypes)) {
                    $errors['photo'] = 'Format de fichier non autorisé (JPEG, PNG, GIF, WEBP uniquement)';
                } elseif ($photoFile->getSize() > $maxFileSize) {
                    $errors['photo'] = 'Le fichier ne doit pas dépasser 2 Mo';
                } else {
                    // Créer le dossier uploads s'il n'existe pas
                    $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/profiles';
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    // Générer un nom unique pour la photo
                    $extension = $photoFile->guessExtension();
                    $newFileName = uniqid() . '_' . time() . '.' . $extension;
                    $photoFile->move($uploadDir, $newFileName);
                    $photoPath = '/uploads/profiles/' . $newFileName;
                }
            }

            // Si pas d'erreurs, créer l'utilisateur
            if (empty($errors)) {
                $user = new Utilisateur();
                $user->setNom($nom);
                $user->setEmail($email);
                $user->setRole($role);
                $user->setRegion($region);
                $user->setPhoto($photoPath);
                
                if (!empty($dateNaissance)) {
                    $user->setDateNaissance(new \DateTime($dateNaissance));
                }

                $hashedPassword = $passwordHasher->hashPassword($user, $password);
                $user->setMotDePasse($hashedPassword);

                $em->persist($user);
                $em->flush();

                $this->addFlash('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('register/register.html.twig', [
            'errors' => $errors,
            'formData' => $formData,
            'gouvernorats' => $gouvernorats
        ]);
    }
}