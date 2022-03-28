<?php

namespace App\Controller;

use App\Repository\PhotographeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(PhotographeRepository $photographeRepository)
    {
        $photographes = $photographeRepository ->findAll();
        
        dump($photographes[0]);
        dump ($photographes[0]->getRoles());

        if (in_array('ROLE_PHOTOGRAPHE',$photographes[0]->getRoles())){
            dump("photographe");
        }

        //dd($photographes);

        // verifier si la personne connectee est photographe ou client

        dump($this->getUser());
        
        if (in_array('ROLE_PHOTOGRAPHE',$this->getUser()->getRoles())){
            
            dump("photographe");
        }
        else {
            dump("client");

        }

        dd();
        
        return $this->render('home/index.html.twig', [
            'photographes' => $photographes
        ]);
    }
}
