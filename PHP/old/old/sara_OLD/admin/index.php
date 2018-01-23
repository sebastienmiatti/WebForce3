<?php require('inc/init.inc.php');

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') { // A mettre sur toutes les pages

  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];

  // echo $_SESSION['connexion'];
} else { // l'utilisateur n'est pas connecté
  header('location: authentification.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <?php
    $resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
    $ligne_utilisateur = $resultat -> fetch();
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title >Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">

    <link rel="stylesheet" href="css/style_admin.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include('inc/nav.inc.php'); ?>
      <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
      <hr>
      <h2 class="col-xs-12 col-sm-6 col-md-offset-5 col-sm-offset-1">Accueil admin</h2>
      <img src="img/stock.jpg" alt="" class="col-xs-12 col-sm-6 col-md-offset-3 col-sm-offset-1">
  </body>
</html>
<?php include('inc/footer.inc.php'); ?>
