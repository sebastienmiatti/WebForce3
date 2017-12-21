<?php
//contient la connexion a la bdd et les fonctions
require('inc/header.inc.php');

// insertion d'une conducteur
if (isset($_POST['prenom']) && isset($_POST['nom']))
    { // Si on a posté une nouvelle comp.
        if (!empty($_POST['prenom']) && !empty($_POST['nom']))
            { // Si compétence n'est pas vide
                $prenom = addslashes($_POST['prenom']);
                $nom = addslashes($_POST['nom']);
                $id_conducteur = $_POST['id_conducteur'];

                $pdo->exec("INSERT INTO conducteur VALUES (NULL, '$prenom', '$nom')");
                header("location: conducteur.php"); // pour revenir sur la page
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


// Suppression d'un conducteur
if (isset($_GET['id_conducteur']))
    { // on récupère le conucteur. par son id dans l'url
        $efface =  $_GET['id_conducteur'];
        $resultat = "DELETE FROM conducteur WHERE id_conducteur = '$efface'";
        $pdo->query($resultat); // on peut avec exec aussi si on veut
        header("location: conducteur.php"); // pour revenir sur la page
    } // ferme le if(isset)


// gestion des contenus de la BDD conducteurs
$resultat = $pdo -> prepare("SELECT * FROM conducteur");
$resultat->execute();
$nbr_conducteurs = $resultat->rowCount();
//$ligne_conducteur = $resultat -> fetch();




 ?>

 <hr>
 <div class="panel panel-info">
     <div class="panel-heading text-center"><b>Liste des conducteurs</b></div>
 </div>
 <hr>
 <div class="row">
     <div class="col-md-8">
         <div class="panel panel-info">
             <!-- Affiche le nombre de conducteurs -->
             <div class="panel-heading">J'ai <?= $nbr_conducteurs;?> conducteur<?= ($nbr_conducteurs>1)?'s' : ''?></div>
             <div class="panel-body">

                 <table class="table table-bordered table-hover" border="2">
                     <tr>
                         <th>Conducteur numéro</th>
                         <th> Prénom </th>
                         <th> Nom </th>
                         <th>Modification</th>
                         <th>Suppression</th>
                     </tr>

                     <tr>
                         <?php while ($ligne_conducteur = $resultat -> fetch()) : ?>
                             <td><?= $ligne_conducteur['id_conducteur'];?></td>
                             <td><?= $ligne_conducteur['prenom'];?></td>
                             <td><?= $ligne_conducteur['nom'];?></td>
                             <td><a href="modification_conducteur.php?id_conducteur=<?= $ligne_conducteur['id_conducteur'];?>"><button type="button" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                             <td><a href="conducteur.php?id_conducteur=<?= $ligne_conducteur['id_conducteur'];?>"><button type="button" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                         </tr>
                     <?php endwhile ?>
                 </table>
             </div>
         </div>
     </div>

     <div class="col-sm-4 col-md-4 text-justify">
         <div class="panel panel-primary">
             <div class="panel-heading">Insertion d'un conducteur</div>
             <div class="panel-body">
                 <!-- je déclare mon formulaire avec une balise form -->
                 <form action="conducteur.php" method="POST">
                     <!-- texte -->
                     <div class="form-group">
                         <label for="prenom">Prenom :</label>
                         <input type="text" name="prenom" class="form-control" required>
                     </div>
                     <div class="form-group">
                         <label for="nom">Nom :</label>
                         <input type="text" name="nom" class="form-control" required>
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
