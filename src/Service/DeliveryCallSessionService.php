<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class DeliveryCallSessionService
{
    public function __construct(
        #[Autowire('%kernel.project_dir%')]
        private string $projectDir,
        private DeliveryCallLogService $deliveryCallLogService,
    ) {
    }

    public function getSession(int $livraisonId): ?array
    {
        $path = $this->getSessionPath($livraisonId);

        if (!is_file($path)) {
            return null;
        }

        $content = file_get_contents($path);
        if ($content === false || $content === '') {
            return null;
        }

        $data = json_decode($content, true);

        return is_array($data) ? $data : null;
    }

    public function startCall(int $livraisonId, array $offer, array $meta = []): array
    {
        $log = $this->deliveryCallLogService->createLog(
            $livraisonId,
            isset($meta['livreur_id']) ? (int) $meta['livreur_id'] : null,
            isset($meta['client_user_id']) ? (int) $meta['client_user_id'] : null,
        );

        $session = [
            'livraison_id' => $livraisonId,
            'status' => 'ringing',
            'offer' => $offer,
            'answer' => null,
            'decline_reason' => null,
            'started_at' => gmdate('c'),
            'updated_at' => gmdate('c'),
            'caller' => $meta['caller'] ?? 'livreur',
            'client_user_id' => $meta['client_user_id'] ?? null,
            'livreur_id' => $meta['livreur_id'] ?? null,
            'call_log_id' => $log['call_id'],
        ];

        $this->writeSession($livraisonId, $session);

        return $session;
    }

    public function acceptCall(int $livraisonId, array $answer): array
    {
        $session = $this->getSession($livraisonId);
        if (!$session) {
            throw new \RuntimeException('Aucun appel en attente.');
        }

        $session['status'] = 'accepted';
        $session['answer'] = $answer;
        $session['updated_at'] = gmdate('c');

        if (!empty($session['call_log_id'])) {
            $this->deliveryCallLogService->markAccepted((string) $session['call_log_id']);
        }

        $this->writeSession($livraisonId, $session);

        return $session;
    }

    public function declineCall(int $livraisonId, string $reason = 'declined'): array
    {
        $session = $this->getSession($livraisonId);
        if (!$session) {
            throw new \RuntimeException('Aucun appel en attente.');
        }

        $session['status'] = 'declined';
        $session['decline_reason'] = $reason;
        $session['updated_at'] = gmdate('c');

        if (!empty($session['call_log_id'])) {
            $this->deliveryCallLogService->markDeclined((string) $session['call_log_id'], $reason);
        }

        $this->writeSession($livraisonId, $session);

        return $session;
    }

    public function endCall(int $livraisonId): array
    {
        $session = $this->getSession($livraisonId) ?? [
            'livraison_id' => $livraisonId,
            'offer' => null,
            'answer' => null,
        ];
        $wasAccepted = ($session['status'] ?? '') === 'accepted' || !empty($session['answer']);

        $session['status'] = 'ended';
        $session['updated_at'] = gmdate('c');

        if (!empty($session['call_log_id'])) {
            $this->deliveryCallLogService->markEnded(
                (string) $session['call_log_id'],
                $wasAccepted
            );
        }

        $this->writeSession($livraisonId, $session);

        return $session;
    }

    public function clearCall(int $livraisonId): void
    {
        $path = $this->getSessionPath($livraisonId);

        if (is_file($path)) {
            @unlink($path);
        }
    }

    private function getSessionPath(int $livraisonId): string
    {
        $dir = $this->projectDir . '/var/delivery-calls';

        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        return $dir . '/livraison_' . $livraisonId . '.json';
    }

    private function writeSession(int $livraisonId, array $session): void
    {
        file_put_contents(
            $this->getSessionPath($livraisonId),
            json_encode($session, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
    }
}
