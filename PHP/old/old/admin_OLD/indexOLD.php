<?php

// gestion des contenus de la BDD compétences
$resultat = $pdo -> query('SELECT * FROM t_competences');
$ligne_competence = $resultat -> fetch();

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    </head>
    <body>
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        <p>texte</p>
        <hr>
        <h2>Accueil admin</h2>

<?php require('inc/footer.inc.php');?>
