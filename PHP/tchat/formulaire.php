<?php
session_start(); // fichier de session
$pdo = new PDO('mysql:host=localhost;dbname=tchat', 'root','', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); // connexion a la BDD



$msg = ''; //  faire un echo de $_msg

if(!empty($_POST)){  // verif si les champs ne sont pas vide

    if(!empty($_FILES['photo']['name'])){ // si une photo a été posté.
        $nom_photo = time() . '_' . rand(0,5000) . ' _ ' . $_FILES['photo']['name'];
        echo $nom_photo;

        if($_FILES['photo']['type'] == 'image/jpeg' ||  // verif du type
            $_FILES['photo']['type'] == 'image/gif' ||
            $_FILES['photo']['type'] == 'image/png' ){

            if($_FILES['photo']['size'] < 1000000 ){
                copy($_FILES['photo']['tmp_name'], __DIR__ . '/photo/' . $nom_photo);

            }

        }
    }else{
        $nom_photo = 'default.jpg';
    }


        if(empty($_POST['pseudo'])){
             $msg .= "<p style=color:white;background:red; padding 5px>veuillez rentrez un pseudo </p>";
            }
            if(empty($_POST['mdp'])){
                echo '<p style=color:white;background:red; padding 5px>veuillez rentrez un mot de passe </p>';
            }
                if(empty($_POST['email'])){
                    echo '<p style=color:white;background:red; padding  5px>veuillez rentrez un email </p>';
            }

            if(empty($msg)){

                $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, email, photo,statut) VALUES (:pseudo, :mdp, :email, photo, '1') ");

                $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                $resultat -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
                $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);

                $resultat -> execute(); // Si la requête s'est bien passée !
            }
        }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Authentification :</h1>
        <form action="" method="POST" enctype="multipart/form-data">

            <input type="text" name="pseudo" placeholder="pseudo"><br><br>

            <input type="text" name="mdp" placeholder="Mot de passe"><br><br>

            <label>Votre avatar</label>
            <input type="file" name="photo"><br><br>

            <input name="email" type="text" placeholder="email"><br><br>

            <input type="submit" name="valider" value="inscription"><br>

        </form>
    </body>
</html>
