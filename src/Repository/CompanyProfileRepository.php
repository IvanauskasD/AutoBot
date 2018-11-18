<?php

namespace App\Repository;

use App\Entity\CompanyProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompanyProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyProfile[]    findAll()
 * @method CompanyProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyProfileRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompanyProfile::class);
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
