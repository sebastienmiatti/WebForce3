<?php

// gestion des contenus de la BDD utilisateur
$resultat = $pdo -> prepare("SELECT * FROM t_utilisateurs WHERE id_utilisateur='1'");
$resultat->execute();
$nbr_utilisateur = $resultat->rowCount();// $ligne_realisation = $resultat -> fetch();


// insertion d'un utilisateur
if (isset($_POST['utilisateur']))
    { // Si on a posté un nouveau utilisateur.
        if (!empty($_POST['utilisateur']))
            { // Si l'entrée d'un utilisateur n'est pas vide
                $utilisateur = addslashes($_POST['utilisateur']);
                $prenom = addslashes($_POST['prenom']);
                $nom = addslashes($_POST['nom']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $mdp = addslashes($_POST['mdp']);
                $pseudo = addslashes($_POST['pseudo']);
                $avatar = addslashes($_POST['avatar']);
                $age = addslashes($_POST['age']);
                $date_de_naissance = addslashes($_POST['date_de_naissance']);
                $sexe = addslashes($_POST['sexe']);
                $etat_civil = addslashes($_POST['etat_civil']);
                $adresse = addslashes($_POST['adresse']);
                $code_postal = addslashes($_POST['code_postal']);
                $ville = addslashes($_POST['ville']);
                $pays = addslashes($_POST['pays']);
                $site_web = addslashes($_POST['site_web']);
                $pdo -> exec("INSERT INTO t_utilisateurs VALUES (NULL, '$utilisateur', '$prenom', '$nom', '$email', '$telephone', '$mdp', '$pseudo', '$avatar', '$age', '$etat_civil', '$adresse', '$code_postal', '$ville', '$pays', '$site_web', '1')"); //mettre $id_utilisateur quand on l'aura dans la variable de session
                header("location: utilisateur.php");
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'un utilisateur
if (isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
    $efface =  $_GET['id_utilisateur'];
    $resultat = "DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'";
    $pdo -> query($resultat); // on peut avec exec aussi si on veut
    header("location: utilisateur.php"); // pour revenir sur la page
} // ferme le if(isset)

//inclusion du header comprenant l'init
include('inc/header.inc.php');

?>

<div class="panel panel-info">
    <div class="panel-heading text-center"><b>Liste des Utilisateurs</b></div>
</div>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">J'ai <?= $nbr_utilisateur;?> utilisateur<?= ($nbr_utilisateur>1)?'s' : ''?></div>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-hover table-responsi" border="2">
                <tr>
                  <th>Utilisateur</th>
                  <th>Prenom</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Mdp</th>
                  <th>Pseudo</th>
                  <th>Avatar</th>
                  <th>Age</th>
                  <th>Date de naissance</th>
                  <th>Sexe</th>
                  <th>Etat civil</th>
                  <th>Adresse</th>
                  <th>Code postal</th>
                  <th>Ville</th>
                  <th>Pays</th>
                  <th>Site web</th>
                  <th>Modification</th>
                  <th>Suppression</th>
                </tr>

                  <tr>
                  <?php while ($ligne_utilisateur = $resultat -> fetch()) : ?>
                      <td><?= $ligne_utilisateur['id_utilisateur'];?></td>
                      <td><?= $ligne_utilisateur['prenom'];?></td>
                      <td><?= $ligne_utilisateur['nom'];?></td>
                      <td><?= $ligne_utilisateur['email'];?></td>
                      <td><?= $ligne_utilisateur['phone'];?></td>
                      <td><?= $ligne_utilisateur['mdp'];?></td>
                      <td><?= $ligne_utilisateur['pseudo'];?></td>
                      <td><?= $ligne_utilisateur['avatar'];?></td>
                      <td><?= $ligne_utilisateur['age'];?></td>
                      <td><?= $ligne_utilisateur['date_de_naissance'];?></td>
                      <td><?= $ligne_utilisateur['sexe'];?></td>
                      <td><?= $ligne_utilisateur['etat_civil'];?></td>
                      <td><?= $ligne_utilisateur['adresse'];?></td>
                      <td><?= $ligne_utilisateur['code_postal'];?></td>
                      <td><?= $ligne_utilisateur['ville'];?></td>
                      <td><?= $ligne_utilisateur['pays'];?></td>
                      <td><?= $ligne_utilisateur['site_web'];?></td>
                      <td><a href="modification_utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur'];?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                      <td><a href="utilisateur.php?id_utilisateur=<?= $ligne_utilisateur['id_utilisateur'];?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                  </tr>
              <?php endwhile ?>
                </table>
            </div>


    <div class="panel-footer text-center">
        <div class="panel-heading"><a href="inscription.php"><b>Insertion d'un utilisateur</b></a></div>
        <a href="realisation.php">Retour à la page Réalisation</a>
    </div>

    </form>
    </div>

    <div class="row">
    <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">Insertion d'un utilisateur</div>
            <div class="panel-body">
                <form action="utilisateur.php" method="post">
                    <div class="form-group">
                        <label for="utilisateur">Utilisateur :</label>
                        <input type="text" name="utilisateur" class="form-control" id="utilisateur" placeholder="Insérer un utilisateur">
                    </div>

                    <input type="submit" class="btn btn-success btn-block" value="Insérez">
                </form>

    <?php require('inc/footer.inc.php');?>
