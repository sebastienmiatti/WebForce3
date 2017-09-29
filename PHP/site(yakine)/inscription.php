<?php
require_once('inc/init.inc.php');

// Traitement pour la redirection si user est connecté
if(userConnecte()){
	header('location:profil.php');
}



// Traitement pour l'inscription
if($_POST){
	debug($_POST); 
	
	// verifications du pseudo : 
	$verif_caracteres = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo'] ); // preg_match() est une fonction qui nous permet de vérifier les caractères d'une CC. 1er arg : REGEX (expressions régulières), 2eme arg: la CC. Retourne TRUE ou FALSE. 
	
	if(!empty($_POST['pseudo'])){
		if($verif_caracteres){
			if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 20){ 
			$msg .= '<div class="erreur">Veuillez renseigner un pseudo compris entre 3 et 20 caractères.</div>';
			}
		}
		else{
			$msg .= '<div class="erreur">Pseudo : Caractères autorisés : a-z, A-Z, 0-9 et "-", "." et "_". </div>';
		}	
	}
	else{
		$msg .= '<div class="erreur">Veuillez renseigner un pseudo !</div>';
	}
	
	
	if(empty($msg)){ // Tout est OK, aucune erreur. 
		
		//Vérifier que le pseudo est disponible
		$resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
		$resultat -> execute();
		
		if($resultat -> rowCount() > 0){ // PB : Le pseudo existe déjà dans la BDD
			$msg .= '<div class="erreur">Ce pseudo <b>' . $_POST['pseudo'] . '</b> n\'est pas disponible. Veuillez choisir un autre pseudo.</div>';		
		}
		else{ // le pseudo est bien disponible. Notons que nous devrions également vérifier la disponibilité de l'email...
			//Insertion dans la BDD (requete prepare()).
			
			$resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, 0)");
						
			$resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
			$mdp = md5($_POST['mdp']);
			$resultat -> bindParam(':mdp', $mdp, PDO::PARAM_STR);
			$resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
			$resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
			$resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
			$resultat -> bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);	
			$resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);	
			$resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);

			//INT : 
			$resultat -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);
				
			if($resultat -> execute()){
				header('location:connexion.php');
			}	
			// On ne fait la redirection que si tout s'est bien passé !	
	
			
		}
	}
}

$page = 'Inscription';
require_once('inc/header.inc.php');
?>
<h1>Inscription</h1>
<?= $msg ?>
<form action="" method="post">
	<label>Pseudo : </label>
	
	<input type="text" name="pseudo" />
	
	<label>Mot de passe : </label>
	<input type="password" name="mdp" />
	
	<label>Nom : </label>
	<input type="text" name="nom" />
	
	<label>Prénom : </label>
	<input type="text" name="prenom" />
	
	<label>Email : </label>
	<input type="text" name="email" />
	
	<label>Civilité : </label>
	<select name="civilite">
		<option value="m">Homme</option>
		<option value="f">Femme</option>
	</select>
	
	<label>Ville : </label>
	<input type="text" name="ville" />
	
	<label>Code Postal : </label>
	<input type="text" name="code_postal" />
	
	<label>Adresse : </label>
	<input type="text" name="adresse" />
	
	
	<input type="submit" value="Inscription" />
</form>	

<?php
require_once('inc/footer.inc.php');
?>