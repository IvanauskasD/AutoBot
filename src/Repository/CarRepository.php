<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Car::class);
    }

    
    public function findById($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.carId = :value')->setParameter('value', $value)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
    public function findAllByUserId($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            
            ->leftJoin('c.orders', 'r')
            ->where('c.user = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }
    
}
