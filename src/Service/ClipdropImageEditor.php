<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ClipdropImageEditor
{
    public function __construct(
        private HttpClientInterface $httpClient,
        #[Autowire('%env(CLIPDROP_API_KEY)%')]
        private string $apiKey,
        #[Autowire('%kernel.project_dir%')]
        private string $projectDir,
    ) {
    }

    public function edit(
        string $imagePath,
        string $action,
        ?string $prompt = null,
        ?string $maskPath = null
    ): array {
        return match ($action) {
            'remove_background' => $this->sendBinaryRequest(
                'https://clipdrop-api.co/remove-background/v1',
                [
                    'image_file' => DataPart::fromPath($imagePath),
                ]
            ),
            'replace_background' => $this->sendBinaryRequest(
                'https://clipdrop-api.co/replace-background/v1',
                [
                    'image_file' => DataPart::fromPath($imagePath),
                    'prompt' => $prompt ?? '',
                ]
            ),
            'cleanup' => $this->sendBinaryRequest(
                'https://clipdrop-api.co/cleanup/v1',
                [
                    'image_file' => DataPart::fromPath($imagePath),
                    'mask_file' => DataPart::fromPath($maskPath ?? throw new \InvalidArgumentException('Mask file is required for cleanup.')),
                    'mode' => 'quality',
                ]
            ),
            default => throw new \InvalidArgumentException('Unsupported action: ' . $action),
        };
    }

    private function sendBinaryRequest(string $url, array $fields): array
    {
        if ($this->apiKey === '') {
            throw new \RuntimeException('Missing CLIPDROP_API_KEY. Set it in your .env.local file.');
        }

        $formData = new FormDataPart($fields);

        $response = $this->httpClient->request('POST', $url, [
            'headers' => array_merge(
                $formData->getPreparedHeaders()->toArray(),
                [
                    'x-api-key' => $this->apiKey,
                    'Accept' => 'image/png',
                ]
            ),
            'body' => $formData->bodyToIterable(),
            'timeout' => 120,
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            $contentType = $response->getHeaders(false)['content-type'][0] ?? '';
            $body = $response->getContent(false);

            if (str_contains($contentType, 'application/json')) {
                $json = json_decode($body, true);
                $message = $json['error'] ?? $json['message'] ?? 'Unknown API error';
            } else {
                $message = $body ?: 'Unknown API error';
            }

            throw new \RuntimeException(sprintf('Clipdrop API error (%d): %s', $statusCode, $message));
        }

        $binary = $response->getContent();
        $contentType = $response->getHeaders(false)['content-type'][0] ?? 'image/png';

        $extension = match (true) {
            str_contains($contentType, 'image/jpeg') => 'jpg',
            str_contains($contentType, 'image/webp') => 'webp',
            default => 'png',
        };

        $outputDir = $this->projectDir . '/public/uploads/ai-edits';
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0775, true);
        }

        $filename = sprintf('edited_%s.%s', bin2hex(random_bytes(12)), $extension);
        $fullPath = $outputDir . '/' . $filename;

        file_put_contents($fullPath, $binary);

        return [
            'filename' => $filename,
            'full_path' => $fullPath,
            'public_path' => '/uploads/ai-edits/' . $filename,
            'content_type' => $contentType,
        ];
    }
}
