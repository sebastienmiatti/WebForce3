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
?>

<?php
$msg = '';

// gestion des contenus de la BDD compétences


// insertion d'un loisir
if (isset($_POST['loisir'])) { // Si on a posté une nouvelle comp.
    if (!empty($_POST['loisir'])) { // Si compétence n'est pas vide
        $loisir = addslashes($_POST['loisir']);
        $pdo -> exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location: loisirs.php");
        exit();

    } // ferme le if n'est pas vide
    else {
        $msg .= '<p style="background:#6A0000; color:white; width:72%">Veuillez renseigner les champs !</p>';
    }

} // ferme le if(isset) du form


// Suppression d'un loisir
if (isset($_GET['id_loisir'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_loisir'];

    $resultat = "DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: loisirs.php"); // pour revenir sur la page

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

        <link rel="stylesheet" href="css/style_admin.css">

        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
    </head>
    <body>
        <?php
        $resultat = $pdo -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id ='$id_utilisateur'");
        $resultat->execute();
        $nbr_loisirs = $resultat->rowCount();

        // $ligne_competence = $resultat -> fetch();
?>
<?php include('inc/nav.inc.php'); ?>
<div class="container">
    <div class="page-header">
        <h1>Admin : <?= ($ligne_utilisateur['prenom']); ?></h1>
    </div>
    <!-- Fil d'ariane -->
    <ol class="breadcrumb">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="#">Parcours</a></li>
        <li class="active">Loisirs</li>
    </ol>
    <div class="row">
        <div class="col-md-8">
            <h2>Les loisirs :</h2>
            <h4 class="well">J'ai <?= $nbr_loisirs;?> loisir<?= ($nbr_loisirs>1)?'s':''?></h4>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table border="2" class="table table-condensed table-hover">
                    <tr class="col-md-offset-10">
                        <th>Loisirs</th>
                        <th>Suppression</th>
                        <th>Modification</th>
                    </tr>
                    <tr>
                        <?php while ($ligne_loisir = $resultat -> fetch()) { ?>
                            <td><?= $ligne_loisir['loisir'];?></td>
                            <td><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir'];?>"><button type="button" class="btn btn-danger col-md-3 col-md-offset-4"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                            <td><a href="modif_loisir.php?id_loisir=<?= $ligne_loisir['id_loisir'];?>"><button type="button" class="btn btn-success col-md-3 col-md-offset-4"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>
                    </tr>
                        <?php } ?>
                    </table>
            </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div>Insertion d'un loisir :</div>
                        </div>
                    </div>
                        <form action="loisirs.php" method="post">
                            <fieldset>
                                <?= $msg; ?>
                                <div class="form-group">
                                    <label for="disabledSelect">Loisir</label>
                                    <input type="text" name="loisir" id="loisir" placeholder="Insérer un loisir" class="form-control">
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
