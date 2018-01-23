<?php
require('inc/init.inc.php');

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {

  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];

  // echo $_SESSION['connexion'];
} else { // l'utilisateur n'est pas connecté
  header('location: authentification.php');
}

$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

// Suppression d'un loisir
if (isset($_GET['id_formation'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_formation'];

    $resultat = "DELETE FROM t_formations WHERE id_formation = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: formations.php"); // pour revenir sur la page

} // ferme le if(isset)

include('inc/nav.inc.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php
    $resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'");
    $ligne_utilisateur = $resultat -> fetch();
    ?>
    <title>Admin : <?= ($ligne_utilisateur['pseudo']); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style_admin.css">

    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
  </head>
  <body>

<div class="container-fluid">
    <div class="row well">
        <h1 class="col-xs-12 col-sm-6 col-md-offset-3 col-sm-offset-1"><?= $ligne_utilisateur['prenom']?></h1><br>
        <!-- <h2>Admin Baba</h2> -->
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-offset-4 col-md-4 col-sm-offset-1">

            <div class="panel panel-danger">
                <div class="panel-heading">
                    <p >Profil de l'utilisateur</p>
                </div>
                <div class="container-fluid">

                <div class="panel-body">
                    <ul class="list-unstyled">
                            <li>Prénom : <?php echo $ligne_utilisateur['prenom'] ;?></li>
                            <li>Nom : <?php echo $ligne_utilisateur['nom'] ;?></li>
                            <li>Email : <?php echo $ligne_utilisateur['email'] ;?></li>
                            <li>Téléphone : <?php echo $ligne_utilisateur['telephone'] ;?></li>
                            <li>Pseudo : <?php echo $ligne_utilisateur['pseudo'] ;?></li>
                            <li>Age : <?php echo $ligne_utilisateur['age'] ;?></li>
                            <li>Date de naissance : <?php echo $ligne_utilisateur['date_naissance'] ;?></li>
                            <li>Civilité : <?php echo $ligne_utilisateur['sexe'] ;?></li>
                            <li>Adresse : <?php echo $ligne_utilisateur['adresse'] ;?></li>
                            <li>Code postal : <?php echo $ligne_utilisateur['code_postal'] ;?></li>
                            <li>Ville : <?php echo $ligne_utilisateur['ville'] ;?></li>
                            <li>Pays : <?php echo $ligne_utilisateur['pays'] ;?></li>
                            <li>Avatar : <?php echo $ligne_utilisateur['avatar'] ;?></li>
                            <li><a href="modif_utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></li>
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
<?php include('inc/footer.inc.php'); ?>
