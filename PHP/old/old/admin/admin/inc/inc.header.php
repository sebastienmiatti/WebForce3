<?php require('inc.init.php');

$sql = $pdo->query("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1' ");
$ligne_utilisateurs = $sql->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Admin : <?= $ligne_utilisateurs['pseudo']; ?></title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styleadmin.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php RACINE_CV ?>index.php">Accueil</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
    <?php if(userAdmin()) : ?>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <a class="navbar-brand" href="<?php RACINE_CV ?>utilisateurs.php">Utilisateur</a>
            <a class="navbar-brand" href="<?php RACINE_CV ?>titre_cv.php">Titre CV</a>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php RACINE_CV ?>experiences.php">Expériences</a></li>
                <li><a href="<?php RACINE_CV ?>realisations.php">Réalisations</a></li>
                <li><a href="<?php RACINE_CV ?>formations.php">Formations</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compétence<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php RACINE_CV ?>competences.php">Compétences</a></li>
                <li><a href="<?php RACINE_CV ?>loisirs.php">Loisirs</a></li>
                <li><a href="<?php RACINE_CV ?>reseaux.php">Réseaux</a></li>
              </ul>
            </li>
        </ul>
    <?php endif ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="<?php RACINE_CV ?>sauthentifier.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></span><span class="glyphicon glyphicon-off" aria-hidden="true"></span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php RACINE_CV ?>sauthentifier.php">Connexion</a></li>
              </ul>
        <?php if(userAdmin()) : ?>
              <ul class="dropdown-menu">
                <li><a href="<?php RACINE_CV ?>sauthentifier.php?action=deconnexion">Déconnexion</a></li>
              </ul>
        <?php endif ?>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  <!-- navbar bootstrap -->
  <div class="container">
      <h1 class="well">Admin : <?= $ligne_utilisateurs['prenom'] . ' ' . $ligne_utilisateurs['nom'];  ?></h1>
