<?php

// mise a jour d'une compétences
if(isset($_POST['competence'])){// par le nom du premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $id_competence = $_POST['id_competence'];

    $pdo->exec("UPDATE t_competences SET competence='$competence', c_niveau='$c_niveau' WHERE id_competence ='$id_competence'");
    header('location: competence.php');
    exit();
}

// Récupération de la compétence
$id_competence = $_GET['id_competence']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_competences WHERE id_competence = '$id_competence'"); // la requete est égal a l'id
$ligne_competence = $resultat->fetch();

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading">modification de la competence, <b><?= ($ligne_competence['competence']); ?></b></div>
    <div class="panel-body">

        <form action="modification_competence.php" method="POST">
            <div class="form-group">
                <label for="competence">Compétence :</label>
                <input type="text" name="competence" class="form-control" value="<?php echo $ligne_competence['competence']; ?>">
            </div>

            <div class="form-group">
                <label for="c_niveau">Niveau :</label>
                <input type="number" name="c_niveau" class="form-control" value="<?php echo $ligne_competence['c_niveau']; ?>">
            </div>

                <input hidden value="<?php echo $ligne_competence['id_competence']; ?>" name="id_competence">
                <input type="submit" class="btn btn-success btn-block" value="mettre a jour">

                <div class="panel-footer">
                    <a href="competence.php">Retour à la page Compétence</a>
                </div>
        </form>
    </div>
</div>


<?php require('inc/footer.inc.php');?>
