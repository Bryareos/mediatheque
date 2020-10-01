<?php

namespace App\Repository;

use App\Entity\AlbumSpec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AlbumSpec|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumSpec|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumSpec[]    findAll()
 * @method AlbumSpec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumSpecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumSpec::class);
    }

    // /**
    //  * @return AlbumSpec[] Returns an array of AlbumSpec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AlbumSpec
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
