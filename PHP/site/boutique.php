<?php
require('inc/init.inc.php');

    // Pour rendre cette page dynamique :
        // 1/ On recupère toutes les catégories existantes dans la Boutique
        // 2/ On les Affiche dans le "mini-menu latéral"
        // 3/ On créer un lien pour chacune des catégories
        // 4/ On récupère les produits, soit en fonction de la catégorie dans l'URL soit tous les produits
        // 5/ On affiche les produits dynamiquement
        // 6/ On créer le lien pour chaque produit

	//traitement pour récupérer toutes les catégories:
		$resultat = $pdo -> query('SELECT DISTINCT categorie FROM produit');
		$categories = $resultat -> fetchAll(PDO::FETCH_ASSOC);
		debug($categories);
	//traitement pour récupérer tout les produits:
		if(isset($_GET['cat']) && !empty($_GET['cat']) && is_string($_GET['cat'])){
			// Soit une catégorie est demandée dans l'URL
			$resultat = $pdo -> prepare('SELECT * FROM produit WHERE categorie = :categorie');
			$resultat -> bindParam (':categorie', $_GET['cat'], PDO::PARAM_STR);
			$resultat -> execute();

			if($resultat -> rowCount() == 0){// Si la categorie retourne aucun produit, alors on change la requete!!:
				$resultat = $pdo -> query("SELECT * FROM produit");

			}

		}else{
			//Soit il n'y a pas de catégorie dans l'URL (ou catégorie non valide)
			$resultat = $pdo -> query("SELECT * FROM produit");
		}

// On sort forcément de cette condition avec $resultat qui est soit les résultats d'une requete ciblée par produit, soit tous les produits...
$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
debug($produits);


$page = 'Boutique';
require('inc/header.inc.php');
?>

</h1>Boutique</h1>



<div class="boutique-gauche">
	<ul>
		<?php for($i = 0; $i < count($categories); $i++) : ?>
		<li><a href="?cat=<?= $categories[$i]['categorie'] ?>"><?= $categories[$i]['categorie'] ?></a></li>

		<?php endfor; ?>
		<!-- la boucle ci-dessus parcourt tous les résultats de la requête SELECT DISTINCT CATEGORIE FROM PRODUIT. Le résultat un tableau multidimentionnel dans lequel a chaques indices(0,1,2 etc..) on recupère un array, avec la categorie a l'indice 'categorie'. Donc $categories[$i]['categorie'] nous affiche chaques catégorie  -->
	</ul>
</div>



<div class="boutique-droite">


	<?php foreach ($produits as $pdt) : ?>
		<!-- Debut vignette produit -->
	<div class="boutique-produit">
		<h3><?= $pdt['titre'] ?></h3>
		 <a href="fiche_produit.php?id=<?= $pdt['id_produit'] ?>"><img src= "<?= RACINE_SITE ?>photo/<?= $pdt['photo'] ?>" height="100"/></a>
		 <p style="font-weight: bold; font-size: 20px;"><?= $pdt['prix'] ?>€</p>
		 <p style="height: 40px"><?= substr($pdt['description'],0,40) ?>...</p>
		 <a href="fiche_produit.php?id=<?= $pdt['id_produit'] ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
		<!-- href="fiche_produit.php?id=id_du_produit" -->
	</div>
		<!-- Fin vignette produit -->
	<?php endforeach ?>

</div>



<?php

require('inc/footer.inc.php');

?>
