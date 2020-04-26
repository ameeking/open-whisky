<?php

namespace App\Repository;

use App\Entity\Tasting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tasting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tasting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tasting[]    findAll()
 * @method Tasting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TastingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tasting::class);
    }

    // /**
    //  * @return Tasting[] Returns an array of Tasting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tasting
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
