<?php

use Symfony\Component\HttpFoundation\Request;
// Request est la class symfony qui va gérer les requetes HTTP (POST). On ne récupère pas les info avec $_POST directement. etape 17

// Creer ca en etape 6.3
// Commenté en étape 7.9
/* =================================
$app -> get('/', function(){
  require '../src/model.php';

  $infos = afficheAll();

  $produits = $infos['produits'];
  $categories = $infos['categories'];

  ob_start();//Enclenche la temporisation. Cela signifie que tout ce qui suit ne sera pas exécuté.

  require '../views/view.php';
  $view = ob_get_clean(); //stocke tout ce qui a été retenu dans une variable.
  return $view;

  // Ici on a stocké notre vue dans la variable $view grâce à ob_start() et ob_get_clean(). Ensuite on retourne la vue.
  //C'est la base de la fonction render() qu'on utilisera par la suite.

});
======================================*/

// Créer en étape 7.9:
$app -> get('/', "BOUTIQUE\Controller\BaseController::indexAction") -> bind('home');



$app -> get('/produit/{id}', "BOUTIQUE\Controller\ProduitController::produitAction") -> bind('produit');

// on souhaite construire une nouvelle route(fonctionnalité, affichage) qui va nous afficher tout les produits en fonction de la catégrorie l'URL souhaitée es: www.boutique.dev/boutique/nom_de_la_categorie
$app -> get('/boutique/{categorie}', "BOUTIQUE\Controller\ProduitController::boutiqueAction") -> bind('boutique');

// exo: Faire la route qui va afficher la page de profil. En simulant a l'intérieur de la route l'ouverture de la session, et en enregistrant dans $_SESSION['membre'] les infos d'un membre au hasard

$app -> get('/profil/', "BOUTIQUE\Controller\MembreController::profilAction") -> bind('profil');


// Fonctionnalités pour le formulaire de contact : /contact/
$app -> match('/contact/', "BOUTIQUE\Controller\BaseController::contactAction") -> bind('contact');


// Route pour l'affichage de tous les produits dans le backoffice (dans un tableau HTML)
$app -> get('backoffice/produit/', "BOUTIQUE\Controller\BackOfficeController::produitAction") -> bind('bo_produit');

// Route pour ajouter un nouveau ProduitType
$app -> match('/backoffice/produit/add/', 'BOUTIQUE\Controller\BackOfficeController::addProduitAction') -> bind('bo_produit_add');

// Route pour moodifier un nouveau ProduitType
$app -> match('/backoffice/produit/edit/', 'BOUTIQUE\Controller\BackOfficeController::editProduitAction') -> bind('bo_produit_edit');
