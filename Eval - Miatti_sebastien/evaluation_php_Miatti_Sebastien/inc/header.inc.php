<?php require('init.inc.php');?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet"><!-- importation bootstrap CSS -->
        <link rel="stylesheet" href="css/style_admin.css">

        <title>Site vtc</title>

    </head>

    <body>

<!---        NAVBAR         -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid geometrique">
        <!--container-fluid pour un container full width-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">VTC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="conducteur.php">Conducteur<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="association_vehicule_conducteur.php">Association<span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="vehicule.php">Vehicule<span class="sr-only">(current)</span></a></li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<!---        FIN NAVBAR          -->
<div class="container">
    <h1 class="well text-center">VTC: </h1>
