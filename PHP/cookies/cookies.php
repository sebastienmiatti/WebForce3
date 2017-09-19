<?php

if(isset($_GET['lang'])){ // cela signifie que l'utilisateur vient à l'instant de cliquer sur un des liens pour choisir une langue
$langue= $_GET['lang'];

}elseif(isset($_COOKIE['lang'])){ // cela signife que l'utilisateur était déjà venu, et j'avais déjà enregistré son choix dans un cookie.
    $langue = $_COOKIE['lang'];


}else{ // je n'ai ni cookie, ni get précisant la langue, il est possible que l'utilisateur vienne pour la première fois et que la langue par defaut lui convienne très bien.
    $langue = 'fr';
}

$an = 365 * 24 * 60 *60;

 setCookie('lang', $langue, time() + $an); // setCookie() nous permet de créer un cookie. La fonction attend 3 arguments :
 /*
1 : Le nom du cookie
2 : La valeur du cookie
3 : La date d'expiration (timestamp)
 */

switch($langue){
    case 'fr':
    echo 'Bonjour, bienvenu ! ';
    break;

    case 'es':
    echo 'Hola, bienvenido ! ';
    break;

    case 'en':
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
<html>
    <ul>
        <li><a href="?lang=fr">France</a></li>
        <li><a href="?lang=it">Italie</a></li>
        <li><a href="?lang=en">Angleterre</a></li>
        <li><a href="?lang=es">Espagne</a></li>
    </ul>
</html>
