<?php ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Modifier un blog</title>
    </head>
    <body>
        <form action="/blog/update/?id=<?= $GLOBALS['blog']->id ?>" method="post">
            <fieldset style="width:0;">
                <legend>Modifier un blog</legend>
            <input type="text" name="titre" value="<?= $GLOBALS['blog']->prenom ?>" placeholder="Prenom"><br><br>
            <input type="text" name="body"value="<?= $GLOBALS['blog']->phone ?>"  placeholder="Téléphone"><br><br>
            <input type="submit" value="Envoyer">
            </fieldset>
        </form>
    </body>
</html>
