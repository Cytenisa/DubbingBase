<?php

namespace App\Repository;

use App\Entity\DubbingMovie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DubbingMovie>
 *
 * @method DubbingMovie|null find($id, $lockMode = null, $lockVersion = null)
 * @method DubbingMovie|null findOneBy(array $criteria, array $orderBy = null)
 * @method DubbingMovie[]    findAll()
 * @method DubbingMovie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DubbingMovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DubbingMovie::class);
    }

//    /**
//     * @return DubbingMovie[] Returns an array of DubbingMovie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DubbingMovie
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
