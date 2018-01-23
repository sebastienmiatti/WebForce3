<?php
// ouverture de SESSION
session_start();

// $pdo = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


// Déclaration des variables
$msg = ''; // permet de communiquer avec les utilisateur, Mot de passe local
$page = ''; // contiendra le nom de la page en cours de visite (menu surbrillance + title de la page)
$contenu = ''; // contenu nous permettra ponctuellemnt de stocker du contenu à afficher.// CHEMINS
$mdp = '';


// Variables de connexion a la bdd
$hote = 'localhost'; // chemin vers le serveur
$bdd = 'site_cv'; // nom de la base de données
$utilisateur = 'root'; // nom dutilisateur de connexion
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// $pdo est le nom de la variable de la connexion qui sert partout où l'on doit se servir de cette connexion


// Déclaration des chemins
define('RACINE_CV', '/htdocs-SEB/portfolio_SEB/admin/');


// define('RACINE_CV','/site_cv/');
//define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/htdocs-SEB/portfolio_SEB/');
//define('URL', 'http://localhost/github/htdocs/htdocs-SEB/portfolio_SEB/');

?>
