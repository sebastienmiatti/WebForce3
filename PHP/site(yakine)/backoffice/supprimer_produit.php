<?php
require('../inc/init.inc.php');

// redirection si USER n'est pa admin
if(!userAdmin()){
	header('location:' . RACINE_SITE . 'profil.php');
}

// Traitement pour supprimer un produit : 

// recupérer le nom de l'image (SELECT) 
if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){ // Est-ce qu'on récupère un id dans l'url ? Et est-ce qu'il n'est pas vide, et est-ce que c'est bien un chiffre ? 
	
	$resultat = $pdo -> prepare("SELECT photo, id_produit FROM produit WHERE id_produit = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute(); 
	
	if($resultat -> rowCount() > 0){ // OK le produit existe bien !
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
	
		// supprimer l'image du serveur (unlink())	
		$chemin_photo_a_supprimer = RACINE_SERVEUR . RACINE_SITE . 'photo/' . $produit['photo'];
		// Je reconstitue le chemin absolu de la photo à supprimer
		
		if(file_exists($chemin_photo_a_supprimer)){
			unlink($chemin_photo_a_supprimer); // unlink() permet de supprimer un fichier de notre serveur.
		}
		
		// requete delete grâce à l'id dans l'URL 
		$resultat = $pdo -> exec("DELETE FROM produit WHERE id_produit = $produit[id_produit]");
		
		if($resultat !== FALSE){
			header('location:gestion_boutique.php');
		}	
	}
	else{
		header('location:gestion_boutique.php');
	}
}
else{
	header('location:gestion_boutique.php');
}












?>