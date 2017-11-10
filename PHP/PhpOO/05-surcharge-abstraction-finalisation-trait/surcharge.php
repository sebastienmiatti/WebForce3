<?php
class A
{ // Déclaration de calcul() dans la class mère
  public function calcul()
  {
      return 10
  }
}

class B extends A
{
  public function calcul()
  {
    //parent:: permet d'accéder a la classe parente ( en l'occurence la class A) puis d'accéder à une méthode. En l'occurence calcul.
    //je stocke ensuite le résultat pour le réutiliser.
    $resultat = parent::calcul();
    return $resultat + 5;
  }
}
?>
