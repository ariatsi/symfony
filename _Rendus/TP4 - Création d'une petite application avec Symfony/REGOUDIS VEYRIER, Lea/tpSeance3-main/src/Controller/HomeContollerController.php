<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeContollerController extends AbstractController
{
    #[Route('/home/contoller', name: 'app_home_contoller')]
    public function index(): Response
    {
        return $this->render('home_contoller/index.html.twig', [
            'controller_name' => 'HomeContollerController',
        ]);
    }

    #[Route('/homePage', name: 'home_page')]
    public function home()
    {
        return $this->render('home.html.twig');
    }

    #[Route('/more/{id}', name: 'more_info')]
    public function getInfo(int $id) {
        $products = ['1'=>['nom' => 'Ordinateur','prix' => '1000$','taille' => '23 pouce','charge' => 'chargeur filaire','autonomie' => '24h','marque' => 'Lenovo'],'2'=>['nom' => 'Téléphone','prix' => '500$','taille' => '11x6','charge' => 'chargeur filaire','autonomie' => '24h','marque' => 'Samsung'],'3'=>['nom' => 'Radio','prix' => '100$','taille' => '7x18x7','charge' => 'Prise secteur','autonomie' => '10ans','marque' => 'JBL'],'4'=>['nom' => 'Cassette','prix' => '30$','taille' => '11x3x8','charge' => 'Pille','autonomie' => '2 mois','marque' => 'Reshow']];
        $details = $products[$id];
        return $this->render('details.html.twig', [
            'detail' => $details,
        ]);
    }

    #[Route('/info/{id}', name: 'client_info')]
    public function getMore(int $id) {
        $customers = ['1'=>['nom' => 'Chicot','prénom' => 'Clément', 'tel' => '07642445667', 'mail' => 'chiclem@mail.com'],'2'=>['nom' => 'Regoudis','prénom' => 'Léa', 'tel' => '0964234567', 'mail' => 'reglea@mail.com']];
        $details = $customers[$id];
        return $this->render('fiche.html.twig', [
            'detail' => $details,
            ]);
       }
       
}
