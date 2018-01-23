<?php

// // gestion des contenus de la BDD réalisations
// $resultat = $pdo -> prepare("SELECT * FROM t_formations WHERE utilisateur_id='1'");
// $resultat->execute();
// $nbr_formations = $resultat->rowCount();
// // $ligne_formation = $resultat -> fetch();

// insertion d'une réalisation
if (isset($_POST['f_titre']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['f_titre']) && !empty($_POST['f_dates']) && !empty($_POST['f_soustitre']) && !empty($_POST['f_description']))
        { // Si réalisation n'est pas vide
            $formation = addslashes($_POST['id_formation']);
            $f_titre = addslashes($_POST['f_titre']);
            $f_soustitre = addslashes($_POST['f_soustitre']);
            $f_dates = addslashes($_POST['f_dates']);
            $f_description = addslashes($_POST['f_description']);
            $pdo -> exec("INSERT INTO t_formations VALUES (NULL, '$f_titre', '$f_soustitre', '$f_dates', '$f_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: formation.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une réalisation
if (isset($_GET['id_formation'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_formation'];
    $resultat = "DELETE FROM t_formations WHERE id_formation = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: formation.php"); // pour revenir sur la page
} // ferme le if(isset)

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des formations</b></div>
</div>

<div class="row">
    <div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"> J'ai <?= $nbr_formations;?> formation<?= ($nbr_formations>1)?'s' : ''?></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" border="2">

                <tr>
                  <th>Formation</th>
                  <th>Titre</th>
                  <th>Sous-titre</th>
                  <th>Dates</th>
                  <th>Description</th>
                  <th>Modification</th>
                  <th>Suppression</th>
                </tr>

                <tr>
                  <?php while ($ligne_formation = $resultat -> fetch()) : ?>
                      <td><?= $ligne_formation['id_formation'];?></td>
                        <td><?= $ligne_formation['f_titre'];?></td>
                        <td><?= $ligne_formation['f_soustitre'];?></td>
                        <td><?= $ligne_formation['f_dates'];?></td>
                        <td><?= $ligne_formation['f_description'];?></td>
                        <td><a href="modification_formation.php?id_formation=<?= $ligne_formation['id_formation'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                        <td><a href="formation.php?id_formation=<?= $ligne_formation['id_formation'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                </tr>
                  <?php endwhile ?>

    </table>
        </div>
    </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">Insertion d'une expérience</div>
            <div class="panel-body">
                <form action="formation.php" method="post">
                    <div class="form-group">
                        <label for="f_titre">Titre de l'expérience :</label>
                        <input type="text" name="f_titre" class="form-control" id="f_titre" placeholder="Insérer un titre">
                    </div>
                    <div class="form-group">
                        <label for="f_soustitre">Titre</label>
                        <input type="text" name="f_soustitre" class="form-control" id="f_soustitre" placeholder="Insérer un sous-titre">
                    </div>
                    <div class="form-group">
                        <label for="f_dates">Date</label>
                        <input type="text" name="f_dates" class="form-control" id="f_dates" placeholder="Insérer une date">
                    </div>
                    <div class="form-group">
                        <label for="f_description">description</label>
                        <input type="text" name="f_description" class="form-control" id="f_description" placeholder="Insérer une description">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php');?>
