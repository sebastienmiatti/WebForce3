<?php
function userAdmin() {
    if(isset($_SESSION['connexion'])) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
