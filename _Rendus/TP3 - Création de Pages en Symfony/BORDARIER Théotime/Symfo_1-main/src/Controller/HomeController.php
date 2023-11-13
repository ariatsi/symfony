<?php

namespace App\Controller;

//use App\Repository\ConferenceRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

//use Twig\Environment;


class HomeController extends AbstractController 
{
    //route déclaré dans le "routes.yaml"
    public function accueil() { 
        //return $this->render('Accueil.php');  
        return $this->render('acceuil.html.twig', [
            
        ]);   
    }

    #[Route('/accueil/reponse')]
    public function accueil2(Request $request) { 
        //return $this->render('Accueil.php');
        $nom =  $request->request->get('nom'); 
        return $this->render('acceuil2.html.twig', [
            'nom' => $nom,
        ]);   
    }


    #[Route('/asuka')] //Redirection vers une vrai page
    public function assuka(): Response 
    {
        return $this->render('Assuka.php');

    }
    #[Route('/')] 
    public function index2() {
        return $this->redirectToRoute('accueil');
    } 
}