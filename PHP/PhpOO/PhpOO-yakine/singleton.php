<?php
// design pattern : // conception réfléchi, patron. = Modèle de conception : Le design pattern est la réponse trouvée par des developpeur pour répondre a une problématique rencontré par la communauté.

// Singleton: Est un design pattern qui répond a la question suivante : Comment créé une class qui soit instanciable UNE SEULE FOIS!!!!! Une classe pour laquelle il nepuisse exister un seul objet.

class Singleton
{
    private static $instance = NULL; // NULL >> objet de la class SINGLETON

    private function __construct(){} // en mettant le contructeur en private il devient impossible d'instancier cette classe comme on le fait habituellement.

    private function __clone(){} // En mettant la fonction clone en private, il devient impossible de cloner un objet de cette classe.

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Singleton;
        }
        return self::$instance;
    }
}

$singleton = Singleton::getInstance(); //$singleton contient le seule et unique objet de la class singleton.

//$a = new Singleton; //IMPOSSIBLE !! INSTANCIATION IMPOSSIBLE!!
