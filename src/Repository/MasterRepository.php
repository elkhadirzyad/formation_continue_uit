<?php

namespace App\Repository;

use App\Entity\Master;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Master|null find($id, $lockMode = null, $lockVersion = null)
 * @method Master|null findOneBy(array $criteria, array $orderBy = null)
 * @method Master[]    findAll()
 * @method Master[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MasterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Master::class);
    }

    // /**
    //  * @return Master[] Returns an array of Master objects
    //  */
   
    public function findBySpecialite($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.specialite = :val')
            ->setParameter('val', $value)
           
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Master
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
