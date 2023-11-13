<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController {

    public function showCustomers(): Response
    {
        $customers = [
            [
                'id' => 1,
                'name' => 'client 1',
                'age' => 30,
            ],
            [
                'id' => 2,
                'name' => 'Client 2',
                'age' => 19,
            ],
        ];

        return $this->render('customers.html.twig', [
            'customers' => $customers,
        ]);
    }

    public function customerDetails(Request $request, $id): Response {
        $id = $request->attributes->get('id');

        $customerDetails = [];

        // Les données du produit 1
        if ($id == 1) {
            $customerDetails = [
                'id' => 1,
                'name' => 'Client 1',
                'description' => "Directeur commercial de l'entreprise eBay",
                'age' => 30,
            ];
        }

        // Les données du produit 2
        if ($id == 2) {
            $customerDetails = [
                'id' => 2,
                'name' => 'Client 2',
                'description' => "Directeur général de l'entreprise Amazon",
                'age' => 19,
            ];
        }

        return $this->render('customer_detail.html.twig', [
            'customer' => $customerDetails,
        ]);
    }
}
