<?php

// if(!empty($_POST)){
//     echo '<pre>';
//     print_r($_POST);
//     echo '</pre>';
// }

if($_POST)
{
    if(strlen($_POST['pseudo']) == 0)
    {
        echo "Vous devez saisir un pseudo";
    }
    else
    {
        echo "pseudo : " . $_POST['pseudo'] . "<br>";
        echo "mail : " . $_POST['email'] . "<br>";
    }
    $f= fopen("liste.txt", "a");
    fwrite($f, $_POST['pseudo'] . "-");
    fwrite($f, $_POST['email'] . "\r\n");
    $f = fclose($f);
}

?>
