<?php

namespace App\Repository;

use App\Entity\Maladie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Maladie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maladie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maladie[]    findAll()
 * @method Maladie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaladieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maladie::class);
    }

    // /**
    //  * @return Maladie[] Returns an array of Maladie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maladie
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
