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
if (isset($_POST['prenom'])) { // par le nom du premier input
    $id_utilisateur = $_POST['id_utilisateur'];
    $prenom = addslashes($_POST['prenom']);
    $nom = addslashes($_POST['nom']);
    $email = addslashes($_POST['email']);
    $telephone = addslashes($_POST['telephone']);
    $pseudo = addslashes($_POST['pseudo']);
    $age = addslashes($_POST['age']);
    $adresse = addslashes($_POST['adresse']);
    $code_postal = addslashes($_POST['code_postal']);
    $ville = addslashes($_POST['ville']);
    $pays = addslashes($_POST['pays']);

    $pdo -> exec("UPDATE t_utilisateurs SET prenom = '$prenom', nom ='$nom', email ='$email', telephone ='$telephone', pseudo='$pseudo', age='$age', adresse='$adresse', code_postal='$code_postal', ville='$ville', pays='$pays' WHERE id_utilisateur = '$id_utilisateur'"); // SQL OK
    header('location: utilisateur.php');
    exit();
}

// je récupère la formation :
$id_utilisateur = $_GET['id_utilisateur']; // par l'id et $_GET
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur ='$id_utilisateur'"); // la requête est égale à m'id
$ligne_utilisateur = $resultat->fetch();

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
        <h2 class="well">Modification d'un utilisateur</h2>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                          <div><?= $ligne_utilisateur['prenom']; ?></div>
                        </div>
                    </div>
                      <form action="modif_utilisateur.php" method="post">

                          <div class="form-group">
                            <label for="prenom">Prenom :</label><br>
                            <input type="text" name="prenom" value="<?= $ligne_utilisateur['prenom']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="Nom">Nom :</label><br>
                            <input type="text" name="nom" value="<?= $ligne_utilisateur['nom']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="email">Email :</label><br>
                            <input type="text" name="email" value="<?= $ligne_utilisateur['email']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="telephone">Téléphone :</label><br>
                            <input type="number" name="telephone" value="<?= $ligne_utilisateur['telephone']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="pseudo">Pseudo :</label><br>
                            <input type="text" name="pseudo" value="<?= $ligne_utilisateur['pseudo']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="age">Age :</label><br>
                            <input type="number" name="age" value="<?= $ligne_utilisateur['age']; ?>"><br><br>
                          <div class="form-group">

                          <div class="form-group">
                            <label for="adresse">Adresse :</label><br>
                            <input type="text" name="adresse" value="<?= $ligne_utilisateur['adresse']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="code_postal">Code postal :</label><br>
                            <input type="number" name="code_postal" value="<?= $ligne_utilisateur['code_postal']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="ville">Ville :</label><br>
                            <input type="text" name="ville" value="<?= $ligne_utilisateur['ville']; ?>"><br><br>
                          </div>

                          <div class="form-group">
                            <label for="pays">Pays :</label><br>
                            <input type="text" name="pays" value="<?= $ligne_utilisateur['pays']; ?>"><br><br>
                          </div>

                          <input hidden name="id_utilisateur" value="<?= $ligne_utilisateur['id_utilisateur']; ?>">

                          <input type="submit" class="btn btn-warning" value="Mettre à jour">
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
