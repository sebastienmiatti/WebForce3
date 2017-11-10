<?php
class panier // class est un modèle dans lequel on va mettre du code qui sera instancié.
{
  public $nbProduits;   // une propriété

  public Function ajouterArticle()   // une méthode
  {
    return 'l\'article a été ajouté';
  }

  public function retirerArticle()
  {
    return 'l\'article a été retiré';
  }

  public function affichageArticle()
  {
    return 'Voici les articles';
  }

}

$panier1 = new Panier; // j'instancie un objet $panier1 depuis la classe Panier.
$panier1->nbProduits = 5; // j'attribue 5 à la propriété nbProduits de l'objet panier1.
var_dump($panier1);

echo $panier1->affichageArticle(); //J'appelle la méthode affichageArticle() depuis $panier1.
echo '<br>';
$panier2 = new Panier;
$panier2->nbProduits = 7;
var_dump($panier2);







 ?>
