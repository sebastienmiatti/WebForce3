<?php
 require('inc/inc.header.php');
    // mise à jour d'une compétence
    if(isset($_POST['loisirs'])) { // Par le nom du premier input
        $loisirs = addslashes($_POST['loisirs']);
        $id_loisir = $_POST['id_loisir'];
        $pdo->exec("UPDATE t_loisirs SET loisirs = '$loisirs' WHERE id_loisir = '$id_loisir'");
        header('location:loisirs.php');
        exit();
    }
    // je récupère la compétence
    $id_loisir = $_GET['id_loisir']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir' "); // La requête est égale à l'id
    $ligne_loisirs = $sql->fetch();
?>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Modification d'un loisir</div>
                </div>
                <div class="panel-body">
                    <form action="modif_loisirs.php.php" method="post">
                        <div class="form-group">
                            <label for="loisirs">Loisirs</label>
                            <input id="loisirs" name="loisirs" type="text" class="form-control" value="<?= $ligne_loisirs['loisirs']; ?>" placeholder="Modifier un  loisir">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block form-control" value="Valider">
                            <input hidden name="id_loisir" value="<?= $ligne_loisirs['id_loisir']; ?>">
                            <div class="panel-footer"><a href="loisirs.php" class="form-control">Retour à la page loisir</a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
