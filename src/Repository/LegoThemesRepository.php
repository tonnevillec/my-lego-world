<?php

namespace App\Repository;

use App\Entity\LegoThemes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LegoThemes|null find($id, $lockMode = null, $lockVersion = null)
 * @method LegoThemes|null findOneBy(array $criteria, array $orderBy = null)
 * @method LegoThemes[]    findAll()
 * @method LegoThemes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LegoThemesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LegoThemes::class);
    }

    // /**
    //  * @return LegoThemes[] Returns an array of LegoThemes objects
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
    public function findOneBySomeField($value): ?LegoThemes
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
