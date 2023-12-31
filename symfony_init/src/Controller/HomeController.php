<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
    //#[Route('/bonjour')]
    public function bonjour() {
        return new Response('<h1>Bonjour à toutes et à tous&nbsp;!<h1>');
    }

    #[Route('/aurevoir')]
    public function aurevoir() {
        return $this->redirectToRoute('bonjour');
    }

    #[Route('/redirectToGoogle')]
    public function redirectToGoogle() {
        return $this->redirect('https://www.google.com');
    }

}

