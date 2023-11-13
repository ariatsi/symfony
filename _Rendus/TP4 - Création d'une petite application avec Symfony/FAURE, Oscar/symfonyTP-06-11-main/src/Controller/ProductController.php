<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="product_list")
     */
    public function index(): Response
    {
        $products = [
            ['id' => 0, 'name' => 'T-shirt bleu', 'price' => 20],
            ['id' => 1, 'name' => 'T-shirt blanc', 'price' => 25],
            ['id' => 2, 'name' => 'T-shirt rouge', 'price' => 22],
        ];

        return $this->render('products.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/product/{id}", name="product_detail")
     */
    public function show(Request $request, $id): Response
    {
        $productDetails = [
            ['id' => 0, 'name' => 'T-shirt bleu', 'price' => 20, 'description' => "T-shirt bleu très bleu comme le ciel"],
            ['id' => 1, 'name' => 'T-shirt blanc', 'price' => 25, 'description' => "T-shirt blanc et plus cher que les autres (donc il est mieux)"],
            ['id' => 2, 'name' => 'T-shirt rouge', 'price' => 22, 'description' => "T-shirt rouge qualité bretonne"],
        ];

        return $this->render('product_detail.html.twig',['id' => $id, 'productDetails' => $productDetails]);
    }
}
