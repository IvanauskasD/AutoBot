<?php

namespace App\Repository;

use App\Entity\AdminJob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdminJob|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminJob|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminJob[]    findAll()
 * @method AdminJob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminJobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdminJob::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('j')
            ->where('j.something = :value')->setParameter('value', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


}
