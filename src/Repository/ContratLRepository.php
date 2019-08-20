<?php

namespace App\Repository;

use App\Entity\ContratL;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContratL|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratL|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratL[]    findAll()
 * @method ContratL[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratLRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContratL::class);
    }

    // /**
    //  * @return ContratL[] Returns an array of ContratL objects
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
    public function findOneBySomeField($value): ?ContratL
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findContratUser($user)
{
    return $this->createQueryBuilder('u')
        // p.category refers to the "category" property on product
        ->Join('u.licence', 'l')

        ->Join('l.user', 'r')

        ->andWhere('r.id = :val')

        ->setParameter('val', $user)
        // selects all the category data to avoid the query
       
        
        ->getQuery()
        ->getResult();
}
}
