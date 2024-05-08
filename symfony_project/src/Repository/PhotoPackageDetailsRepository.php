<?php

namespace App\Repository;

use App\Entity\PhotoPackageDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoPackageDetails>
 *
 * @method PhotoPackageDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoPackageDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoPackageDetails[]    findAll()
 * @method PhotoPackageDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoPackageDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoPackageDetails::class);
    }

//    /**
//     * @return PhotoPackageDetails[] Returns an array of PhotoPackageDetails objects
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

//    public function findOneBySomeField($value): ?PhotoPackageDetails
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
