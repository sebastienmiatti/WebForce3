<?php

//framework.dev/contact/create
//localhost

function dd($var)
{
    echo '<pre>';
    print_r($var);
    echo'</pre>';
}

// On inclu/require le controlller générale de l'application qui va interpréter l'URL, et lancer le bonc controller, et lancer la bonne méthode.
//C'est la fonction handlerequest qui va faire le trie de l'url et 

require('controller/controller.php');
$controller = new Controller;
$controller-> handleRequest();

 ?>
