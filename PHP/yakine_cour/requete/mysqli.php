<?php

$mysqli = new Mysqli('localhost', 'root', '', 'entreprise');
//var_dump($mysqli);
/*
$mysqli représente un objet de la classe Mysqli. On parle d'intance de la classe Mysqli. Ce que l'on vient de faire c'est une instanciation.

L'instance de Mysqli nécessite 4 arguments : 
	1 : Serveur de BDD
	2 : Login
	3 : MDP
	4 : Nom de la BDD

	
Méthode (fonction) Query() : La méthode query() de l'objet $mysqli permet d'effectuer des requête auprès de la base de données. 
	Arg : la formulation de notre requete (STR)
	
	Valeurs de retour : 
		-> SELECT - SHOW :
			Succès : Mysqli_result (obj)
			Echec : FALSE (BOOL)
		
		
		-> UPDATE - INSERT - REPLACE - DELETE : 
			Succès : TRUE (BOOL)
			Echec : FALSE (BOOL)
*/


// 0 : Erreur volontaire de requete

//$mysqli -> query("dfsfdfsdfsdfsd");
// Les erreurs SQL ne sont pas affichées par défault. 
//echo $mysqli -> error; // permet d'afficher les erreurs SQL. 

// 1 : Requete INSERT (UPDATE, DELETE, REPLACE)
$mysqli -> query("INSERT INTO emples (prenom, nom, sexe, salaire, service, date_embauche) VALUES ('toto', 'tata', 'm', 1200, 'informatique', CURDATE())");


// 2 : Requete SELECT (un seul résultat)

$resultat = $mysqli -> query("SELECT * FROM employes WHERE id_employes = 780");
// une requete nous retourne un (ou plusieurs) résultat(s), il faut donc stocker le résultat de la requête. 

echo '<pre>'; 
print_r($resultat);
echo '</pre>'; 
// Le resultat de notre requête est un obj de la classe Mysqli_result. 
// En l'état $resultat est INEXPLOITABLE !!!!! 

$employe = $resultat -> fetch_assoc();

echo '<pre>'; 
print_r($employe);
echo '</pre>'; 

echo 'Prénom : ' . $employe['prenom'];

// La méthode (fonction) fetch_assoc() de l'objet $resultat (Mysqli_result) nous permet de créer un array où les indices sont les noms des champs dans la table. On parle d'indexation associative. 
// fetch_row : indexation numérique
// fetch_array : Effectue une indexation à la fois associative et à la fois numérique


// 3 : Requete SELECT (plusieurs résultats)

$resultat = $mysqli -> query("SELECT * FROM employes");
// $resultat est un objet de Mysqli_resultat. INEXPLOITABLE en l'état

while($employes = $resultat -> fetch_assoc()){
	echo '<pre>';
	print_r($employes);
	echo '</pre>'; 
}

// Fetch_assoc() nous fait un array PAR ENREGISTREMENT, et non un array avec tous les enregistrements. Je suis donc OBLIGE de le faire dans une boucle lorsque ma requête me retourne plusieurs résultats !!! 

// La boucle WHILE se comporte comme un curseur qui parcourt chaque enregistrement, pendant que fetch_assoc, les indexe...

// Un seul résultat : PAS DE BOUCLE !! 
// Plusieurs résultats : UNE BOUCLE !! 
// Si normalement un seul résultat, mais potentiellement plusieurs résultats : UNE BOUCLE


// 4 : Dupliquer une table SQL en tableau HTML

$resultat = $mysqli -> query("SELECT * FROM employes");
// $resultat ==> OBJ Mysqli_result ==> INEXPLOITABLE

echo '<table border="1">';  // Creation du tableau HTML
echo '<tr>'; // creation de la ligne de titre
while($colonnes = $resultat -> fetch_field()){ // Cette boucle grâce à fetch_field() va parcourir toutes les infos des champs de la table et m'afficher le nom de chaque champs dans un <TH>
	//var_dump($colonnes);
	echo '<th>' . $colonnes -> name . '</th>'; 
}
echo '<th colspan="2">Actions</th>';

echo '</tr>'; // fermeture de ma ligne de titre

while($lignes = $resultat -> fetch_assoc()){ // Cette boucle, grâce à fetch_assoc va parcourir tous les enregistrements de ma table, créer une ligne <TR> pour chacun et stocker les infos dans un array ($lignes)
	echo '<tr>';
	foreach($lignes as $valeur){ // La boucle foreach va parcourir les valeurs de chaque enregistrement pour les afficher dans un <TD>
		echo '<td>' . $valeur . '</td>';
	}
	
	echo '<td><a href="">Modifier</a></td>';
	echo '<td><a href="">Supprimer</a></td>';
	echo '</tr>'; // fin de la ligne correspondant à chaque enregistrement
}
echo '</table>'; // Fin du tableau. 







 








