<?php
//--------------------------- BDD

$mysqli= new mysqli("localhost", "root", "", "base_site");
if($mysqli->connect_error) die('Un probleme est survenu lors de la connexion a la BDD : ' . $mysqli->connect_error);
$mysqli->set_charset("utf8");

//-------------------------- SESSION

session_start();

//-------------------------- CHEMIN

define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . "/htdocs-SEB/WebForce3/Revision-PHP/base_site_mysqli/");
define("URL", "http://localhost/htdocs-SEB/WebForce3/Revision-PHP/base_site_mysqli/");

 /* RACINE_SITE . "<hr>";
 echo URL; */

 //------------------------ Autres VARIABLES
 $contenu = "";


//------------------------ Autres INCLUSIONS
 require_once('function.inc.php');

 ?>
