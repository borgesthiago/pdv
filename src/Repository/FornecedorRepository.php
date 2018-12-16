<?php

namespace App\Repository;

use App\Entity\Fornecedor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fornecedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fornecedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fornecedor[]    findAll()
 * @method Fornecedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FornecedorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fornecedor::class);
    }

    public function countFornecedor()
    {
        return $this->createQueryBuilder('fo')
            ->select('count(fo.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
