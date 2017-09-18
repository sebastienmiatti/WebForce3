<?php


// $_GET représente les paramètres l'URL. Il s'agit d'une superglobale, elle doit obligatoirement etre écrite en majuscule et l'underscore est important.
// comme toutes les superglobales, $_GET fait partie du langage et est un tableau de donnée ARRAY.

if(!empty($_GET)){// si il y a bien des informations dans $_GET alors je peux faire des traitements:
echo'<pre>';
print_r($_GET);
echo '</pre>';

echo 'Parametre 1 : '. $_GET['article'] . '<br>';
echo 'Parametre 2 : '. $_GET['couleur'] . '<br>';
echo 'Parametre 3 : '. $_GET['prix'] . '€<br>';
}

/*
? article=jean  &  couleur=bleu  &  prix=10
  clé=valeur    &  clé=valeur    &  clé=valeur


?>

<h1>page 2</h1>
<a href="page1.php">Retour vers la page 1</a>
