<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/showProducts', name: 'show_product')]
    public function showProduct(Request $request) {
        $parametres = $request->query->all();
        $products = [['nom' => 'Ordinateur','prix' => '1000$','id' => '1'],['nom' => 'Téléphone','prix' => '500$','id' => '2'],['nom' => 'Radio','prix' => '100$','id' => '3'],['nom' => 'Cassette','prix' => '30$','id' => '4']];
        return $this->render('products.html.twig', [
        'products' => $products,
        ]);
    }
}
