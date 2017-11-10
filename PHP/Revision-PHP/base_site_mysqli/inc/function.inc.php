<?php
function executeRequete($req)
{
    global $mysqli;
    $resultat = $mysqli->query($req);
    if(!$resultat)
    {
        die("Erreur sur la requete sql. <br> Message : " . $mysqli->error . "<br>Code : " . $req);
    }
    return $resultat;
}

//jimmyadda@evogue.fr
//jimmyadda2@gmail.com

 ?>
