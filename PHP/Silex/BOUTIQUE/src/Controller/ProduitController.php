<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Entity\Produit;

class ProduitController
{

    public function produitAction($id, Application $app)
    {
        $pdt = $app['dao.produit'] -> findById($id);

        //rendu de la vue
        // Mis en commentaire a l'étape 8.6
        // ob_start();
        // require '../views/produit.php';
        // $view_pdt = ob_get_clean();
        //
        // return $view_pdt;

        //Ajouté a l'étape 8.6:
        $params = array(
            'pdt' => $pdt,
            'title' => 'Boutique'
        );
        return $app['twig'] -> render('produit.html.twig', $params);
    }


    public function boutiqueAction($categorie, Application $app)
    {
        // Etape 1 : récupérer les produits en fonction de $categorie
        // SELECT * FROM produit WHERE categorie = id_categorie
        $produits = $app['dao.produit'] -> findAllByCategorie($categorie);

        // Etape 2 :Récuperer également toutes les catégorie pour ré-afficher le menu latéral
        $categories = $app['dao.produit'] -> findAllCategories();

        //Etape 3 on affiche le rendu de la vue
        // Mis en commentaire a l'étape 8.6
        //ob_start();
        //require '../views/view.php';
        //$view = ob_get_clean();
        //return $view;


        //Ajouté a l'étape 8.6:
        $params = array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Nos'. $categorie . 's',
            'js' => 'slideshow.js',
            'slide_show' => true
        );
        return $app['twig'] -> render('index.html.twig', $params);
    }
    
}


 ?>
