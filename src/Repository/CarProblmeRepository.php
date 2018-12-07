<?php

namespace App\Repository;

use App\Entity\CarProblme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarProblme|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarProblme|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarProblme[]    findAll()
 * @method CarProblme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarProblmeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarProblme::class);
    }

    public function findByOrderId($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.jobName', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.order', 'u')
            ->where('c.id = :id')->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
