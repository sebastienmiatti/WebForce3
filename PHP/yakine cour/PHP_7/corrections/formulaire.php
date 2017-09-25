<?php

$pdo = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

$msg = '';

if(!empty($_POST)){


	// Les vérifications du nom
	if(empty($_POST['nom'])){
		$msg .= '<p style="color: white; background: red; padding: 5px">Veuillez renseigner un nom</p>';
	}
	else{
		if(strlen($_POST['nom']) < 3  || strlen($_POST['nom']) > 30){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : votre nom doit comporter entre 3 et 30 caractères !</p>';
		}
	}

	// Les vérifications du prénom
	if(empty($_POST['prenom'])){
		$msg .= '<p style="color: white; background: red; padding: 5px">Veuillez renseigner un prénom</p>';
	}
	else{
		if(strlen($_POST['prenom']) < 3  || strlen($_POST['prenom']) > 30){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : votre prénom doit comporter entre 3 et 30 caractères !</p>';
		}
	}

	// Les vérifications du numéro de téléphone
	if(empty($_POST['telephone'])){
		$msg .= '<p style="color: white; background: red; padding: 5px">Veuillez renseigner votre numéro de téléphone</p>';
	}
	else{
		if(strlen($_POST['telephone']) > 10){
			$msg .= '<p style="color: white; background: red; padding: 5px">Attention : votre téléphone doit comporter jusqu\'à 10 caractères maximum.</p>';
		}
		else{
			if(!is_numeric($_POST['telephone'])){
				$msg .= '<p style="color: white; background: red; padding: 5px">Veuillez renseigner un numéro de téléphone valide !</p>';
			}
		}
	}

	// Les vérifications de la date de naissance (3 champs)

	if(
	empty($_POST['jour']) || strlen($_POST['jour'] != 2) || !is_numeric($_POST['jour']) || $_POST['jour'] > 0 || $_POST['jour'] <= 31
	|| empty($_POST['mois']) || strlen($_POST['mois'] != 2) || !is_numeric($_POST['mois'])
	|| empty($_POST['annee']) || strlen($_POST['annee'] != 4) || !is_numeric($_POST['annee'])
	){
		// Si on entre dans ce IF, probablement que l'utilisateur est un petit malin qui nous teste, nous pourrions fair une redirection !

	}






	// Après les 3 phases de vérifications (prénom, nom, téléphone), soit $msg est vide et tout est OK, soit il y a un message dans $msg, et le formulaire n'est valide (manque des infos ou erreurs dans certains champs).

	if(empty($msg)){ // Tout est OK !!

		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		// Traitement pour l'enregistrement dans la BDD
		// Il y a des données sensibles dans la future requête, car nous allons insérer toutes les infos transmises, par l'utilisateur. Il peut avoir tenté des injections SQL !!
		//Exec() : DELETE-REPLACE-INSERT-UPDATE
		//Query() : SELECT - SHOW
		//preapre() + execute() : DELETE-REPLACE-INSERT-UPDATE-SELECT - SHOW si données sensibles

		$resultat = $pdo -> prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description) VALUES (:nom, :prenom, :telephone, :profession, :ville, :codepostal, :adresse, :date_de_naissance, :sexe, :description) ");

		$resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
		$resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
		$resultat -> bindParam(':telephone', $_POST['telephone'], PDO::PARAM_INT);
		$resultat -> bindParam(':profession', $_POST['profession'], PDO::PARAM_STR);
		$resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
		$resultat -> bindParam(':codepostal', $_POST['codepostal'], PDO::PARAM_INT);
		$resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		// on recompose la date sous la forme '2017-09-25' attendue en SQL :
		$date = $_POST['annee'] . '-' . $_POST['mois'] . '-' . $_POST['jour'];

		$resultat -> bindParam(':date_de_naissance', $date,PDO::PARAM_STR);
		$resultat -> bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
		$resultat -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);

		// Attention à ne pas oublier d'exécuter la requête
		if($resultat -> execute()){ // Si la requête s'est bien passée !
			
			header('location:affichage_annuaire.php');

			//$msg .= '<p style="color: white; background: green; padding: 5px">Félicitations, vous êtes enregistré(e)</p>';
		}
	}
}




