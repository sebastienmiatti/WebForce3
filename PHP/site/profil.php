<?php
require_once('inc/init.inc.php');

    debug($_SESSION);
    debug($_SESSION['membre']);

// Traitement pour rediriger l'utilisateur s'il est deja connecté
if(!userConnecte()){
header('location:connexion.php');
}



    extract($_SESSION['membre']);

$page = 'Profil';
    require('inc/header.inc.php');
?>

<!-- Contenu HTML -->

<h1>profil de <?= $pseudo ?></h1>


<div class ="profil">
    <p>Bonjour <?= $pseudo ?></p>

    <div class="profil_img">
        <img src="img/default.jpg">
    </div>

    <div class="profil_infos">
        <ul>
            <li>Pseudo : <b><?= $pseudo ?></b></li>
            <li>Prénom : <b><?= $prenom ?></b></li>
            <li>Nom : <b><?= $nom ?></b></li>
            <li>Email : <b><?= $email ?></b></li>
        </ul>
    </div>
    <div class="profil_adresse">
        <ul>
            <li>Adresse : <b><?= $adresse ?></b></li>
            <li>Code Postal : <b><?= $code_postal ?></b></li>
            <li>Ville : <b><?= $ville ?></b></li>
        </ul>
    </div>
</div>

<div class="profil">
    <h2>details des commandes</h2>
    <p>Vous n'avez pas encore passé de commande! <br> Venez visitez <a href="boutique.php"><u>notre boutique</u></a></p>
</div>









<?php
require_once ('inc/footer.inc.php');
?>
