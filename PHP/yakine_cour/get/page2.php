<?php 

// $_GET représente les paramètres dans l'URL. Il s'agit d'une superglobale, elle doit OBLIGATOIREMENT être écrite en MAJ, et l'_' est important. 
// Comme toutes les superglobales, $_GET fait partie du langage et est un tableau de données ARRAY. 

if(!empty($_GET)){ // S'il y a bien des informations dans $_GET alors je peux faire des traitements: 
	
	echo '<pre>'; 
	print_r($_GET);
	echo '</pre>'; 

	echo 'Parametre 1 : '. $_GET['article'] . '<br/>'; 
	echo 'Parametre 2 : '. $_GET['couleur'] . '<br/>'; 
	echo 'Parametre 3 : '. $_GET['prix'] . '€<br/>'; 
}

/*
?   article=jean    &    couleur=bleu    &     prix=10
?	clé=valeur      &    clé=valeur      &     clé=valeur

*/



?>
<h1>Page 2</h1>
<a href="page1.php">Retour vers Page1</a>