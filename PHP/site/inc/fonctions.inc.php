<?php
    // Fonction pour afficher les debugs
function debug($tab){
    echo '<div style="color:white; padding:20px; font-weight:bold; background: #' . rand(111111,999999) . '">';

    $trace = debug_backtrace(); // retourne les infos sur l'emplacement où est exécuté une fonction.
    echo ' Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' a la ligne : ' . $trace[0]['line'] . '</hr>';

    echo '<pre>';
    print_r($tab);
    echo '</pre>';

    echo '</div>';
}


    //Fonction pour voir si l'utilisateur est connecté:

function userConnecte(){
    if(isset($_SESSION['membre'])){
        return TRUE;
    }else{
        return FALSE;
    }
}
    // Cette fonction retourne TRUE si l'utilisateur est connecté et false, s'il ne l'est pas.
    //fonction pour voir si l'utilisateur est admin :
function userAdmin(){
    if(userConnecte() && $_SESSION['membre'][statut] == 1){
        return TRUE;
    }else{
        return FALSE;
    }
}
// Si l'utilisateur est connecté.. et en plus si son statut c'est 1 alors il a les droits d'admin et pourra accéder au backoffice.


    // Fonction pour créé un panier
    function creationPanier(){
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier']['id_produit'] = array();
            $_SESSION['panier']['quantite'] = array();
            $_SESSION['panier']['prix'] = array();
            $_SESSION['panier']['titre'] = array();
            $_SESSION['panier']['photo'] = array();

        }
    }

    // Fonction pour ajouter un produit au panier
function ajouterProduit($id_produit, $quantite, $photo, $titre, $prix){
    creationPanier(); // si quelqu'un ajoute un produit au panier on créé un panier

    $position_pdt = array_search($id_produit, $_SESSION['panier']['id_produit']); // Array_search permet de chercher un élement dans un tableau. Contrairement a in_Array, qui nous retourne juste TRUE ou FALSE , array_search nous retourne sa position ou FALSE. Pratique !!!

    if($position_pdt !== FALSE){ // $position_pdt stock (0, 1, 2, 3 etc...) soit la position du produit... Cela signifie que le produit existe deja dans le panier.

        $_SESSION['panier']['quantite'][$position_pdt] += $quantite; // Donc si le produit existe deja on prend sa quantité (grâce a sa position) et on ajoute la nouvelle quantite a la quantité deja présente.

    }else{
        $_SESSION['panier']['id_produit'][] = $id_produit; // le crochet vide permet de stocker la valeur au prochain indice disponible...
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['photo'][] = $photo;
        $_SESSION['panier']['titre'][] = $titre;
        $_SESSION['panier']['prix'][] = $prix;
    }
}


// Fonction pour calculer le nombre de produit dans notre panier :
function quantitePanier(){
    $nbreProduit = 0;

    if(isset($_SESSION['panier'])){
        foreach($_SESSION['panier']['quantite'] as $quantite){

            $nbreProduit += $quantite;
        // On va ajouter progressivement dans nbreproduit la quantite commandée pour chaques produits dans le panier. Chaques tour de boucle ajoute a nbreProduit la quantité commandée.
        }
    }

    if($nbreProduit != 0){

        return $nbreProduit;
    }else{
        return false;
    }
}
// Cette fonction va nous permettre d'afficher dans le header, une petite pastille avec le nombre de produits que l'utilisateur a mis dans son panier.


//Fonction pour calculer le montant total d'un panier :
 function montantTotal(){
     $total = 0;
     if(!empty($_SESSION['panier']['id_produit'])){
         for($i = 0 ; $i < sizeof($_SESSION['panier']['id_produit']); $i++){
             $total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];

         }
     }
     if ($total != 0){
         return $total;
     }
 }

// fonction pour retirer un produit du panier, en n'oublions pas de ré-indexé tous les élements du panier.
    function retirerProduit($id){
        $position_pdt_a_supprimer = array_search($id, $_SESSION['panier']['id_produit']);
        // $position_pdt_a_supprimer, doit normalement stocker le numéro d'indice du produit que l'on va supprimer; Cet indice va me permettre de supprimer les élements dans les mini tableaux id_produit, prix, titre, photo, quantite...

        if($position_pdt_a_supprimer !== FALSE){
            array_splice($_SESSION['panier']['id_produit'], $position_pdt_a_supprimer, 1);
            array_splice($_SESSION['panier']['quantite'], $position_pdt_a_supprimer, 1);
            array_splice($_SESSION['panier']['prix'], $position_pdt_a_supprimer, 1);
            array_splice($_SESSION['panier']['photo'], $position_pdt_a_supprimer, 1);
            array_splice($_SESSION['panier']['titre'], $position_pdt_a_supprimer, 1);
        }
        // Array_splice() nous permet de supprimer un élément dans un ARRAY et de ré-indexer tous les autres éléments de maniere a ne pas avoir de discontinuité dans les indices numériques de notre ARRAY .
        // Le 3eme argument de array_splice() determine le nombre d'éléments a supprimer et le sens.
    }











?>
