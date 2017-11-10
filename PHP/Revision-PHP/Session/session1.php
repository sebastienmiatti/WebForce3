<?php
session_start();

$_SESSION["pseudo"] = "Jean";
$_SESSION["prenom"] = "Jean-paul";
$_SESSION["nom"] = "belmondo";

echo "<hr>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

unset($_SESSION['nom']);

echo "<hr>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<hr>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

 ?>
