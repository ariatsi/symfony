<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController {
    #[Route('/bonjour')]
    public function bonjour() {
        return new Response('Bonjour à toutes et à tous!');
    }
}

