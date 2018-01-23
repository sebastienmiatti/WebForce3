<?php
require('inc/inc.header.php');
    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_titre_cv");
    $sql -> execute();
    $nbr_titre_cv = $sql->rowCount();
    // Insertion d'une formation
    if(isset($_POST['titre_cv'])) { // Si on a posté une nouvelle formation
        if($_POST['titre_cv'] != '' && $_POST['accroche'] != ''  && $_POST['logo'] != '')  { // Si formation n'est pas vide
            // $f_titre             = addslashes($_POST['f_titre']);
            // $f_soustitre         = addslashes($_POST['f_soustitre']);
            // $f_dates             = addslashes($_POST['f_dates']);
            // $f_description       = addslashes($_POST['f_description']);
            // $pdo->exec("INSERT INTO t_titre_cv  VALUES ('$f_titre', '$f_soustitre', '$f_dates', '$f_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session

            $sql =  $pdo->prepare("INSERT INTO t_titre_cv (titre_cv, accroche, logo, utilisateur_id) VALUES (:titre_cv, :accroche, :logo, '1')");

            $sql->bindParam(':titre_cv', addslashes($_POST['titre_cv']), PDO::PARAM_STR);
            $sql->bindParam(':accroche', addslashes($_POST['accroche']), PDO::PARAM_STR);
            $sql->bindParam(':logo', addslashes($_POST['logo']), PDO::PARAM_STR);
            if($sql->execute()) {

                header('location:titre_cv.php');
            }
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une formation
    if(isset($_GET['id_titre_cv'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_titre_cv']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_titre_cv WHERE id_titre_cv = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:titre_cv.php'); // pour revenir sur la page

    } // ferme le if isset
?>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_titre_cv; ?> Titres CV</div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des Titres CV</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <th>Titres</th>
                                <th>Titre CV</th>
                                <th>Accroche</th>
                                <th>Logo</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                            <tr>
                        <?php while($ligne_titre_cv = $sql->fetch()) {  ?>
                                <td><?= $ligne_titre_cv['id_titre_cv']; ?></td>
                                <td><?= $ligne_titre_cv['titre_cv']; ?></td>
                                <td><?= $ligne_titre_cv['accroche']; ?></td>
                                <td><?= $ligne_titre_cv['logo']; ?></td>

                                <td class="modif"><a href="modif_titre_cv.php?id_titre_cv=<?= $ligne_titre_cv['id_titre_cv']; ?>">
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                    <td class="supr"><a href="titre_cv.php?id_titre_cv=<?= $ligne_titre_cv['id_titre_cv']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                </tr>
                        <?php } ?>
                        </table>
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg4 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'un Titre cv</div>
                    <div class="panel-body">
                        <form action="titre_cv.php" method="post">
                            <div class="form-group">
                                <label>Titre cv</label>
                                <textarea id="titre_cv" name="titre_cv" class="form-control" type="text" placeholder="Inserer un titre"></textarea>
                                <label>Accroche</label>
                                <textarea id="accroche" name="accroche" class="form-control" type="text" placeholder="Inserer une accroche"></textarea>
                                <label>Logo</label>
                                <input id="logo" name="logo" class="form-control" type="text" placeholder="Inserer un logo">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="ajouté un titre">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
<?php require('inc/inc.footer.php');?>
