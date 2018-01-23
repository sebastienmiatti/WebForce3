<?php require('inc.init.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php

    // WHERE id_utilisateur='1'
    $sql = $pdo->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1' ");
    $ligne_utilisateurs = $sql->fetch();

    echo '<pre>';
    print_r($ligne_utilisateurs);
    echo '</pre>';
    ?>
    <title>Admin : <?= $ligne_utilisateurs['pseudo']; ?></title>
</head>
<body>
    <h1>Admin : <?= $ligne_utilisateurs['prenom'] . ' ' . $ligne_utilisateurs['nom'];  ?></h1>
    <p>texte</p>
    <hr>
    <h2></h2>


</body>
</html>
