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

// gestion des contenus de la BDD réalisations
$resultat = $pdo -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_realisations = $resultat->rowCount();
// $ligne_realisation = $resultat -> fetch();

// insertion d'une réalisation
if (isset($_POST['r_titre']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['r_titre']) && !empty($_POST['r_dates']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_description']))
        { // Si compétence n'est pas vide
            $realisation = addslashes($_POST['id_realisation']);
            $r_titre = addslashes($_POST['r_titre']);
            $r_soustitre = addslashes($_POST['r_soustitre']);
            $r_dates = addslashes($_POST['r_dates']);
            $r_description = addslashes($_POST['r_description']);
            $pdo -> exec("INSERT INTO t_realisations VALUES (NULL, '$r_titre', '$r_soustitre', '$r_dates', '$r_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: realisation.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_realisation'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_realisation'];
    $resultat = "DELETE FROM t_realisations WHERE id_realisation = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: realisation.php"); // pour revenir sur la page
} // ferme le if(isset)

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des réalisations</b></div>
</div>

<div class="row">
    <div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"> J'ai <?= $nbr_realisations;?> réalisation<?= ($nbr_realisations>1)?'s' : ''?></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" border="2">

                <tr>
                  <th>Réalisation</th>
                  <th>Titre</th>
                  <th>Sous-titre</th>
                  <th>Dates</th>
                  <th>Description</th>
                  <th>Modification</th>
                  <th>Suppression</th>
                </tr>

                <tr>
                  <?php while ($ligne_realisation = $resultat -> fetch()) : ?>
                      <td><?= $ligne_realisation['id_realisation'];?></td>
                        <td><?= $ligne_realisation['r_titre'];?></td>
                        <td><?= $ligne_realisation['r_soustitre'];?></td>
                        <td><?= $ligne_realisation['r_dates'];?></td>
                        <td><?= $ligne_realisation['r_description'];?></td>
                        <td><a href="modification_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                        <td><a href="realisation.php?id_realisation=<?= $ligne_realisation['id_realisation'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                </tr>
                  <?php endwhile ?>

    </table>
        </div>
    </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">Insertion d'une réalisation</div>
            <div class="panel-body">
                <form action="realisation.php" method="post">
                    <div class="form-group">
                        <label for="r_titre">Titre de la réalisation :</label>
                        <input type="text" name="r_titre" class="form-control" id="r_titre" placeholder="Insérer un titre">
                    </div>
                    <div class="form-group">
                        <label for="r_soustitre">Titre</label>
                        <input type="text" name="r_soustitre" class="form-control" id="r_soustitre" placeholder="Insérer un sous-titre">
                    </div>
                    <div class="form-group">
                        <label for="r_dates">Date</label>
                        <input type="text" name="r_dates" class="form-control" id="r_dates" placeholder="Insérer une date">
                    </div>
                    <div class="form-group">
                        <label for="r_description">description</label>
                        <input type="text" name="r_description" class="form-control" id="r_description" placeholder="Insérer une description">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php');?>
