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
$app -> get('/', function() use($app)
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

}) -> bind('home');



$app -> get('/produit/{id}', function($id) use($app)
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


}) -> bind('produit');

// on souhaite construire une nouvelle route(fonctionnalité, affichage) qui va nous afficher tout les produits en fonction de la catégrorie l'URL souhaitée es: www.boutique.dev/boutique/nom_de_la_categorie
$app -> get('/boutique/{categorie}', function($categorie) use($app)
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

}) -> bind('boutique');

// exo: Faire la route qui va afficher la page de profil. En simulant a l'intérieur de la route l'ouverture de la session, et en enregistrant dans $_SESSION['membre'] les infos d'un membre au hasard

$app -> get('/profil', function() use($app)
{
    session_start();
    $_SESSION['membre']['pseudo'] = 'Tchikito';
    $_SESSION['membre']['id_membre'] = '1';
    $_SESSION['membre']['sexe'] = 'm';
    $_SESSION['membre']['prenom'] = 'sebastien';
    $_SESSION['membre']['nom'] = 'miatti';
    $_SESSION['membre']['email'] = 'miatti.sebastien@live.fr';
    $_SESSION['membre']['adresse'] = '11 allée saint-exupéry';
    $_SESSION['membre']['code_postal'] = '92390';
    $_SESSION['membre']['ville'] = 'Villeneuve-la-garenne';
    $_SESSION['membre']['statut'] = '0';
    //etc...

    //On rend la vue profil.html.twig

    $params = array(
        // 'id_membre' => $_SESSION['membre']['id_membre'], (fait seul)
        // 'sexe' => $_SESSION['membre']['sexe'],
        // 'prenom' => $_SESSION['membre']['prenom'],
        // 'nom' => $_SESSION['membre']['nom'],
        // 'email' => $_SESSION['membre']['email'],
        // 'adresse' => $_SESSION['membre']['adresse'],
        // 'code_postal' => $_SESSION['membre']['code_postal'],
        // 'ville' => $_SESSION['membre']['ville'],
        // 'statut' => $_SESSION['membre']['statut'],
        'membre' => $_SESSION['membre'],
        'title' => 'Profil de ' . $_SESSION['membre']['pseudo']

    );
    return $app['twig'] -> render('profil.html.twig', $params);
}) -> bind('profil');


// Fonctionnalités pour le formulaire de contact : /contact/
$app -> match('/contact/', function(Request $request) use($app)
{
    $contactForm = $app['form.factory'] -> create(BOUTIQUE\Form\Type\ContactType::class);




    $contactFormView = $contactForm -> createView();

    $params = array(
        'title' => 'Formulaire Contact',
        'contactForm' => $contactFormView

    );
    return $app['twig'] -> render('contact.html.twig', $params);
}) -> bind('contact');
