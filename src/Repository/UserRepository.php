<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        
    }
    */

    
    public function findAdmin($e)
    {
        return $this->createQueryBuilder('u')
            ->where('u.roles LIKE :val')
           
            ->andWhere('u.email != :val1')
            ->setParameters(['val'=> '%"'.'admin'.'"%', 'val1'=> $e])
            ->getQuery()
            ->getResult();
        ;
    }

    public function findResp()
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.roles LIKE :val')
            ->setParameter('val', '%"'.'resp'.'"%')
            ->getQuery()
            ->getResult();
        ;
    }
    

    public function findLogedResps()
{
    return $this->createQueryBuilder('u')
        // p.category refers to the "category" property on product
        ->Join('u.responsable', 'r')
        // selects all the category data to avoid the query
       
        ->addSelect('r')
        ->getQuery()
        ->getResult();
}
}
