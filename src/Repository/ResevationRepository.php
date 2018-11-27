<?php

namespace App\Repository;

use App\Entity\Resevation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Resevation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resevation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resevation[]    findAll()
 * @method Resevation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResevationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Resevation::class);
    }

    // /**
    //  * @return Resevation[] Returns an array of Resevation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Resevation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
