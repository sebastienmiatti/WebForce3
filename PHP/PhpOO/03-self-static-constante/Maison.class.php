<?php

class Maison
{
  public static $espaceTerrain = '500m²'; //propriété public et static
  public $couleur = 'blanc'; //propriété normale
  private static $nbPiece = 7; //propriété privée Et static (accès par un getter)
  const HAUTEUR ='10m'; // une CONSTANTE appartient toujours a la classe

  public static function getNbPiece() // getter d'une propriété static privée.
  {
    return self::$nbPiece; // self signifie" cette classe"  l'équivalent de this mais pour la class.
  }
}

echo 'espace terrain : ' . Maison::$espaceTerrain . '<br>'; // jaccede a une propriété de class non pas avec "->" mais avec "::"
$maison = new Maison;
echo 'couleur : ' . $maison->couleur . '<br>';
echo 'Nombre de pièces : ' . Maison::getNbPiece() . '<br>';
echo ' Hauteur : ' . Maison::HAUTEUR;


 ?>
