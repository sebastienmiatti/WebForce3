<?Php
require('inc/header.inc.php');

// Récupération des conducteurs
$id_conducteur = $_GET['id_conducteur']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM conducteur WHERE id_conducteur = '$id_conducteur'"); // la requete est égal a l'id
$ligne_conducteur = $resultat->fetch();

// mise a jour d'un conducteur
if(isset($_POST['prenom']) && isset($_POST['nom']))
{
    $prenom = addslashes($_POST['prenom']);
    $nom = addslashes($_POST['nom']);
    $id_conducteur = $_POST['id_conducteur'];

    $pdo->exec("UPDATE conducteur SET prenom='$prenom', nom='$nom', WHERE id_conducteur ='$id_conducteur'");
    header('location: conducteur.php');
    exit();
}


?>

<hr>
<div class="panel panel-info">
    <div class="panel-heading">modification du conducteur, <b><?= ($ligne_conducteur['id_conducteur']); ?></b></div>
    <div class="panel-body">

        <form action="conducteur.php" method="POST">
            <div class="form-group">
                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" class="form-control" value="<?= $ligne_conducteur['prenom']; ?>">
            </div>

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" class="form-control" value="<?= $ligne_conducteur['nom']; ?>">
            </div>

            <input hidden value="<?= $ligne_conducteur['id_conducteur']; ?>" name="id_conducteur">
            <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

            <div class="panel-footer">
                <a href="conducteur.php">Retour à la page Conducteur</a>
            </div>
        </form>
    </div>
</div>

<?php require('inc/footer.inc.php'); ?>
