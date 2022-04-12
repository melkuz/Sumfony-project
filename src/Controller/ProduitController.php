<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    private $_listProduits = array(
        array(
        'id_produit' => 1,
       'produit' => 'Crayon de mine',
        'description' => 'Paquet de 10 crayons de marque HB',
        'prix' => 5.00
        ),
        array(
        'id_produit' => 2,
       'produit' => 'Stylo bleu',
       'description' => 'Paquet de 10 stylos de marque BIC',
       'prix' => 8.00
        ),
        array(
        'id_produit' => 3,
       'produit' => 'Calculatrice',
       'description' => 'Calculatrice de comptabilité',
       'prix' => 12.99
        ),
        array(
        'id_produit' => 4,
        'produit' => 'Aiguisoir électrique',
        'description' => 'Aiguisoir électrique de marque GE',
       'prix' => 22.49
        )
        );
       
    #[Route('/produits', name: 'app_produit')]
    public function listProduits(): Response{
        return $this->render('produit/listProduits.html.twig',array('produits' =>
         $this->_listProduits)
        );
    }

    #[Route('/produit/{numero}', name: 'produit')]
    public function index($numero): response{
        return $this->render('produit/index.html.twig',
        array('produit' => $this->_listProduits[$numero-1]));
    }
}
