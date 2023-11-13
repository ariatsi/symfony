<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function ShowProducts (Request $request): Response
    {
        $param = $request->query->all();
        // Affichage des résultats
        dump($param);
        $products = [
            ['name' => 'Ordinateur gaming', 'price' => 1399],
            ['name' => 'Clavier gaming', 'price' => 499],
            ['name' => 'Chaise gaming', 'price' => 599],
            ['name' => 'Casque gaming', 'price' => 180],
            ['name' => 'Bureau gaming', 'price' => 400],
            ['name' => 'Souris gaming', 'price' => 120],
        ];
        return $this->render('products.html.twig', [
            'products' => $products,
        ]);
    }
    #[Route('/product/{id}', name: 'product_detail')]
    public function showProductDetail(Request $request, $id): Response
    {
        // Supposons que vous ayez une source de données avec les détails des produits.
        $products = [
            ['id' => 1, 'name' => 'Ordinateur gaming', 'price' => 1399, 'description' => 'Un ordinateur puissant.'],
            ['id' => 2, 'name' => 'Clavier gaming', 'price' => 499, 'description' => 'Un clavier de compétition.'],
            ['id' => 3, 'name' => 'Chaise gaming', 'price' => 599, 'description' => 'Une chaise de Formule1.'],
            ['id' => 4, 'name' => 'Casque gaming', 'price' => 180, 'description' => 'Casque de Malade.'],
            ['id' => 5, 'name' => 'Bureau gaming', 'price' => 400, 'description' => 'Un bureau de designer.'],
            ['id' => 6, 'name' => 'Souris gaming', 'price' => 120, 'description' => 'Une souris de vitesse.'],
        ];

        $product = null;

        foreach ($products as $item) {
            if ($item['id'] == $id) {
                $product = $item;
                break;
            }
        }

        if ($product) {
            return $this->render('product_detail.html.twig', [
                'product' => $product,
            ]);
        } else {
            throw $this->createNotFoundException('Produit non trouvé');
        }
    }
}
