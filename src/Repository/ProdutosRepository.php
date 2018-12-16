<?php

namespace App\Repository;

use App\Entity\Produtos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Produtos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produtos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produtos[]    findAll()
 * @method Produtos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdutosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Produtos::class);
    }

    public function countProd()
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
