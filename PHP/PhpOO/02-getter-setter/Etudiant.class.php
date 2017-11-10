<?php
class Etudiant
{
  private $prenom; // on peux s'en servir seulement dans la class
  public function __construct($arg) // methode magique d'instaciation d'objet(pour la création d'objet).//!\\
  {
    echo 'Instanciation, nous avons recu l\'argument suivant : ' . $arg;
    $this->setPrenom($arg);
  }

  public function setPrenom($arg)
  {
    $this->prenom = $arg;
  }
  public function getPrenom()
  {
    return $this->prenom;
  }
}
// setter donne la valeur et le getter va chercher
$etudiant = new Etudiant('Marc');
var_dump($etudiant);
echo '<br>';

$etudiant->setPrenom('Nicolas');
var_dump($etudiant);
echo '<br>';
