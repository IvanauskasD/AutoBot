<?php

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function loadAllEmployees(){
        return $this->createQueryBuilder('employee')
            ->select('employee.id, employee.email')
            ->getQuery()
            ->getArrayResult();
    }

    public function loadOrders($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.orders', 'r')
            ->where('c.id = :id')->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }

    public function loadByCompany($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.orders', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.company', 'u')
            ->andwhere('c.company = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }
}
