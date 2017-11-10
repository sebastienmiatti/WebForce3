<?php
require_once('inc/init.inc.php'); 

// Traitement pour rediriger l'utilisateur s'il n'est pas connecté
if(!userConnecte()){
	header('location:connexion.php');
}

extract($_SESSION['membre']);


$page = 'Profil';
require('inc/header.inc.php');
?>
<!-- CONTENU HTML -->
<h1>Profil de <?= $pseudo ?> </h1>
<div class="profil">
	<p>Bonjour <?= $pseudo ?> !!</p><br/>
	
	<div class="profil_img"> 
		<img src="img/default.png" />
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
	<h2>Détails des commandes</h2>
	<p>Vous n'avez pas encore passé de commande !<br/>Venez visiter <a href="boutique.php"><u>notre boutique</u></a></p>
</div>










<?php
require_once('inc/footer.inc.php');
?>



