<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Information :</h1>
        <form action="" method="POST">
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
                <option>Homme</option>
                <option>Femme</option>
            </select><br><br>

            <label>Message :</label><br>
            <textarea name="message" rows="10" cols="30"></textarea><br><br>
            <input type="submit" value="Enregistrer">
        </form>
    </body>
</html>
