<?php
namespace App\Service;

use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SmsCodeService
{
    private const CODE_EXPIRY = 900;

    public function __construct(
        private CacheInterface $cache,
        private MailerInterface $mailer
    ) {}

    private function getCacheKey(string $identifier): string
    {
        return 'unlock_code_' . strtr($identifier, '{}()/\\@:', '_________');
    }

    public function generateAndSendCode(string $emailAddress): string
    {
        $code = sprintf('%06d', random_int(0, 999999));
        $cacheKey = $this->getCacheKey($emailAddress);
        $cacheItem = $this->cache->getItem($cacheKey);
        $cacheItem->set($code);
        $cacheItem->expiresAfter(self::CODE_EXPIRY);
        $this->cache->save($cacheItem);

        $email = (new Email())
            ->from('no-reply@kouldyeri.com')
            ->to($emailAddress)
            ->subject('🔐 Votre code de déblocage Koul Dyeri')
            ->html("<p>Bonjour,</p><p>Votre code de déblocage est : <strong>$code</strong></p><p>Ce code expire dans 15 minutes.</p>");

        $this->mailer->send($email);
        return $code;
    }

    public function verifyCode(string $emailAddress, string $inputCode): bool
    {
        $cacheKey = $this->getCacheKey($emailAddress);
        $item = $this->cache->getItem($cacheKey);
        return $item->isHit() && $item->get() === $inputCode;
    }

    public function deleteCode(string $emailAddress): void
    {
        $this->cache->delete($this->getCacheKey($emailAddress));
    }
}