?>




<html>
	<form method="post" action="">
	<?= $msg ?>
		<fieldset>
			<legend>Informations</legend>
			<label for="nom">Nom *</label>
			<input type="text" id="nom" name="nom" value="<?php  if(isset($_POST['nom'])){echo $_POST['nom'];} ?>" /><br />

			<label for="prenom">Prénom *</label>
			<input type="text" id="prenom" name="prenom" value="<?php  if(isset($_POST['prenom'])){echo $_POST['prenom'];} ?>"/><br />

			<label for="telephone">Telephone *</label>
			<input type="text" id="telephone" name="telephone" maxlength="10" value="<?php  if(isset($_POST['telephone'])){echo $_POST['telephone'];} ?>" /><br />

			<label for="profession">Profession</label>
			<input type="text" id="profession" name="profession" value="<?php  if(isset($_POST['profession'])){echo $_POST['profession'];} ?>"/><br />

			<label for="ville">Ville</label>
			<input type="text" id="ville" name="ville" value="<?php  if(isset($_POST['ville'])){echo $_POST['ville'];} ?>"/><br />

			<label for="codepostal">Code Postal</label>
			<input type="text" id="codepostal" name="codepostal" maxlength="5" value="<?php  if(isset($_POST['codepostal'])){echo $_POST['codepostal'];} ?>"/><br />

			<label for="adresse">Adresse</label>

			<textarea id="adresse" name="adresse" cols="16"><?php  if(isset($_POST['adresse'])){echo $_POST['adresse'];} ?></textarea>

			<legend>Informations supplémentaires</legend>
			<label>Date de Naissance</label><br /><br />
			<label for="jour">Jour</label>
				<select id="jour" name="jour">
					<?php


					for($i = 1; $i <= 31; $i++){
							if($i == $_POST['jour']){
								$sel = 'selected';
							}
							else{
								$sel = '';
							}


							if($i <= 9){
								echo '<option '. $sel .' >0' .  $i . '</option>';
							}
							else{
								echo '<option '. $sel .' >' .  $i . '</option>';
							}
						}
					?>
				</select><br />
			<label for="mois">Mois</label>
			<select id="mois" name="mois">
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '01'){echo 'selected';}?> value="01">Janvier</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '02'){echo 'selected';}?> value="02">Février</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '03'){echo 'selected';}?> value="03">Mars</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '04'){echo 'selected';}?> value="04">Avril</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '05'){echo 'selected';}?> value="05">Mai</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '06'){echo 'selected';}?> value="06">Juin</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '07'){echo 'selected';}?> value="07">Juillet</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '08'){echo 'selected';}?> value="08">Aout</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '09'){echo 'selected';}?> value="09">Septembre</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '10'){echo 'selected';}?> value="10">Octobre</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '11'){echo 'selected';}?> value="11">Novembre</option>
				<option <?php if(isset($_POST['mois']) && $_POST['mois'] == '12'){echo 'selected';}?> value="12">Décembre</option>
			</select><br />
			<label for="annee">Annee</label>
			<select id="annee" name="annee">
				<?php for($i = date("Y"); $i >= 1930; $i--)
					{

						if($i == $_POST['annee']){
							$sel = 'selected';
						}
						else{
							$sel ='';
						}
						echo '<option ' . $sel .  ' >' .  $i . '</option>';



					}	?>
			</select><br /><br />
			<label for="sexe">Sexe</label><br />
			homme:<input type="radio" name="sexe" value="m" checked />
			femme: <input type="radio" name="sexe" value="f" <?php if(isset($_POST['sexe']) && $_POST['sexe'] == 'f'){echo 'checked';} ?>/><br /><br />


			<label for="description">Description</label>
			<textarea id="description" name="description" rows="7" cols="25"><?php  if(isset($_POST['description'])){echo $_POST['description'];} ?></textarea>
			<input type="submit" name="inscription" value="inscription"/>
		</fieldset>
	</form>
</html>

</html>
