<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\User;
use App\Helpers\File;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    /**
     * PostRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * Find post by id
     *
     * @param string $slug
     * @return Post[]
     */
    public function getPost($slug)
    {
        return $this->findBy(['slug' => $slug]);
    }

    /**
     * @param ObjectManager $objectManager
     * @param Post $post
     * @param User $user
     */
    public function create(ObjectManager $objectManager, Post $post, User $user)
    {
        $post->setUserId($user->getId());
        $post->setImage(File::uploadFile($post->file));

        $objectManager->persist($post);
        $objectManager->flush();
    }


    public function findByQuery()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Post
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
