<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Créer un blog</title>
    </head>
    <body>
        <form action="/blog/store" method="post">
            <fieldset style="width:0;">
                <legend>Blog</legend>
            <input type="text" name="titre" placeholder="Prenom"><br><br>
            <textarea type="text" name="body">Téléphone</textarea><br><br>
            <input type="submit" value="Envoyer">
            </fieldset>
        </form>
    </body>
</html>
