<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('accueil.html.twig', ['message' => 'Bienvenue sur ma première page Symfony!']);
    }
}
