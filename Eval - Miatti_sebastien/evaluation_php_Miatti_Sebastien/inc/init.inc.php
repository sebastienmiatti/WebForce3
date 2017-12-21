<?php
// CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=vtc', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));

// VARIABLES
$page = '';

// inclusion du fichier fonctions.inc.php
require_once('fonctions.inc.php');


 ?>
