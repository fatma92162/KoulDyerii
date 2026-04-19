<?php

namespace App\Service;

class CertificationPdfService
{
    public function generatePdf(array $certificate): string
    {
        $title = $this->toPdfText('CERTIFICAT DE FORMATION');
        $recipient = $this->toPdfText('Decerne a : ' . ($certificate['recipient'] ?? 'Utilisateur'));
        $formation = $this->toPdfText('Formation : ' . ($certificate['formation'] ?? 'Formation'));
        $threshold = $this->toPdfText('Seuil atteint : >= ' . ($certificate['threshold'] ?? 80) . '%');
        $certId = $this->toPdfText('ID certificat : ' . ($certificate['certificateId'] ?? 'CERT-UNKNOWN'));
        $date = $this->toPdfText('Date : ' . ($certificate['date'] ?? date('d/m/Y')));
        $signature = $this->toPdfText('Signature Koul Dyeri');

        $stream = implode("\n", [
            'BT /F1 28 Tf 70 760 Td (' . $title . ') Tj ET',
            'BT /F1 16 Tf 70 700 Td (' . $recipient . ') Tj ET',
            'BT /F1 16 Tf 70 670 Td (' . $formation . ') Tj ET',
            'BT /F1 14 Tf 70 640 Td (' . $threshold . ') Tj ET',
            'BT /F1 14 Tf 70 610 Td (' . $certId . ') Tj ET',
            'BT /F1 14 Tf 70 580 Td (' . $date . ') Tj ET',
            'BT /F1 14 Tf 70 520 Td (' . $signature . ') Tj ET',
        ]);

        $objects = [];
        $objects[] = '1 0 obj << /Type /Catalog /Pages 2 0 R >> endobj';
        $objects[] = '2 0 obj << /Type /Pages /Kids [3 0 R] /Count 1 >> endobj';
        $objects[] = '3 0 obj << /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 5 0 R >> >> /Contents 4 0 R >> endobj';
        $objects[] = '4 0 obj << /Length ' . strlen($stream) . " >> stream\n" . $stream . "\nendstream endobj";
        $objects[] = '5 0 obj << /Type /Font /Subtype /Type1 /BaseFont /Helvetica >> endobj';

        $pdf = "%PDF-1.4\n";
        $offsets = [0];

        foreach ($objects as $index => $object) {
            $offsets[$index + 1] = strlen($pdf);
            $pdf .= $object . "\n";
        }

        $xrefOffset = strlen($pdf);
        $pdf .= "xref\n0 " . (count($objects) + 1) . "\n";
        $pdf .= "0000000000 65535 f \n";

        for ($i = 1; $i <= count($objects); $i++) {
            $pdf .= sprintf("%010d 00000 n \n", $offsets[$i]);
        }

        $pdf .= "trailer << /Size " . (count($objects) + 1) . " /Root 1 0 R >>\n";
        $pdf .= "startxref\n" . $xrefOffset . "\n%%EOF";

        return $pdf;
    }

    private function toPdfText(string $text): string
    {
        $encoded = @iconv('UTF-8', 'Windows-1252//TRANSLIT//IGNORE', $text);
        if ($encoded === false) {
            $encoded = $text;
        }

        return str_replace(
            ['\\', '(', ')', "\r", "\n"],
            ['\\\\', '\(', '\)', ' ', ' '],
            $encoded
        );
    }
}
