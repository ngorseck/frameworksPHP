<?php

namespace App\Repository;

use App\Entity\Symptome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Symptome|null find($id, $lockMode = null, $lockVersion = null)
 * @method Symptome|null findOneBy(array $criteria, array $orderBy = null)
 * @method Symptome[]    findAll()
 * @method Symptome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymptomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Symptome::class);
    }

    // /**
    //  * @return Symptome[] Returns an array of Symptome objects
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
    public function findOneBySomeField($value): ?Symptome
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
