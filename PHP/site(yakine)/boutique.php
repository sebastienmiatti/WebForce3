<?php

require('inc/init.inc.php');

//traitement pour récupérer toutes les catégories (distinctement)
$resultat = $pdo -> query("SELECT distinct categorie FROM produit");
$categories = $resultat -> fetchAll(PDO::FETCH_ASSOC); 
//debug($categories);

// on récupère un tableau multidimentionnel avec par exemple : 
//$categories[0]['categorie'] //t-shirt
//$categories[1]['categorie'] //chemise
//$categories[2]['categorie'] //pull


// traitement pour récupérer tous les produits
	// Si ya une catégorie dans l'URL : Requete sur la categorie
if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE categorie = :categorie");
	$resultat -> bindValue(':categorie', $_GET['categorie'], PDO::PARAM_STR);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){ // Si ma requête m'a trouvé au moins un produit...
		$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
	}
	else{
		// Aucun produit trouvé ! 
		// Cela peut signifie que le nom de la catégorie a été modifié directement dans l'URL (cas exeptionnel : entre l'arrivée sur la page boutique et le clic sur la catégorie, il n'y a plus aucun produit de cette catégorie). 
		// Soit on redirige vers boutique.php, soit vers une 404, ou alors on affiche tous les produits
		$resultat = $pdo -> query("SELECT * FROM produit");
		$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
	}
}//fin du if isset($_GET['categorie'])
else{
	$resultat = $pdo -> query("SELECT * FROM produit");
	$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
	// On est dans le else, il n'y a pas de parametre categorie dans l'URL... on affiche donc tous les produits.
}

// on sort de la condition avec forcément un tableau multidimentionnel dans $produits. Soit ciblés par catégorie (URL) soit tous les produits.	

// debug($produits);


$page = 'Boutique';
require('inc/header.inc.php');
?>
</h1>Boutique</h1>

<div class="boutique-gauche">
	<ul>
		<?php for($i=0; $i < sizeof($categories) ; $i++) : ?>
		<li><a href="?categorie=<?= $categories[$i]['categorie'] ?>"><?= $categories[$i]['categorie'] ?></a></li>
		
		<?php endfor; ?>
		
		<!-- même chose avec la boucle foreach : -->
		<?php /*foreach($categories as $valeur) : ?>
		<li><a href="?categorie=<?= $valeur['categorie'] ?>"><?= $valeur['categorie'] ?></a></li>
		
		<?php endforeach; */?>
	</ul>
</div>

<div class="boutique-droite">
	
	
	
	<?php foreach($produits as $valeur) : ?>
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
require('inc/footer.inc.php');
?>