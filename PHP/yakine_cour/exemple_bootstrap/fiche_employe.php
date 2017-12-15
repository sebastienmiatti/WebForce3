<?php
$bdd = new Mysqli('localhost', 'root', '', 'entreprise');


if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){

	$resultat = $bdd -> query("SELECT * FROM employes WHERE id_employes = $_GET[id]");
	// $resultat == OBJ Mysqli_result ===> INEXPLOITABLE !

	$employe = $resultat -> fetch_assoc();
	extract($employe);
}
else{
	header('location:index.php');
}


?>

<h1>Profil de <?= $prenom ?></h1>
<ul>
	<li>Prenom : <?= $prenom ?></li>
	<li>Nom : <?= $nom ?></li>
	<li>Service : <?= $service ?></li>
	<li>Sexe : <?= $sexe ?></li>
	<li>Salaire : <?= $salaire ?>€</li>
</ul>

<a href="index.php">Retour à l'accueil</a>