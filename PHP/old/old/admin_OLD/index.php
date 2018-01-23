<?php
require('inc/init.inc.php');


//ouverture de la session pour la connexion
if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté')
    { // A mettre sur toutes les pages
      $id_utilisateur = $_SESSION['id_utilisateur'];
      $prenom = $_SESSION['prenom'];
      $nom = $_SESSION['nom'];
      $pseudo = $_SESSION['pseudo'];

  // echo $_SESSION['connexion'];
        } else { // l'utilisateur n'est pas connecté
            header('location: authentification.php');
    } // ferme le else du if isset


    //inclusion du header comprenant l'init
    include('inc/header.inc.php');

?>

    <div class="container">
      <ol class="breadcrumb text-center">
        <li><h1>Site cv <?= ($_SESSION['prenom']); ?> <?= ($_SESSION['nom']); ?></h1></li>
        <hr>
      </ol>

    <div class="row">
      <div class="panel panel-default">

        <div class="panel-heading">
          <h3 class="panel-title">Informations</h3>
        </div>

        <div class="panel-body">
          <div class="table">
          </div>
        </div>

      </div>
    </div>

<?php require('inc/footer.inc.php');?>
