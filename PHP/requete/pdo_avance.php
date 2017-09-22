<?php
/* il y a plusieur maniere d'effectuer des requete avec PDO.
query(), exec(), prepare(), execute().
Dans ce fichier nous allons voir exect(), prepare(), execute().
Query() a été vu dans le fichier pdo.php


Methode exec():
---------------

En pratique, il est préférable de faire toutes les requêtes INSERT - DELETE - UPDATE - REPLACE avec exec().

Valeur de retour :
    -succès : N (INT) le nombre de lignes affectées
    -echec : False


--------------
Methode prepare() puis execute() :

La requete prepare() (on parle de requete préparée) peut etre utilisée pour toutes requêtes(SELECT - SHOW - INSERT - DELETE - UPDATE - REPLACE)

On utilise la requête préparée lorsque l'on a des données sensibles a l'intérieur de notre requete
(données sensibles : $_POST et $_GET). On prepare la requete puis on l'execute().

Valeurs de retour :
prepare() :
        -succès et echec : PDOStatement

execute() :
    -succès : TRUE
    -echec : FALSE
-----------------------

$resultat =  $pdo -> query("SELECT * FROM employes")
------------------------
$resultat =  $pdo -> query("SELECT * FROM employes WHERE prenom = 'Jean-pierre'")
------------------------
$resultat =  $pdo -> prepare("SELECT * FROM employes WHERE prenom = '$_POST[prenom]'")
$resultat -> execute();
------------------------
$resultat = $pdo -> exec("INSERT INTO employes (prenom, nom, salaire) VALUES ('Yakine', 'hamida', 1500)")
------------------------
$resultat = $pdo ->prepare("INSERT INTO employes (prenom, nom, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', $_POST[salaire])")
// Traitements
$resultat -> execute();
------------------------

*/
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
try{
    /// Erreur volontaire de requête :
    $resultat = $pdo -> exec("dcdcdeefegsd");

    // 1 //INSERT avec exec()
    $resultat = $pdo -> exec("INSERT INTO employes(prenom, nom, service, sexe, salaire, date_embauche) VALUES ('Toto', 'Tata', 'informatique', 'm', 1500, CURDATE())");

    echo 'Nombre de ligne affectée : ' .$resultat . '<br>';
    echo 'Dernier enregistrement : ' . $pdo -> lastInsertId();


    // 2 // Prepare + execute() + passage d'arguments
    // 2.1 : Marqueur '?'
    $prenom = 'Amandine'; // données sensibles

    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? ");
    $resultat -> execute(array($prenom));

    $nom = 'Thoyer';

    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ? ");
    $resultat -> execute(array($nom, $prenom));

    // Le marqueur '?' dit marqueur non nominatif, permet de transmettre les valeurs sensibles lors de l'éxécution d'une requête préparées
    // Attention la méthode execute() appartient a notre objet PSOStatement($resultat) et non à l'objet PDO ($pdo)

    //2.2 : Marqueur ':'
    $prenom = 'Amandine'; //données sensible
    $nom = 'Thoyer'; // données sensible
    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");
    $resultat -> execute(array(
    'prenom' => $prenom,
    'nom' => $nom
    ));

    //2.3 : Marqueur ':' + bindParam()
    $prenom = 'Amandine'; //données sensible
    $nom = 'Thoyer'; // données sensible
    $resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = :prenom AND nom = :nom");

    $resultat -> bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $resultat -> bindParam(':nom', $nom, PDO::PARAM_STR);
    $resultat -> execute();

    // Le marqueur ':' dit marqueur nominatif, donne un "nom" à chaque valeur sensible attendue.
    // Avec ce marqueur on peut soit renseigner la valeur dans un array de la methode execute(), soit renseigner la valeur via bindParam().
    //L'avantage de bindParam est qu'il caste la valeur en dernier recourt. 

}catch(PDOException $e){

    echo '<div style="padding:10px;background:red;color:white;font-weight:bold">';
    echo '<p>Erreur SQL : </p>';
    echo '<p>Code : ' .$e -> getCode() . ' </p>';
    echo '<p>Message : ' .$e -> getMessage() . ' </p>';
    echo '<p>Fichier : ' .$e -> getFile() . ' </p>';
    echo '<p>Line : ' .$e -> getLine() . ' </p>';

    echo '</div>';

    $f = fopen('error_log.txt', 'a');

    $erreur = $e -> getTrace();
    fwrite($f, date('d/m/Y') .  ' - ' . $erreur[0]['file'] . ' - ' . $erreur[0]['args'][0] . "\r\n");

    // Pour chaques erreur SQL, j'écrit les log dans un fichier . txt :
    // Date du jour - fichier ou se trouve l'erreur - Requete

        exit; // je stoppe l'exécution du script




}
