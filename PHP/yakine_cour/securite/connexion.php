<?php
/*
Une injection SQL, permet de détourner le comportement initialement prévue d'une requête. 

-----------
Exemple 1 : 
	pseudo : juju'#
	mdp : 

	Rêquete : SELECT * FROM membre WHERE pseudo = 'juju'#' && mdp = ''

	Explications : Le dièse permet de mettre la suite de la requête en commentaire. Donc demande, le user dont le pseudo est JUJU. Le MDP n'a plus aucune importance. 
	
-----------
Exemple 2 :
	pseudo :
	mdp : ' OR id_membre = '2

	Rêquete : SELECT * FROM membre WHERE pseudo = '' && mdp = '' OR id_membre = '2'
	
	Explications : On demande le membre ayant un le pseudo vide et le MDP vide (n'existe pas) ou alors le membre dont l'id_membre est 2. 
	
	
-----------
Exemple 3 : 
	pseudo : 
	mdp : ' OR 1='1
	
	Rêquete : SELECT * FROM membre WHERE pseudo = '' && mdp = '' OR 1='1'
	
	Explications : On demande le membre ayant un le pseudo vide et le MDP vide (n'existe pas) ou alors 1=1 O_0
	

----------
Autre exemple faille xss :
	pseudo : <p style="color:red">test</p>
	mdp : 
*/
session_start(); // Création du fichier de session
$pdo = new PDO('mysql:host=localhost;dbname=securite', 'root', ''); // Connexion à la BDD


if(!empty($_POST)){
	
	echo 'Pseudo : ' . $_POST['pseudo'] . '<br/>';
	echo 'Mot de passe : ' . $_POST['mdp'] . '<hr/>';
	
	$_POST['pseudo'] = htmlentities(addslashes($_POST['pseudo']));
	$_POST['mdp'] = htmlentities(addslashes($_POST['mdp']));
	
	echo 'Après netoyage : <br/>';
	echo 'Pseudo : ' . $_POST['pseudo'] . '<br/>';
	echo 'Mot de passe : ' . $_POST['mdp'] . '<hr/>';
	
	
	$req = "SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' && mdp = '$_POST[mdp]'";
	echo $req . '<hr/>';
	
	$resultat = $pdo -> query($req);

	if($resultat -> rowCount() > 0){ // Signifie que mon utilisateur existe, que le MDP et PSEUDO correspondent. On peut le connecter !! 
		$membre = $resultat -> fetch(PDO::FETCH_ASSOC);
		
		foreach($membre as $indice => $valeur){ // Ce foreach permet d'enregistrer toutes les infos du membre en session. 
			$_SESSION[$indice] = $valeur;
		}

		echo '<div style="padding: 5px; background: green; color: white">';
		echo 'Félicitations, vous êtes connecté, voici vos infos de profil :';
		echo '<ul>';
		echo '	<li>Pseudo : ' . $membre['pseudo'] . '</li>'; 
		echo '	<li>Prénom : ' . $membre['prenom'] . '</li>'; 
		echo '	<li>Nom : ' . $membre['nom'] . '</li>'; 
		echo '	<li>Email : ' . $membre['email'] . '</li>'; 
		echo '</ul>';
		echo '</div>';
		
	}
	else{
		echo '<p style="background: red; color: white; padding:5px">Erreur d\'identifiants !</p>';
	}
}


?>

<html>
	<h1>Connexion </h1>
	<form method="post" action="">
		<input type="text" name="pseudo" placeholder="Votre pseudo" /><br/>
		<input type="text" name="mdp" placeholder="Votre Mot de passe" /><br/>
		<input type="submit" value="Connexion" />
	</form>
</html>