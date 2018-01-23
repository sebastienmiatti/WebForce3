<?php
require('inc/inc.header.php');

    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_realisations WHERE utilisateur_id = '1'");
    $sql -> execute();
    $nbr_realisations = $sql->rowCount();
    // Insertion d'une realisation
    if(isset($_POST['r_titre'])) { // Si on a posté une nouvelle realisation
        if($_POST['r_titre'] != '' && $_POST['r_soustitre'] != ''  && $_POST['r_dates'] != '' && $_POST['r_description'] != '')  { // Si realisation n'est pas vide
            // $r_titre             = addslashes($_POST['r_titre']);
            // $r_soustitre         = addslashes($_POST['r_soustitre']);
            // $r_dates             = addslashes($_POST['r_dates']);
            // $r_description       = addslashes($_POST['r_description']);
            // $pdo->exec("INSERT INTO t_realisations  VALUES ('$r_titre', '$r_soustitre', '$r_dates', '$r_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session

            $sql =  $pdo->prepare("INSERT INTO t_realisations (r_titre, r_soustitre, r_dates, r_description, utilisateur_id) VALUES (:r_titre, :r_soustitre, :r_dates, :r_description, '1' )");

            $sql->bindParam(':r_titre', addslashes($_POST['r_titre']), PDO::PARAM_STR);
            $sql->bindParam(':r_soustitre', addslashes($_POST['r_soustitre']), PDO::PARAM_STR);
            $sql->bindParam(':r_dates', addslashes($_POST['r_dates']), PDO::PARAM_STR);
            $sql->bindParam(':r_description', addslashes($_POST['r_description']), PDO::PARAM_STR);
            if($sql->execute()) {

                header('location:realisations.php');
            }
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une realisation
    if(isset($_GET['id_realisation'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_realisation']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_realisations WHERE id_realisation = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:realisations.php'); // pour revenir sur la page

    } // ferme le if isset
?>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_realisations; ?> realisations</div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des realisations</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <th>Réalisations</th>
                                <th>Titre</th>
                                <th>Sous titre</th>
                                <th>Dates</th>
                                <th>Description</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                            <tr>
                        <?php while($ligne_realisations = $sql->fetch()) {  ?>
                                <td><?= $ligne_realisations['id_realisation']; ?></td>
                                <td><?= $ligne_realisations['r_titre']; ?></td>
                                <td><?= $ligne_realisations['r_soustitre']; ?></td>
                                <td><?= $ligne_realisations['r_dates']; ?></td>
                                <td><?= $ligne_realisations['r_description']; ?></td>

                                <td class="modif"><a href="modif_realisation.php?id_realisation=<?= $ligne_realisations['id_realisation']; ?>">
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                    <td class="supr"><a href="realisations.php?id_realisation=<?= $ligne_realisations['id_realisation']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                </tr>
                        <?php } ?>
                        </table>
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg4 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'une realisation</div>
                    <div class="panel-body">
                        <form action="realisations.php" method="post">
                            <div class="form-group">
                                <label for="r_titre">Titre</label>
                                <input id="r_titre" name="r_titre" type="text" class="form-control" placeholder="Inserer un titre">
                                <label>Sous Titre</label>
                                <input id="r_soustitre" name="r_soustitre" class="form-control" type="text" placeholder="Inserer un soustitre">
                                <label>Dates</label>
                                <input id="r_dates" name="r_dates" class="form-control" type="text" placeholder="Inserer une date">
                                <label>Description</label>
                                <textarea id="r_description" name="r_description" class="form-control" type="text" placeholder="Inserer une description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="ajouté une realisation">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>
<?php require('inc/inc.footer.php');?>
