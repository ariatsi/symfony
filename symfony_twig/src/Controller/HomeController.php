<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController {
    //#[Route('/bonjour')]
    public function bonjour() {
        return new Response('<h1>Bonjour à toutes et à tous&nbsp;!<h1>');
    }

    #[Route('/aurevoir')]
    public function aurevoir() {
        return $this->redirectToRoute('bonjour');
    }

    #[Route('/redirectToGoogle')]
    public function redirectToGoogle() {
        return $this->redirect('https://www.google.com');
    }

    //#[Route('/showTemplate')]
    public function showTemplate() {
        // ...
        return $this->render('base.html.twig');
    }

    #[Route('/showProducts')]
    public function showProducts(Request $request) {
        //$parametre = $request->query->get('product');

        $parametres = $request->query->all();
        // Affichage des résultats
        dump($parametres);

        // Affichage du résultat
        //dump($parametre);
        return new Response('<h1>Utilisation de l\'objet Request dans un Contrôleur<h1>');
    }

    #[Route('/showProductsPro')]
    public function showProductsPro(Request $request) {
        // Récupération de la valeur 'product' avec une valeur par défaut
        $product = $request->query->get('product', 'defaultProduct');

        // Vérification de la présence de 'category'
        $hasCategory = $request->query->has('category');

        // Récupération des clés des paramètres
        $paramKeys = $request->query->keys();

        // Affichage des résultats
        dump($product, $hasCategory, $paramKeys);
        return new Response('<h1>Utilisation de l\'objet Request dans un Contrôleur<h1>');
    }



}

