<?php

//inclusion du header comprenant l'init
require('inc/init.inc.php');

// if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
//     $id_utilisateur = $_SESSION['id_utilisateur'];
//     $prenom = $_SESSION['prenom'];
//     $nom = $_SESSION['nom'];
//
// }else{
//     header('location: connexion.php');
// }

// gestion des contenus de la BDD réalisations
$resultat = $pdo -> prepare("SELECT * FROM t_competences");
$resultat->execute();
$nbr_competences = $resultat->rowCount();
// $ligne_competence = $resultat -> fetch();

// insertion d'un competence
if (isset($_POST['competence']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['competence']) && !empty($_POST['c_categorie']) && !empty($_POST['c_niveau']))
        { // Si réalisation n'est pas vide
            $id_competence = $_POST['id_competence'];
            $competence = addslashes($_POST['competence']);
            $c_niveau = addslashes($_POST['c_niveau']);
            $c_categorie = addslashes($_POST['c_categorie']);


            $pdo->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '$c_categorie')");
            header("location: competence.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une competence
if (isset($_GET['id_competence'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_competence'];
    $resultat = "DELETE FROM t_competences WHERE id_competence = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: competence.php"); // pour revenir sur la page
} // ferme le if(isset)

//inclusion du header
require('inc/header.inc.php');
?>
<hr>
<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des competences</b></div>
</div>
<hr>

<div class="row">
    <div class="col-md-9">
    <div class="panel panel-info">
        <div class="panel-heading"> J'ai <?= $nbr_competences;?> competence<?= ($nbr_competences>1)?'s' : ''?></div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" border="2">

                <tr>
                  <th>competence</th>
                  <th>Titre</th>
                  <th>Sous-titre</th>
                  <th>Dates</th>
                  <th>Description</th>
                  <th>Suppression</th>
                </tr>

                <tr>
                  <?php while ($ligne_competence = $resultat -> fetch()) : ?>
                      <td><?= $ligne_competence['id_competence'];?></td>
                        <td><?= $ligne_competence['competences'];?></td>
                        <td><?= $ligne_competence['c_niveau'];?></td>
                        <td><?= $ligne_competence['c_categorie'];?></td>
                        <td><a href="competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                </tr>
                  <?php endwhile ?>

    </table>
        </div>
    </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-primary">
        <div class="panel-heading">Insertion d'une compétence</div>
            <div class="panel-body">
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label for="competence">Titre de la compétence :</label>
                        <input type="text" name="competence" class="form-control" id="competence" placeholder="Insérer un titre">
                    </div>
                    <div class="form-group">
                        <label for="c_niveau">niveau</label>
                        <input type="text" name="c_niveau" class="form-control" id="c_niveau" placeholder="Insérer un sous-titre">
                    </div>
                    <div class="form-group">
                        <label for="c_categorie">Catégorie</label>
                        <input type="text" name="c_categorie" class="form-control" id="c_categorie" placeholder="Insérer une date">
                    </div>

                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>
            </div>
        </div>
    </div>
</div>
<hr>

<?php require('inc/footer.inc.php');?>
