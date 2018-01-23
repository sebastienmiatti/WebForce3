<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet"><!-- importation bootstrap CSS -->
        <link rel="stylesheet" href="css/style_admin.css">
        <title>Site cv-<?= ($_SESSION['prenom']); ?> <?= ($_SESSION['nom']); ?></title>
    </head>

    <body>

<!---        NAVBAR         -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php ($_SESSION['pseudo']); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="utilisateurs.php">Profil<span class="sr-only">(current)</span></a></li>
                <li><a href="modification_utilisateur.php">gestion utilisateur</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">parcours<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="experience.php">Expériences</a></li>
                        <li><a href="competence.php">Compétences</a></li>
                        <li><a href="formation.php">Formations</a></li>
                        <li><a href="realisation.php">Réalisations</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="loisirs.php">Loisirs</a></li>
                    </ul>
                </li>
            </ul>

        <form class="navbar-form navbar-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="authentification.php?logout=oui">Se déconnecter</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options d'adminitration<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="utilisateur.php">infomations utilisateurs</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!---        FIN NAVBAR          -->
<div class="container">
    <h1 class="well text-center">Admin : <?= ($_SESSION['prenom']); ?></h1>
