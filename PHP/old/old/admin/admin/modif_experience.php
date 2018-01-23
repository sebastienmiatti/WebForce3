<?php
require('inc/inc.header.php');
    // mise à jour d'une experience
    if(isset($_POST['e_titre'])) { // Par le nom du premier input
        $e_titre        = addslashes($_POST['e_titre']);
        $e_soustitre    = addslashes($_POST['e_soustitre']);
        $e_dates        = addslashes($_POST['e_dates']);
        $e_description  = addslashes($_POST['e_description']);
        $id_experience   = addslashes($_POST['id_experience']);

        $pdo->exec("UPDATE t_experiences SET e_titre = '$e_titre', e_soustitre = '$e_soustitre', e_dates = '$e_dates', e_description = '$e_description' WHERE id_experience = '$id_experience'");
         header('location:experiences.php');
        exit();
    }
    // je récupère la experience
    $id_experience = $_GET['id_experience']; // par l'id et de $_GET
    $sql = $pdo->query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience' "); // La requête est égale à l'id
    $ligne_experience = $sql->fetch();
?>
<div class="col-sm-2 col-lg2 text-justify">
    <div class="panel panel-primary">
        <div class=" panel panel-heading">Insertion d'une experience</div>
        <div class="panel-body">
            <form action="modif_experience.php" method="post">
                <div class="form-group">
                    <label for="e_titre">Titre</label>
                    <input id="e_titre" name="e_titre" type="text" class="form-control" value="<?= $ligne_experience['e_titre']; ?>" placeholder="Inserer un titre">
                    <label>Sous Titre</label>
                    <input id="e_soustitre" name="e_soustitre" class="form-control" type="text" value="<?= $ligne_experience['e_soustitre']; ?>" placeholder="Inserer un soustitre">
                    <label>Dates</label>
                    <input id="e_dates" name="e_dates" class="form-control" type="text" value="<?= $ligne_experience['e_dates']; ?>" placeholder="Inserer une date">
                    <label>Description</label>
                    <textarea id="e_description" name="e_description" class="form-control" type="text" value="<?= $ligne_experience['e_description']; ?>" placeholder="Inserer une description"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block form-control" value="Modifier une experience">
                    <input hidden name="id_experience" value="<?= $ligne_experience['id_experience']; ?>">
                    <div class="panel-footer"><a href="experiences.php" class="form-control">Retour à la page experiences</a></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require('inc/inc.footer.php');?>
