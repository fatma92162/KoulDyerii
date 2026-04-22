<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PartnerLeadSyncService
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private string $hubspotAccessToken = '',
        private string $brevoApiKey = '',
        private int $brevoListId = 0
    ) {
    }

    /**
     * @param array<string, mixed> $lead
     * @return array{hubspot: string, brevo: string}
     */
    public function syncLead(array $lead): array
    {
        return [
            'hubspot' => $this->syncHubspot($lead),
            'brevo' => $this->syncBrevo($lead),
        ];
    }

    /**
     * @param array<string, mixed> $lead
     */
    private function syncHubspot(array $lead): string
    {
        if ($this->hubspotAccessToken === '') {
            return 'not_configured';
        }

        $response = $this->httpClient->request('POST', 'https://api.hubapi.com/crm/v3/objects/contacts', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->hubspotAccessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'properties' => [
                    'email' => (string) ($lead['email'] ?? ''),
                    'firstname' => (string) ($lead['first_name'] ?? ''),
                    'lastname' => (string) ($lead['last_name'] ?? ''),
                    'phone' => (string) ($lead['phone'] ?? ''),
                    'company' => (string) ($lead['company'] ?? ''),
                    'address' => (string) ($lead['address'] ?? ''),
                ],
            ],
        ]);

        $status = $response->getStatusCode();
        if ($status >= 200 && $status < 300) {
            return 'ok';
        }

        return 'failed';
    }

    /**
     * @param array<string, mixed> $lead
     */
    private function syncBrevo(array $lead): string
    {
        if ($this->brevoApiKey === '') {
            return 'not_configured';
        }

        $listIds = $this->brevoListId > 0 ? [$this->brevoListId] : [];

        $response = $this->httpClient->request('POST', 'https://api.brevo.com/v3/contacts', [
            'headers' => [
                'api-key' => $this->brevoApiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'email' => (string) ($lead['email'] ?? ''),
                'attributes' => [
                    'FIRSTNAME' => (string) ($lead['first_name'] ?? ''),
                    'LASTNAME' => (string) ($lead['last_name'] ?? ''),
                    'SMS' => (string) ($lead['phone'] ?? ''),
                    'COMPANY' => (string) ($lead['company'] ?? ''),
                    'ADDRESS' => (string) ($lead['address'] ?? ''),
                    'DESCRIPTION' => (string) ($lead['description'] ?? ''),
                ],
                'listIds' => $listIds,
                'updateEnabled' => true,
            ],
        ]);

        $status = $response->getStatusCode();
        if ($status >= 200 && $status < 300) {
            return 'ok';
        }

        return 'failed';
    }
}
