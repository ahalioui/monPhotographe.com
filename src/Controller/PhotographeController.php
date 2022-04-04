<?php

namespace App\Controller;

use App\Entity\Photographe;
use App\Form\Photographe1Type;
use App\Repository\PhotographeRepository;
use App\Repository\TarifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/photographe')]
class PhotographeController extends AbstractController
{
    #[Route('/', name: 'app_photographe_index', methods: ['GET'])]
    public function index(PhotographeRepository $photographeRepository): Response
    {
        return $this->render('photographe/index.html.twig', [
            'photographes' => $photographeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_photographe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PhotographeRepository $photographeRepository): Response
    {
        $photographe = new Photographe();
        $form = $this->createForm(Photographe1Type::class, $photographe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photographeRepository->add($photographe);
            return $this->redirectToRoute('app_photographe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('photographe/new.html.twig', [
            'photographe' => $photographe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_photographe_show', methods: ['GET'])]
    public function show(Photographe $photographe): Response
    {
        return $this->render('photographe/show.html.twig', [
            'photographe' => $photographe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_photographe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Photographe $photographe, PhotographeRepository $photographeRepository, TarifRepository $tarifs): Response
    {
        $form = $this->createForm(Photographe1Type::class, $photographe);
        $tarif = $tarifs->findAll();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $photographeRepository->add($photographe);
            return $this->redirectToRoute('app_photographe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('photographe/edit.html.twig', [
            'photographe' => $photographe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_photographe_delete', methods: ['POST'])]
    public function delete(Request $request, Photographe $photographe, PhotographeRepository $photographeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photographe->getId(), $request->request->get('_token'))) {
            $photographeRepository->remove($photographe);
        }

        return $this->redirectToRoute('app_photographe_index', [], Response::HTTP_SEE_OTHER);
    }
}
