<?php

namespace App\Tests\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PostControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;

    /** @var EntityRepository<Post> */
    private EntityRepository $postRepository;
    private string $path = '/post/crud/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->postRepository = $this->manager->getRepository(Post::class);

        foreach ($this->postRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Post index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'post[title]' => 'Testing',
            'post[content]' => 'Testing',
            'post[image_path]' => 'Testing',
            'post[created_at]' => 'Testing',
            'post[user_id]' => 'Testing',
        ]);

        self::assertResponseRedirects('/post/crud');

        self::assertSame(1, $this->postRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Post();
        $fixture->setTitle('My Title');
        $fixture->setContent('My Title');
        $fixture->setImagePath('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUserId('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Post');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Post();
        $fixture->setTitle('Value');
        $fixture->setContent('Value');
        $fixture->setImagePath('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUserId('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'post[title]' => 'Something New',
            'post[content]' => 'Something New',
            'post[image_path]' => 'Something New',
            'post[created_at]' => 'Something New',
            'post[user_id]' => 'Something New',
        ]);

        self::assertResponseRedirects('/post/crud');

        $fixture = $this->postRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getContent());
        self::assertSame('Something New', $fixture[0]->getImagePath());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUserId());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Post();
        $fixture->setTitle('Value');
        $fixture->setContent('Value');
        $fixture->setImagePath('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUserId('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/post/crud');
        self::assertSame(0, $this->postRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
