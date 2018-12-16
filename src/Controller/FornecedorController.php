<?php

namespace App\Controller;

use App\Entity\Fornecedor;
use App\Form\FornecedorType;
use App\Repository\FornecedorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fornecedor")
 */
class FornecedorController extends AbstractController
{
    /**
     * @Route("/", name="fornecedor_index", methods={"GET"})
     */
    public function index(FornecedorRepository $fornecedorRepository): Response
    {
        return $this->render('fornecedor/index.html.twig', ['fornecedors' => $fornecedorRepository->findAll()]);
    }

    /**
     * @Route("/new", name="fornecedor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fornecedor = new Fornecedor();
        $form = $this->createForm(FornecedorType::class, $fornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fornecedor);
            $entityManager->flush();

            return $this->redirectToRoute('fornecedor_index');
        }

        return $this->render('fornecedor/new.html.twig', [
            'fornecedor' => $fornecedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fornecedor_show", methods={"GET"})
     */
    public function show(Fornecedor $fornecedor): Response
    {
        return $this->render('fornecedor/show.html.twig', ['fornecedor' => $fornecedor]);
    }

    /**
     * @Route("/{id}/edit", name="fornecedor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fornecedor $fornecedor): Response
    {
        $form = $this->createForm(FornecedorType::class, $fornecedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fornecedor_index', ['id' => $fornecedor->getId()]);
        }

        return $this->render('fornecedor/edit.html.twig', [
            'fornecedor' => $fornecedor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fornecedor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fornecedor $fornecedor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fornecedor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fornecedor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fornecedor_index');
    }
}
