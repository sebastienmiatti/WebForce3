<?php

$app['db.options']= array(
    'host' => 'localhost',
    'dbname' => 'site_cv',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8',
);

// Doctrine DBAL est prévu pour récupérer nos information de connexion a la BDD grace a $app['db.options'], voila pourquoi on les met ici :)
// Quand on passe notre site sur le serveur distant de OVH ou autre registre; c'est ici que nous viendrons charger les informations de connexion a la BDD.
 ?>
