<?php
require('../inc/init.inc.php');

// redirection si USER n'est pas admin
if(!userAdmin()){
	header('location:' . RACINE_SITE . 'profil.php');
}

//Traitement pour enregistrer ou modifier un produit
if($_POST){
	
	// INSERTION DES INFOS DANS LA BDD :
	
	if(isset($_GET['id'])){ // Si je suis dans le cadre d'une modif
		// requête REPLACE :
		$resultat = $pdo -> prepare("REPLACE INTO membre (id_membre, pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:id_membre, :pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, :statut)");
	
		$resultat -> bindParam(':id_membre', $_POST['id_membre'], PDO::PARAM_INT);
	}
	else{// ou alors je suis dans le cadre d'un ajout
		$resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, :statut)");
	}
	
	//STR
	$resultat  -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	$resultat  -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
	$resultat  -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
	$resultat  -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
	$resultat  -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$resultat  -> bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);
	$resultat  -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
	$resultat  -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
	
	//INT
	$resultat  -> bindParam(':statut', $_POST['statut'], PDO::PARAM_INT);
	$resultat  -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);
	
	if($resultat -> execute()){ 
		$id_insere = $pdo -> lastInsertId();
		header('location:gestion_membres.php');
		
	}
	else{
		$msg .= '<div class="erreur">Erreur dans la requête !! </div>';
	}
}// fin du if($_POST)
	


// traitement pour récupérer les infos du produit à modifier : 

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']) ){ // Si j'ai un id, non vide et bien une valeur numérique... o récupère les infos du produit dans la BDD (SELECT)
	$resultat = $pdo -> prepare("SELECT * FROM membre WHERE id_membre = :id");
	$resultat -> bindValue(':id', $_GET['id'], PDO::PARAM_INT);
	$resultat -> execute();
	
	if($resultat -> rowCount() > 0){
		$membre_actuel = $resultat -> fetch(PDO::FETCH_ASSOC);
	}
}


$id_membre = (isset($membre_actuel)) ? $membre_actuel['id_membre'] : '';
$pseudo = (isset($membre_actuel)) ? $membre_actuel['pseudo'] : '';
$mdp = (isset($membre_actuel)) ? $membre_actuel['mdp'] : '';
$nom = (isset($membre_actuel)) ? $membre_actuel['nom'] : '';
$prenom = (isset($membre_actuel)) ? $membre_actuel['prenom'] : '';
$email = (isset($membre_actuel)) ? $membre_actuel['email'] : '';
$civilite = (isset($membre_actuel)) ? $membre_actuel['civilite'] : '';
$ville = (isset($membre_actuel)) ? $membre_actuel['ville'] : '';
$code_postal = (isset($membre_actuel)) ? $membre_actuel['code_postal'] : '';
$adresse = (isset($membre_actuel)) ? $membre_actuel['adresse'] : '';
$statut = (isset($membre_actuel)) ? $membre_actuel['statut'] : '';

$action = (isset($membre_actuel)) ? 'Modifier' : 'statut';



require('../inc/header.inc.php');
?>
<h1><?= $action ?> un membre</h1>
<?= $msg ?>
<form action="" method="post">
<!-- L'attribut enctype est obligatoire lorsqu'on propose un champs file dans le formulaire -->
	
	
	<input type="hidden" name="id_membre" value="<?= $id_membre ?>" />
	
	<label>Pseudo :</label>
	<input type="text" name="pseudo" value="<?= $pseudo ?>" />

	<input type="hidden" name="mdp" value="<?= $mdp ?>" />
	
	<label>Nom :</label>
	<input type="text" name="nom" value="<?= $nom ?>"/>
	
	<label>Prénom :</label>
	<textarea name="prenom"><?= $prenom ?></textarea>

	<label>Email :</label>
	<input type="text" name="email" value="<?= $email ?>"/>
	
	<label>Public :</label>
	<select name="civilite">
		<option <?= ($civilite == 'm') ? 'selected' : '' ?> value="m">Homme</option>
		<option <?= ($civilite == 'f') ? 'selected' : '' ?> value="f">Femme</option>
	</select>
	
	<label>Ville :</label>
	<input type="text" name="ville" value="<?= $ville ?>"/>
	
	<label>Code Postal :</label>
	<input type="text" name="code_postal" value="<?= $code_postal ?>"/>
	
	<label>adresse :</label>
	<input type="text" name="adresse" value="<?= $adresse ?>"/>
	
	<label>Statut :</label>
	<select name="statut">
		<option <?= ($statut == '0') ? 'selected' : '' ?> value="0">Membre</option>
		<option <?= ($statut == '1') ? 'selected' : '' ?> value="1">Admin</option>
	</select>
	
	<input type="submit" value="<?= $action ?>" />

</form>
<?php
require('../inc/footer.inc.php');
?>