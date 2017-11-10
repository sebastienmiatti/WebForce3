<?php
require('init.inc.php');

 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= URL; ?>inc/css/style.css">
        <title>Base site</title>
    </head>
    <body>
        <header>
            <div class="container">
                    <a href="#">Monsite.com</a>
                    <nav>
                        <a href="<?= URL . 'inscription.php'; ?>">Inscription</a>
                        <a href="<?= URL . 'connexion.php'; ?>">Connexion</a>
                        <a href="<?= URL . 'boutique.php'; ?>">Boutique</a>
                        <a href="<?= URL . 'panier.php'; ?>">Panier</a>
                    </nav>
            </div>
        </header>
        <section>
            <div class="container">
