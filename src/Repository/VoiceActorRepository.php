<?php

namespace App\Repository;

use App\Entity\VoiceActor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VoiceActor>
 *
 * @method VoiceActor|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoiceActor|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoiceActor[]    findAll()
 * @method VoiceActor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoiceActorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoiceActor::class);
    }

//    /**
//     * @return VoiceActor[] Returns an array of VoiceActor objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VoiceActor
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }


    public function findVaActorByMovie($value): array
    {
        $em = $this->getEntityManager();
        $conn = $this->getEntityManager()->getConnection();

        $query =
            'SELECT va_lastname, va_firstname, tmdb_id_actor
            FROM voice_actor va
            INNER JOIN dubbing_movie db
            ON db.id_vaidactor_id = va.id
            WHERE db.tmdb_id_movie = :value'
        ;

        $resultSet = $conn->executeQuery($query, ['value' => $value]);

        return $resultSet->fetchAllAssociative();
    }

    public function findById($value): array
    {
        $em = $this->getEntityManager();
        $conn = $this->getEntityManager()->getConnection();

        $query =
            'SELECT va_lastname, va_firstname, va_birthdate, va_nationality
            FROM voice_actor va
            WHERE id = :value'
        ;

        $resultSet = $conn->executeQuery($query, ['value' => $value]);

        return $resultSet->fetchAssociative();
    }

    public function findMovies($value): array
    {
        $em = $this->getEntityManager();
        $conn = $this->getEntityManager()->getConnection();

        $query =
            'SELECT tmdb_id_movie
            FROM dubbing_movie dm
            WHERE dm.id_vaidactor_id = :value'
        ;

        $resultSet = $conn->executeQuery($query, ['value' => $value]);

        return $resultSet->fetchAllAssociative();
    }

    public function findShows($value): array
    {
        $em = $this->getEntityManager();
        $conn = $this->getEntityManager()->getConnection();

        $query =
            'SELECT tmdb_id_serie
            FROM dubbing_serie ds
            WHERE ds.id_vaidactor_id = :value'
        ;

        $resultSet = $conn->executeQuery($query, ['value' => $value]);

        return $resultSet->fetchAllAssociative();
    }

}
