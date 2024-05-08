<?php

namespace App\Repository;

use App\Entity\SubPackage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubPackage>
 *
 * @method SubPackage|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubPackage|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubPackage[]    findAll()
 * @method SubPackage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubPackageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubPackage::class);
    }

//    /**
//     * @return SubPackage[] Returns an array of SubPackage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SubPackage
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
