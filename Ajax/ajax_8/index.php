<?php
require_once('init.inc.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="ajaxJs8.js"></script>
        <title></title>
    </head>
    <body>
        <!--Réaliser une liste déroulante permettant de selectionner un employe de l'entreprise-->
        <form class="" action="#" method="post">
            <fieldset>
                <legend>Employé</legend>

                    <?php
                    $result = $pdo->query("SELECT * FROM employes");
                        echo '<select id="personne" name="personne">';
                            while($employes = $result-> fetch(PDO::FETCH_ASSOC)){
                                echo '<option>' . $employes['prenom'] . '</option>';
                            }
                             echo '</select>';
                     ?>
        			<input type="submit" value="ok" id="submit">
                </form>

                <div id="resultat"></div>

            </fieldset>

        </form>

    </body>
</html>
