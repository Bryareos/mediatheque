<?php

namespace App\Repository;

use App\Entity\BookingMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookingMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookingMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookingMedia[]    findAll()
 * @method BookingMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookingMedia::class);
    }

    // /**
    //  * @return BookingMedia[] Returns an array of BookingMedia objects
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
    public function findOneBySomeField($value): ?BookingMedia
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
