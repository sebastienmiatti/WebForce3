<?php
require('../inc/init.inc.php');

// redirection si USER n'est pas admin
if(!userAdmin()){
	header('location:' . RACINE_SITE . 'profil.php');
}

//Traitement pour enregistrer ou modifier un produit
if($_POST){
	debug($_POST);
	debug($_FILES);
	
	if(isset($_POST['photo_actuelle'])){
		$nom_photo = $_POST['photo_actuelle'];
	}
	// Si je suis dans le cadre d'une modification de produit, alors je prends le nom de sa photo et je stocke dans $nom_photo qui sera enregistré en BD	
	
	//...MAIS si une nouvelle photo est postée (je souhaite modifier la photo), alors on entre dans la condition ci-dessous, et $nom_photo prendra la valeur de la nouvelle photo.
	
	if(!empty($_FILES['photo']['name'])){ //Si une image nous a été transmise
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
		// On crée un nouveau nom de photo, pour éviter les doublons sur notre serveur et dans la BDD.
		
		$chemin_photo = RACINE_SERVEUR . RACINE_SITE . 'photo/' . $nom_photo;
		//$chemin_photo est l'emplacement définitif de la photo depuis la racine du serveur et jusqu'à son nom
		
		// vérifications de l'extension du fichier :
		$ext = array('image/png', 'image/jpeg', 'image/gif');
		if(!in_array($_FILES['photo']['type'], $ext)){
			$msg .= '<div class="erreur">Veuillez choisir une photo au format : JPEG, JPG, PNG ou GIF</div>';
		}
		
		// Verification de la taille du fichier : 
		if($_FILES['photo']['size'] > 1000000){
			$msg .= '<div class="erreur">Veuillez choisir une photo de 1Mo maximum</div>';
		}
		
		
		if(empty($msg)){ // Tout est OK pas d'erreur dans le fichier image
			copy($_FILES['photo']['tmp_name'], $chemin_photo); // copie est une fonction qui nous permet de copier un fichier. 1er arg : l'emplacement de l'original, et 2eme l'emplacement de la copie (emplacement définitif)
		}
	} // fin du IF empty($_FILES etc...)
	
	// traitement pour insérer en BDD
	// Au préalable nous aurions vérifié l'intégrité des données (types des caractères, nbre de caractères, is_numeric , empty etc...)
	

	
	// INSERTION DES INFOS DANS LA BDD :
	
	if(isset($_GET['id'])){ // Si je suis dans le cadre d'une modif
		// requête REPLACE :
		$resultat = $pdo -> prepare("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
		
		// requête update :
		//$resultat = $pdo -> prepare("UPDATE produit SET  reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, public = :public, photo = :photo, prix= :prix, stock=:stock WHERE id_produit = :id_produit");
	
		$resultat -> bindParam(':id_produit', $_POST['id_produit'], PDO::PARAM_INT);
	}
	else{// ou alors je suis dans le cadre d'un ajout
		$resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
	}
	
	//STR
	$resultat  -> bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
	$resultat  -> bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
	$resultat  -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
	$resultat  -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);
	$resultat  -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
	$resultat  -> bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
	$resultat  -> bindParam(':public', $_POST['public'], PDO::PARAM_STR);
	// Attention : ':photo' ========> $nom_photo
	$resultat  -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);
	$resultat  -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR); // Certes 'prix' est un double, mais BindParam() n'existe pas pour les double, donc STR.
	
	//INT
	$resultat  -> bindParam(':stock', $_POST['stock'], PDO::PARAM_INT);
	
	if($resultat -> execute()){ 
		$id_insere = $pdo -> lastInsertId();
		header('location:gestion_boutique.php?message=validation&id=' . $id_insere);
		
		
	}
	else{
		$msg .= '<div class="erreur">Erreur dans la requête !! </div>';
	}
}// fin du if($_POST)
	


// traitement pour récupérer les infos du produit à modifier : 

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) ){ // Si j'ai un id, non vide et bien une valeur numérique... o récupère les infos du produit dans la BDD (SELECT)
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = :id");
	$resultat -> bindValue(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){
		$produit_actuel = $resultat -> fetch(PDO::FETCH_ASSOC);
		debug($produit_actuel);
	}
}


$reference = (isset($produit_actuel)) ? $produit_actuel['reference'] : '';
//revient à faire :
// if(isset($produit_actuel)){
	// $reference = $rpoduit_actuel['reference'];
// }
// else{
	// $reference = '';
// }
$categorie = (isset($produit_actuel)) ? $produit_actuel['categorie'] : '';
$titre = (isset($produit_actuel)) ? $produit_actuel['titre'] : '';
$description = (isset($produit_actuel)) ? $produit_actuel['description'] : '';
$couleur = (isset($produit_actuel)) ? $produit_actuel['couleur'] : '';
$taille = (isset($produit_actuel)) ? $produit_actuel['taille'] : '';
$public = (isset($produit_actuel)) ? $produit_actuel['public'] : '';
$photo = (isset($produit_actuel)) ? $produit_actuel['photo'] : '';
$prix = (isset($produit_actuel)) ? $produit_actuel['prix'] : '';
$stock = (isset($produit_actuel)) ? $produit_actuel['stock'] : '';

$id_produit = (isset($produit_actuel)) ? $produit_actuel['id_produit'] : '';
$action = (isset($produit_actuel)) ? 'Modifier' : 'Ajouter';



require('../inc/header.inc.php');
?>
<h1><?= $action ?> un produit</h1>
<?= $msg ?>
<form action="" method="post" enctype="multipart/form-data">
<!-- L'attribut enctype est obligatoire lorsqu'on propose un champs file dans le formulaire -->
	
	
	<input type="hidden" name="id_produit" value="<?= $id_produit ?>" />
	
	<label>Référence :</label>
	<input type="text" name="reference" value="<?= $reference ?>" />

	<label>Catégorie :</label>
	<input type="text" name="categorie" value="<?= $categorie ?>" />
	
	<label>Titre :</label>
	<input type="text" name="titre" value="<?= $titre ?>"/>
	
	<label>Description :</label>
	<textarea name="description"><?= $description ?></textarea>

	<label>Couleur :</label>
	<input type="text" name="couleur" value="<?= $couleur ?>"/>
	
	<label>Taille :</label>
	<input type="text" name="taille" value="<?= $taille ?>"/>
	
	<label>Public :</label>
	<select name="public">
		<option <?= ($public == 'm') ? 'selected' : '' ?> value="m">Homme</option>
		<option <?= ($public == 'f') ? 'selected' : '' ?> value="f">Femme</option>
		<option <?= ($public == 'mixte') ? 'selected' : '' ?> value="mixte">Mixte</option>
	</select>
	
	<?php if(isset($produit_actuel)) :?>
		<input type="hidden" name="photo_actuelle" value="<?= $photo ?>"/>
		<img src="<?= RACINE_SITE . 'photo/' . $photo ?>" width="150"/><br/><br/>
	<?php endif; ?>
	
	<label>Photo :</label>
	<input type="file" name="photo" />
	
	<label>Prix :</label>
	<input type="text" name="prix" value="<?= $prix ?>"/>
	
	<label>Stock :</label>
	<input type="text" name="stock" value="<?= $stock ?>"/>
	
	<input type="submit" value="<?= $action ?>" />

</form>
<?php
require('../inc/footer.inc.php');
?>