<?php

namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Service|null find($id, $lockMode = null, $lockVersion = null)
 * @method Service|null findOneBy(array $criteria, array $orderBy = null)
 * @method Service[]    findAll()
 //* @method Service[]    findByOrder($category, $name)
 * @method Service[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Service::class);
    }

    public function findById($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.id = :value')->setParameter('value', $value)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
    
    public function findByCompanyId($value)
    {
        return $this->createQueryBuilder('service')
            ->where('service.companyId LIKE :value')
            ->setParameter('value', "%{$value}%")
            ->getQuery()
            ->getResult()
        ;
    }

    public function getServiceNames()
    {
        return $this->createQueryBuilder('service')
             ->select('service.serviceName')
             ->getQuery()
             ->getArrayResult();

    }
    public function findByOrder($category, $name)
    {
        return $this->createQueryBuilder('service')
        
            ->addSelect('r')->distinct() // to make Doctrine actually use the join
            
            ->join('service.company', 'r')
            
            ->where('service.serviceCategory = :category')->setParameter('category', $category)
            ->andwhere('service.serviceName = :name')
            ->setParameters(['category'=> $category,'name'=> $name])
            ->groupBy('service.serviceName')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findAllUnique()
    {
        return $this->createQueryBuilder('service')
            ->groupBy('service.serviceName', 'service.serviceCategory')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findByOrderNotGrouped($category, $name)
    {
        dump($name);
        return $this->createQueryBuilder('service')
        
            ->addSelect('r')->distinct() // to make Doctrine actually use the join
            
            ->join('service.company', 'r')
            
            ->where('service.serviceCategory = :category')->setParameter('category', $category)
            ->andwhere('service.serviceName = :name')
            ->setParameters(['category'=> $category,'name'=> $name])
            ->getQuery()
            ->getResult()
        ;
    }

    
    
}
