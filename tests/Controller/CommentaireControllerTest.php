<?php

namespace App\Tests\Controller;

use App\Entity\Commentaire;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class CommentaireControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;

    /** @var EntityRepository<Commentaire> */
    private EntityRepository $commentaireRepository;
    private string $path = '/commentaire/crud/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->commentaireRepository = $this->manager->getRepository(Commentaire::class);

        foreach ($this->commentaireRepository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Commentaire index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first()->text());
    }

    public function testNew(): void
    {
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'commentaire[content]' => 'Testing',
            'commentaire[created_at]' => 'Testing',
            'commentaire[author]' => 'Testing',
            'commentaire[post_id]' => 'Testing',
            'commentaire[user_id]' => 'Testing',
        ]);

        self::assertResponseRedirects('/commentaire/crud');

        self::assertSame(1, $this->commentaireRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }

    public function testShow(): void
    {
        $fixture = new Commentaire();
        $fixture->setContent('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setAuthor('My Title');
        $fixture->setPostId('My Title');
        $fixture->setUserId('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Commentaire');

        // Use assertions to check that the properties are properly displayed.
        $this->markTestIncomplete('This test was generated');
    }

    public function testEdit(): void
    {
        $fixture = new Commentaire();
        $fixture->setContent('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setAuthor('Value');
        $fixture->setPostId('Value');
        $fixture->setUserId('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'commentaire[content]' => 'Something New',
            'commentaire[created_at]' => 'Something New',
            'commentaire[author]' => 'Something New',
            'commentaire[post_id]' => 'Something New',
            'commentaire[user_id]' => 'Something New',
        ]);

        self::assertResponseRedirects('/commentaire/crud');

        $fixture = $this->commentaireRepository->findAll();

        self::assertSame('Something New', $fixture[0]->getContent());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getAuthor());
        self::assertSame('Something New', $fixture[0]->getPostId());
        self::assertSame('Something New', $fixture[0]->getUserId());

        $this->markTestIncomplete('This test was generated');
    }

    public function testRemove(): void
    {
        $fixture = new Commentaire();
        $fixture->setContent('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setAuthor('Value');
        $fixture->setPostId('Value');
        $fixture->setUserId('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/commentaire/crud');
        self::assertSame(0, $this->commentaireRepository->count([]));

        $this->markTestIncomplete('This test was generated');
    }
}
