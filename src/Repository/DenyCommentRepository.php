<?php

namespace App\Repository;

use App\Entity\DenyComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DenyComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method DenyComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method DenyComment[]    findAll()
 * @method DenyComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DenyCommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DenyComment::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('d')
            ->where('d.something = :value')->setParameter('value', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
