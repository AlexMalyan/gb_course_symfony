<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(): Response
    {
        $manager=$this->getDoctrine()->getManager();
        $repository= $manager->getRepository(Product::class);
        $products=$repository->findAll();
//        d($products);
        return $this->render('product/index.html.twig', [
//              'controller_name' => 'ProductController',
                'products' => $products
        ]);
    }
}
