<?php

$mysqli = new Mysqli('localhost', 'root', '', 'entreprise');

//var_dump($mysqli);

/*
$Mysqli représente un l'objet de la classe Mysqli. On parle d'instance de la classe Mysqli. Ce que l'on vient de faire c'est une instanciation.

L'instance de Mysqli nécéssite 4 arguments :
 1 : serveur de BDD
 2 : Login
 3 : MDP
 4 : Nom de la BDD

Propriété (variable)

 Methode (fonction) Query() :  la methode query() de l'objet $mysqli permettent d'effectuer des requetes auprès de la base de données.
        arg :  la formulation de notre requete (STR)
        valeur de retour :
         -> SELECT - SHOW :
             Succès : Mysqli_result (obj)
             Echec : FALSE (BOOL)

         -> UPDATE - INSERT - REPLACE - DELETE:
             Succès : TRUE (BOOL)
             Echec : FALSE (BOOL)

*/


// 0 : Erreur volontaire de requete
 //$mysqli -> query("ghghhdfdfhj");
        // Les erreurs SQL ne sont pas affichées par default
    //echo $mysqli -> error; // permet d'afficher les erreurs SQL.

// 1 : Requete INSERT (UPDATE, DELETE, REPLACE);
$mysqli -> query("INSERT INTO employes (prenom, nom, sexe, salaire, service, date_embauche) VALUES ('toto', 'tata', 'm', 1200, 'informatique', CURDATE())");

// 2 : Requete SELECT (un seul résultat)
$resultat = $mysqli -> query("SELECT * FROM employes WHERE id_employes = 780");
    // une requete nous retourne un (ou plusieurs) résultat(s), il faut donc stocker le résultat de la requete.

    echo '<pre>';
        print_r($resultat);
    echo '</pre>';

    // Le résultat de notre requete est un objet de la classe Mysqli_result
    // en l'état $resultat est INEXPLOITABLE !!!!!

    $employe = $resultat -> fetch_assoc();

    echo '<pre>';
        print_r($employe);
    echo '</pre>';

echo 'Prénom : ' . $employe['prenom'];

    // La methode fetch_assoc  de l'objet $resultat(Mysqli_result) nous permet de créer un array ou les indices sont les noms des champs dans la table. On parle d'indexation associative (en gros: du résultat il récupère les champs de la BDD)

    // fetch_row : indexation numérique
    // fetch_array : Effectue une indexation à la fois associative et à la fois numérique

// 3 : Requete SELECT (plusieurs résulats)
$resultat = $mysqli -> query("SELECT * FROM employes");
        // $resultat est un objet de mysqli_result INEXPLOITABLE en l'état
While ($employes = $resultat -> fetch_assoc()){
    echo '<pre>';
        print_r($employes);
    echo '</pre>';
};

    // Fetch_ assoc nous fait un array PAR ENREGISTREMENT et non un array avec tous les enregistrement . Je suis donc obligé de le faire dans une boucle WHILE lorsque ma requete me retourne plusieurs résultats !!!

    // La boucle WHILE se comporte comme un curseur qui parcourt chaque enregistrement, pendant que fetch_assoc, les indexe...

    // un seul résultat : PAS DE BOUCLE !!
    // Plusieurs résultats : UNE BOUCLE !!
    //Si normalement un seul résultat, mais potentiellement plusieurs résultats : UNE BOUCLE


// 4 : Dupliquer une table SQL en tableau HTML.

$resultat = $mysqli -> query("SELECT * FROM employes");
    // $resultat ==> OBJ Mysqli_result ==> INEXPLOITABLE;
echo '<table border= 1>'; // Création du tableau HTML
echo '<tr>'; // création de la ligne du titre
while($colonnes = $resultat -> fetch_field()){// Cette boucle grâce a fetch_field() va parcourir toutes les infos des champs de la table et m'afficher la nom de chaque champs dans un <th>
    //var_dump($colonnes);
    echo '<th>' . $colonnes -> name . '</th>';
}
echo '</tr>'; //fermeture de ma ligne de titre
while($lignes = $resultat -> fetch_assoc()){// cette boucle, grâce a fetch_assoc() va parcourir tout les enregistrement de ma table, créer une ligne <tr> pour chaque et stocker les infos dans un array ($lignes)
    echo '<tr>';

    foreach($lignes as $valeur){ // La boucle foreach va parcourir les valeurs de chaques enregistrement, pour les afficher dans un '<td>'.
        echo '<td>' . $valeur . '</td>';
    }

    echo '</tr>'; // fin de la ligne correspondant a chaques enregistrement.
}

echo '</table>'; // fin du tableau
