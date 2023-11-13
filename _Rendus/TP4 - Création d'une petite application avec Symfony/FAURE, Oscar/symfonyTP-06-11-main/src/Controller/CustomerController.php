<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customers", name="customer_list")
     */
    public function index(): Response
    {
        $customers = [
            ['id' => 1, 'name' => 'Miguel Jackson'],
            ['id' => 2, 'name' => 'Jamie Roquai'],
            ['id' => 3, 'name' => 'Daph punk'],
        ];

        return $this->render('customers.html.twig', ['customers' => $customers]);
    }
}
