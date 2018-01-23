<?php
require('inc/inc.header.php');
    // mise à jour d'une compétence
    if(isset($_POST['competence'])) { // Par le nom du premier input
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $id_competence = $_POST['id_competence'];

        $pdo->exec("UPDATE t_competences SET competence = '$competence', c_niveau = '$c_niveau' WHERE id_competence = '$id_competence'");
        header('location:competences.php');
        exit();
    }
    // je récupère la compétence
    $id_competence = $_GET['id_competence']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_competences WHERE id_competence = '$id_competence' "); // La requête est égale à l'id
    $ligne_competence = $sql->fetch();
?>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Modification d'une compétence</div>
                </div>
                <div class="panel-body">
                    <form action="modif_competence.php" method="post">
                        <div class="form-group">
                            <label for="competence">Compétence</label>
                            <input id="competence" name="competence" type="text" class="form-control" value="<?= $ligne_competence['competence']; ?>" placeholder="Modifier une compétence">
                            <label>Niveau</label>
                            <input id="c_niveau" name="c_niveau" type="number"  class="form-control"value="<?= $ligne_competence['c_niveau']; ?>" placeholder="Modifier le niveau">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block form-control" value="Modifier une compétence">
                            <input hidden name="id_competence" value="<?= $ligne_competence['id_competence']; ?>">
                            <div class="panel-footer"><a href="competences.php" class="form-control">Retour à la page compétences</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
