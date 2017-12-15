<?php


if(!empty($_POST)){
	
	
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	
	foreach($_POST as $indice => $valeur){
		echo ucfirst($indice) . ':  <strong>' . $valeur . '</strong><br/>';
	}
	
	echo '<hr/>';
	echo 'Nom  : <strong> ' . $_POST['nom'] . '</strong><br/>';
	echo 'Prénom : <strong> '. $_POST['prenom'] . '</strong><br/>';
	echo 'Adresse  : <strong> '. $_POST['adresse'] . '</strong><br/>';
	echo 'Ville  : <strong> '. $_POST['ville'] . '</strong><br/>';
	echo 'Code Psotal   <strong>: '. $_POST['cp'] . '</strong><br/>';
	echo 'Sexe  : <strong> '. $_POST['sexe'] . '</strong><br/>';
	echo 'Description  : <strong> '. $_POST['description'] . '</strong><br/>';
	
	
	
	
}



?>
<html>
	<form method="post" action="">
		<label>Nom : </label><br/>
		<input type="text" name="nom" /><br/><br/>
		<label>Prénom : </label><br/>
		<input type="text" name="prenom" /><br/><br/>	
		<label>Adresse : </label><br/>
		<input type="text" name="adresse" /><br/><br/>	
		<label>Ville : </label><br/>
		<input type="text" name="ville" /><br/><br/>	
		<label>Code Postal : </label><br/>
		<input type="text" name="cp" /><br/><br/>	
		<label>Sexe : </label><br/>
		<select name="sexe">
			<option>Homme</option>
			<option>Femme</option>
		</select><br/><br/>
		<label>Description : </label><br/>
		<textarea name="description"></textarea><br/><br/>
		<input type="submit" value="Envoi" />
	</form>
</html>