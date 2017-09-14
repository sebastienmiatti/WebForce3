<?php
// démarrage de la session
session_start();
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>formulaire</title>
        </head>

        <body>
            <h2>Nouveau contact</h2>
            <form class="" action="libs/contactManager.php?action=new" method="post">
                <label for="">Nom</label><br>
                <input type="text" id="nomEmploye" name="nomEmploye"><br>

                <label for="">Prénom</label><br>
                <input type="text" id="prenomEmploye" name="prenomEmploye"><br><br>

                <select name="hommeFemme">
                    <option value="1">Homme</option>
                    <option value="2">Femme</option>
                </select><br><br>

                <input type="submit" value="Ajouter">
                <?php
                    // si une erreur existe on l'affiche
                if(isset($_SESSION['error'])){
                    echo "<strong>".$_SESSION['error']."</strong>";
                    // on supprime l'erreur
                    unset($_SESSION['error']);
                }
                //si on a un message en session, on l'affiche
                if(isset($_SESSION['message'])) {
                    echo "<strong>".$_SESSION['message']."<strong>";
                        //on supprime le message
                        unset($_SESSION['message']);
                }
                 ?>

            </form>


        </body>
    </html>
