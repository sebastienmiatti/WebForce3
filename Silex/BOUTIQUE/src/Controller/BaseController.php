<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use BOUTIQUE\Form\Type\ContactType;
use BOUTIQUE\Entity\Produit;

class BaseController
{

    public function indexAction(Application $app)
    {
        $produits = $app['dao.produit'] -> findAll();
        // $produits = objetModelProduit (ProduitDAO) -> findAll();
        // produits est un tableau multidimentinnel composé d'objets
        $categories = $app['dao.produit'] -> findAllCategories();

        // Mis en commentaire a l'étape 8.6
        // ob_start();
        // require '../views/view.php';
        // $view = ob_get_clean();
        // return $view;

        //Ajouté a l'étape 8.6:
        $params = array(
            'produits' => $produits,
            'categories' => $categories,
            'title' => 'Accueil',
            'js' => 'slideshow.js'
        );
        return $app['twig'] -> render('index.html.twig', $params);
    }


    public function contactAction(Request $request, Application $app)
    {
        $contactForm = $app['form.factory'] -> create(ContactType::class);
        $contactForm-> handleRequest($request);
        if($contactForm -> isSubmitted() && $contactForm -> isValid()){

            $data = $contactForm -> getData();
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            extract($data);
            //$prenom, $sujet, $nom, $email, $message
            //$headers (cf cours php formulaire5.php)
            //mail();
        }

        $contactFormView = $contactForm -> createView();

        $params = array(
            'title' => 'Formulaire Contact',
            'contactForm' => $contactFormView

        );
        return $app['twig'] -> render('contact.html.twig', $params);
    }

    // public function mentionsAction(Application $app)
    // {
    //     return $app['twig'] ->render('mentions-legales.html.twig', array $params);
    // }

}


 ?>
