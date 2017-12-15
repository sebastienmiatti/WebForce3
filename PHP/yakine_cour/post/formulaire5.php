<?php 

if(!empty($_POST)){
	
	// echo '<pre>'; 
	// print_r($_POST);
	// echo '</pre>';
	
	extract($_POST);
	
	// extract() fait ceci à notre place : 
	// $prenom = $_POST['prenom'];
	// $nom = $_POST['nom'];
	// $email = $_POST['email'];
	// $sujet = $_POST['sujet'];
	// $message = $_POST['message'];
	
	$header = "From: $email \r\n";
	$header .= "Reply-To: $email \r\n";
	$header .= "MIME-Version: 1.0 \r\n";
	$header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
	$header .= "X-Mailer: PHP/" . phpversion();
	
	
	// Mise en forme du mail : 
	$contenu = "<h1>$sujet</h1>";
	$contenu .= "<ul>";
	$contenu .= "<li>Prénom : $prenom</li>"; 
	$contenu .= "<li>Nom : $nom</li>"; 
	$contenu .= "<li>Email : $email</li>"; 
	$contenu .= "</ul><hr/>";
	$contenu .= "<p>$message</p>"; 
	
	
	$destinataire  = 'yakine.hamida@evogue.fr';
	
		
	
	mail($destinataire, $sujet, $contenu, $header ); // mail() nous permet d'envoyer un email, cette fonction attend 4 arguments : 
	
	/*
		1 : destinataire
		2 : Sujet
		3 : le contenu
		4 : l'en-tete (optionnelle)
	*/
	
}






?>
<h1>Formulaire de contact</h1>
<form method="post" action="">
	<label>Prénom : </label><br/>
	<input type="text" name="prenom" /><br/><br/>
	
	<label>Nom : </label><br/>
	<input type="text" name="nom" /><br/><br/>
	
	<label>Email : </label><br/>
	<input type="text" name="email" /><br/><br/>
	
	<label>Sujet : </label><br/>
	<select name="sujet">
		<option>Service client</option>
		<option>Problème technique</option>
		<option>Service presse</option>
		<option>Autre</option>
	</select><br/><br/>

	<label>Message : </label><br/>
	<textarea name="message" rows="5" cols="22"></textarea><br/><br/>
	
	<input type="submit" value="Envoyer" />
</form>