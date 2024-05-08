<?php

namespace App\Repository;

use App\Entity\PeopleReviews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PeopleReviews>
 *
 * @method PeopleReviews|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeopleReviews|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeopleReviews[]    findAll()
 * @method PeopleReviews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeopleReviewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeopleReviews::class);
    }

//    /**
//     * @return PeopleReviews[] Returns an array of PeopleReviews objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PeopleReviews
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
