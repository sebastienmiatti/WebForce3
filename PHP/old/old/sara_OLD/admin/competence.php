<?php
require('inc/init.inc.php.');

if (isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté') { // A mettre sur toutes les pages

  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];

  // echo $_SESSION['connexion'];
} else { // l'utilisateur n'est pas connecté
  header('location: authentification.php');
}
?>

<?php
$msg = '';

// gestion des contenus de la BDD compétences

// insertion d'une compétence
if (isset($_POST['competence'])) { // Si on a posté une nouvelle comp.
    if (!empty($_POST['competence']) && !empty($_POST['c_niveau'])) { // Si compétence n'est pas vide
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdo -> exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: competence.php");
        exit();

    } // ferme le if n'est pas vide
    else {
        $msg .= '<p style="background:#6A0000; color:white; width:72%">Veuillez renseigner les champs !</p>';
    }

} // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_competence'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_competence'];

    $resultat = "DELETE FROM t_competences WHERE id_competence = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: competence.php"); // pour revenir sur la page

} // ferme le if(isset)

?>

<!DOCTYPE html>
<html lang="fr">
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

    <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">

    <link rel="stylesheet" href="css/style_admin.css">
</head>
<body>
    <?php include('inc/nav.inc.php'); ?>
    <hr>
    <?php
    $resultat = $pdo -> prepare("SELECT * FROM t_competences WHERE utilisateur_id ='$id_utilisateur'");
    $resultat->execute();
    $nbr_competences = $resultat->rowCount();

    // $ligne_competence = $resultat -> fetch();
    ?>
    <div class="container">
        <div class="page-header">
            <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
        </div>
        <!-- Fil d'ariane -->
        <ol class="breadcrumb">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Parcours</a></li>
            <li class="active">Compétences</li>
        </ol>
        <div class="row">
            <div class="col-md-8">
                <h2>Les compétences :</h2>
                <h4 class="well">J'ai <?= $nbr_competences;?> compétence<?= ($nbr_competences>1)?'s':''?></h4>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <table border="2" class="table table-condensed table-hover">
                        <tr>
                            <th>Compétences</th>
                            <th>Niveau en %</th>
                            <th>Suppression</th>
                            <th>Modification</th>
                        </tr>
                        <tr>
                            <?php while ($ligne_competence = $resultat -> fetch()) { ?>
                                <td><?= $ligne_competence['competence'];?></td>
                                <td><?= $ligne_competence['c_niveau'];?></td>
                                <td><a href="competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-danger col-md-4 col-md-offset-4"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                <td><a href="modif_competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-success col-md-4 col-md-offset-4"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>
                            </tr>
                            <?php } ?>
                        </table>
                </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div>Insertion d'une compétence :</div>
                            </div>
                        </div>
                            <form action="competence.php" method="post">
                                <fieldset>
                                    <?= $msg; ?>
                                    <div class="form-group">
                                        <label for="disabledSelect">Compétence</label>
                                        <input type="text" name="competence" id="competence" placeholder="Insérer une compétence"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="disabledSelect">Niveau</label>
                                        <input type="text" name="c_niveau" id="c_niveau" placeholder="Insérer le niveau"  class="form-control">
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Insérez">

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php include('inc/footer.inc.php'); ?>
