<?php

session_start(); // si un fichier de session existe et est lié a notre navigateur via le cookie (PHPSESSID), alors il est ouvert, et les informations a l'intérieur sont accessible via la superglobale $_SESSION

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// le print_r()affiche un array avec à l'indice pseudo a la valeur Yakine.

// et pourtant cela a été déclaré dans le fichier session1.php.   session1.php et session2.php, n'ont rien à voir l'un et l'autre (pas d'inclusion de fichier) et pourtant, grâce au fichier de session (/tmp) session2.php a accès aux informations de session grâce à session_start().
