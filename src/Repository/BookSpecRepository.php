<?php

namespace App\Repository;

use App\Entity\BookSpec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookSpec|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookSpec|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookSpec[]    findAll()
 * @method BookSpec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookSpecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookSpec::class);
    }

    // /**
    //  * @return BookSpec[] Returns an array of BookSpec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookSpec
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
