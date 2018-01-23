<?php

// mise a jour d'un loisir
if(isset($_POST['utilisateurs'])){// par le nom du premier input
    $utilisateur = addslashes($_POST['utilisateur']);

    $id_utilisateur = $_POST['id_loisir'];

    $pdo->exec("UPDATE t_utilisateurs SET loisir='$utilisateurs', id_loisir='$id_utilisateur' WHERE id_utilisateur ='$id_utilisateur'");
    header('location: utilisateurs.php');
    exit();
}

// je récupère le loisir
$id_utilisateur = $_GET['id_utilisateur']; // par l'id et $_GET
$resultat = $pdo-> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '$id_utilisateur'"); // la requete est égal a l'id
$ligne_utilisateur = $resultat->fetch();

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

    <div class="panel panel-info">
        <div class="panel-heading"><b>modification d'un utilisateur</b></div>
    </div>
    <div class="row">
        <div class="col-md-8">
        <div class="panel panel-info">
            <div class="panel-heading">Modification de : <?= ($ligne_utilisateur['prenom']); ?> <br> Email : <?=($ligne_utilisateur['email']); ?></div>
            <div class="panel-body">
        <form action="modification_utilisateur.php" method="POST">
            <label for="utilisateur">Utilisateur</label>
            <input type="text" name="utilisateur" value="<?= $ligne_utilisateur['utilisateur']; ?>">
            <input hidden value="<?= $ligne_utilisateur['id_utilisateur']; ?>" name="id_utilisateur">
            <input type="submit" value="Mettre à jour">

        </form>
<?php require('inc/footer.inc.php');?>
