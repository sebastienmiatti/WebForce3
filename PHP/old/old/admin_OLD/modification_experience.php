<?php

// mise a jour d'une experience
if(isset($_POST['e_titre'])){// par le nom du premier input
    $id_experience = addslashes($_POST['id_experience']);
    $e_titre = addslashes($_POST['e_titre']);
    $e_soustitre = addslashes($_POST['e_soustitre']);
    $e_dates = addslashes($_POST['e_dates']);
    $e_description = addslashes($_POST['e_description']);

    $pdo->exec("UPDATE t_experiences SET e_titre='$e_titre', e_soustitre='$e_soustitre', e_dates='$e_dates', e_description='$e_description'  WHERE id_experience ='$id_experience'");
    header('location: experience.php');
    exit();
}

// je récupère la compétence
$id_experience = $_GET['id_experience']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'"); // la requete est égal a l'id
$ligne_experience = $resultat->fetch();

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

    <div class="panel panel-info">
        <div class="panel-heading">modification de l'expérience, <b><?= ($ligne_experience['e_titre']); ?> </b></div>
        <div class="panel-body">
            <form action="modification_experience.php" method="POST">
                <div class="form-group">
                    <label for="experience">Titre de l'expérience :</label>
                    <input type="text" class="form-control" name="e_titre" value="<?= $ligne_experience['e_titre']; ?>">
                </div>
                <div class="form-group">
                    <label for="experience">Sous-titre :</label>
                    <input type="text" class="form-control" name="e_soustitre" value="<?= $ligne_experience['e_soustitre']; ?>">
                </div>
                <div class="form-group">
                    <label for="experience">Date :</label>
                    <input type="text" class="form-control" name="e_dates" value="<?= $ligne_experience['e_dates']; ?>">
                </div>
                <div class="form-group">
                    <label for="experience">Description :</label>
                    <input type="text" class="form-control" name="e_description" value="<?= $ligne_experience['e_description']; ?>">
                </div>

                <input hidden value="<?= $ligne_experience['id_experience']; ?>" name="id_realsisation">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="experience.php">Retour à la page Expérience</a>
            </div>

            </form>
        </div>
    </div>
<?php require('inc/footer.inc.php');?>
