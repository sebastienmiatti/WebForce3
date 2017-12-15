<?Php
/*
IL y a plusieurs manière d'effectuer des requêtes avec PDO. query(), exec(), prepare(), execute(). 
Dans ce fichier nous allons voir exec(), prepare() execute(). Query() a été vu dans le fichier pdo.php

Méthode exec() : 
----------------

En pratique, il est préférable de faire toutes les requêtes INSERT - DELETE - UPDATE - REPLACE (IDUR) avec exec(). 

valeurs de retour :
	- Succès : N (INT) : le nombre lignes affectées
	- Echec : False

---------------
Méthode prepare() puis execute() : 

La requete prepare() (on parle de requete préparée) peut être utilisée pour toutes requêtes (SELECT - SHOW - INSERT - DELETE - UPDATE - REPLACE)

On utilise la requete préparée lorsque l'on a des données sensibles à l'intérieur de notre requete (données sensibles : $_POST et $_GET). On prepare la requete puis on l'execute(). 

Valeur de retour : 
	prepare() : 
		- succes et echec : PDOStatement
	
	execute() : 
		- succes : TRUE
		- echec : FALSE
		
		
--------------		
$resultat = $pdo -> query("SELECT * FROM employes")		
---------------	
$resultat = $dpo -> query("SELECT * FROM employes WHERE prenom = 'jean-pierre'")		
---------------		
$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = '$_POST[prenom]'")
// traitements...
$resultat -> execute();
---------------
$resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, salaire) VALUES ('Yakine', 'Hamida', 1500)")
---------------
$resultat = $pdo -> prepare("INSERT INTO employes (prenom, nom, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', $_POST[salaire])")
// traitements..
$resultat -> execute();
---------------
*/

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));


try{

	// 0// Erreur volontaire de requete : 
	// $resultat = $pdo -> exec("cdqsdsdqsdqsdqsdqsd");
		
	// 1// INSERT avec exec()
	$resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, service, sexe, salaire, date_embauche) VALUES ('toto', 'tata', 'informatique', 'm', 1500, CURDATE())");
	
	echo 'Nombre de ligne affectée : ' . $resultat . '<br/>';
	echo 'Dernier enregistrement : ' . $pdo -> lastInsertId();
	
	
	// 2 // Prepare() + execute() + passage d'argument
	// 2.1 : Marqueur '?'
	
	$prenom = 'Amandine'; // données sensible
	
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? ");
	$resultat -> execute(array($prenom));
	
	$nom = 'Thoyer';
	
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND nom = ? ");
	$resultat -> execute(array($prenom, $nom));
	
	// Le marqueur '?', dit marqueur non nominatif, permet de transmettre les valeurs sensibles lors de l'éxécution d'une requête préparée. 
	// Attention la méthode execute() appartient à notre objet PDOStatement ($resultat) et non à l'objet PDO ($pdo)
	
	
	// 2.2 : Marqueur ':'
	$prenom = 'Amandine'; // données sensible
	$nom = 'Thoyer'; // données sensible
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom ");
	$resultat -> execute(array(
		'prenom' => $prenom, 
		'nom' => $nom
	));
	
	
	// 2.3 : Marqueur ':' + bindParam()
	$prenom = 'Amandine'; // données sensible
	$nom = 'Thoyer'; // données sensible
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom ");
	
	$resultat -> bindParam(':prenom', $prenom, PDO::PARAM_STR);
	$resultat -> bindParam(':nom', $nom, PDO::PARAM_STR);
	$resultat -> execute();
	
	//Le marquer ':' dit marqueur nominatif, donne un "nom" à chaque valeur sensible attendue. 
	// Avec ce marqueur ont peut soit renseigner la valeur dans un array de la méthode execute(), soit renseigner la valeur via bindParam(). L'avantage de bindParam() est qu'il caste la valeur en dernier rempart. 
	
	
}
catch(PDOException $e){
	
	echo '<div style="padding:10px; background: red; color: white; font-weight: bold">';
	echo '<p>Erreur SQL : </p>';
	echo '<p>Code : ' . $e -> getCode() . '</p>';
	echo '<p>Message : ' . $e -> getMessage() . '</p>';
	echo '<p>Fichier : ' . $e -> getFile() . '</p>';
	echo '<p>Line : ' . $e -> getLine() . '</p>';
	echo '</div>';
	
	$f = fopen('error_log.txt', 'a');
	$erreur = $e -> getTrace();
	fwrite($f, date('d/m/Y') . ' - ' . $erreur[0]['file'] . ' - ' . $erreur[0]['args'][0]. "\r\n");	
	
	// Pour chaque erreur SQL, j'ecrit les log dans un fichier .txt : 
	// Date du jour - fichier où se trouve l'erreur - Requete
	
	exit; // je stoppe l'exécution du script.
}