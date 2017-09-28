<?php

    // SESSION
session_start();


    // CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=site','root','', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));


    // VARIABLES
$msg = '';


    //CHEMINS
define('RACINE_SITE', '/github/WebForce3/PHP/site/');



    //AUTRES INCLUSIONS
require('fonctions.inc.php');
         //ressources extérieurs
