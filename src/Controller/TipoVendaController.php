<?php

namespace App\Controller;

use App\Entity\TipoVenda;
use App\Form\TipoVendaType;
use App\Repository\TipoVendaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/venda")
 */
class TipoVendaController extends AbstractController
{
    /**
     * @Route("/", name="tipo_venda_index", methods={"GET"})
     */
    public function index(TipoVendaRepository $tipoVendaRepository): Response
    {
        return $this->render('tipo_venda/index.html.twig', ['tipo_vendas' => $tipoVendaRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tipo_venda_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoVenda = new TipoVenda();
        $form = $this->createForm(TipoVendaType::class, $tipoVenda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoVenda);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_venda_index');
        }

        return $this->render('tipo_venda/new.html.twig', [
            'tipo_venda' => $tipoVenda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_venda_show", methods={"GET"})
     */
    public function show(TipoVenda $tipoVenda): Response
    {
        return $this->render('tipo_venda/show.html.twig', ['tipo_venda' => $tipoVenda]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_venda_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoVenda $tipoVenda): Response
    {
        $form = $this->createForm(TipoVendaType::class, $tipoVenda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_venda_index', ['id' => $tipoVenda->getId()]);
        }

        return $this->render('tipo_venda/edit.html.twig', [
            'tipo_venda' => $tipoVenda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_venda_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoVenda $tipoVenda): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoVenda->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoVenda);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_venda_index');
    }
}
