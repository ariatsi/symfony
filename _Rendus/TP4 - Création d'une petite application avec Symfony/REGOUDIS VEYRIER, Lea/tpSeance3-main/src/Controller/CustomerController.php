<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends AbstractController
{
    #[Route('/customer', name: 'app_customer')]
    public function index(): Response
    {
        return $this->render('customer/index.html.twig', [
            'controller_name' => 'CustomerController',
        ]);
    }

    #[Route('/showCustomers', name: 'show_customer')]
    public function showCustomer(Request $request) {
        $parametres = $request->query->all();
        $customers = [['nom' => 'Chicot','prénom' => 'Clément','id'=>'1'],['nom' => 'Regoudis','prénom' => 'Léa','id'=>'2']];
        return $this->render('customer.html.twig', [
        'customers' => $customers,
        ]);
    }
}
