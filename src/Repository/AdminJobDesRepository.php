<?php

namespace App\Repository;

use App\Entity\AdminJobDes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AdminJobDes|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminJobDes|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminJobDes[]    findAll()
 * @method AdminJobDes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminJobDesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AdminJobDes::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
