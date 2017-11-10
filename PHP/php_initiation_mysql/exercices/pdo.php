<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');
    echo "ok";

    } catch (PDOException $e) {
        echo "impossible de se connecter.";
        exit;
}


##############
### INSERT ###
#############


###valeur anonymes -> ?,?,? ###

//1-on met dans une table les données que l'on veut insérer
$data = array ('Miatti','Sebastien',1);
//2-on prépare la requète
$req = $bdd->prepare('INSERT INTO contacts (co_name, co_firstname, co_gender) VALUES (?, ?, ?)');
// 3- on exécute la requete
$req->execute($data);
echo "ok";

###valeur nommées -> : nom ###
//1-on met dans une table indexée les données que l'on veut insérer
$data = array('name'=>"Miatti",'firstname'=>"Christian",'gender'=>1);
//2-on prépare la requète
$req = $bdd->prepare('INSERT INTO contacts (co_name, co_firstname, co_gender) VALUES (:name, :firstname, :gender)');
// 3- on exécute la requete
$req->execute($data);
echo "ok";


##############
### UPDATE ###
##############

$req = $bdd->exec('UPDATE contacts SET co_firstname= "Marie" WHERE co_id = 4');

###############
### DELETE ###
##############

$req = $bdd->exec('DELETE FROM contacts WHERE co_id = 8');


?>
