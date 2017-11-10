<!Doctype html>
<html>
<head>
  <title>Mon Site - {{ title }} </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
</head>
<body>
  <header>
    <div class="conteneur">
      <span>
        <a href="index.php" title="Mon Site">MonSite.com</a>
      </span>
      <nav>
        <a href="#">Connexion</a>
        <a href="#">Inscription</a>
        <a href="#">Profil</a>
        <a href="#">Panier</a>
        <a href="#">Boutique</a>
      </nav>
    </div>
  </header>
  <section>
    <div class="conteneur">
<h1><?= $pdt -> getTitre() ?></h1>

<img src="/photo/<?= $pdt->getPhoto() ?>" width="250" />
<p>Détails du produit : </p>
<ul>
	<li>Référence : <b><?= $pdt -> getReference() ?></b></li>
	<li>Catégorie : <b><?= $pdt -> getCategorie() ?></b></li>
	<li>Couleur : <b><?= $pdt -> getCouleur() ?></b></li>
	<li>Taille : <b><?= $pdt -> getTaille() ?></b></li>
	<li>Public : <b><?= $pdt -> getPublic() ?></b></li>
	<li>Prix : <b style="color: red; font-size:20px"><?= $pdt -> getPrix() ?>€ TTC</b></li>
</ul>
<br/>
<p>Description du produit : <br/>
<em><?= $pdt -> getDescription() ?></em></p>

<fieldset>
	<legend>Acheter ce produit :</legend>

	<?php if($pdt -> getStock() > 0) : ?>
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

			</div>
			</section>
				<footer>
					<div class="conteneur">
					  <?= date('Y') ?> - Tous droits reservés.
					</div>
				</footer>
		</body>
</html>
