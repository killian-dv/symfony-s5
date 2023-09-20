<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    #[Route("/products", name:"products_list")]
    public function listProducts(): Response
    {
        return $this->render('product/listProducts.html.twig', [
            'pageTitle' => 'Liste des produits',
        ]);
    }

    #[Route("/product/{id}", name:"product_view")]
    public function viewProduct(Request $request, $id): Response
    {
        return $this->render('product/viewProduct.html.twig', [
            'pageTitle' => 'Affichage du produit',
            'productId' => $id,
        ]);
    }
}
