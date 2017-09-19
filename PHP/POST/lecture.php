<?php
// dans le fichier formulaire4.php, nous avons vu comment enregistrer des données dans un fichier, ici nous allons voir comment les récupérer.

$fichier = file('liste.txt'); // la fonction file() fait tout le travail, elle nous retourne toutes les infos de notre fichier sous forme d'array. Chaque ligne de notre fichier correspond a un indice dans l'array.

echo '<pre>';
print_r($fichier);
echo '</pre>';

// Afficher :

foreach($fichier as $indice => $valeur){
    $position =  strpos($valeur, ' - ');
    $pseudo = substr($valeur, 0 , $position);
    $email =  substr($valeur, $position+3);

    echo '<h5>Inscrit N°' . ($indice+1) . '</h5>';
    echo 'pseudo : ' . $pseudo . '<br>';
    echo 'email : ' . $email . '<hr>';
}

 ?>
