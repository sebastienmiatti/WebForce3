<?php
function userConnecte(){
    if(isset($_SESSION['t_utilisateurs'])){
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function userAdmin(){
    if (userConnecte() && ($_SESSION['t_utilisateurs']['id_utilisateur'] == 1)) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
