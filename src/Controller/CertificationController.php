<?php

namespace App\Controller;

use App\Repository\FormationRepository;
use App\Repository\InscriptionFormationRepository;
use App\Repository\UtilisateurRepository;
use App\Service\CertificationPdfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route('/certification')]
class CertificationController extends AbstractController
{
    public function __construct(private RequestStack $requestStack)
    {
    }

    #[Route('/mes', name: 'app_certification_mes', methods: ['GET'])]
    public function mesCertifications(
        InscriptionFormationRepository $inscriptionRepository,
        FormationRepository $formationRepository
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $inscriptions = $this->isAdmin()
            ? $inscriptionRepository->findBy([], ['id' => 'DESC'])
            : $inscriptionRepository->findBy(['idClient' => $user->getIdUtilisateur()], ['id' => 'DESC']);

        $certifications = [];
        foreach ($inscriptions as $inscription) {
            $formation = $formationRepository->find($inscription->getIdFormation());
            $ownerUserId = $inscription->getIdClient();
            $signature = $this->buildSignature($inscription->getId(), $ownerUserId);
            $score = $this->getQuizScore($inscription);
            $eligible = $this->isAdmin() || ($score !== null && $score >= 80);

            $certifications[] = [
                'inscriptionId' => $inscription->getId(),
                'formationTitre' => $formation?->getTitre() ?? 'Formation',
                'dateInscription' => $inscription->getDateInscription(),
                'signature' => $signature,
                'certificateId' => $this->buildCertificateId($inscription->getId(), $ownerUserId),
                'score' => $score,
                'eligible' => $eligible,
            ];
        }

        return $this->render('certification/mes.html.twig', [
            'certifications' => $certifications,
        ]);
    }

    #[Route('/{id}/qr', name: 'app_certification_qr', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function showQr(
        int $id,
        InscriptionFormationRepository $inscriptionRepository,
        FormationRepository $formationRepository
    ): Response {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $inscription = $inscriptionRepository->find($id);
        $canAccess = $inscription && ($this->isAdmin() || $inscription->getIdClient() === $user->getIdUtilisateur());
        if (!$canAccess) {
            throw $this->createNotFoundException('Certification non trouvée.');
        }

        if (!$this->isAdmin() && !$this->isEligibleForQr($inscription)) {
            $this->addFlash('error', 'Le QR code est disponible uniquement après un score minimum de 80%.');
            return $this->redirectToRoute('app_quiz_index');
        }

        $formation = $formationRepository->find($inscription->getIdFormation());
        $ownerUserId = $inscription->getIdClient();
        $signature = $this->buildSignature($inscription->getId(), $ownerUserId);
        $pdfUrl = $this->generateUrl('app_certification_pdf_public', [
            'id' => $inscription->getId(),
            'userId' => $ownerUserId,
            'signature' => $signature,
        ], UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('certification/qr.html.twig', [
            'certification' => [
                'inscriptionId' => $inscription->getId(),
                'formationTitre' => $formation?->getTitre() ?? 'Formation',
                'dateInscription' => $inscription->getDateInscription(),
                'certificateId' => $this->buildCertificateId($inscription->getId(), $ownerUserId),
            ],
            'pdfUrl' => $pdfUrl,
            'qrImageUrlPrimary' => 'https://api.qrserver.com/v1/create-qr-code/?size=280x280&data=' . rawurlencode($pdfUrl),
            'qrImageUrlFallback' => 'https://quickchart.io/qr?size=280&text=' . rawurlencode($pdfUrl),
        ]);
    }

    #[Route('/{id}/pdf', name: 'app_certification_pdf_private', methods: ['GET'], requirements: ['id' => '\d+'])]
    public function privatePdf(int $id, InscriptionFormationRepository $inscriptionRepository): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $inscription = $inscriptionRepository->find($id);
        $canAccess = $inscription && ($this->isAdmin() || $inscription->getIdClient() === $user->getIdUtilisateur());
        if (!$canAccess) {
            throw $this->createNotFoundException('Certification non trouvée.');
        }

        if (!$this->isAdmin() && !$this->isEligibleForQr($inscription)) {
            $this->addFlash('error', 'Le PDF de certification est disponible uniquement après un score minimum de 80%.');
            return $this->redirectToRoute('app_quiz_index');
        }

        return $this->redirectToRoute('app_certification_pdf_public', [
            'id' => $inscription->getId(),
            'userId' => $inscription->getIdClient(),
            'signature' => $this->buildSignature($inscription->getId(), $inscription->getIdClient()),
        ]);
    }

    #[Route('/{id}/{userId}/{signature}/pdf', name: 'app_certification_pdf_public', methods: ['GET'], requirements: ['id' => '\d+', 'userId' => '\d+'])]
    public function publicPdf(
        int $id,
        int $userId,
        string $signature,
        InscriptionFormationRepository $inscriptionRepository,
        FormationRepository $formationRepository,
        UtilisateurRepository $utilisateurRepository,
        CertificationPdfService $pdfService
    ): Response {
        if (!hash_equals($this->buildSignature($id, $userId), $signature)) {
            throw $this->createNotFoundException('Lien de certification invalide.');
        }

        $inscription = $inscriptionRepository->find($id);
        if (!$inscription || $inscription->getIdClient() !== $userId) {
            throw $this->createNotFoundException('Certification non trouvée.');
        }

        $utilisateur = $utilisateurRepository->find($userId);
        $formation = $formationRepository->find($inscription->getIdFormation());

        if (!$utilisateur || !$formation) {
            throw $this->createNotFoundException('Données de certification incomplètes.');
        }

        $certificateId = $this->buildCertificateId($id, $userId);
        $date = $inscription->getDateInscription()?->format('d/m/Y') ?? date('d/m/Y');

        $pdf = $pdfService->generatePdf([
            'recipient' => $utilisateur->getNom(),
            'formation' => $formation->getTitre() ?? 'Formation',
            'threshold' => 80,
            'certificateId' => $certificateId,
            'date' => $date,
        ]);

        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="certification-' . $certificateId . '.pdf"',
        ]);
    }

    private function buildSignature(int $inscriptionId, int $userId): string
    {
        return hash_hmac('sha256', $inscriptionId . '|' . $userId, (string) $this->getParameter('kernel.secret'));
    }

    private function buildCertificateId(int $inscriptionId, int $userId): string
    {
        return 'CERT-' . strtoupper(substr(hash('sha256', $inscriptionId . '|' . $userId), 0, 10));
    }

    private function isAdmin(): bool
    {
        $user = $this->getUser();

        return $user && method_exists($user, 'getRole') && $user->getRole() === 'admin';
    }

    private function getQuizScore(\App\Entity\InscriptionFormation $inscription): ?int
    {
        if ($inscription->getQuizScore() !== null) {
            return $inscription->getQuizScore();
        }

        $session = $this->requestStack->getSession();
        if (!$session) {
            return null;
        }

        $scores = $session->get('quiz_scores', []);
        $inscriptionId = $inscription->getId();
        if ($inscriptionId === null || !isset($scores[$inscriptionId])) {
            return null;
        }

        return (int) $scores[$inscriptionId];
    }

    private function isEligibleForQr(\App\Entity\InscriptionFormation $inscription): bool
    {
        $score = $this->getQuizScore($inscription);

        return $score !== null && $score >= 80;
    }
}
