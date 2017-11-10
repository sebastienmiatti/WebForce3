<?php
/*
Créer une classe Vehicule
attribut : $litreEssence
Methodes : getter et setter pour $litreEssence

créer une class Pompe
attribut :  $litreEssence
Methodes : getter et setter pour $litreEssence et donnerEssence($vehicule), ainsi qu'une autre méthod.
 fait le plein de la voiture (ajoute 50 litres a son réservoir)
et soustrait autant de litres au réservoir de la pompe a essence.

Instancier un vehicule.
Instancier une pompe a essence
Donner 0 litres d'essence au véhicule.
donner 800 litres d'essence à la pompe.

Faire le plein de la voiture avec la pompe a essence
*/


 class Vehicule
 {
   // un attribut  $litreEssence qui représente combien de litre d'essence il y a dans le reservoir de la pompe.
   private $litreEssence;

   public function setLitreEssence($essence)
   {
    $this->litreEssence = $essence;
   }

   public function getLitreEssence()
   {
     return $this->litreEssence;
   }


}

class Pompe
{
  private $litreEssence;

  public function setLitreEssence ($essence)
  {
  $this->litreEssence = $essence;
  }

  public function getLitreEssence()
  {
  return $this->litreEssence;
  }

//Permet de faire le plein de la voiture
  public function donnerEssence(Vehicule $vehicule) // véhicule signifie que l'on doit passer un objet instancié de la classe véhicule.
  {
    $vehicule->setLitreEssence(50); // on fait le plein de la voiture en utilisant le setter pour litreEssence de la voiture.
    $this->setLitreEssence($this->getLitreEssence() - 50); // on retire 50 litres d'essence de la pompe
  }
}

$vehicule = new Vehicule;
$vehicule->setLitreEssence(0);

$pompe = new Pompe;
$pompe->setLitreEssence(800);

$pompe->donnerEssence($vehicule);
var_dump($vehicule);
var_dump($pompe);

 ?>
