<?php
require('inc/inc.header.php');
    // mise à jour d'une realisation
    if(isset($_POST['r_titre'])) { // Par le nom du premier input
        $r_titre        = addslashes($_POST['r_titre']);
        $r_soustitre    = addslashes($_POST['r_soustitre']);
        $r_dates        = addslashes($_POST['r_dates']);
        $r_description  = addslashes($_POST['r_description']);
        $id_realisation   = addslashes($_POST['id_realisation']);

        $pdo->exec("UPDATE t_realisations SET r_titre = '$r_titre', r_soustitre = '$r_soustitre', r_dates = '$r_dates', r_description = '$r_description' WHERE id_realisation = '$id_realisation'");
         header('location:realisations.php');
        exit();
    }
    // je récupère la realisation
    $id_realisation = $_GET['id_realisation']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_realisations WHERE id_realisation = '$id_realisation' "); // La requête est égale à l'id
    $ligne_realisation = $sql->fetch();
?>
<div class="col-sm-4 col-lg-4 text-justify">
    <div class="panel panel-primary">
        <div class=" panel panel-heading">Insertion d'une realisation</div>
        <div class="panel-body">
            <form action="modif_realisation.php" method="post">
                <div class="form-group">
                    <label for="r_titre">Titre</label>
                    <input id="r_titre" name="r_titre" type="text" class="form-control" value="<?= $ligne_realisation['r_titre']; ?>" placeholder="Inserer un titre">
                    <label>Sous Titre</label>
                    <input id="r_soustitre" name="r_soustitre" class="form-control" type="text" value="<?= $ligne_realisation['r_soustitre']; ?>" placeholder="Inserer un soustitre">
                    <label>Dates</label>
                    <input id="r_dates" name="r_dates" class="form-control" type="text" value="<?= $ligne_realisation['r_dates']; ?>" placeholder="Inserer une date">
                    <label>Description</label>
                    <textarea id="r_description" name="r_description" class="form-control" type="text" value="<?= $ligne_realisation['r_description']; ?>" placeholder="Inserer une description"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block form-control" value="Modifier une realisation">
                    <input hidden name="id_realisation" value="<?= $ligne_realisation['id_realisation']; ?>">
                    <div class="panel-footer"><a href="realisations.php" class="form-control">Retour à la page realisations</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
