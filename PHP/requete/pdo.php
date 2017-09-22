/*
echo '<pre>';
    print_r();
echo '</pre>';
*/

<?php

// PDO : Php DATA Object
$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
));
/*
$pdo représente unn objet de la classe PDO. il 'contient' notre connexion à la base de données !

La classe PDO contient plusieurs méthodes (fonctions) pour effectuer des requetes aupres de notre BDD. Dans ce fichier nous allons voir la methode -> query() et exec(), prepare() et execute() seront vues dans le fichier pdo_avance.php

Query():
 Valeur de retour:
 -> SELECT - SHOW:
    -succès : PDOStatement (OBJ)
    -Echec : FALSE (BOOL)

 -> INSERT - DELETE - UPDATE - REPLACE
    -succès : TRUE (OBJ)
    -Echec : FALSE (BOOL)
*/

// 0 : Erreur volontaire de requete
  //$pdo -> query("wcwcwcwcwcwcwcwcwcxwcwc");
  // par default les erreurs SQL ne s'affichent pas , pour les afficher on ajoute le mode d'erreurs WARNING au moment de la connecxion à la BDD; Ceci est une option de PDO.

// 1 : DELETE
    $pdo -> query("DELETE FROM employes WHERE prenom = 'toto'");



// 2 : Requete SELECT (un seul résultat)
    $resultat = $pdo -> query('SELECT * FROM employes WHERE id_employes = 780');

    //var_dump($resultat);
        //resultat est un objet issu de la classe PDOStatement, INEXPLOITABLE en l'état.
    //print_r($resultat);

    $employe = $resultat -> fetch(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($employe);
    echo '</pre>';


    echo 'Prenom : ' . $employe['prenom'];
    // $resultat, notre objet PDOStatement Inexploitable, contient une fonction fetch() qui retourne les résultat de la requête sous forme d'un array.

    // La fonction (méthode) fetch() prend plusieurs arguments possibles :
            // - PDO::FETCH_ASSOC : indexation assiciative ( les nom des champs deviennent les indices dans notre array)
            // - PDO::FETCH_NUM : indexation numérique ( les indices sont des chiffres de 0 a N)
            // - PDO::FETCH_OBJ : indexation sous forme d'objet (les noms des champs deviennent des propriétés de l'objet)
            // - 0 argument : indexation en NUM et ASSOC par default, mais cela est reglable dans les options PDO.


// 3 : Requete SELECT (plusieurs résulats)
    $resultat = $pdo -> query("SELECT * FROM employes");
    echo '<br>Nombre d\'employes : ' . $resultat -> rowCount() . '<br>'; // rowCount() nous retourne le nombre de résultats de note requete.

    // $resultat ==> PDOStatement ==> INEXPLOITABLE

    // la requete nous retourne plusieurs résultats donc on fait le fetch() dans une boucle.

    while($employes = $resultat -> fetch(PDO::FETCH_ASSOC)){
        echo '<pre>';
        print_r($employes);
        echo '</pre>';
    }



// 3.2 : SELECT (plusieurs résultat + fetchAll())

    $resultat = $pdo -> query("SELECT * FROM employes");
    //$resultat ==> OBJ PDOStatement ==> INEXPLOITABLE
    $employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
        print_r($employes);
    echo '</pre>';

    //fetchAll() est pratique car permet de récupérer directement un tableau multidimentionnel contenant tout les résultat de la requete. celle evite de faire un fecth() dans une boucle.

    // fetchAll() reçoit les mêmes arguments que fetch() => PDO::FETCH_ASSOC / PDO::FETCH_NUM / PDO::FETCH_OBJ / o argument.


// 4 : Dupliquer une table SQL en tableau HTML.

    $resultat = $pdo -> query('SELECT * FROM employes');
    $employes = $resultat -> fetchAll(PDO::FETCH_ASSOC);
    echo 'Nombre de resultats : ' . $resultat -> rowCount() . '<br><hr>';

    echo '<table border="1">';
    echo '<tr>'; // lignes des titres

    for($i = 0; $i < $resultat-> columnCount(); $i++){
        $colonne = $resultat -> getColumnMeta($i);
        echo '<th>' . $colonne['name'] . '</th>';
    }

    echo '</tr>'; // fin ligne de titres

        foreach($employes as $valeur){ // parcourt tous les enregistrement
            echo '<tr>'; // Ligne pour chaque enregistrement
                foreach ($valeur as $valeur2){ // parcourt toutes les infos de chaques enregistrement
                    echo '<td>' . $valeur2 . '</td>';
                }
                echo '</tr>';
        }
    echo '</table>';
