<?php

namespace App\Entity;

use App\Repository\VisitorActivityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitorActivityRepository::class)]
#[ORM\Table(name: 'visitor_activity')]
#[ORM\Index(name: 'idx_visitor_session', columns: ['session_id'])]
#[ORM\Index(name: 'idx_visitor_last_seen', columns: ['last_seen'])]
#[ORM\Index(name: 'idx_visitor_route_name', columns: ['route_name'])]
#[ORM\Index(name: 'idx_visitor_source_platform', columns: ['source_platform'])]
class VisitorActivity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'session_id', type: 'string', length: 255, unique: true)]
    private ?string $sessionId = null;

    #[ORM\Column(name: 'ip_address', type: 'string', length: 45, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(name: 'route_name', type: 'string', length: 255, nullable: true)]
    private ?string $routeName = null;

    #[ORM\Column(name: 'page_url', type: 'string', length: 500, nullable: true)]
    private ?string $pageUrl = null;

    #[ORM\Column(name: 'device_type', type: 'string', length: 20, nullable: true)]
    private ?string $deviceType = null;

    #[ORM\Column(name: 'referrer_url', type: 'string', length: 1000, nullable: true)]
    private ?string $referrerUrl = null;

    #[ORM\Column(name: 'utm_source', type: 'string', length: 100, nullable: true)]
    private ?string $utmSource = null;

    #[ORM\Column(name: 'source_platform', type: 'string', length: 50, nullable: true)]
    private ?string $sourcePlatform = null;

    #[ORM\Column(name: 'last_seen', type: 'datetime')]
    private ?\DateTimeInterface $lastSeen = null;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $now = new \DateTime();
        $this->createdAt = $now;
        $this->lastSeen = $now;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    public function setSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    public function setIpAddress(?string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function getRouteName(): ?string
    {
        return $this->routeName;
    }

    public function setRouteName(?string $routeName): self
    {
        $this->routeName = $routeName;
        return $this;
    }

    public function getPageUrl(): ?string
    {
        return $this->pageUrl;
    }

    public function setPageUrl(?string $pageUrl): self
    {
        $this->pageUrl = $pageUrl;
        return $this;
    }

    public function getDeviceType(): ?string
    {
        return $this->deviceType;
    }

    public function setDeviceType(?string $deviceType): self
    {
        $this->deviceType = $deviceType;
        return $this;
    }

    public function getReferrerUrl(): ?string
    {
        return $this->referrerUrl;
    }

    public function setReferrerUrl(?string $referrerUrl): self
    {
        $this->referrerUrl = $referrerUrl;
        return $this;
    }

    public function getUtmSource(): ?string
    {
        return $this->utmSource;
    }

    public function setUtmSource(?string $utmSource): self
    {
        $this->utmSource = $utmSource;
        return $this;
    }

    public function getSourcePlatform(): ?string
    {
        return $this->sourcePlatform;
    }

    public function setSourcePlatform(?string $sourcePlatform): self
    {
        $this->sourcePlatform = $sourcePlatform;
        return $this;
    }

    public function getLastSeen(): ?\DateTimeInterface
    {
        return $this->lastSeen;
    }

    public function setLastSeen(\DateTimeInterface $lastSeen): self
    {
        $this->lastSeen = $lastSeen;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}