<?php

// Ouverture de session_start()
session_start();

$hote = 'localhost'; // Le chemin vers le serveur
$bdd = 'cv'; // Le nom de la base de donnée
$utilisateur ="root"; // Le nom d'utilisateur pour se connecter
$mdp = ''; // Mot de passe local

// Connexion à la base de donnée
$pdo = new PDO('mysql:host=' . $hote . ';dbname=' . $bdd, $utilisateur, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Déclaration des chemins
define('RACINE_CV', '/htdocs-SEB/portfolio_SEB/admin/admin/');

// Déclaration des variables
$msg = '';

// require de mon fichier contenant mes fonctions.
require('inc.fonctions.php');
