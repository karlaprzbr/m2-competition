<?php

namespace App\Repository;

use App\Entity\Candidat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Candidat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Candidat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Candidat[]    findAll()
 * @method Candidat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CandidatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Candidat::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Candidat $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Candidat $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function tauxDeRemplissage(Candidat $candidat)
    {
        $cpt = 0;
        if($candidat->getNom() && $candidat->getPrenom()) {
            $cpt++;
        }
        if($candidat->getTitre()) {
            $cpt++;
        }
        if($candidat->getDescription()) {
            $cpt++;
        }
        if($candidat->getDispo()) {
            $cpt++;
        }
        if($candidat->getTypeContrat()) {
            $cpt++;
        }
        if($candidat->getExperience()) {
            $cpt++;
        }
        if($candidat->getSoftSkills()) {
            $cpt++;
        }
        if($candidat->getHardSkills()) {
            $cpt++;
        }
        if($candidat->getWorkView()) {
            $cpt++;
        }
        if($candidat->getCompanyValues()) {
            $cpt++;
        }
        if($candidat->getTeamSpirit()) {
            $cpt++;
        }
        if($candidat->getSalaire()) {
            $cpt++;
        }
        if($candidat->getExperiences()) {
            $cpt++;
        }
        if($candidat->getDiplomes()) {
            $cpt++;
        }
        $taux = $cpt/14*100;
        return $taux;
    }

    // /**
    //  * @return Candidat[] Returns an array of Candidat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Candidat
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
