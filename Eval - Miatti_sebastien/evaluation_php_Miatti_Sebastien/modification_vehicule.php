<?Php
require('inc/header.inc.php');

// mise a jour d'un vehicule
if(isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['couleur']) && isset($_POST['immatriculation']))
{
    $marque = addslashes($_POST['marque']);
    $modele = addslashes($_POST['modele']);
    $couleur = addslashes($_POST['couleur']);
    $immatriculation = addslashes($_POST['immatriculation']);
    $id_vehicule = $_POST['id_vehicule'];

    $pdo->exec("UPDATE vehicule SET marque='$marque', modele='$modele', couleur='$couleur', immatriculation='$immatriculation' WHERE id_vehicule ='$id_vehicule'");
    header('location: vehicule.php');
    exit();
}

// Récupération des vehicules
$id_vehicule = $_GET['id_vehicule']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM vehicule WHERE id_vehicule = '$id_vehicule'"); // la requete est égal a l'id
$ligne_vehicule = $resultat->fetch();
?>

<hr>
<div class="panel panel-info">
    <div class="panel-heading">modification du vehicule, <b><?= ($ligne_vehicule['id_vehicule']); ?></b></div>
    <div class="panel-body">

        <form action="vehicule.php" method="POST">
            <div class="form-group">
                <label for="marque">Marque :</label>
                <input type="text" name="marque" class="form-control" value="<?= $ligne_vehicule['marque']; ?>">
            </div>

            <div class="form-group">
                <label for="modele">Modèle :</label>
                <input type="text" name="modele" class="form-control" value="<?= $ligne_vehicule['modele']; ?>">
            </div>

            <div class="form-group">
                <label for="couleur">Couleur :</label>
                <input type="text" name="couleur" class="form-control" value="<?= $ligne_vehicule['couleur']; ?>">
            </div>

            <div class="form-group">
                <label for="immatriculation">Immatriculation :</label>
                <input type="text" name="immatriculation" class="form-control" value="<?= $ligne_vehicule['immatriculation']; ?>">
            </div>

            <input hidden value="<?= $ligne_vehicule['id_vehicule']; ?>" name="id_vehicule">
            <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="vehicule.php">Retour à la page vehicule</a>
            </div>
        </form>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
