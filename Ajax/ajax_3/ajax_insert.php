<?php
require_once("init.inc.php");
//réaliser une requete d'insert permettant d'insérer un prénom dans la BDD via le formulaire HTML
$xh = $_POST['personne']; // ou faire un extract($_POST); et utiliser VALUES('$...');
$result = $pdo -> exec("INSERT INTO employes(prenom) VALUES('$xh')");
?>
