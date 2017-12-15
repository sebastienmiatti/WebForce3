<?php
$bdd = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '');



$resultat = $bdd -> query("SELECT * FROM employes");
//$resultat =  (OBJ PDOStatement) INEXPLOITABLE ! 

$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);


//-----------------
//-----------------

?>

<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
	</head>
	<body>
		<div id="container" style="width: 90%; margin: 5vh auto">
			<div class="row">
				

				
					<!-- Forme contractée : -->
					<?php foreach($employes as $valeur) : extract($valeur) ?>
					<!-- Début vignette produit  -->
					<div class="col-sm-6 col-lg-3 col-md-4">
						<div class="thumbnail">
							<img src="image1.jpg" alt="">
							<div class="caption">
								<h4 class="pull-right"><?= $id_employes ?></h4>
							<h4>
								<a href="fiche_employe.php?id=<?= $id_employes ?>">
								<?= $prenom ?> <?= $nom ?>
								</a>
							</h4>
								<ul>
									<li>Service : <?= $service ?></li>
									<li>Salaire : <?= $salaire ?>€</li>
									<li>Embauche : <?= $date_embauche ?></li>
								</ul>
							</div>
							<div class="ratings">
								<p class="pull-right">15 reviews</p>
								<p>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
								</p>
							</div>
						</div>
					</div>
					<!-- Fin vignette Produit  -->
					<?php endforeach; ?>
			</div>
		</div>
	</body>
</html>