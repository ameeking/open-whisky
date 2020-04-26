<?php

namespace App\Repository;

use App\Entity\Distillery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Distillery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Distillery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Distillery[]    findAll()
 * @method Distillery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DistilleryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Distillery::class);
    }

    // /**
    //  * @return Distillery[] Returns an array of Distillery objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Distillery
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
