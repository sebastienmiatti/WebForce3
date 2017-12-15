<?Php
/*
IL y a plusieurs mani�re d'effectuer des requ�tes avec PDO. query(), exec(), prepare(), execute(). 
Dans ce fichier nous allons voir exec(), prepare() execute(). Query() a �t� vu dans le fichier pdo.php

M�thode exec() : 
----------------

En pratique, il est pr�f�rable de faire toutes les requ�tes INSERT - DELETE - UPDATE - REPLACE (IDUR) avec exec(). 

valeurs de retour :
	- Succ�s : N (INT) : le nombre lignes affect�es
	- Echec : False

---------------
M�thode prepare() puis execute() : 

La requete prepare() (on parle de requete pr�par�e) peut �tre utilis�e pour toutes requ�tes (SELECT - SHOW - INSERT - DELETE - UPDATE - REPLACE)

On utilise la requete pr�par�e lorsque l'on a des donn�es sensibles � l'int�rieur de notre requete (donn�es sensibles : $_POST et $_GET). On prepare la requete puis on l'execute(). 

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
	
	echo 'Nombre de ligne affect�e : ' . $resultat . '<br/>';
	echo 'Dernier enregistrement : ' . $pdo -> lastInsertId();
	
	
	// 2 // Prepare() + execute() + passage d'argument
	// 2.1 : Marqueur '?'
	
	$prenom = 'Amandine'; // donn�es sensible
	
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? ");
	$resultat -> execute(array($prenom));
	
	$nom = 'Thoyer';
	
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND nom = ? ");
	$resultat -> execute(array($prenom, $nom));
	
	// Le marqueur '?', dit marqueur non nominatif, permet de transmettre les valeurs sensibles lors de l'�x�cution d'une requ�te pr�par�e. 
	// Attention la m�thode execute() appartient � notre objet PDOStatement ($resultat) et non � l'objet PDO ($pdo)
	
	
	// 2.2 : Marqueur ':'
	$prenom = 'Amandine'; // donn�es sensible
	$nom = 'Thoyer'; // donn�es sensible
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom ");
	$resultat -> execute(array(
		'prenom' => $prenom, 
		'nom' => $nom
	));
	
	
	// 2.3 : Marqueur ':' + bindParam()
	$prenom = 'Amandine'; // donn�es sensible
	$nom = 'Thoyer'; // donn�es sensible
	$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom ");
	
	$resultat -> bindParam(':prenom', $prenom, PDO::PARAM_STR);
	$resultat -> bindParam(':nom', $nom, PDO::PARAM_STR);
	$resultat -> execute();
	
	//Le marquer ':' dit marqueur nominatif, donne un "nom" � chaque valeur sensible attendue. 
	// Avec ce marqueur ont peut soit renseigner la valeur dans un array de la m�thode execute(), soit renseigner la valeur via bindParam(). L'avantage de bindParam() est qu'il caste la valeur en dernier rempart. 
	
	
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
	// Date du jour - fichier o� se trouve l'erreur - Requete
	
	exit; // je stoppe l'ex�cution du script.
}