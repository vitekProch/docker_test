<?php

namespace App\Repository;

use App\Entity\WeddingPackage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WeddingPackage>
 *
 * @method WeddingPackage|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeddingPackage|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeddingPackage[]    findAll()
 * @method WeddingPackage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeddingPackageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WeddingPackage::class);
    }

//    /**
//     * @return WeddingPackage[] Returns an array of WeddingPackage objects
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

//    public function findOneBySomeField($value): ?WeddingPackage
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
