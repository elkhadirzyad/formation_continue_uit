<?php

namespace App\Repository;

use App\Entity\ContratM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContratM|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratM|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratM[]    findAll()
 * @method ContratM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratMRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContratM::class);
    }

    // /**
    //  * @return ContratM[] Returns an array of ContratM objects
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
    public function findOneBySomeField($value): ?ContratM
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
            ->Join('u.master', 'l')
    
            ->Join('l.user', 'r')
           
            ->andWhere('r.id = :val')
    
            ->setParameter('val', $user)
            // selects all the category data to avoid the query
           
            
            ->getQuery()
            ->getResult();
    }
}
