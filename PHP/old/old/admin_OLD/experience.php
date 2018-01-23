<?php

// gestion des contenus de la BDD réalisations
$resultat = $pdo -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_experiences = $resultat->rowCount();
// $ligne_experience = $resultat -> fetch();

// insertion d'une réalisation
if (isset($_POST['e_titre']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['e_titre']) && !empty($_POST['e_dates']) && !empty($_POST['e_soustitre']) && !empty($_POST['e_description']))
        { // Si réalisation n'est pas vide
            $experience = addslashes($_POST['id_experience']);
            $e_titre = addslashes($_POST['e_titre']);
            $e_soustitre = addslashes($_POST['e_soustitre']);
            $e_dates = addslashes($_POST['e_dates']);
            $e_description = addslashes($_POST['e_description']);
            $pdo -> exec("INSERT INTO t_experiences VALUES (NULL, '$e_titre', '$e_soustitre', '$e_dates', '$e_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: experience.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une réalisation
if (isset($_GET['id_experience'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_experience'];
    $resultat = "DELETE FROM t_experiences WHERE id_experience = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: experience.php"); // pour revenir sur la page
} // ferme le if(isset)

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des expériences</b></div>
</div>

<div class="row">
    <div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"> J'ai <?= $nbr_experiences;?> expérience<?= ($nbr_experiences>1)?'s' : ''?></div>
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
                  <?php while ($ligne_experience = $resultat -> fetch()) : ?>
                      <td><?= $ligne_experience['id_experience'];?></td>
                        <td><?= $ligne_experience['e_titre'];?></td>
                        <td><?= $ligne_experience['e_soustitre'];?></td>
                        <td><?= $ligne_experience['e_dates'];?></td>
                        <td><?= $ligne_experience['e_description'];?></td>
                        <td><a href="modification_experience.php?id_experience=<?= $ligne_experience['id_experience'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                        <td><a href="experience.php?id_experience=<?= $ligne_experience['id_experience'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
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
                <form action="experience.php" method="post">
                    <div class="form-group">
                        <label for="e_titre">Titre de l'expérience :</label>
                        <input type="text" name="e_titre" class="form-control" id="e_titre" placeholder="Insérer un titre">
                    </div>
                    <div class="form-group">
                        <label for="e_soustitre">Titre</label>
                        <input type="text" name="e_soustitre" class="form-control" id="e_soustitre" placeholder="Insérer un sous-titre">
                    </div>
                    <div class="form-group">
                        <label for="e_dates">Date</label>
                        <input type="text" name="e_dates" class="form-control" id="e_dates" placeholder="Insérer une date">
                    </div>
                    <div class="form-group">
                        <label for="e_description">description</label>
                        <input type="text" name="e_description" class="form-control" id="e_description" placeholder="Insérer une description">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.inc.php');?>
