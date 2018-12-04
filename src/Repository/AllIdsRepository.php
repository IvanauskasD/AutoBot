<?php

namespace App\Repository;

use App\Entity\AllIds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AllIds|null find($id, $lockMode = null, $lockVersion = null)
 * @method AllIds|null findOneBy(array $criteria, array $orderBy = null)
 * @method AllIds[]    findAll()
 * @method AllIds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllIdsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AllIds::class);
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
