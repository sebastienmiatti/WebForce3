<?php

class Employes
{
 public $prenom;
 public $nom;
 public $salaire;
 public $contrat;

    public function recevoirVirement()
    {

    }
}

class Etudiant
{
    public $prenom;
    public $nom;
    public $cursus;
    public $planning;
    public $numeroEtudiant;
}

class Professeur extends Employes{}
class Technicien extends Employes{}
class Cadre extends Employes{}

class Eramus extends Etudiant{}
class Boursier extends Etudiant{}
class apprenti extends Etudiant{}

class Interne extends Etudiant // instance sans héritage recupération de  la totalité des 2 class pour l'Interne
{
    public $employes; // Contient un objet de la class Employes
    function __construct(){
        $this -> employes = new Employes();
        // Instance sans héritage : Je suis dans la classe Interne, qui aura accès à toutes les propriétés de Etudiant (héritage), mais également à toutes les propriétés de Employes via la propriété $employes qui contient un objet (une instance) de la class Employes.
    }
}

$interne = new Interne();
$interne -> employes -> recevoirVirement();
// (objet de la class employes)-> recevoirVirement();
echo $interne -> prenom;

 ?>
