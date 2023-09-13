<?php

namespace App\Repository;

use App\Entity\DubbingSerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DubbingSerie>
 *
 * @method DubbingSerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method DubbingSerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method DubbingSerie[]    findAll()
 * @method DubbingSerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DubbingSerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DubbingSerie::class);
    }

//    /**
//     * @return DubbingSerie[] Returns an array of DubbingSerie objects
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

//    public function findOneBySomeField($value): ?DubbingSerie
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
