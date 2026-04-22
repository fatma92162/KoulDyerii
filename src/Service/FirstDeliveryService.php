<?php

namespace App\Service;

class FirstDeliveryService
{
    private string $baseUrl;
    private string $token;

    public function __construct(string $baseUrl, string $token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    public function createOrder(array $payload): array
    {
        $url = rtrim($this->baseUrl, '/') . '/create';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);

            return [
                'status_code' => 500,
                'data' => [
                    'success' => false,
                    'message' => $error,
                ],
            ];
        }

        curl_close($ch);

        return [
            'status_code' => $statusCode,
            'data' => json_decode($response, true),
        ];
    }
    public function cancelOrders(array $barCodes): array
{
    $url = rtrim($this->baseUrl, '/') . '/cancel-orders';

    $payload = [
        'barCodes' => $barCodes,
    ];

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $this->token,
        'Content-Type: application/json',
        'Accept: application/json',
    ]);

    $response = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        $error = curl_error($ch);
        curl_close($ch);

        return [
            'status_code' => 500,
            'data' => [
                'success' => false,
                'message' => $error,
            ],
        ];
    }

    curl_close($ch);

    return [
        'status_code' => $statusCode,
        'data' => json_decode($response, true),
    ];
}
}