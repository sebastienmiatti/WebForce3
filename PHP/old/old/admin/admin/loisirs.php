<?php
require('inc/inc.header.php');
if(!$_SESSION['connexion']) {
    header('location:../index_.php');
}
    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_loisirs WHERE utilisateur_id='1'");
    $sql -> execute();
    $nbr_loisirs = $sql->rowCount();
    // Insertion d'un loisir
    if(isset($_POST['loisirs'])) { // Si on a posté un nouveau loisir
        if($_POST['loisirs'] != '')  { // Si loisir n'est pas vide
            $loisir = addslashes($_POST['loisirs']);
            $pdo->exec("INSERT INTO t_loisirs VALUES (NULL, '$loisir', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session
            header('location: loisirs.php');
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form
    // Suppression d'un loisir
    if(isset($_GET['id_loisir'])) { // on récupère le loisir. par son id dans l'url
        $efface = $_GET['id_loisir']; //  je mets cela dans une variable
        $sql = (" DELETE FROM `t_loisirs` WHERE id_loisir = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location: loisirs.php'); // pour revenir sur la page

    } // ferme le if isset

?>
        <div class="panel panel-default">
            <div class="panel-heading">Il y a  <?= $nbr_loisirs; ?> loisirs</div>
        </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-info">
                    <div class="panel-heading">Liste des loisirs</div>
                    <table class="table table-bordered table-hover">
                            <tr>
                                <th>Loisirs</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                        <tr>
                    <?php while($ligne_loisir = $sql->fetch()) { ?>
                            <td><?= $ligne_loisir['loisirs']; ?></td>
                            <td class = "modif"><a href="modif_loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>
                            <td class = "supr"><a href="loisirs.php?id_loisir=<?= $ligne_loisir['id_loisir']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            </div>
            <div class="col-sm-4 col-lg-4 text-justify">
                <div class="panel panel-primary">
                        <div class="panel-heading">Insertion d'un loisir</div>
                        <div class="panel-body">
                        <form action="loisirs.php" method="post">
                            <div class="form-group">
                                <label for="loisirs">Loisirs</label>
                                <input id="loisirs" name="loisirs" type="text" class="form-control" placeholder="Inserer un loisir">
                            </div>
                                <button type="submit" class="btn btn-success btn-block form-control">Insérez</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require('inc/inc.footer.php');?>
