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

// mise à jour d'une compétence
if (isset($_POST['r_titre'])) { // par le nom du premier input
    $id_realisation = $_POST['id_realisation'];
    $titre = addslashes($_POST['r_titre']);
    $soustitre = addslashes($_POST['r_soustitre']);
    $dates = addslashes($_POST['r_dates']);
    $description = addslashes($_POST['r_description']);

    $pdo -> exec("UPDATE t_realisations SET r_titre = '$titre', r_soustitre ='$soustitre', r_dates ='$dates', r_description ='$description' WHERE id_realisation = '$id_realisation'"); // SQL OK
    header('location: realisations.php');
    exit();
}

// je récupère la formation :
$id_realisation = $_GET['id_realisation']; // par l'id et $_GET
$resultat = $pdo -> query("SELECT * FROM t_realisations WHERE id_realisation ='$id_realisation'"); // la requête est égale à m'id
$ligne_realisation = $resultat->fetch();

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
        <h2 class="well">Modification d'une réalisation</h2>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                          <div><?= $ligne_realisation['r_titre']; ?></div>
                        </div>
                    </div>
                      <form action="modif_realisation.php" method="post">

                          <div class="form-group">
                            <label for="r_titre">Titre :</label><br>
                            <input type="text" name="r_titre" value="<?= $ligne_realisation['r_titre']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="r_soustitre">Soustitre :</label><br>
                            <input type="text" name="r_soustitre" value="<?= $ligne_realisation['r_soustitre']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="r_dates">Dates :</label><br>
                            <input type="text" name="r_dates" value="<?= $ligne_realisation['r_dates']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="f_description">Description :</label><br>
                            <input type="text" name="r_description" value="<?= $ligne_realisation['r_description']; ?>"><br><br>
                          </div>

                          <input hidden name="id_realisation" value="<?= $ligne_realisation['id_realisation']; ?>">

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
