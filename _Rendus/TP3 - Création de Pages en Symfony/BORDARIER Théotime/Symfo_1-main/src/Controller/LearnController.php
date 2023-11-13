<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnController extends AbstractController
{
    #[Route('/learn', name: 'app_learn')]
    public function index(): Response
    {
        return $this->render('learn/index.html.twig', [
            'controller_name' => 'LearnController',
        ]);
    }
    #[Route('/google')]
    public function google() {
        return $this->redirect('https://www.google.com');
    }

    #[Route('/asssssuka')]
    public function asuka() {
        return new Response('Welcome to my Asuka WOLD!');

    }
    #[Route('/no')] //redirige vers le roote déclaré dans "routes.yaml"
    public function no() {
        return $this->redirectToRoute('bonjour');
    } 
    public function bonjour() { //route déclaré dans le "routes.yaml"
        return new Response('Bonjour à toutes et à tous!!');
    
    }
}
