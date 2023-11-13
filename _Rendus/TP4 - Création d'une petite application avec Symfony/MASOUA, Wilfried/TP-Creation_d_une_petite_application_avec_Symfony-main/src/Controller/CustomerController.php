<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customers', name: 'customers_list')]
    public function listCustomers(): Response
    {
        $customers = [
            ['name' => 'Théotimes'],
            ['name' => 'Jonas'],
            ['name' => 'Baptiste'],
            ['name' => 'Baz'],
        ];
        return $this->render('customers.html.twig', [
            'customers' => $customers,
        ]);
    }
}
