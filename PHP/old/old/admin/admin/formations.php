<?php
require('inc/inc.header.php');
        if(!$_SESSION['connexion']) {
            header('location:../index_.php');
        }
    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
    $sql -> execute();
    $nbr_formations = $sql->rowCount();
    // Insertion d'une formation
    if(isset($_POST['f_titre'])) { // Si on a posté une nouvelle formation
        if($_POST['f_titre'] != '' && $_POST['f_soustitre'] != ''  && $_POST['f_dates'] != '' && $_POST['f_description'] != '')  { // Si formation n'est pas vide
            // $f_titre             = addslashes($_POST['f_titre']);
            // $f_soustitre         = addslashes($_POST['f_soustitre']);
            // $f_dates             = addslashes($_POST['f_dates']);
            // $f_description       = addslashes($_POST['f_description']);
            // $pdo->exec("INSERT INTO t_formations  VALUES ('$f_titre', '$f_soustitre', '$f_dates', '$f_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session

            $sql =  $pdo->prepare("INSERT INTO t_formations (f_titre, f_soustitre, f_dates, f_description, utilisateur_id) VALUES (:f_titre, :f_soustitre, :f_dates, :f_description, '1')");

            $sql->bindParam(':f_titre', addslashes($_POST['f_titre']), PDO::PARAM_STR);
            $sql->bindParam(':f_soustitre', addslashes($_POST['f_soustitre']), PDO::PARAM_STR);
            $sql->bindParam(':f_dates', addslashes($_POST['f_dates']), PDO::PARAM_STR);
            $sql->bindParam(':f_description', addslashes($_POST['f_description']), PDO::PARAM_STR);
            if($sql->execute()) {

                header('location:formations.php');
            }
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une formation
    if(isset($_GET['id_formation'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_formation']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_formations WHERE id_formation = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:formations.php'); // pour revenir sur la page

    } // ferme le if isset
?>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_formations; ?> formations</div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des formations</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <th>Formations</th>
                                <th>Titre</th>
                                <th>Sous titre</th>
                                <th>Dates</th>
                                <th>Description</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                            <tr>
                        <?php while($ligne_formations = $sql->fetch()) {  ?>
                                <td><?= $ligne_formations['id_formation']; ?></td>
                                <td><?= $ligne_formations['f_titre']; ?></td>
                                <td><?= $ligne_formations['f_soustitre']; ?></td>
                                <td><?= $ligne_formations['f_dates']; ?></td>
                                <td><?= $ligne_formations['f_description']; ?></td>

                                <td class="modif"><a href="modif_formation.php?id_formation=<?= $ligne_formations['id_formation']; ?>">
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                    <td class="supr"><a href="formations.php?id_formation=<?= $ligne_formations['id_formation']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                </tr>
                        <?php } ?>
                        </table>
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg4 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'une formation</div>
                    <div class="panel-body">
                        <form action="formations.php" method="post">
                            <div class="form-group">
                                <label for="f_titre">Titre</label>
                                <input id="f_titre" name="f_titre" type="text" class="form-control" placeholder="Inserer un titre">
                                <label>Sous Titre</label>
                                <input id="f_soustitre" name="f_soustitre" class="form-control" type="text" placeholder="Inserer un soustitre">
                                <label>Dates</label>
                                <input id="f_dates" name="f_dates" class="form-control" type="text" placeholder="Inserer une date">
                                <label>Description</label>
                                <textarea id="f_description" name="f_description" class="form-control" type="text" placeholder="Inserer une description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="ajouté une formation">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
<?php require('inc/inc.footer.php');?>
