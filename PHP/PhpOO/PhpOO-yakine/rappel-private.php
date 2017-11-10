<?php

class membre
{
    //public $pseudo; // si on le change en private on va etre obligé de mettre getters setters.
    //public $prenom;
    //public $mdp;
    //public $email;
    private $pseudo;
    private $prenom;
    private $mdp;
    private $email;
}

//inscription----------------

//SETTERS
//public function setPseudo($pseudo){
//$this-> pseudo = $prenom;
//}

//Formulaire---------------------
$_POST['pseudo'] = 'TCHITCHI';
$_POST['mdp'] = '123456';
$_POST['prenom'] = 'Sebastien';
$_POST['email'] = 'toto@gmail.com';


// vérifications:
$membre = new Membre;
if($membre -> setPseudo = $_POST['Pseudo']){
    
}

// requete :

 ?>
