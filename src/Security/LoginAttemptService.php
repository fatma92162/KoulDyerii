<?php
// src/Security/LoginAttemptService.php

namespace App\Security;

use Symfony\Contracts\Cache\CacheInterface;

class LoginAttemptService
{
    private const MAX_ATTEMPTS = 3;
    private const BLOCK_DURATION = 900; // 15 minutes

    public function __construct(private CacheInterface $cache) {}

    private function getCacheKey(string $identifier): string
    {
        // Nettoie les caractères interdits {}()/\@:
        return 'login_attempt_' . strtr($identifier, '{}()/\\@:', '_________');
    }

    public function addAttempt(string $identifier): void
    {
        $key = $this->getCacheKey($identifier);
        $attempts = $this->getAttempts($identifier) + 1;

        $cacheItem = $this->cache->getItem($key);
        $cacheItem->set($attempts);
        $cacheItem->expiresAfter(self::BLOCK_DURATION);
        $this->cache->save($cacheItem);
    }

    public function getAttempts(string $identifier): int
    {
        $key = $this->getCacheKey($identifier);
        $item = $this->cache->getItem($key);
        return $item->isHit() ? $item->get() : 0;
    }

    public function isBlocked(string $identifier): bool
    {
        return $this->getAttempts($identifier) >= self::MAX_ATTEMPTS;
    }

    public function clearAttempts(string $identifier): void
    {
        $this->cache->delete($this->getCacheKey($identifier));
    }
}