<?php

// CONNEXION BDD
$pdo = new PDO('mysql:host=localhost;dbname=base_site', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));

// SESSION
session_start();

// VARIABLES
$msg = '';
$page = '';
$contenu = '';

// CHEMIN
define('RACINE_SITE', 'htdocs-SEB/WebForce3/PHP/site(yakine)/');
define('RACINE_SERVEUR', $_SERVER['DOCUMENT_ROOT']);



// AUTRES INCLUSIONS
require_once('fonctions.inc.php');
