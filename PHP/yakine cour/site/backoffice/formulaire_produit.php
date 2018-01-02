<?php
require('../inc/init.inc.php');

// traitement pour ajouter un produit dans la boutique : 
if(!empty($_POST)){
	
	debug($_POST);
	debug($_FILES);
	
	// Renommer la photo / ref_time()_nom.ext
	// controls sur la photo
	// enregistrer la photo sur le serveur
	
	// Controls sur les infos du formulaire (pas vide, nbre de caractère etc...)
	// Requete pour insérer les infos dans la BDD. 
	// redirection sur gestion_boutique.php
	
	$nom_photo = 'default.jpg';
	
	if(isset($_POST['photo_actuelle'])){
		$nom_photo = $_POST['photo_actuelle'];
	}
	// Si je suis dans le cadre d'une modification de produit, on récupère le nom de l'ancienne photo... mais il se peut que l'utilisateur souhaite changer la photo, c'est le code ci-dessous qui prend le relais. 
	
	if(!empty($_FILES['photo']['name'])){ // Si une photo est uploadée
		
		$nom_photo = $_POST['reference'] . '_' . time() . '_' . $_FILES['photo']['name'];
		// Si la photo est nommée tshirt.jpg, on la renomme : XX21_1543234454_tshirt.jpg pour aviter les doublons possibles sur le serveur (cf les noms des photos sur facebook par exemple). 
		
		$chemin_photo = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . 'photo/' . $nom_photo;
		// chemin: c://xampp/htdocs   /PHP/site/   photo/   XX21_1543234454_tshirt.jpg
		
		$ext = array('image/png', 'image/jpeg', 'image/gif');
		if(!in_array($_FILES['photo']['type'], $ext)){
			$msg .= '<div class="erreur">Images autorisées : PNG, JPG, JPEG et GIF</div>';
			// Si le fichier uploadé ne correspond pas aux extensions autorisées (ici PNG, JPEG, JPG et GIF) alors on affiche un message d'erreur.
		}
		
		if($_FILES['photo']['size'] > 2000000){
			$msg .= '<div class="erreur">Images : 2Mo maximum autorisé</div>';
			// Si la photo uploadées est trop valumineuse (ici 2Mo max), alors on met un message d'erreur. 
			// Par defaut XAMPP autorise 2,5Mo. Voir dans php.ini, rechercher upload_max_filesize=2.5M
		}
		
		if(empty($msg) && $_FILES['photo']['error'] == 0){
			
			copy($_FILES['photo']['tmp_name'], $chemin_photo);
			// On enregistre la photo sur le serveur. Dans les fait, on la copier depuis son emplacement temporaire et on la colle dans son emplacement définitif. 
		}
	}// fin du if isset($_FILES['photo']['name'])
	
	
	// Insérer les infos du produit en BDD...
	// Au préalable nous aurions vérifier tous les champs (taille, caractères, no empty etc......)
	
	if(empty($msg)){
		
		
		
		if(isset($_POST['Modifier'])){
			$resultat = $pdo -> prepare("UPDATE produit set reference = :reference, categorie = :categorie, titre= :titre, description = :description, couleur= :couleur, taille = :taille, public = :public, photo = :photo, prix = :prix, stock = :stock WHERE id_produit = :id_produit");
			
			$resultat -> bindParam(':id_produit', $_POST['id_produit'], PDO::PARAM_INT);
			
		}
		else{
			$resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock ) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock )");
		}
		
		
		$resultat -> bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
		$resultat -> bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
		$resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
		$resultat -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);
		$resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
		$resultat -> bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
		$resultat -> bindParam(':public', $_POST['public'], PDO::PARAM_STR);

		$resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
		$resultat -> bindParam(':stock', $_POST['stock'], PDO::PARAM_INT);

		$resultat -> bindParam(':photo', $nom_photo , PDO::PARAM_STR);
	
		if($resultat -> execute()){
			
			$pdt_insert = (isset($_POST['Modifier'])) ? $_POST['id_produit'] : $pdo -> lastInsertId(); // Récupère l'ID du dernier enregistrement.
			header('location:gestion_boutique.php?msg=validation&id=' . $pdt_insert);
		}	
	} 
}// fin du if(!empty($_POST))


// traitement pour modifier un produit	
	// 1/ On récupère les infos du produit actuel (en cours de modification)
	// 2/ On insert les infos de ce produit dans le formulaire
	// 3/ Gestion de la photo : Si on modifie simplement un texte il faut renvoyer l'ancienne image. Si on modifie l'image il faut pouvoir récupérer la nouvelle image. 
	// 4/ Enregistrement des modifications
	

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
// Si j'ai un ID dans l'URL, non vide et de type INT, alors je suis dans le cadre de la modification d'un produit. 	
	
	$resultat = $pdo -> prepare("SELECT * FROM produit WHERE id_produit = ?");
	$resultat -> execute(array($_GET['id']));
	
	if($resultat -> rowCount() > 0){ //Signifie que le produit existe donc l'id passé en URL était conforme.
		$produit_actuel = $resultat -> fetch(PDO::FETCH_ASSOC);
		debug($produit_actuel);
	}
}
	
// Créons des variables pour chaque élément à insérer dans le formulaire : 
$reference = (isset($produit_actuel)) ? $produit_actuel['reference'] : '';	
// cela revient à faire : 
if(isset($produit_actuel)){
	$reference = $produit_actuel['reference'];
}
else{
	$reference = '';
}

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

$page = 'Gestion Boutique';
require('../inc/header.inc.php');
?>
<h1><?= $action ?> un produit</h1>

<form action="" method="post" enctype="multipart/form-data">
	
	<input type="hidden" name="id_produit" value="<?= $id_produit ?>"/>
	
	<label>Référence :</label>
	<input type="text" name="reference"  value="<?= $reference ?>" />

	<label>Catégorie :</label>
	<input type="text" name="categorie" value="<?= $categorie ?>"/>
	
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
	
	<?php if(isset($produit_actuel)) :  ?>
		<img src="<?= RACINE_SITE ?>photo/<?= $photo ?>" height="100px"/>
		<input type="hidden" name="photo_actuelle" value="<?= $photo ?>" />
	<?php endif; ?>
	
	<label>Photo :</label>
	<input type="file" name="photo"/>
	
	<label>Prix :</label>
	<input type="text" name="prix" value="<?= $prix ?>"/>
	
	<label>Stock :</label>
	<input type="text" name="stock" value="<?= $stock ?>"/>
	
	<input type="submit" name="<?= $action ?>" value="<?= $action ?>" />

</form>
<?php
require('../inc/footer.inc.php');
?>