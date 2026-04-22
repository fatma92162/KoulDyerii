<?php
// src/Repository/FavoriRepository.php
namespace App\Repository;

use App\Entity\Favori;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FavoriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Favori::class);
    }

    public function findFavorisByUser(int $userId): array
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.post', 'p')
            ->addSelect('p')
            ->where('f.user = :userId')
            ->orderBy('f.createdAt', 'DESC')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }

    public function isFavori(int $userId, int $postId): bool
    {
        return (bool) $this->createQueryBuilder('f')
            ->select('COUNT(f.id)')
            ->where('f.user = :userId')
            ->andWhere('f.post = :postId')
            ->setParameter('userId', $userId)
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function toggleFavori(int $userId, int $postId): bool
    {
        $favori = $this->findOneBy(['user' => $userId, 'post' => $postId]);
        $em = $this->getEntityManager();
        if ($favori) {
            $em->remove($favori);
            $em->flush();
            return false; // supprimé
        } else {
            $user = $em->getReference(Utilisateur::class, $userId);
            $post = $em->getReference(\App\Entity\Post::class, $postId);
            $newFavori = new Favori();
            $newFavori->setUser($user);
            $newFavori->setPost($post);
            $em->persist($newFavori);
            $em->flush();
            return true; // ajouté
        }
    }
}