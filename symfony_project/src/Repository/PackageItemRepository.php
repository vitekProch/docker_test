<?php

namespace App\Repository;

use App\Entity\PackageItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PackageItem>
 *
 * @method PackageItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method PackageItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method PackageItem[]    findAll()
 * @method PackageItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackageItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PackageItem::class);
    }

//    /**
//     * @return PackageItem[] Returns an array of PackageItem objects
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

//    public function findOneBySomeField($value): ?PackageItem
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
