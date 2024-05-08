<?php

namespace App\Repository;

use App\Entity\PhotoCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PhotoCategories>
 *
 * @method PhotoCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoCategories[]    findAll()
 * @method PhotoCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoCategories::class);
    }

    /**
     * @return PhotoCategories[] Returns an array of PhotoCategories objects
     */
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.categoryName = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

//    public function findOneBySomeField($value): ?PhotoCategories
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
