<?php

namespace App\Repository;

use App\Entity\LegoSets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LegoSets|null find($id, $lockMode = null, $lockVersion = null)
 * @method LegoSets|null findOneBy(array $criteria, array $orderBy = null)
 * @method LegoSets[]    findAll()
 * @method LegoSets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LegoSetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LegoSets::class);
    }

    // /**
    //  * @return LegoSets[] Returns an array of LegoSets objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LegoSets
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
