<!-- 1 : Dans formulaire 3 : Créer un formulaire avec : 
	-> pseudo(input)
	-> Adresse email (input)
	-> submit
	
2 : Dans formulaire 4 : Récupérer les informations du formulaire 3 (action='formulaire4.php'), et les afficher avec un print_r.

3 : Vérifier que les champs ne soient pas vides. Si les champs sont vides mettre un message d'erreur dans $msg

-->

<h1>Formulaire 3</h1>
<form action="formulaire4.php" method="post">
	<label>Pseudo :<label><br/>
	<input type="text" name="pseudo" /><br/><br/>

	<label>Email :<label><br/>
	<input type="text" name="email" /><br/><br/>
	
	<input type="submit" value="Envoyer"/>
</form>









