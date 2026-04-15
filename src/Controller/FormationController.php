<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\InscriptionFormation;
use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/formations')]
class FormationController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private FormationRepository $formationRepository,
        private InscriptionFormationRepository $inscriptionRepository
    ) {}

    #[Route('/', name: 'app_formations_index', methods: ['GET'])]
    public function index(): Response
    {
        $formations = $this->formationRepository->findAll();
        
        return $this->render('formations/index.html.twig', [
            'formations' => $formations
        ]);
    }

    // ⚠️ IMPORTANT : Cette route doit être AVANT la route /{id}
    #[Route('/mes-inscriptions', name: 'app_mes_inscriptions', methods: ['GET'])]
    public function mesInscriptions(): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $inscriptions = $this->inscriptionRepository->findByUtilisateur($user->getIdUtilisateur());
        
        // ✅ Charger les formations pour chaque inscription
        foreach ($inscriptions as $inscription) {
            $formation = $this->formationRepository->find($inscription->getIdFormation());
            $inscription->setFormation($formation);
        }
        
        return $this->render('formations/mes_inscriptions.html.twig', [
            'inscriptions' => $inscriptions
        ]);
    }

    #[Route('/{id}', name: 'app_formations_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        $formation = $this->formationRepository->find($id);
        
        if (!$formation) {
            throw $this->createNotFoundException('Formation non trouvée');
        }
        
        $user = $this->getUser();
        $dejaInscrit = false;
        
        if ($user) {
            $inscription = $this->inscriptionRepository->findOneBy([
                'idFormation' => $formation->getIdFormation(),
                'idUtilisateur' => $user->getIdUtilisateur()
            ]);
            $dejaInscrit = $inscription !== null;
        }
        
        return $this->render('formations/show.html.twig', [
            'formation' => $formation,
            'dejaInscrit' => $dejaInscrit
        ]);
    }

    #[Route('/{id}/inscrire', name: 'app_formations_inscrire', methods: ['POST'])]
    public function inscrire(int $id, Request $request): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour vous inscrire');
            return $this->redirectToRoute('app_login');
        }
        
        $formation = $this->formationRepository->find($id);
        
        if (!$formation) {
            $this->addFlash('error', 'Formation non trouvée');
            return $this->redirectToRoute('app_formations_index');
        }
        
        // Vérifier si déjà inscrit
        $existingInscription = $this->inscriptionRepository->findOneBy([
            'idFormation' => $formation->getIdFormation(),
            'idUtilisateur' => $user->getIdUtilisateur()
        ]);
        
        if ($existingInscription) {
            $this->addFlash('error', 'Vous êtes déjà inscrit à cette formation');
            return $this->redirectToRoute('app_formations_show', ['id' => $id]);
        }
        
        $inscription = new InscriptionFormation();
        $inscription->setIdFormation($formation->getIdFormation());
        $inscription->setIdUtilisateur($user->getIdUtilisateur());
        $inscription->setDateInscription(new \DateTime());
        $inscription->setStatut('en_attente');
        
        $this->entityManager->persist($inscription);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Vous êtes inscrit à la formation "' . $formation->getTitre() . '" avec succès !');
        return $this->redirectToRoute('app_mes_inscriptions');
    }

    #[Route('/inscription/{id}/annuler', name: 'app_inscription_annuler', methods: ['POST'])]
    public function annulerInscription(int $id): Response
    {
        $user = $this->getUser();
        
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $inscription = $this->inscriptionRepository->find($id);
        
        if (!$inscription || $inscription->getIdUtilisateur() !== $user->getIdUtilisateur()) {
            $this->addFlash('error', 'Inscription non trouvée');
            return $this->redirectToRoute('app_mes_inscriptions');
        }
        
        $this->entityManager->remove($inscription);
        $this->entityManager->flush();
        
        $this->addFlash('success', '✅ Inscription annulée avec succès');
        return $this->redirectToRoute('app_mes_inscriptions');
    }
}