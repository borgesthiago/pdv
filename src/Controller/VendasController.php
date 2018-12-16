<?php

namespace App\Controller;

use App\Entity\Vendas;
use App\Entity\Cliente;
use App\Entity\TipoVenda;
use App\Entity\Funcionario;
use App\Entity\Produtos;
use App\Form\VendasType;
use App\Repository\VendasRepository;
use App\Repository\FuncionarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * @Route("/vendas")
 */
class VendasController extends AbstractController
{
    /**
     * @Route("/", name="vendas_index", methods={"GET"})
     */
    public function index(VendasRepository $vendasRepository): Response
    {
        return $this->render('vendas/index.html.twig', ['vendas' => $vendasRepository->findAll()]);
    }

    /**
     * @Route("/new", name="vendas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $venda = [];
        $form = $this->createFormBuilder()
            ->add('dataEmissao', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Emissão',
                'format' => 'yyyy-MM-dd',
                'required' => false
            ))
            ->add('cliente', EntityType::class, [
                'class' => Cliente::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ]) 
            ->add('produtos', EntityType::class, [
                'class' => Produtos::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ]) 
            ->add('valor')
            ->add('quantidade')
            ->add('desconto')
            ->add('comissao')
            ->add('tipo_venda', EntityType::class, [
                'class' => TipoVenda::class,
                'choice_label' => 'descricao',
                'placeholder' => 'Selecione'
            ]) 
            ->add('funcionario', EntityType::class, [
                'class' => Funcionario::class,
                'choice_label' => 'nome',
                'placeholder' => 'Selecione'
            ]) 
            
            ->getForm();
       // $venda = new Vendas();
       // $form = $this->createForm(VendasType::class, $venda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($venda);
            $entityManager->flush();

            return $this->redirectToRoute('vendas_index');
        }

        return $this->render('vendas/new.html.twig', [
            'venda' => $venda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vendas_show", methods={"GET"})
     */
    public function show(Vendas $venda): Response
    {
        return $this->render('vendas/show.html.twig', ['venda' => $venda]);
    }

    /**
     * @Route("/{id}/edit", name="vendas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vendas $venda): Response
    {
        $form = $this->createForm(VendasType::class, $venda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vendas_index', ['id' => $venda->getId()]);
        }

        return $this->render('vendas/edit.html.twig', [
            'venda' => $venda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vendas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vendas $venda): Response
    {
        if ($this->isCsrfTokenValid('delete'.$venda->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($venda);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vendas_index');
    }
}
