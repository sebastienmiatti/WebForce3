<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Modifier un contact</title>
    </head>
    <body>
        <form action="/contact/update/?id=<?= $GLOBALS['contact']->id ?>" method="post">
            <fieldset style="width:0;">
                <legend>Modifier un contact</legend>
            <input type="text" name="nom" value="<?= $GLOBALS['contact']->nom ?>" placeholder="Nom"><br><br>
            <input type="text" name="prenom" value="<?= $GLOBALS['contact']->prenom ?>" placeholder="Prenom"><br><br>
            <input type="text" name="phone"value="<?= $GLOBALS['contact']->phone ?>"  placeholder="Téléphone"><br><br>
            <input type="submit" value="Envoyer">
            </fieldset>
        </form>
    </body>
</html>
