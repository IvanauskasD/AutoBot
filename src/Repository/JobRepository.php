<?php

namespace App\Repository;

use App\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Job::class);
    }

    public function findById($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.id = :value')->setParameter('value', $value)
            ->getQuery()
            ->getOneOrNullResult();
        ;
    }
    public function findByCompany($id)
    {
        return $this->createQueryBuilder('c')
            ->addSelect('r') // to make Doctrine actually use the join
            ->leftJoin('c.jobName', 'r')
            ->addSelect('u') // to make Doctrine actually use the join
            ->leftJoin('r.company', 'u')
            ->andwhere('c.company = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        ;
    }

    public function getServiceNames()
    {
        return $this->createQueryBuilder('job')
            ->select('job.jobName')
            ->getQuery()
            ->getArrayResult();

    }
    public function findByOrder($category, $name)
    {
        return $this->createQueryBuilder('job')

            ->addSelect('r')->distinct() // to make Doctrine actually use the join

            ->join('job.companyId', 'r')

            ->where('job.jobDescription = :category')->setParameter('category', $category)
            ->andwhere('job.jobName = :name')
            ->setParameters(['category'=> $category,'name'=> $name])
            ->groupBy('job.serviceName')
            ->getQuery()
            ->getResult()
            ;
    }
    public function findAllUnique()
    {
        return $this->createQueryBuilder('job')
            ->groupBy('job.jobName', 'job.jobDescription')
            ->getQuery()
            ->getResult()
            ;
    }
    public function findByOrderNotGrouped($name)
    {
        dump($name);
        return $this->createQueryBuilder('job')

            ->addSelect('r')->distinct() // to make Doctrine actually use the join

            ->join('job.companyId', 'r')

            ->where('job.jobName = :name')
            ->setParameters(['name'=> $name])
            ->getQuery()
            ->getResult()
            ;
    }
}
