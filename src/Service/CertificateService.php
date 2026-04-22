<?php

namespace App\Service;

use App\Entity\Certificate;
use App\Entity\QuizResult;
use Doctrine\ORM\EntityManagerInterface;
use Nucleos\DompdfBundle\Factory\DompdfFactoryInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Uid\Uuid;
use Twig\Environment;

class CertificateService
{
    /**
     * Seuil de certification (%).
     */
    private const CERTIFICATION_THRESHOLD = 80.0;

    public function __construct(
        private EntityManagerInterface  $entityManager,
        private DompdfFactoryInterface  $dompdfFactory,
        private Environment             $twig,
        private LoggerInterface         $logger,
        private RouterInterface         $router,
        private ?string                 $publicBaseUrl = null
    ) {
    }

    /**
     * Génère (ou récupère) le certificat associé à un QuizResult.
     * Ne crée un nouveau certificat que si le score atteint le seuil.
     */
    public function generateForResult(QuizResult $result): Certificate
    {
        // Retourner le certificat existant s'il y en a déjà un
        if ($result->getCertificate()) {
            return $result->getCertificate();
        }

        $certificate = new Certificate();
        $certificate->setQuizResult($result);
        $certificate->setCertificateUid('CERT-' . strtoupper(bin2hex(random_bytes(5))));
        $certificate->setPublicToken($this->generatePublicToken());

        $result->setCertificate($certificate);
        $this->entityManager->persist($certificate);
        $this->entityManager->flush();

        $this->logger->info('[CertificateService] Certificat généré : {uid} | user={user} | score={score}%', [
            'uid'   => $certificate->getCertificateUid(),
            'user'  => $result->getUser()?->getIdUtilisateur(),
            'score' => $result->getPercentage(),
        ]);

        return $certificate;
    }

    public function ensurePublicToken(Certificate $certificate): string
    {
        if (!$certificate->getPublicToken()) {
            $certificate->setPublicToken($this->generatePublicToken());
            $this->entityManager->flush();
        }

        return (string) $certificate->getPublicToken();
    }

    private function generatePublicToken(): string
    {
        if (class_exists(Uuid::class)) {
            return Uuid::v4()->toRfc4122();
        }

        return bin2hex(random_bytes(32));
    }

    public function getPublicPdfUrl(Certificate $certificate): string
    {
        $id = $certificate->getId();
        if ($id === null) {
            throw new \RuntimeException('Certificat sans identifiant.');
        }

        $token = $this->ensurePublicToken($certificate);
        $path = $this->router->generate('app_certificate_public', [
            'id' => $id,
            'token' => $token,
        ], UrlGeneratorInterface::ABSOLUTE_PATH);

        $baseUrl = $this->publicBaseUrl ?? '';
        if ($baseUrl !== '') {
            return rtrim($baseUrl, '/') . $path;
        }

        return $this->router->generate('app_certificate_public', [
            'id' => $id,
            'token' => $token,
        ], UrlGeneratorInterface::ABSOLUTE_URL);
    }

    /**
     * Génère le PDF du certificat.
     *
     * Stratégie selon la disponibilité de GD :
     *  - GD disponible  → template complet (show.html.twig) avec gradients CSS
     *  - GD manquant    → template simplifié (simple.html.twig) sans images
     *
     * Dans les deux cas, aucun SVG/PNG n'est inclus, donc DomPDF
     * ne fait jamais appel à GD pour décoder des images.
     */
    public function renderPdf(Certificate $certificate): Response
    {
        $template = 'certificate/pdf.html.twig';
        $this->logger->info('[CertificateService] Rendu PDF (template dédié) : {uid}', [
            'uid' => $certificate->getCertificateUid(),
        ]);

        $html = $this->twig->render($template, [
            'certificate' => $certificate,
        ]);

        // ── Configuration DomPDF ─────────────────────────────────────────────
        $dompdf  = $this->dompdfFactory->create();
        $options = $dompdf->getOptions();

        // Désactiver les ressources distantes (images HTTP, fonts CDN)
        // → évite que DomPDF tente de décoder des images via GD
        $options->setIsRemoteEnabled(false);
        $options->setIsHtml5ParserEnabled(true);

        // DejaVu Sans est embarqué dans DomPDF et ne nécessite pas GD
        $options->setDefaultFont('DejaVu Sans');

        // ── Génération ───────────────────────────────────────────────────────
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $uid = $certificate->getCertificateUid() ?? 'certificate';

        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type'        => 'application/pdf',
                'Content-Disposition' => sprintf('inline; filename="certificate_%s.pdf"', $uid),
            ]
        );
    }

    /**
     * Indique si un QuizResult donne droit à un certificat.
     */
    public function isEligible(QuizResult $result): bool
    {
        return $result->getPercentage() >= self::CERTIFICATION_THRESHOLD;
    }
}
