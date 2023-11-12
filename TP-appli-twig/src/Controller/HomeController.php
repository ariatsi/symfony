<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route('/home', name: 'home')]
    public function home(): Response
    {
        $message = "Mon superb site web !";
        return $this->render('base.html.twig', ['Message' => $message]);
    }

    #[Route('/customers', name: 'customers_list')]
public function customers(): Response
{
$customers = [
['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
// Ajoutez plus de clients si nécessaire
];

return $this->render('customers.html.twig', [
'customers' => $customers
]);
}

    #[Route('/products', name: 'products_list')]
    public function showProducts(): Response
    {
        $products = [
            1 => ['name' => 'Ordinateur', 'description' => 'Un ordinateur très performant'],
            2 => ['name' => 'Téléphone', 'description' => 'Un téléphone intelligent dernier cri'],
            // autres produits
        ];
        return $this->render('products.html.twig', [
            'products' => $products
        ]);
    }


#[Route('/product/{id}', name: 'product_show')]
public function showProduct(Request $request, $id): Response
{
// Récupérer les détails du produit à l'aide de l'ID.
    $allProducts = [
        1 => ['name' => 'Ordinateur', 'description' => 'Un ordinateur très performant'],
        2 => ['name' => 'Téléphone', 'description' => 'Un téléphone intelligent dernier cri'],
        // autres produits
    ];
    $product = $allProducts[$id] ?? null;
    if (!$product) {
        throw $this->createNotFoundException('No product found for id '.$id);
    }

return $this->render('product_show.html.twig', [
'product' => $product
]);
}

#[Route('/pages', name: 'pages')]
public function getPages(): Response
{
return $this->render('page.html.twig');
}
}
