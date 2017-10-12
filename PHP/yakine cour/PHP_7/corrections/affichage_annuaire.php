<?php

$pdo = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

// Objectif: Afficher tous les utilisateurs/Membres dans un tableau HTML.

// Pour cela : Une requete "SELECT * FROM annuaire"

$resultat = $pdo -> query("SELECT * FROM annuaire");
// $resultat = OBJ PDOStatement, inexploitable

echo 'Nombre de personne enregistrée(s) dans l\'annuaire : ' . $resultat -> rowCount();

echo '<table border="10" color="red">';

while($enregistrement = $resultat -> fetch(PDO::FETCH_ASSOC)){
	echo '<tr>';
	// Pour chaque enregistrement ici je vais récupérer un array. Qui dit array, si je veux récupérer toutes les infos : foreach !
	foreach($enregistrement as $valeur){
		echo '<td>' . $valeur . '</td>';
	}
	echo '</tr>';
}

echo '</table>';

echo '<a href="formulaire.php">Ajoute une nouvelle personne</a>';
