<?php

namespace App\Repository;

use App\Entity\EXPOSITION;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EXPOSITION|null find($id, $lockMode = null, $lockVersion = null)
 * @method EXPOSITION|null findOneBy(array $criteria, array $orderBy = null)
 * @method EXPOSITION[]    findAll()
 * @method EXPOSITION[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EXPOSITIONRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EXPOSITION::class);
    }

    // /**
    //  * @return EXPOSITION[] Returns an array of EXPOSITION objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EXPOSITION
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
}
