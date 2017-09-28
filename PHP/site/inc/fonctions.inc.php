<?php
    // Fonction pour afficher les debugs
function debug($tab){
    echo '<div style="color:white; padding:20px; font-weight:bold; background: #' . rand(111111,999999) . '">';

    $trace = debug_backtrace(); // retourne les infos sur l'emplacement où est exécuté une fonction.
    echo ' Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' a la ligne : ' . $trace[0]['line'] . '</hr>';

    echo '<pre>';
    print_r($tab);
    echo '</pre>';

    echo '</div>';
}


    //Fonction pour voir si l'utilisateur est connecté:

function userConnecte(){
    if(isset($_SESSION['membre'])){
        return TRUE;
    }else{
        return FALSE;
    }
}
    // Cette fonction retourne TRUE si l'utilisateur est connecté et false, s'il ne l'est pas.
    //fonction pour voir si l'utilisateur est admin :
function userAdmin(){
    if(userConnecte() && $_SESSION['membre'][statut] == 1){
        return TRUE;
    }else{
        return FALSE;
    }
}
// Si l'utilisateur est connecté.. et en plus si son statut c'est 1 alors il a les droits d'admin et pourra accéder au backoffice.




?>
