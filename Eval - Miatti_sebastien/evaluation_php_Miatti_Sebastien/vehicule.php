<?php
//contient la connexion a la bdd et les fonctions
require('inc/header.inc.php');



// insertion d'une vehicule
if (isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['couleur']) && isset($_POST['immatriculation']))
    { // Si on a posté une nouvelle comp.
        if (!empty($_POST['marque']) && !empty($_POST['modele']) && isset($_POST['couleur']) && isset($_POST['immatriculation']))
            { // Si compétence n'est pas vide
                $marque = addslashes($_POST['marque']);
                $modele = addslashes($_POST['modele']);
                $couleur = addslashes($_POST['couleur']);
                $immatriculation = addslashes($_POST['immatriculation']);
                $id_vehicule = addslashes($_POST['id_vehicule']);

                $pdo->exec("INSERT INTO vehicule VALUES (NULL, '$marque', '$modele', '$couleur', '$immatriculation')");
                header("location: vehicule.php"); // pour revenir sur la page
                exit();
            } // ferme le if n'est pas vide
    } // ferme le if(isset) du form


//Suppression d'un vehicule
if (isset($_GET['id_vehicule']))
    { // on récupère le conucteur. par son id dans l'url
        $efface =  $_GET['id_vehicule'];
        $resultat = "DELETE FROM vehicule WHERE id_vehicule = '$efface'";
        $pdo->query($resultat); // on peut avec exec aussi si on veut
        header("location: vehicule.php"); // pour revenir sur la page
    } // ferme le if(isset)


// gestion des contenus de la BDD vehicules
$resultat = $pdo -> prepare("SELECT * FROM vehicule");
$resultat->execute();
$nbr_vehicules = $resultat->rowCount();
//$ligne_vehicule = $resultat -> fetch();

 ?>

  <hr>
  <div class="panel panel-info">
      <div class="panel-heading text-center"><b>Liste des vehicules</b></div>
  </div>
  <hr>
  <div class="row">
      <div class="col-md-8">
          <div class="panel panel-info">
               <!-- Affiche le nombre de véhicule -->
              <div class="panel-heading">J'ai <?= $nbr_vehicules;?> vehicule<?= ($nbr_vehicules>1)?'s' : ''?></div>
              <div class="panel-body">

                  <table class="table table-bordered table-hover" border="2">
                      <tr>
                          <th>vehicule numéro</th>
                          <th> Prénom </th>
                          <th> Nom </th>
                          <th>Modification</th>
                          <th>Suppression</th>
                      </tr>

                      <tr>
                          <?php while ($ligne_vehicule = $resultat -> fetch()) : ?>
                              <td><?= $ligne_vehicule['id_vehicule'];?></td>
                              <td><?= $ligne_vehicule['marque'];?></td>
                              <td><?= $ligne_vehicule['modele'];?></td>
                              <td><?= $ligne_vehicule['couleur'];?></td>
                              <td><?= $ligne_vehicule['immatriculation'];?></td>
                              <td><a href="modification_vehicule.php?id_vehicule=<?= $ligne_vehicule['id_vehicule'];?>"><button type="button" class="btn btn-block btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Modifier</span></button></a></td>
                              <td><a href="vehicule.php?id_vehicule=<?= $ligne_vehicule['id_vehicule'];?>"><button type="button" class="btn btn-block btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Supprimer</span></button></a></td>
                          </tr>
                      <?php endwhile ?>
                  </table>
              </div>
          </div>
      </div>

      <div class="col-sm-4 col-md-4 text-justify">
          <div class="panel panel-primary">
              <div class="panel-heading">Insertion d'un vehicule</div>
              <div class="panel-body">
                  <!-- je déclare mon formulaire avec une balise form -->
                  <form action="vehicule.php" method="POST">
                      <!-- texte -->
                      <div class="form-group">
                          <label for="marque">Marque :</label>
                          <input type="text" name="marque" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="modele">Modele :</label>
                          <input type="text" name="modele" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="couleur">Couleur :</label>
                          <input type="text" name="couleur" class="form-control" required>
                      </div>
                      <div class="form-group">
                          <label for="immatriculation">Immatriculation :</label>
                          <input type="text" name="immatriculation" class="form-control" required>
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
