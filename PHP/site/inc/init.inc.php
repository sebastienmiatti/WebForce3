<?php

    // SESSION
session_start();


    // CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=base_site','root','', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));


    // VARIABLES
$msg = ''; // $msg permet de communiquer avec l'utilisateur
$page = ''; // contiendra le nom de la page en cours de visite ( menu surbrillance + titre de la page).
$contenu= ''; // nous permettra ponctuellement de stocker du contenu a afficher.

    //CHEMINS
define('RACINE_SITE', '/htdocs-SEB/WebForce3/PHP/site/');



    //AUTRES INCLUSIONS
require('fonctions.inc.php');
         //ressources extérieurs
