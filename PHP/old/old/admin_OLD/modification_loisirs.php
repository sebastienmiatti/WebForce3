<?php

// Récupération des loisirs
$id_loisir = $_GET['id_loisir']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_loisirs WHERE id_loisir = '$id_loisir'"); // la requete est égal a l'id
$ligne_loisir = $resultat->fetch();


// mise a jour d'un loisir
if(isset($_POST['loisir'])){// par le nom du premier input
    $loisir = addslashes($_POST['loisir']);

    $id_loisir = $_POST['id_loisir'];

    $pdo->exec("UPDATE t_loisirs SET loisir='$loisir', id_loisir='$id_loisir' WHERE id_loisir ='$id_loisir'");
    header('location: loisirs.php');
    exit();
}

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading">modification du loisir, <b><?php echo ($ligne_loisir['loisir']); ?></b></div>
    <div class="panel-body">
        <form action="modification_loisirs.php" method="POST">
            <div class="form-group">
                <label for="loisir">Loisir :</label>
                <input type="text" name="loisir" class="form-control" value="<?php echo $ligne_loisir['loisir']; ?>">
            </div>

            <input hidden value="<?php echo $ligne_loisir['id_loisir']; ?>" name="id_loisir">
            <input type="submit" class="btn btn-success btn-block" value="Mettre à jour">

            <div class="panel-footer">
                <a href="loisirs.php">Retour à la page Loisirs</a>
            </div>

        </form>

<?php require('inc/footer.inc.php');?>
