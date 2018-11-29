<?php

namespace App\Repository;

use App\Entity\Maker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Maker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maker[]    findAll()
 * @method Maker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MakerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Maker::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('m')
            ->where('m.something = :value')->setParameter('value', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
