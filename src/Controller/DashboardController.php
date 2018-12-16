<?php

namespace App\Controller;
use App\Repository\SecretariaRepository;
use App\Repository\FuncionarioRepository;
use App\Repository\ProdutosRepository;
use App\Repository\FornecedorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(FuncionarioRepository $totalFuncionario, ProdutosRepository $totalProduto, FornecedorRepository $totalFornecedor)
    {
     /*
        $totalSec = $totalSecretaria->countAll();
        $totalGra = $totalGratificacao->countGra();
        */
        $totalFunc = $totalFuncionario->countAll();
        $totalProd = $totalProduto->countProd();
        $totalForn = $totalFornecedor->countFornecedor();
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'totalFunc' => $totalFunc,
            'totalProd' => $totalProd,
            'totalForn' => $totalForn
        ]);
    }
}
