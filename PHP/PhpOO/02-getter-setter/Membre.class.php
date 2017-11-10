<?php
// exercice : au vu de cette classe vous aller devoir écrire les setters et les getters pour cette class.

class Membre
{
  private $prenom;
  private $nom; // Déclaration des propriétés ( ou attributs)

  public function __construct($arg1, $arg2) // ce code est exécuté a chaques instanciation d'un objet
  {
    echo 'Instanciation, nous avons recu l\'argument suivant : ';
    $this->setPrenom($arg1);
    $this->setNom($arg2);
  }
// je créé le setter pour un attribut nom. Il pre,nd en argument la valeur qu'aura l'attribut nom.
  public function setPrenom($arg)
  {
    $this->prenom = $arg;
  }

  public function setNom($arg)
  {
    $this->prenom = $arg;
  }
 // Je crée le getter pour l'attribut nom. Il renvoie la valeur de l'attribut nom.
  public function getPrenom()
  {
    return $this->Nom;
  }

  public function getNom()
  {
    return $this->prenom;
  }

}

$membre = new Membre('prenom', 'nom');
var_dump($membre);
echo '<br>';

$membre->setPrenom('Nicolas');
var_dump($membre);
echo '<br>';


 ?>
