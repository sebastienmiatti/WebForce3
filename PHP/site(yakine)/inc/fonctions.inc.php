<?php
// Fonction debug pour faire les print_r()
function debug($arg){
	echo '<div style="color:white; padding: 20px; font-weight: bold; background:#' . rand(111111, 999999) . '">';
	$trace = debug_backtrace(); // debug_backtrace() me retourne les infos sur l'emplacement où a été exécuter la fonction. Array multidimentionnel
	echo 'Le debug a été demandé dans le fichier : ' . $trace[0]['file'] . ' à la ligne : ' . $trace[0]['line'] . '<hr/>';
	
	echo '<pre>';
	print_r($arg);
	echo '</pre>';
	
	echo '</div>';
}

// Fonction pour savoir si l'utilisateur est connecté
function userConnecte(){
	if(isset($_SESSION['membre'])){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

// Fonction pour savoir si l'utilisateur est admin
function userAdmin(){
	if(userConnecte() && $_SESSION['membre']['statut'] == 1){
	   return TRUE;
	}
	else{
		return FALSE;
	}
}

// function qui nous permet de mettre un lien en sur-brillance quand on est sur la page (permet de mettre moins de PHP dans l'HTML de notre menu <nav>).
function active($arg){
	global $page;
	if($page == $arg){
		return 'class="active"';
	}
}

// Fonction pour créer le panier
function creationPanier(){
	if(!isset($_SESSION['panier'])){
		$_SESSION['panier'] = array();
		$_SESSION['panier']['id_produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['photo'] = array();
		$_SESSION['panier']['titre'] = array();
		$_SESSION['panier']['prix'] = array();
	}
	return true;
}

// fonction pour ajouter un produit dans le panier
function ajouterProduit($quantite, $id_produit, $photo, $prix, $titre){
	creationPanier();
	
	//nous vérifions d'abord que le produit n'est pas déjà dans le panier :
	$positionPdt = array_search($id_produit, $_SESSION['panier']['id_produit']); // array_search() nous permet de chercher une valeur dans un array. Si elle trouve une valeur elle nous retourne sa position dans l'array. 1er arg : la valeur à chercher. 2eme arg :l'array où on cherche. Si la fonction n'a pas trouvé la valeur dans l'array elle nous retourne FALSE. 
	
	if($positionPdt !== FALSE){ // Signifie que $positionPdt stocke un chiffre (0, 1, 2, 3 ...) et que donc le produit existe déjà dans le panier.
		$_SESSION['panier']['quantite'][$positionPdt] += $quantite; // J'ajoute donc la nouvelle quantité !
	}
	else{
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['id_produit'][] = $id_produit;
		$_SESSION['panier']['photo'][] = $photo;
		$_SESSION['panier']['prix'][] = $prix;
		$_SESSION['panier']['titre'][] = $titre;		
	}
}


// Fonction pour compter le nombre de produit(s) dans le panier
function quantitePanier(){
	
	$quantite = 0;
	if(isset($_SESSION['panier']) && !empty($_SESSION['panier']['quantite'])){
		for($i = 0; $i < count($_SESSION['panier']['quantite']); $i++){
			$quantite += $_SESSION['panier']['quantite'][$i];
		}
	}
	if($quantite != 0){
		return $quantite;
	}
}

// Fonction pour calculer le montant total d'un panier
function montantTotal(){
	$total = 0;
	
	if(isset($_SESSION['panier']) && !empty($_SESSION['panier']['prix']) ){	
		for($i=0; $i < count($_SESSION['panier']['prix']); $i++){
			
			$total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
		}		
	}
	
	if($total != 0){
		return $total;
	}
}


//Fonction pour retirer un produit du panier
function retirerProduit($id){
	$position_pdt_a_supprimer = array_search($id, $_SESSION['panier']['id_produit']);
	//Je cherche la position du produit à supprimer dans le mini-tableau id_produit de mon panier. De fait, je connaitrai l'indice des éléments à supprimer dans chaque mini-tableau. 
	//http://192.168.1.76:7070
	
	if($position_pdt_a_supprimer !== FALSE){
		array_splice($_SESSION['panier']['id_produit'], $position_pdt_a_supprimer, 1);
		
		array_splice($_SESSION['panier']['quantite'], $position_pdt_a_supprimer, 1);
		
		array_splice($_SESSION['panier']['titre'], $position_pdt_a_supprimer, 1);
		
		array_splice($_SESSION['panier']['photo'], $position_pdt_a_supprimer, 1);
		
		array_splice($_SESSION['panier']['prix'], $position_pdt_a_supprimer, 1);
		
		//Avec une boucle : 
		// foreach($_SESSION['panier'] as $indice => $valeur){
			// array_splice($valeur, $position_pdt_a_supprimer,1);
		// }
		
		//La fonction Array_splice() supprime des éléments d'un tableau et ré-indexe tout le tableau de manière à ce qu'il n'y ait pas d 'éléments vides à l'intérieur du tableau. 
	}
}









