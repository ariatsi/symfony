<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController {

    public function showProducts(): Response {
        
        $products = [
            [
                'id' => 1,
                'name' => 'Produit 1',
                'price' => 10.99,
            ],
            [
                'id' => 2,
                'name' => 'Produit 2',
                'price' => 19.99,
            ],
        ];

        return $this->render('products.html.twig', [
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $id): Response {
        $id = $request->attributes->get('id');

        $productDetails = [];

        // Les données du produit 1
        if ($id == 1) {
            $productDetails = [
                'id' => 1,
                'name' => 'Produit 1',
                'description' => 'Description du Produit 1',
                'price' => 10.99,
            ];
        }

        // Les données du produit 2
        if ($id == 2) {
            $productDetails = [
                'id' => 2,
                'name' => 'Produit 2',
                'description' => 'Description du Produit 2',
                'price' => 19.99,
            ];
        }

        return $this->render('product_detail.html.twig', [
            'product' => $productDetails,
        ]);
    }
}
