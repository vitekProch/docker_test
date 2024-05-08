<?php

namespace App\Repository;

use App\Entity\SpecialOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SpecialOffer>
 *
 * @method SpecialOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialOffer[]    findAll()
 * @method SpecialOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialOffer::class);
    }

    /**
     * @return ?SpecialOffer[] Returns an array of SpecialOffer objects
     */
    public function findAllPublishedOffers(): ?array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.specialOfferShow = true')
            ->orderBy('s.updatedAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?SpecialOffer
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
