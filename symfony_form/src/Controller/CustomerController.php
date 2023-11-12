<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/customerform', name: 'customerform')]
    public function index(): Response
    {
        $customer = new Customer();
        $customerForm = $this->createForm(CustomerType::class, $customer);

        // Ajouter la logique de traitement du formulaire si nécessaire...

        return $this->render('customer/index.html.twig', [
            'customerForm' => $customerForm->createView(),
        ]);

    }
}
