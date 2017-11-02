<?php


if(isset($_GET['pays'])){
    $pays = $_GET['pays']; // stocke dans une varible pour la manipulation
}elseif(isset($_COOKIE['pays']))
    {
        $langue = $_COOKIE['pays'];
    }
    else
        {
            $pays = 'fr'; // affiche $pays = 'fr' par defaut.
        }

    $an = 365 * 24 * 3600;
    setCookie('pays', $pays, time()+$an);
    //setCookie('le nom', la valeur, la date d'expiration);


switch($pays)
    {
        case 'fr':
        echo 'Bonjour, bienvenu ! ';
        break;

        case 'es':
        echo 'Hola, bienvenido ! ';
        break;

        case 'an':
        echo 'Hi,You\'re welcome! ';
        break;

        case 'it':
        echo 'buongiorno, benvenuto ! ';
        break;

        default:
        echo 'Veuillez choisir une langue dans la liste présente ! ';
        break;
    }

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Les cookies</title>
    </head>
    <body>
        <h1>Votre language : </h1>
        <ul>
            <li><a href="?pays=fr">France</a></li>
            <li><a href="?pays=an">Angleterre</a></li>
            <li><a href="?pays=es">Espagne</a></li>
            <li><a href="?pays=it">Italie</a></li>
        </ul>


    </body>
</html>

<!--correction de lexercice-->
