<?php
require_once('../inc/init.inc.php');
// pas besoin de design (header, footer, contenu) sur cette page, car elle a seulement vocation à nous faire un traitement puis à nous rediriger vers l'affiche de tous les produits. 


// On vérifie qu'il a bien un id dans l'URL et que c'est un chiffre
// On récupere les infos du produit
// On vérifie que le produit existe
// On supprime la photo si elle existe et que c'est pas default.jpg
// On supprime le produit de la BDD
// on redirige vers l'affichage des produits (gestion_produit.php). 

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id");
	$resultat -> bindParam(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute(); 
	
	if($resultat -> rowCount() > 0){ // signifie que le produit existe
		$produit = $resultat -> fetch(PDO::FETCH_ASSOC);
		debug($produit);
		
		// Supprimer la photo du serveur : 
		$chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . 'photo/' . $produit['photo'];
		// on recompose le chemin ABSOLUE du fichier que l'on va supprimer.
		
		if(file_exists($chemin_photo_a_supprimer) && $chemin_photo_a_supprimer != 'default.jpg'){
			unlink($chemin_photo_a_supprimer);
			// Unlink() permet de supprimer un fichier sur notre serveur. 
		}
		
		// supprimer le produit de la BDD : 
		
		$resultat = $pdo -> exec("DELETE FROM produit WHERE id_produit = $produit[id_produit]");
		
		if($resultat){
			header('location:gestion_boutique.php?msg=suppr&id=' . $produit['id_produit']);
		}
	} // fin du if $resultat -> rowCount()
}// fin du if(isset($_GET etc...








