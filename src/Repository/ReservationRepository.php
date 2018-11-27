<?php

namespace App\Repository;

use App\Entity\Reservation;
use App\Entity\Voiture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Reservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservation[]    findAll()
 * @method Reservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

    /**
     * @return Reservation |null
     */
    public function returnAllReservationByVoiture($id)
    {
        $em = $this->getEntityManager();
        $dql = "SELECT r, v
                FROM App\Entity\Reservation r
                LEFT JOIN r.vehicule v
                WHERE v.id = :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id', $id);
        $result = $query->getResult();

        return $result;
    }



    /*
    public function findOneBySomeField($value): ?Reservation
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
