<?php
/* Une injection SQL, permet de détourner le comportement initialement prévue d'une requete.

-------------
Exemple 1 :
pseudo : juju'#
mdp :

requete : SELECT * FROM mebre WHERE pseudo = 'juju'#' && mdp=''
Explication : Le dièse permet de mettre la suite de la requête en commentaire; Donc demande, le user donc le pseudo est JUJU. le MDP n'a plus aucune importance.

-------------
Exemple 2 :
pseudo :
mdp : ' OR id_membre = '2
requete: SELECT * FROM membre WHERE pseudo = '' && mdp = '' OR id_membre = '3'
Explication : on demande le membre eyant le pseudo et le mot de passe vide (n'existe pas). ou alors le membre dont l'id_membre est 2.

------------
Exemple 3 :
pseudo :
mdp: ' OR 1='1

Requete : SELECT * FROM membre WHERE pseudo = '' && mdp = '' OR 1='1'

Explications :  on demande le membre eyant le pseudo et le mot de passe vide (n'existe pas).  ou alors 1=1 o_0

-----------
Autre ewemple faille xss :
pseudo : <p style="color:red">test</p>
mdp :

*/

session_start(); // Création du fichier de session
$pdo = new PDO('mysql:host=localhost;dbname=securit', 'root',''); // connexion a la bdd

if(!empty($_POST)){
    echo 'Pseudo : ' . $_POST['pseudo'] . '<br>';
    echo 'Mot de passe : ' . $_POST['mdp'] . '<hr>';

    $_POST['pseudo'] = htmlentities(addslashes($_POST['pseudo']));
    $_POST['mdp'] = htmlentities(addslashes($_POST['mdp']));

    echo 'Après netoyage : <br>';
    echo 'Pseudo : ' . $_POST['pseudo'] . '<br>';
    echo 'Mot de passe : ' . $_POST['mdp'] . '<hr>';

    $req = "SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' && mdp = '$_POST[mdp]'";
    echo $req . '<hr>';
    $resultat = $pdo -> query($req);

    if($resultat -> rowCount() >0){// Signifie que mon utilisateur existe, que le MDP et le PSEUDO correspondent. On peut le connecter !!!
        $membre = $resultat -> fetch(PDO::FETCH_ASSOC);
    foreach($membre as $indice => $valeur){ // Ce foreach permet d'enregistrer toutes les infos du membre en session.
            $_SESSION[$indice] = $valeur;
    }
    echo ' <div style="padding:5px; background:linear-gradient(green,yellow,green); color:white; border-radius:4px;">';
    echo ' Félicitations, vous êtes connecté, Voici vos informations de profil :';
    echo ' <ul>';
    echo ' <li>Pseudo : ' . $membre['pseudo'] . '</li>';
    echo ' <li>Prénom : ' . $membre['prenom'] . '</li>';
    echo ' <li>Nom : ' . $membre['nom'] . '</li>';
    echo ' <li>Email : ' . $membre['email'] . '</li>';
    echo ' </ul> ';
    echo ' </div> ';
}else{
        echo '<p style="background:linear-gradient(red,yellow,red); color:white; padding:5px; border-radius:4px;">Erreur d\'identifiants ! </p>';
    }
}
?>

<!DOCTYPE html>
<html>
    <body>
        <h1>Connexion</h1>
        <form action="" method="POST">
            <input type="text" name="pseudo" placeholder="VOTRE PSEUDO">
            <input type="text" name="mdp" placeholder="VOTRE MOT DE PASSE">
            <input type="submit" value="Connexion">
        </form>
    </body>
</html>
