<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeuxiemepageController extends AbstractController
{
    public function index(): Response
    {
        return new Response('Bienvenue sur ma Deuxième page Symfony!');
    }
}
