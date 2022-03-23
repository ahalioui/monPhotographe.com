<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/client', name: 'app_client')]
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

    #[Route("/formulaire/client")]
    public function formClient()
    {
        $formulaireClient = $this->createForm(ClientType::class);
        $vars = ['unFormulaire' =>
        $formulaireClient->createView()];

        return $this->render('/formulaires/formulaire_client.html.twig', $vars);
    }
}
