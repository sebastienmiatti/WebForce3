<?php

//$_POST représente les informations postées via un formulaire (method='post'). C'est une superglobale, et comme toutes les supergobales, c'est un tableau de données ARRAY. 
// Attention chaque champs doit avoir un attribut name qui permet de créer l'indice dans notre ARRAY $_POST

echo '<pre>'; 
print_r($_POST);
echo '</pre>'; 


?>
<h1>Formulaire 1</h1>
<form method="post" action=""> 
	<label>Prénom : </label></br>
	<input type="text" name="prenom" /><br/><br/>

	<label>Description : </label></br>
	<textarea rows="5" cols="22" name="description"></textarea><br/><br/>
	
	<input type="submit" value="Valider" /> 
	
</form>