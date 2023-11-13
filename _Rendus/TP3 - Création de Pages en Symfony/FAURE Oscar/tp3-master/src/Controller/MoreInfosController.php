<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoreInfosController extends AbstractController
{
    #[Route('/moreInfos', name: 'app_more_infos')]
    public function index(): Response
    {
        return $this->render('more_infos/index.html.twig', ['message' => '2nd page']); 
    }
}
