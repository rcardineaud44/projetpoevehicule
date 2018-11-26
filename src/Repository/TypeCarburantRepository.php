<?php

namespace App\Repository;

use App\Entity\TypeCarburant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeCarburant|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeCarburant|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeCarburant[]    findAll()
 * @method TypeCarburant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeCarburantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeCarburant::class);
    }

    // /**
    //  * @return TypeCarburant[] Returns an array of TypeCarburant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeCarburant
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
