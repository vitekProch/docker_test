<?php

namespace App\Repository;

use App\Entity\PhotoPackageNames;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoPackageNames>
 *
 * @method PhotoPackageNames|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoPackageNames|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoPackageNames[]    findAll()
 * @method PhotoPackageNames[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoPackageNamesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoPackageNames::class);
    }

//    /**
//     * @return PhotoPackageNames[] Returns an array of PhotoPackageNames objects
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

//    public function findOneBySomeField($value): ?PhotoPackageNames
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
