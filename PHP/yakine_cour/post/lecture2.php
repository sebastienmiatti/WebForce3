<?php

//dans le fichier formulaire4.php, nous avons vu comment enregistrer des données dans un fichier, ici nous allons voir comment les récupérer. 

$fichier = file('liste-2.txt'); // La fonction file() fait tout le travail, elle nous retourne toutes les infos de notre fichier sous forme d'array. Chaque ligne de notre fichier correspond à un indice dans l'array.

echo '<pre>'; 
print_r($fichier);
echo '</pre>';  


// Afficher : 

foreach($fichier as $indice => $valeur){
	
	//echo $valeur . '<br/>'; 
	
	
	$position = strpos($valeur, ';');
	
	$pseudo = substr($valeur, 0 , $position);
	$email = substr($valeur, $position+1);
	
	echo '<h5>Inscrit N°' . ($indice +1) . '</h5>';
	echo "Pseudo : " . $pseudo . '<br/>';
	echo "Email : " . $email . '<hr/>';
	
}



