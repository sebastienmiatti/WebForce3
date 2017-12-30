<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Créer un contact</title>
    </head>
    <body>
        <form action="/contact/store" method="post">
            <fieldset style="width:0;">
                <legend>Contact</legend>
            <input type="text" name="nom" placeholder="Nom"><br><br>
            <input type="text" name="prenom" placeholder="Prenom"><br><br>
            <input type="text" name="phone" placeholder="Téléphone"><br><br>
            <input type="submit" value="Envoyer">
            </fieldset>
        </form>
    </body>
</html>
