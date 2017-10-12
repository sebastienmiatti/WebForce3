<?php
require_once('init.inc.php');
$resultat = $pdo->query('SELECT * FROM employes');
?>
<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript" src="ajax4.js"></script>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post">
            <div id="resultat">
                <?php

                echo '<select name="personne" id="personne">';
                while($employe = $resultat->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value='$employe[id_employes]'>$employe[prenom]</option>";
                };
                echo '</select>';
                ?>

            </div>
            <input type="submit" id="submit" value="supprimer">

        </form>

    </body>
</html>
