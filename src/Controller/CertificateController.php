<?php

namespace App\Controller;

use App\Service\CertificateService;
use App\Repository\CertificateRepository;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/certificate')]
class CertificateController extends AbstractController
{
    #[Route('/{id}', name: 'app_certificate_show')]
    public function show(
        int $id,
        CertificateRepository $certificateRepository,
        CertificateService $certificateService
    ): Response
    {
        $certificate = $certificateRepository->find($id);
        
        if (!$certificate) {
            throw $this->createNotFoundException('Certificat non trouvé');
        }
        
        $user = $this->getUser();
        if (!$user || (!$this->isAdmin() && $certificate->getQuizResult()->getUser() !== $user)) {
            throw $this->createAccessDeniedException('Vous n\'avez pas accès à ce certificat');
        }
        
        return $this->render('certificate/show.html.twig', [
            'certificate' => $certificate,
            'publicPdfUrl' => $certificateService->getPublicPdfUrl($certificate),
        ]);
    }
    
    #[Route('/pdf/{id}', name: 'app_certificate_pdf')]
    public function pdf(int $id, CertificateRepository $certificateRepository): Response
    {
        $certificate = $certificateRepository->find($id);
        
        if (!$certificate) {
            throw $this->createNotFoundException('Certificat non trouvé');
        }
        
        $user = $this->getUser();
        if (!$user || (!$this->isAdmin() && $certificate->getQuizResult()->getUser() !== $user)) {
            throw $this->createAccessDeniedException('Vous n\'avez pas accès à ce certificat');
        }
        
        // Configuration de Dompdf
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);
        
        // Créer l'instance Dompdf
        $dompdf = new Dompdf($pdfOptions);
        
        // Rendre le template pour le PDF
        $html = $this->renderView('certificate/pdf.html.twig', [
            'certificate' => $certificate,
        ]);
        
        // Charger le HTML
        $dompdf->loadHtml($html);
        
        // Configuration du papier (format paysage)
        $dompdf->setPaper('A4', 'landscape');
        
        // Rendre le PDF
        $dompdf->render();
        
        // Générer le nom du fichier
        $filename = sprintf('certificat_%s_%s.pdf', 
            $certificate->getQuizResult()->getUser()->getNom(),
            $certificate->getCreatedAt()->format('Ymd')
        );
        
        // Retourner la réponse PDF (téléchargement direct)
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }

    #[Route('/public/{id}', name: 'app_certificate_public', methods: ['GET'])]
    public function publicPdf(
        int $id,
        Request $request,
        CertificateRepository $certificateRepository,
        CertificateService $certificateService
    ): Response {
        $certificate = $certificateRepository->find($id);
        if (!$certificate) {
            throw $this->createNotFoundException('Certificat non trouvé');
        }

        $token = (string) $request->query->get('token', '');
        $storedToken = $certificate->getPublicToken();
        if ($token === '' || $storedToken === null || !hash_equals($storedToken, $token)) {
            throw $this->createNotFoundException('Certificat non trouvé');
        }

        return $certificateService->renderPdf($certificate);
    }

    private function isAdmin(): bool
    {
        $user = $this->getUser();
        return $user && method_exists($user, 'getRole') && $user->getRole() === 'admin';
    }
}
