<?php

namespace App\Repository;

use App\Entity\Funcionario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Funcionario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Funcionario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Funcionario[]    findAll()
 * @method Funcionario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuncionarioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Funcionario::class);
    }

    public function countAll()
    {
        return $this->createQueryBuilder('f')
            ->select('count(f.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }
}
