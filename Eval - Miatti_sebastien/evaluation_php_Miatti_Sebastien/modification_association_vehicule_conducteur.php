<?Php
require('inc/header.inc.php');

// mise a jour d'un association_vehicule_conducteur
if(isset($_POST['id_vehicule']) && isset($_POST['id_conducteur']))
{
    $id_vehicule = addslashes($_POST['id_vehicule']);
    $id_conducteur = addslashes($_POST['id_conducteur']);
    $id_association = $_POST['id_association'];

    $pdo->exec("UPDATE association_vehicule_conducteur SET id_vehicule='$id_vehicule', id_conducteur='$id_conducteur', WHERE id_association ='$id_association'");
    header('location: association_vehicule_conducteur.php');
    exit();
}

//Récupération des association_vehicule_conducteurs
$id_association = $_GET['id_association']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM association_vehicule_conducteur WHERE id_association = '$id_association'"); // la requete est égal a l'id
$ligne_association = $resultat->fetch();
?>

<hr>
<div class="panel panel-info">
    <div class="panel-heading">modification de l'association, <b><?= ($ligne_association['id_association']); ?></b></div>
    <div class="panel-body">

        <form action="association_vehicule_conducteur.php" method="POST">
            <div class="form-group">
                <label for="id_vehicule">Numéro vehicule :</label>
                <input type="number" name="id_vehicule" class="form-control" value="<?= $ligne_association['id_vehicule']; ?>">
            </div>

            <div class="form-group">
                <label for="id_conducteur">Numéro conducteur :</label>
                <input type="number" name="id_conducteur" class="form-control" value="<?= $ligne_association['id_conducteur']; ?>">
            </div>

            <input hidden value="<?= $ligne_association['id_association']; ?>" name="id_association">
            <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="association_vehicule_conducteur.php">Retour à la page d'association</a>
            </div>
        </form>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
