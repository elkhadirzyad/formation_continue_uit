<?php

namespace App\Repository;

use App\Entity\CalendarMus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CalendarMus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalendarMus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalendarMus[]    findAll()
 * @method CalendarMus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalendarMusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CalendarMus::class);
    }

    // /**
    //  * @return CalendarMus[] Returns an array of CalendarMus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CalendarMus
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
