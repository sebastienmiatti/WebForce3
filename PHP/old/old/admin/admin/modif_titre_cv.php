<?php
require('inc/inc.header.php');
    // mise à jour d'un titre
    if(isset($_POST['titre_cv'])) { // Par le nom du premier input
        $titre_cv        = addslashes($_POST['titre_cv']);
        $accroche        = addslashes($_POST['accroche']);
        $logo            = addslashes($_POST['logo']);
        $id_titre_cv     = addslashes($_POST['id_titre_cv']);

        $pdo->exec("UPDATE t_titre_cv SET titre_cv = '$titre_cv', accroche = '$accroche', logo = '$logo' WHERE id_titre_cv = '$id_titre_cv'");
        header('location:titre_cv.php');
        exit();
    }
    // je récupère le titre
    $id_titre_cv = $_GET['id_titre_cv']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_titre_cv WHERE id_titre_cv = '$id_titre_cv' "); // La requête est égale à l'id
    $ligne_titre_cv = $sql->fetch();
?>
<div class="col-sm-2 col-lg2 text-justify">
    <div class="panel panel-primary">
        <div class=" panel panel-heading">Modification d'un titre CV</div>
        <div class="panel-body">
            <form action="modif_titre_cv.php" method="post">
                <div class="form-group">
                    <label>Titre cv</label>
                    <textarea id="titre_cv" name="titre_cv" class="form-control" type="text" placeholder="Inserer un titre"><?= $ligne_titre_cv['titre_cv']?></textarea>
                    <label>Accroche</label>
                    <textarea id="accroche" name="accroche" class="form-control" type="text" placeholder="Inserer une accroche"><?= $ligne_titre_cv['accroche']?></textarea>
                    <label>Logo</label>
                    <input id="logo" name="logo" class="form-control" type="text" value="<?= $ligne_titre_cv['logo']?>" placeholder="Inserer un logo">
                </div>
                <div class="form-group">
                    <input hidden name="id_titre_cv" value="<?= $ligne_titre_cv['id_titre_cv']?>">
                    <input type="submit" class="btn btn-success btn-block form-control" value="ajouté un titre">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
