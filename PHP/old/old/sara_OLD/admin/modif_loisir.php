<?php
require('inc/init.inc.php.');

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') {

  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];

  // echo $_SESSION['connexion'];
} else { // l'utilisateur n'est pas connecté
  header('location: authentification.php');
}

// mise à jour d'un loisir
if (isset($_POST['loisir'])) { // par le nom du premier input
    $loisir = addslashes($_POST['loisir']);
    $id_loisir = $_POST['id_loisir'];

    $pdo -> exec("UPDATE t_loisirs SET loisir = '$loisir' WHERE id_loisir = '$id_loisir'");
    header('location: loisirs.php');
    exit();
}

// je récupère le loisir :
$id_loisir = $_GET['id_loisir']; // par l'id et $_GET
$resultat = $pdo -> query("SELECT * FROM t_loisirs WHERE id_loisir ='$id_loisir'"); // la requête est égale à l'id
$ligne_loisir = $resultat->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php
        $resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= $ligne_utilisateur['pseudo']; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">

        <link rel="stylesheet" href="css/style_admin.css">
    </head>
    <body>
        <h1>Admin : <?= $ligne_utilisateur['prenom']; ?></h1>
        <hr>
        <h2 class="well">Modification d'un loisir</h2>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                          <div><?= $ligne_loisir['loisir']; ?></div>
                        </div>
                    </div>
                      <form action="modif_loisir.php" method="post">

                          <div class="form-group">
                            <label for="loisir">Loisir :</label><br>
                            <input type="text" name="loisir" value="<?= $ligne_loisir['loisir']; ?>"><br><br>
                          </div>

                          <input hidden name="id_loisir" value="<?= $ligne_loisir['id_loisir']; ?>">

                          <input type="submit" class="btn btn-warning" value="Mettre à jour">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
  <?php include('inc/footer.inc.php'); ?>
