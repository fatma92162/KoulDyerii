<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class DeliveryCallLogService
{
    public function __construct(
        #[Autowire('%kernel.project_dir%')]
        private string $projectDir,
    ) {
    }

    public function createLog(int $livraisonId, ?int $livreurId, ?int $clientUserId): array
    {
        $logs = $this->readLogs();

        $log = [
            'call_id' => bin2hex(random_bytes(12)),
            'livraison_id' => $livraisonId,
            'livreur_id' => $livreurId,
            'client_user_id' => $clientUserId,
            'started_at' => gmdate('c'),
            'answered_at' => null,
            'ended_at' => null,
            'final_status' => 'ringing',
            'decline_reason' => null,
            'duration_seconds' => 0,
        ];

        $logs[] = $log;
        $this->writeLogs($logs);

        return $log;
    }

    public function markAccepted(string $callId): ?array
    {
        return $this->updateLog($callId, function (array $log) {
            $log['answered_at'] = $log['answered_at'] ?? gmdate('c');
            $log['final_status'] = 'accepted';

            return $log;
        });
    }

    public function markDeclined(string $callId, string $reason = 'declined'): ?array
    {
        return $this->updateLog($callId, function (array $log) use ($reason) {
            $log['decline_reason'] = $reason;
            $log['ended_at'] = gmdate('c');
            $log['final_status'] = 'declined';
            $log['duration_seconds'] = 0;

            return $log;
        });
    }

    public function markEnded(string $callId, bool $wasAccepted): ?array
    {
        return $this->updateLog($callId, function (array $log) use ($wasAccepted) {
            $endedAt = gmdate('c');
            $startedFrom = $log['answered_at'] ?? $log['started_at'] ?? $endedAt;

            $log['ended_at'] = $endedAt;
            $log['final_status'] = $wasAccepted ? 'completed' : 'missed';
            $log['duration_seconds'] = max(0, strtotime($endedAt) - strtotime((string) $startedFrom));

            return $log;
        });
    }

    public function getLogsByLivreurId(int $livreurId): array
    {
        $logs = array_filter($this->readLogs(), static fn (array $log) => (int) ($log['livreur_id'] ?? 0) === $livreurId);

        usort($logs, static function (array $a, array $b) {
            return strtotime((string) ($b['started_at'] ?? 'now')) <=> strtotime((string) ($a['started_at'] ?? 'now'));
        });

        return array_values($logs);
    }

    public function getSummaryForLivreur(int $livreurId): array
    {
        $logs = $this->getLogsByLivreurId($livreurId);
        $total = count($logs);
        $acceptedCount = count(array_filter($logs, static fn (array $log) => !empty($log['answered_at'])));
        $declinedCount = count(array_filter($logs, static fn (array $log) => ($log['final_status'] ?? '') === 'declined'));
        $missedCount = count(array_filter($logs, static fn (array $log) => ($log['final_status'] ?? '') === 'missed'));
        $completedLogs = array_values(array_filter($logs, static fn (array $log) => ($log['final_status'] ?? '') === 'completed'));
        $totalDurationSeconds = array_sum(array_map(static fn (array $log) => (int) ($log['duration_seconds'] ?? 0), $completedLogs));
        $avgDurationSeconds = count($completedLogs) > 0 ? (int) round($totalDurationSeconds / count($completedLogs)) : 0;

        return [
            'total_calls' => $total,
            'accepted_count' => $acceptedCount,
            'declined_count' => $declinedCount,
            'missed_count' => $missedCount,
            'accepted_percentage' => $total > 0 ? round(($acceptedCount / $total) * 100, 1) : 0,
            'declined_percentage' => $total > 0 ? round(($declinedCount / $total) * 100, 1) : 0,
            'completed_count' => count($completedLogs),
            'total_duration_seconds' => $totalDurationSeconds,
            'average_duration_seconds' => $avgDurationSeconds,
            'last_call_at' => $logs[0]['started_at'] ?? null,
            'recent_calls' => array_slice($logs, 0, 12),
        ];
    }

    private function updateLog(string $callId, callable $callback): ?array
    {
        $logs = $this->readLogs();
        $updatedLog = null;

        foreach ($logs as $index => $log) {
            if (($log['call_id'] ?? '') !== $callId) {
                continue;
            }

            $logs[$index] = $callback($log);
            $updatedLog = $logs[$index];
            break;
        }

        if ($updatedLog !== null) {
            $this->writeLogs($logs);
        }

        return $updatedLog;
    }

    private function getLogPath(): string
    {
        $dir = $this->projectDir . '/var/delivery-calls';

        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        return $dir . '/call_logs.json';
    }

    private function readLogs(): array
    {
        $path = $this->getLogPath();

        if (!is_file($path)) {
            return [];
        }

        $content = file_get_contents($path);
        if ($content === false || trim($content) === '') {
            return [];
        }

        $data = json_decode($content, true);

        return is_array($data) ? $data : [];
    }

    private function writeLogs(array $logs): void
    {
        file_put_contents(
            $this->getLogPath(),
            json_encode(array_values($logs), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
    }
}
