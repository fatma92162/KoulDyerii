<?php
// src/Service/HashtagService.php

namespace App\Service;

use App\Entity\Hashtag;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;

class HashtagService
{
    public function __construct(private EntityManagerInterface $entityManager) {}

    public function extractHashtags(string $content): array
    {
        preg_match_all('/#([a-zA-Z0-9_]+)/u', $content, $matches);
        return array_unique($matches[1]);
    }

    public function syncHashtags(Post $post, string $content): void
    {
        $hashtagNames = $this->extractHashtags($content);
        $currentHashtags = $post->getHashtags();

        foreach ($currentHashtags as $hashtag) {
            if (!in_array($hashtag->getName(), $hashtagNames)) {
                $post->removeHashtag($hashtag);
            }
        }

        foreach ($hashtagNames as $name) {
            $hashtag = $this->entityManager->getRepository(Hashtag::class)->findOneBy(['name' => $name]);
            if (!$hashtag) {
                $hashtag = new Hashtag();
                $hashtag->setName($name);
                $this->entityManager->persist($hashtag);
            }
            if (!$post->getHashtags()->contains($hashtag)) {
                $post->addHashtag($hashtag);
            }
        }
    }
}