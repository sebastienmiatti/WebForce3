<?php

// 1 : On va vérifier qu'il y a bien un id dans l'URL (no vide, numeric)
// 2 : On récupère les infos du produit
// 3 : On va vérifier que l'id correspond bien à un produit existant sinon redirection vers boutique
// 4 : On va afficher le infos du produit
// 5 : On gère le nbre de produits max à ajouter au panier
// 6 : On va faire le traitement pour ajouter le produit au panier
// 7 : Suggestions d'autres produits

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) ){

	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id_produit");
	$resultat -> bindParam(':id_produit', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();

	if($resultat -> rowCount() > 0){ // le produit existe bien !
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
		extract($produit);
		debug($produit);
	}
	else{ // le produit n'existe pas : REDIRECTION !
		header('location:boutique.php');
	}
}
else{ // Il n'y a pas d'ID dans l'url ou vide, ou pas numérique : REDIRECTION !
	header('location:boutique.php');
}


if(!empty($_POST)){
	ajouterProduit($id_produit, $_POST['quantite'], $photo, $titre, $prix);
	// Fonction codée dans le fichier fonctions.php

}

debug($_SESSION);


?>
<h1><?= $titre ?></h1>

<img src="photo/<?= $pdt -> getPhoto ?>" width="250" />
<p>Détails du produit : </p>
<ul>
	<li>Référence : <b><?= $pdt -> getReference ?></b></li>
	<li>Catégorie : <b><?= $pdt -> getCategorie ?></b></li>
	<li>Couleur : <b><?= $pdt -> getCouleur ?></b></li>
	<li>Taille : <b><?= $pdt -> getTaille ?></b></li>
	<li>Public : <b><?= $pdt -> getPublic ?></b></li>
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
			<?php for($i=1; $i <= 5 && $i <= $stock; $i++) : ?>
			<option><?= $i ?></option>
			<?php endfor; ?>
		</select>
		<input type="submit" value="Ajouter au panier" />
	</form>

	<?php else: ?>
	<i style="color:red">Rupture de stock !</i>
	<?php endif; ?>


</fieldset>


<div class="profil" style="overflow:hidden;">
	<h2>Suggestions de produits</h2>

	<!-- Dans le PHP faire une requête qui va récupérer des produits (limités à 5):
		Soit des produits de la même catégorie (sauf celui qu'on est en train de visiter)

		Soit les produits des autres catégories
	-->



</div>



<?php
require_once('inc/footer.inc.php');
?>
