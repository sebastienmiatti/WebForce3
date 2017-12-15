<?php
$msg = '';
if(!empty($_POST)){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if(empty($_POST['nom'])){
        $msg .= '<p> veuillez renseigner un nom </p>';
    }else{
        if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 30 ){
        $msg .= '<p> Vottre nom doit comporter entre 3 et 30 caractères! </p>'
        }
    }
    if(empty($_POST['prenom'])){
        $msg .= '<p> veuillez renseigner un nom </p>';
    }else{
        if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 30 ){
        $msg .= '<p> Vottre nom doit comporter entre 3 et 30 caractères! </p>'
        }
        if(empty($_POST['telephone'])){
            $msg .= '<p> veuillez renseigner votre numero de téléphone</p>';
        }
}

}

//

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Information :</h1>
        <form action="formulaire.php" method="POST">
            <label>Nom : *</label><br>
            <input type="text" name="nom"><br><br>

            <label>Prénom : *</label><br>
            <input type="text" name="prenom"><br><br>

            <label>Télephone : *</label><br>
            <input name="telephone" type="tel"></input><br><br>

            <label>Ville :</label><br>
            <input name="ville" type="text"></input><br><br>

            <label>Code Postal :</label><br>
            <input name="cp" type="text"></input><br><br>

            <label>Adresse :</label><br>
            <textarea style="rezise:none" name="adresse" rows="2" cols="20"></textarea><br><br>

            <label>Date de naissance :</label><br>
            <input name="date_de_naissance" type="date"></input><br><br>

            <label>Sexe</label><br>
            <select name="sexe">
                <option value="m">Homme</option>
                <option value="f">Femme</option>
            </select><br><br>

            <label>Message :</label><br>
            <textarea name="message" rows="10" cols="30"></textarea><br><br>
            <input type="submit" value="Enregistrer">
        </form>
    </body>
</html>
