<?php

session_start(); // session_start() est fonction qui va cr�er un fichier de session. S'il existe d�j�, elle va simplement l'ouvrir. 

$_SESSION['pseudo'] = 'Yakine'; 

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';

$_SESSION['email'] = 'yakine.hamida@evogue.fr';


unset($_SESSION['email']); // Vide une partie de la session ! 

echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';


session_destroy(); // Supprimer le fichier de session !! Le code est ex�cuter la fin du script !! 



