<?php

namespace App\Repository;

use App\Entity\TipoVenda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoVenda|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoVenda|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoVenda[]    findAll()
 * @method TipoVenda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoVendaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoVenda::class);
    }

    // /**
    //  * @return TipoVenda[] Returns an array of TipoVenda objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoVenda
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
