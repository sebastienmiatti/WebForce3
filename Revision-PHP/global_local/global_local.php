<?php
function jourSemaine()
{
    $jourlocal = "lundi"; // variable locale.
    return $jour;  // demande de retour de résultat de la fonction
    echo "ALLOOOO";
}

echo jourSemaine();

$jourGlobal = jourSemaine();
echo $jourGlobal;


//------------------------------------------
$pays = "France";
function affichagePays()
{
    global $pays; // integre une variable global dans le local
    echo $pays; // il ne connait pas cette variable si global n'est pas ajouté avant.
}
affichagePays();
