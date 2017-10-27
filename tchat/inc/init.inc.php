<?php
$pdo = new PDO('mysql:host=localhost;dbname=tchat-ajax', 'root','', array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); // connexion a la BDD


//-- SESSION
session_start();

//-- VARIABLES
$msg = '';

?>
