<?php

namespace App\Entity;

use App\Repository\VisitorActivityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitorActivityRepository::class)]
#[ORM\Table(name: 'visitor_activity')]
#[ORM\Index(name: 'idx_visitor_session', columns: ['session_id'])]
#[ORM\Index(name: 'idx_visitor_last_seen', columns: ['last_seen'])]

class VisitorActivity
{
    #[ORM\Column(name: 'device_type', type: 'string', length: 20, nullable: true)]
private ?string $deviceType = null;
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
    public function getDeviceType(): ?string
{
    return $this->deviceType;
}

public function setDeviceType(?string $deviceType): self
{
    $this->deviceType = $deviceType;
    return $this;
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