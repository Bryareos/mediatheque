<?php

namespace App\Repository;

use App\Entity\SerieSpec;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SerieSpec|null find($id, $lockMode = null, $lockVersion = null)
 * @method SerieSpec|null findOneBy(array $criteria, array $orderBy = null)
 * @method SerieSpec[]    findAll()
 * @method SerieSpec[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieSpecRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SerieSpec::class);
    }

    // /**
    //  * @return SerieSpec[] Returns an array of SerieSpec objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SerieSpec
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
