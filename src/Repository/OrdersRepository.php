<?php

namespace App\Repository;

use App\Entity\Orders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Orders|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orders|null findOneBy(array $criteria, array $OrdersBy = null)
 * @method Orders[]    findAll()
 * @method Orders[]    findBy(array $criteria, array $OrdersBy = null, $limit = null, $offset = null)
 */
class OrdersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Orders::class);
    }

    public function findWaitingByCompany($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.car', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.company', 'u')
            ->where('c.status = :Wait')->setParameter('Wait', 'Waiting')
            ->andwhere('c.company = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }

    public function findByCompany($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.car', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.company', 'u')
            ->andwhere('c.company = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }

    public function findCurrentByCompany($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.car', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.company', 'u')
            ->where('c.status = :Wait')->setParameter('Wait', 'Accepted')
            ->andwhere('c.company = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }
    public function findByOrderId($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.car', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.company', 'u')
            ->where('c.id = :id')->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
}
