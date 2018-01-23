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
if (isset($_POST['competence'])) { // par le nom du premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $id_competence = $_POST['id_competence'];

    $pdo -> exec("UPDATE t_competences SET competence = '$competence', c_niveau ='$c_niveau' WHERE id_competence = '$id_competence'");
    header('location: competence.php');
    exit();
}

// je récupère la compétence :
$id_competence = $_GET['id_competence']; // par l'id et $_GET
$resultat = $pdo -> query("SELECT * FROM t_competences WHERE id_competence ='$id_competence'"); // la requête est égale à m'id
$ligne_competence = $resultat->fetch();

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
        <h2 class="well">Modification d'une compétence</h2><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div><?= $ligne_competence['competence']; ?></div>
                        </div>
                    </div>
                      <form action="modif_competence.php" method="post">

                        <div class="form-group">
                          <label for="competence">Compétence :</label><br>
                          <input type="text" name="competence" value="<?= $ligne_competence['competence']; ?>"><br><br>
                        </div>

                        <div class="form-group">
                          <label for="competence">Niveau en % :</label><br>
                          <input type="number" name="c_niveau" value="<?= $ligne_competence['c_niveau']; ?>"><br><br>
                        </div>

                        <div class="form-group">
                          <input hidden name="id_competence" value="<?= $ligne_competence['id_competence']; ?>">
                        </div>

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
