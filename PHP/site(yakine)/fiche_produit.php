<?php

require_once('inc/init.inc.php');

// traitement pour récupérer les infos du produit
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id"); 
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){ // Le produit existe bien
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
		extract($produit);
		//debug($produit);
	}
	else{ // S'il n'y a pas de produit existant avec cette ID (user a modifié l'URL)
		header('location:boutique.php');
	}
}
else{ // Cela signifie soit : il n'y a pas d'id dans l'URL. L'id est vide. L'id n'est pas un chiffre : PROBLEME ! 
	header('location:boutique.php');
}


//Traitement pour ajouter le produit au panier
if($_POST && $_POST['quantite'] > 0 ){
	ajouterProduit($_POST['quantite'], $id_produit, $photo, $prix, $titre);
}

// debug($_SESSION);



// traitement pour récupérer les suggestions de produit : 

// ----- Produits des autres catégories : 
// $resultat = $pdo -> query("SELECT * FROM produit WHERE categorie != '$categorie' ORDER BY prix DESC LIMIT 0,6");

// ----- Produits de la même catégorie: 
$resultat = $pdo -> query("SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != $id_produit ORDER BY prix DESC LIMIT 0,6");

// peu importe la requête choisie, je fait un fetchAll pour récupérer dans un tableau multi les suggestions de produit
$suggestions = $resultat -> fetchAll(PDO::FETCH_ASSOC);




$page = 'Boutique';
require_once('inc/header.inc.php');
?>
<h1><?= $titre ?></h1>

<img src="photo/<?= $photo ?>" width="250" />
<p>Détails du produit : </p>
<ul>
	<li>Référence : <b><?= $reference ?></b></li>
	<li>Catégorie : <b><?= $categorie ?></b></li>
	<li>Couleur : <b><?= $couleur ?></b></li>
	<li>Taille : <b><?= $taille ?></b></li>
	<li>Public : <b><?php if($public == 'm'){echo 'Homme';}elseif($public == 'f'){echo 'Femme';}else{echo 'Homme et Femme';} ?></b></li>
	<li>Prix : <b style="color: red; font-size:20px"><?= $prix ?>€ TTC</b></li>
</ul>
<br/>
<p>Description du produit : <br/>
<em><?= $description ?></em></p>	

<fieldset>
	<legend>Acheter ce produit :</legend>
	<?php if($stock > 0) : ?>
	<form method="post" action="">
		<label>Quantité :</label>
		<select name="quantite">
			<?php for($i=1; $i <= $stock && $i <= 5; $i++) : ?>
			<option><?= $i ?></option>
			<?php endfor; ?>
		</select>
		<input type="submit" value="Ajouter au panier" />
	</form>
	<?php else : ?>
	<em style="color:red">Rupture de stock !</em>
	<?php  endif; ?>
</fieldset>


<div class="profil" style="overflow:hidden;">
	<h2>Suggestions de produits</h2>
	
	<!-- Dans le PHP faire une requête qui va récupérer des produits (limités à 5): 
		Soit des produits de la même catégorie (sauf celui qu'on est en train de visiter)
		
		Soit les produits des autres catégories
	-->
	
	<?php foreach($suggestions as $valeur) : ?>
	<!-- Debut vignette produit -->
	<div class="boutique-produit">
		<h3><?= $valeur['titre'] ?></h3>
		<a href="fiche_produit.php?id=<?= $valeur['id_produit'] ?>"><img src="photo/<?= $valeur['photo'] ?>" height="100"/></a>
		<p style="font-weight: bold; font-size: 20px;"><?= $valeur['prix'] ?>€</p>

		<p style="height: 40px"><?= substr($valeur['description'], 0, 40) ?>...</p>
		<a href="fiche_produit.php?id=<?= $valeur['id_produit'] ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
		<!-- href="fiche_produit.php?id=id_du_produit" -->
	</div>
	<!-- Fin vignette produit -->
	<?php endforeach; ?>
	
	
</div>



<?php
require_once('inc/footer.inc.php');
?>