<?php

namespace App\Controller;

use App\Form\PhotographeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotographeController extends AbstractController
{
    #[Route('/photographe', name: 'app_photographe')]
    public function index(): Response
    {
        return $this->render('photographe/index.html.twig', [
            'controller_name' => 'PhotographeController',
        ]);
    }

    #[Route("/formulaire/Photographe")]
    public function formPhotographe()
    {
        $formulairePhotographe = $this->createForm(PhotographeType::class);
        $vars=['unFormaulaire' =>
        $formulairePhotographe->createView()];

        return $this->render('/formulaire/formulaire_photographe.html.twig', $vars);
    }

}
