<?php


// gestion des contenus de la BDD loisir
$resultat = $pdo -> prepare("SELECT * FROM t_loisirs WHERE utilisateur_id='1'");
$resultat->execute();
$nbr_loisir = $resultat->rowCount();
// $ligne_competence = $resultat -> fetch();


// insertion d'une compétence
if (isset($_POST['loisir']))
    { // Si on a posté une nouvelle comp.
    if (!empty($_POST['loisir']))
        { // Si compétence n'est pas vide
            $loisir = addslashes($_POST['loisir']);
            $pdo -> exec("INSERT INTO t_loisirs VALUES (NULL,'$loisir', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
            header("location: loisirs.php");
            exit();
        } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'une compétence
if (isset($_GET['id_loisir']))
    { // on récupère la comp. par son id dans l'url
        $efface =  $_GET['id_loisir'];
        $resultat = "DELETE FROM t_loisirs WHERE id_loisir = '$efface'";
        $pdo -> query($resultat); // on peut avec exec aussi si on veut
        header("location: loisirs.php"); // pour revenir sur la page
    } // ferme le if(isset)

    //inclusion du header comprenant l'init
    include('inc/header.inc.php');

?>
    <div class="panel panel-info">
        <div class="panel-heading text-center"><b>Liste des loisirs</b></div>
    </div>


    <div class="row">
        <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">J'ai <?= $nbr_loisir;?> loisir<?= ($nbr_loisir>1)?'s' : ''?></div>
            <div class="panel-body">
                <table class="table table-bordered table-hover" border="2">
                    <tr>
                        <th>Loisirs</th>
                        <th>Modification</th>
                        <th>Suppression</th>

                    </tr>

                    <tr>
                        <?php while ($ligne_loisir = $resultat -> fetch())
                            : ?>

                                <td><?= $ligne_loisir['loisir'];?></td>
                                <td class="modif"><a href="modification_loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modification</span></button></a></td>
                                <td class="suppr"><a href="loisirs.php?id_loisir=<?=  $ligne_loisir['id_loisir'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>

                    </tr>
                        <?php endwhile ?>
                </table>
            </div>
        </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary">
            <div class="panel-heading">Insertion d'un loisirs</div>
            <div class="panel-body">
                <form action="loisirs.php" method="post">
                    <div class="form-group">
                        <label for="loisirs">Loisir :</label>
                        <input type="text" name="loisir" class="form-control" id="loisir" placeholder="Insérer un loisir">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>
            </div>
            </div>
        </div>
    </div>

<?php require('inc/footer.inc.php') ?>
