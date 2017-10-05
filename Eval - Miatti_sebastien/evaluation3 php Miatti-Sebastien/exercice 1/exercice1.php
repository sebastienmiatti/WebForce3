<!DOCTYPE html>
	<html lang="fr">
	<head>
    	<meta charset="utf-8" />
    	<title>Tableau html simple</title>
	</head>
	<body>


<?php


$infoEtudiant = array( // Création d'un array avec indices choisis :
	"prenom" => 'Sebastien',
	"nom" => 'Miatti',
	"Adresse" => '11 allée Saint-exupéry',
	"Code postal" => 92390,
	"Ville" => 'Villeneuve-la-garenne',
	"email" => 'Sebastien.miatti@lepoles.com',
	"telephone" => '0783886292',
	"date de naissance" => '30/05/1990'
);

	echo '<pre>';
	print_r($infoEtudiant); // print_r pour vérifier  l'affichage de l'array
	echo '</pre>';



echo "<ul>";
foreach($infoEtudiant as $indice => $valeur){ // S'il y a deux variables ($indice => $valeur) dans les paramètres de la boucle foreach, le premier parcourt les indices et le second parcourt les valeurs.
	echo '<li>A l\'indice : ' . $indice . ' se trouve la valeur : ' . $valeur . '</li><br/>';
	}
echo "</ul>";

?>


</body>
</html>
