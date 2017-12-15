<?php
// PDO : Php DATA Object

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
	PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));

/*
$pdo représente un objet de la classe PDO. Il "contient" notre connexion à la base de données ! 

La classe PDO contient plusieurs méthodes (fonctions) pour effectuer des requêtes auprès de notre BDD. Dans ce fichier nous allons voir la méthode query(). Et exec(), prepare() et execute() seront vues dans le fichier pdo_avance.php

Query() : 
Valeurs de retour :
	-> SELECT - SHOW :
		- Succès : PDOStatement (OBJ)
		- Echec : FALSE (BOOL)

	-> INSERT - DELETE - UPDATE - REPLACE : 
		- Succès : TRUE (BOOL)
		- Echec : FALSE (BOOL)	
*/

// 0 : ERREUR volontaire de requête
//$pdo -> query("wcwcwxcwcwcxccwc");
//Par défault, les erreurs SQL ne s'affiche pas. Pour les afficher on ajoute le mode d'erreur WARNING au moment de la connexion à la BDD. Ceci est une options de PDO. 


// 1 : DELETE
$pdo -> query("DELETE FROM employes WHERE prenom = 'toto'");

// 2 : SELECT (un seul résultat)
$resultat = $pdo -> query("SELECT * FROM employes WHERE id_employes = 780");

var_dump($resultat);
//$resultat est un objet issu de la classe PDOStatement, INEXPLOITABLE en l'état. 

$employe = $resultat -> fetch();

echo '<pre>'; 
print_r($employe);
echo '</pre>';

echo 'Prénom : ' . $employe['prenom'];

// $resultat, notre objet PDOStatement Inexploitable, contient une fonction fetch() qui retourne les résultats de la requête sous forme d'un array. 

// La fonction (méthode) fetch() prend plusieurs arguments possibles : 
	// - PDO::FETCH_ASSOC : indexation associative (les noms champs deviennent les indices dans notre array)
	// - PDO::FETCH_NUM : indexation numérique (les indices sont des chiffres de 0 à N)
	// - PDO::FETCH_OBJ : indexation sous forme d'objet (les noms des des champs deviennent les propriétés de l'objet)
	// - 0 argument : indexation NUM et ASSOC par default, mais cela est reglable dans les options PDO.


// 3 : SELECT (plusieurs résultats)

$resultat = $pdo -> query("SELECT * FROM employes");
echo '<br/>Nombre d\'employés : ' . $resultat -> rowCount() . '<br/>'; // rowCount() nous retourne le nombre de résultats de notre requête. 

// $resultat ==> PDOStatement ==> INEXPLOITABLE

// La requete nous retourne plusieurs résultats donc on fait le fetch() dans une boucle. 

while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)){
	echo '<pre>';
	print_r($employes);
	echo '</pre>'; 
}

// 3.2 : SELECT (plusieurs résultats + fetchAll())

$resultat = $pdo -> query("SELECT * FROM employes");
//$resultat ==> OBJ PDOstatement ==> INEXPLOITABLE

$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($employes);
echo '</pre>'; 

// fetchAll() est pratique car permet de récupérer directement un tableau multidimentionnel contenant tous les résultats de la requête. Cela evite de faire un fetch() dans une boucle. 

// FetchAll() reçoit les mêmes arguments que fetch() ==> PDO::FETCH_ASSOC / PDO::_FETCH_NUM / PDO::FETCH_OBJ / 0 argument. 


// 4 : Dupliquer une table SQL en tableau HTML
$resultat = $pdo -> query("SELECT * FROM employes");
$employes = $resultat -> fetchAll(PDO::FETCH_ASSOC); 
echo 'Nombre de résultats : ' . $resultat -> rowCount() . '<br/><hr/>';


echo '<table border="1">';
echo '<tr>'; // ligne des titres 

for($i = 0; $i < $resultat -> columnCount(); $i++ ){	
	$colonne = $resultat -> getColumnMeta($i);
	echo '<th>' . $colonne['name'] . '</th>'; 
}

echo '</tr>'; // fin ligne des titres

foreach($employes as $valeur){ // parcourt tous les enregistrements
	echo '<tr>'; // ligne pour chaque enregistrement
		foreach($valeur as $valeur2){ // Parcourt toutes les infos de chaque enregistrement
			echo '<td>' . $valeur2. '</td>';
		}
	echo '</tr>';
}
echo '</table>';












