<?php
require('inc/inc.header.php');
    // mise à jour d'une formation
    if(isset($_POST['f_titre'])) { // Par le nom du premier input
        $f_titre        = addslashes($_POST['f_titre']);
        $f_soustitre    = addslashes($_POST['f_soustitre']);
        $f_dates        = addslashes($_POST['f_dates']);
        $f_description  = addslashes($_POST['f_description']);
        $id_formation   = addslashes($_POST['id_formation']);

        $pdo->exec("UPDATE t_formations SET f_titre = '$f_titre', f_soustitre = '$f_soustitre', f_dates = '$f_dates', f_description = '$f_description' WHERE id_formation = '$id_formation'");
         header('location:formations.php');
        exit();
    }
    // je récupère la formation
    $id_formation = $_GET['id_formation']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_formations WHERE id_formation = '$id_formation'"); // La requête est égale à l'id
    $ligne_formation = $sql->fetch();
?>
<div class="col-sm-2 col-lg2 text-justify">
    <div class="panel panel-primary">
        <div class=" panel panel-heading">Insertion d'une formation</div>
        <div class="panel-body">
            <form action="modif_formation.php" method="post">
                <div class="form-group">
                    <label for="f_titre">Titre</label>
                    <input id="f_titre" name="f_titre" type="text" class="form-control" value="<?= $ligne_formation['f_titre']; ?>" placeholder="Inserer un titre">
                    <label>Sous Titre</label>
                    <input id="f_soustitre" name="f_soustitre" class="form-control" type="text" value="<?= $ligne_formation['f_soustitre']; ?>" placeholder="Inserer un soustitre">
                    <label>Dates</label>
                    <input id="f_dates" name="f_dates" class="form-control" type="text" value="<?= $ligne_formation['f_dates']; ?>" placeholder="Inserer une date">
                    <label>Description</label>
                    <textarea id="f_description" name="f_description" class="form-control" type="text" value="<?= $ligne_formation['f_description']; ?>" placeholder="Inserer une description"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block form-control" value="Modifier une formation">
                    <input hidden name="id_formation" value="<?= $ligne_formation['id_formation']; ?>">
                    <div class="panel-footer"><a href="formations.php" class="form-control">Retour à la page formations</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
