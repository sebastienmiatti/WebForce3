<?php

session_start(); // Si un fichier de session existe et est li� � notre navigateur via le cookie (PHPSESSID), alors il est ouvert, et les informations � l'interieur sont accessible via la superglobale $_SESSION.


echo '<pre>'; 
print_r($_SESSION);
echo '</pre>';
//Le print_r() affiche un array avec � l'indice pseudo la valeur Yakine. 

// Et pourtant cela a �t� d�clar� dans le fichier session1.php. 
//Session1.php et session2.php, n'ont rien � voir l'un et l'autre (pas d'inclusion de fichier), et pourtant, gr�ce au fichier de sessions (/tmp) session2.php a acc�s aux informations de session gr�ce � session_start(). 
