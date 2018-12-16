<?php

namespace App\Controller;

use App\Entity\FormaPagto;
use App\Form\FormaPagtoType;
use App\Repository\FormaPagtoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/forma/pagto")
 */
class FormaPagtoController extends AbstractController
{
    /**
     * @Route("/", name="forma_pagto_index", methods={"GET"})
     */
    public function index(FormaPagtoRepository $formaPagtoRepository): Response
    {
        return $this->render('forma_pagto/index.html.twig', ['forma_pagtos' => $formaPagtoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="forma_pagto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formaPagto = new FormaPagto();
        $form = $this->createForm(FormaPagtoType::class, $formaPagto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formaPagto);
            $entityManager->flush();

            return $this->redirectToRoute('forma_pagto_index');
        }

        return $this->render('forma_pagto/new.html.twig', [
            'forma_pagto' => $formaPagto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forma_pagto_show", methods={"GET"})
     */
    public function show(FormaPagto $formaPagto): Response
    {
        return $this->render('forma_pagto/show.html.twig', ['forma_pagto' => $formaPagto]);
    }

    /**
     * @Route("/{id}/edit", name="forma_pagto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FormaPagto $formaPagto): Response
    {
        $form = $this->createForm(FormaPagtoType::class, $formaPagto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('forma_pagto_index', ['id' => $formaPagto->getId()]);
        }

        return $this->render('forma_pagto/edit.html.twig', [
            'forma_pagto' => $formaPagto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="forma_pagto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FormaPagto $formaPagto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formaPagto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formaPagto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('forma_pagto_index');
    }
}
