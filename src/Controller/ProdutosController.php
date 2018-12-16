<?php

namespace App\Controller;

use App\Entity\Produtos;
use App\Form\ProdutosType;
use App\Repository\ProdutosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produtos")
 */
class ProdutosController extends AbstractController
{
    /**
     * @Route("/", name="produtos_index", methods={"GET"})
     */
    public function index(ProdutosRepository $produtosRepository): Response
    {
        return $this->render('produtos/index.html.twig', ['produtos' => $produtosRepository->findAll()]);
    }

    /**
     * @Route("/new", name="produtos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produto = new Produtos();
        $form = $this->createForm(ProdutosType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produto);
            $entityManager->flush();

            return $this->redirectToRoute('produtos_index');
        }

        return $this->render('produtos/new.html.twig', [
            'produto' => $produto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produtos_show", methods={"GET"})
     */
    public function show(Produtos $produto): Response
    {
        return $this->render('produtos/show.html.twig', ['produto' => $produto]);
    }

    /**
     * @Route("/{id}/edit", name="produtos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produtos $produto): Response
    {
        $form = $this->createForm(ProdutosType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produtos_index', ['id' => $produto->getId()]);
        }

        return $this->render('produtos/edit.html.twig', [
            'produto' => $produto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produtos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produtos $produto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produtos_index');
    }
}
