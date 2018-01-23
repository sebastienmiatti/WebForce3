<?php


// mise a jour d'une realisation
if(isset($_POST['r_titre'])){// par le nom du premier input
    $id_realisation = addslashes($_POST['id_realisation']);
    $r_titre = addslashes($_POST['r_titre']);
    $r_soustitre = addslashes($_POST['r_soustitre']);
    $r_dates = addslashes($_POST['r_dates']);
    $r_description = addslashes($_POST['r_description']);

    $pdo->exec("UPDATE t_realisations SET r_titre='$r_titre', r_soustitre='$r_soustitre', r_dates='$r_dates', r_description='$r_description'  WHERE id_realisation ='$id_realisation'");
    header('location: realisation.php');
    exit();
}

// je récupère la compétence
$id_realisation = $_GET['id_realisation']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_realisations WHERE id_realisation = '$id_realisation'"); // la requete est égal a l'id
$ligne_realisation = $resultat->fetch();

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

    <div class="panel panel-info">
        <div class="panel-heading">modification de la réalisation, <b><?= ($ligne_realisation['r_titre']); ?> </b></div>
        <div class="panel-body">
            <form action="modification_realisation.php" method="POST">
                <div class="form-group">
                    <label for="realisation">Titre de la réalisation :</label>
                    <input type="text" class="form-control" name="r_titre" value="<?= $ligne_realisation['r_titre']; ?>">
                </div>
                <div class="form-group">
                    <label for="realisation">Sous-titre :</label>
                    <input type="text" class="form-control" name="r_soustitre" value="<?= $ligne_realisation['r_soustitre']; ?>">
                </div>
                <div class="form-group">
                    <label for="realisation">Date :</label>
                    <input type="text" class="form-control" name="r_dates" value="<?= $ligne_realisation['r_dates']; ?>">
                </div>
                <div class="form-group">
                    <label for="realisation">Description :</label>
                    <input type="text" class="form-control" name="r_description" value="<?= $ligne_realisation['r_description']; ?>">
                </div>

                <input hidden value="<?= $ligne_realisation['id_realisation']; ?>" name="id_realsisation">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="realisation.php">Retour à la page Réalisation</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
