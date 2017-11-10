<?php

function inclusionAutomatique($nomDeLaClass)
{
    include_once($nomDeLaClass . '.class.php');
    echo ' On passe dans inclusion Automatique. <br>';
    echo ' require($nomDeLaClass.class.php);<br>'
}

spl_autoload_register('inclusionAutomatique');

// permet d'éxécuter une fonction lorsque l'interpreteur voit passer un "new" dans le code.
// Le nom a droite du "New" (nom de la class) est passé automatique en argument a cettte fonction

$a = new A;
$b = new B;
$c = new C;
$d = new D;




>
