<?php
require('inc/init.inc.php');

//ouverture de la session pour la connexion
if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté')
    { // A mettre sur toutes les pages
      $id_utilisateur = $_SESSION['id_utilisateur'];
      $prenom = $_SESSION['prenom'];
      $nom = $_SESSION['nom'];

  // echo $_SESSION['connexion'];
        } else { // l'utilisateur n'est pas connecté
            header('location: authentification.php');
    } // ferme le else du if isset






// insertion d'une compétence
if (isset($_POST['competence']))
    { // Si on a posté une nouvelle comp.
        if (!empty($_POST['competence']) && !empty($_POST['c_niveau']))
            { // Si compétence n'est pas vide
                $competence = addslashes($_POST['competence']);
                $c_niveau = addslashes($_POST['c_niveau']);

                $pdo->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '$id_utilisateur')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
                header("location: competence.php"); // pour revenir sur la page
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_competence']))
    { // on récupère la comp. par son id dans l'url
        $efface =  $_GET['id_competence'];
        $resultat = "DELETE FROM t_competences WHERE id_competence = '$efface'";
        $pdo -> query($resultat); // on peut avec exec aussi si on veut
        header("location: competence.php"); // pour revenir sur la page
    } // ferme le if(isset)

    //inclusion du header comprenant l'init
    include('inc/header.inc.php');
?>

<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des compétences</b></div>
</div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info">
            <div class="panel-heading">J'ai <?= $nbr_competences;?> compétence<?= ($nbr_competences>1)?'s' : ''?></div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover" border="2">
                        <tr>
                            <th>Compétences</th>
                            <th> Niveau </th>
                            <th>Suppression</th>
                            <th>Modification</th>
                        </tr>

                        <tr>
                            <?php while ($ligne_competence = $resultat -> fetch()) : ?>
                                <td><?= $ligne_competence['competence'];?></td>
                                <td><?= $ligne_competence['c_niveau'];?></td>
                                <td><a href="modification_competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></tdModifier</a></td>
                                <td><a href="competence.php?id_competence=<?= $ligne_competence['id_competence'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                        </tr>
                            <?php endwhile ?>
                    </table>
                </div>
            </div>
        </div>

    <div class="col-md-4">
        <div class="panel panel-primary">
            <div class="panel-heading">Insertion d'une compétence</div>
                <div class="panel-body">
                    <form action="competence.php" method="post">

                        <div class="form-group">
                            <label for="competence">Compétence :</label>
                            <input type="text" name="competence" class="form-control" id="competence" placeholder="Insérer une compétence">
                        </div>

                        <div class="form-group">
                            <label for="c_niveau">Niveau :</label>
                            <input type="text" name="c_niveau" class="form-control" id="c_niveau" placeholder="Insérer le niveau">
                        </div>

                        <input type="submit" class="btn btn-success btn-block" value="Insérez">

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
