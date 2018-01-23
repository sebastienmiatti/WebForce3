<?php
// SESSION
session_start();

// AUTRES INCLUSIONS
require('fonctions.inc.php');

$hote='localhost';
$bdd ='site_cv';
$utilisateur='root';
$passe='';

$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $passe);
// $pdoCv est le nom de la variable de la connexion qui sert partout où l'on doit se servir de cette connexion
$pdo -> exec('SET NAMES utf8');

// CONNEXION BDD
// $pdo = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
// 	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
// 	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
// ));

// VARIABLES
$msg = ''; // permet de communiquer avec les utilisateur
$page = ''; // contiendra le nom de la page en cours de visite (menu surbrillance + title de la page)
$contenu = ''; // contenu nous permettra ponctuellemnt de stocker du contenu à afficher.


// CHEMINS
define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/github/Sara_site_CV/');
define('URL', 'http://localhost/github/Sara_site_CV/');
