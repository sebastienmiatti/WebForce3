<?php
require('inc/header.inc.php');
if(!$_SESSION['connexion']) {
    header('location: index.php');
}
    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1' ");
    $sql -> execute();
    $nbr_competences = $sql->rowCount();
    // Insertion d'une compétence
    if(isset($_POST['competence'])) { // Si on a posté une nouvelle compétence
        if($_POST['competence'] != '' && $_POST['c_niveau'] != '')  { // Si compétence n'est pas vide
            $competence = addslashes($_POST['competence']);
            $c_niveau   = addslashes($_POST['c_niveau']);
            $pdo->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session
            header('location:competences.php');
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form
    // Suppression d'une compétence
    if(isset($_GET['id_competence'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_competence']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_competences WHERE id_competence = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:competences.php'); // pour revenir sur la page

    } // ferme le if isset
?>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_competences; ?> compétences</div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des compétences</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <th>Compétences</th>
                                <th>Niveau en %</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                            <tr>
                        <?php while($ligne_competences = $sql->fetch()) {  ?>
                                <td><?= $ligne_competences['competence']; ?></td>
                                <td><?= $ligne_competences['c_niveau']; ?></td>

                                <td class="modif"><a href="modif_competence.php?id_competence=<?= $ligne_competences['id_competence']; ?>">
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                    <td class="supr"><a href="competences.php?id_competence=<?= $ligne_competences['id_competence']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                </tr>
                        <?php } ?>
                        </table>
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg4 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'une compétence</div>
                    <div class="panel-body">
                        <form action="competences.php" method="post">
                            <div class="form-group">
                                <label for="competence">Compétence</label>
                                <input id="competence" name="competence" type="text" class="form-control" placeholder="Inserer une compétence">
                                <label>Niveau</label>
                                <input id="c_niveau" name="c_niveau" class="form-control" type="text" placeholder="Inserer le niveau">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="Ajouté une compétence">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>
<?php require('inc/inc.footer.php');?>
