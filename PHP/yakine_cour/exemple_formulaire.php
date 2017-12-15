<?php


if(!empty($_POST)){ // est-ce que le formulaire a été activé. 
	
	if(empty($_POST['pseudo'])){
		echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un pseudo ! </p>';
	}
	else{	
		if(strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 25){
			echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un pseudo compris entre 3 et 25 caractères ! </p>';
		}	
	}
	
	
	
	if(empty($_POST['email'])){
		echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un email ! </p>';
	}
	else{ // Signifie que l'email n'est pas vide
		
		if(!strpos($_POST['email'], '@')){
			echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un email Valide ! </p>';
		}
	}
	
	
	
	
	
	
	if(empty($_POST['password'])){
		echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un mot de passe ! </p>';
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<form method="post" action="">
			<label>Pseudo : </label><br/>
			<input type="text" name="pseudo" /><br/><br/>
			
			<label>Email : </label><br/>
			<input type="text" name="email" /><br/><br/>
			
			<label>Password : </label><br/>
			<input type="password" name="password" /><br/><br/>
			
			<label>Date de naissance :</label><br/>
			
			<select>
				<?php
				for($i = 1; $i <= 31; $i++){
					echo '<option>' . substr('0'.$i, -2) . '</option>';
				}		
				?>
			</select>
			
			
			<select>
				<option>Janvier</option>
			</select>
			
			<select name="annee">
				<?php
					$i = date('Y') - 15;
					while($i >= 1900 ){
						echo '<option>' . $i . '</option>';
						$i --;	
					}
				?>
			</select><br/><br/>
			
			
			
			
			<input type="submit" value="Inscription" />
		</form>
	</body>
</html>