<?php
//contient la connexion a la bdd et les fonctions
require('inc/header.inc.php');



// insertion d'une association_vehicule_conducteur
if (isset($_POST['id_vehicule']) && isset($_POST['id_conducteur']))
    { // Si on a posté une nouvelle comp.
        if (!empty($_POST['id_vehicule']) && !empty($_POST['id_conducteur']))
            { // Si compétence n'est pas vide
                $id_vehicule = addslashes($_POST['id_vehicule']);
                $id_conducteur = addslashes($_POST['id_conducteur']);
                $id_association = $_POST['id_association'];

                $pdo->exec("INSERT INTO association_vehicule_conducteur VALUES (NULL, '$id_vehicule', '$id_conducteur')");
                header("location: association_vehicule_conducteur.php"); // pour revenir sur la page
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'un association_vehicule_conducteur
if (isset($_GET['id_association']))
    { // on récupère le conucteur. par son id dans l'url
        $efface =  $_GET['id_association'];
        $resultat = "DELETE FROM association_vehicule_conducteur WHERE id_association = '$efface'";
        $pdo->query($resultat); // on peut avec exec aussi si on veut
        header("location: association_vehicule_conducteur.php"); // pour revenir sur la page
    } // ferme le if(isset)


// gestion des contenus de la BDD conducteurs
$resultat = $pdo -> prepare("SELECT * FROM association_vehicule_conducteur");
$resultat->execute();
$nbr_associations = $resultat->rowCount();
//ligne_association_vehicule_conducteur = $resultat -> fetch();

 ?>

 <hr>
 <div class="panel panel-info">
     <div class="panel-heading text-center"><b>Liste des associations</b></div>
 </div>
 <hr>
 <div class="row">
     <div class="col-md-8">
         <div class="panel panel-info">
              <!-- Affiche le nombre d'association -->
             <div class="panel-heading">J'ai <?= $nbr_associations;?> association<?= ($nbr_associations>1)?'s' : ''?></div>
             <div class="panel-body">

                 <table class="table table-bordered table-hover" border="2">
                     <tr>
                         <th>Conducteur numéro</th>
                         <th> Numéro véhicule </th>
                         <th> Numéro conducteur </th>
                         <th>Modification</th>
                         <th>Suppression</th>
                     </tr>

                     <tr>
                         <?php while ($ligne_association = $resultat -> fetch()) : ?>
                             <td><?= $ligne_association['id_association'];?></td>
                             <td><?= $ligne_association['id_vehicule'];?></td>
                             <td><?= $ligne_association['id_conducteur'];?></td>
                             <td><a href="modification_association_vehicule_conducteur.php?id_association=<?= $ligne_association['id_association'];?>"><button type="button" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                             <td><a href="association_vehicule_conducteur.php?id_association=<?= $ligne_association['id_association'];?>"><button type="button" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                         </tr>
                     <?php endwhile ?>
                 </table>
             </div>
         </div>
     </div>

     <div class="col-sm-4 col-md-4 text-justify">
         <div class="panel panel-primary">
             <div class="panel-heading">Insertion d'une association</div>
             <div class="panel-body">
                 <!-- je déclare mon formulaire avec une balise form -->
                 <form action="association_vehicule_conducteur.php" method="POST">
                     <!-- texte -->
                     <div class="form-group">
                         <label for="id_vehicule">Numéro véhicule :</label>
                         <input type="number" name="id_vehicule" class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="id_conducteur">Numéro conducteur :</label>
                         <input type="number" name="id_conducteur" class="form-control">
                     </div>

                     <!-- Bouton envoie du formulaire -->
                     <input type="submit" class="btn btn-success btn-block" value="Insérez">
                     <!-- Bouton pour vider le formulaire -->
                     <input type="reset" class="btn btn-danger btn-block" value="Annulez">
                 </form>
             </div>
         </div>
     </div>
 </div>
 <hr>


 <?php require('inc/footer.inc.php');?>
