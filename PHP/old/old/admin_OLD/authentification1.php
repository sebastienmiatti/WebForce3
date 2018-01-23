<?php
require('inc/init.inc.php');

// pour ce déconnecter a l'admin a mettre dans toutes les pages.
if(isset($_GET['deconnexion']))
{
    $_SESSION['connexion']='';// on vide les variables de session
    $_SESSION['id_utilisateur']='';
    $_SESSION['prenom']='';
    $_SESSION['nom']='';

        unset($_SESSION['connexion']);
        session_destroy();
        //header('location: authentification.php');
} // ferme le if isset de la déconnexion.

//var_dump($_SESSION);


if(isset($_POST['connexion']))
{
	$email = addslashes($_POST['email']);
	 $mdp = addslashes($_POST['mdp']);
	 $result = $pdo -> prepare("SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp'"); // on vérifie pseudo ET mot de passe
	 $result -> execute();
	 $nbr_utilisateur = $result -> rowCount(); // on compte s'il est dans la table, le compte répond 1 s'il y est, 0 s'il n'y est pas
     if ($nbr_utilisateur == 0) { // il n'y est pas
   $msg .= '<div class="alert alert-danger">Erreur d\'authentification !</div>';
}
 else
 {
   $ligne_utilisateur = $result -> fetch();
   $_SESSION['connexion'] = 'connecté';
   $_SESSION['id_utilisateur'] = $ligne_utilisateur['id_utilisateur'];
   $_SESSION['prenom'] = $ligne_utilisateur['prenom'];
   $_SESSION['pseudo'] = $ligne_utilisateur['pseudo'];
   $_SESSION['nom'] = $ligne_utilisateur['nom'];
    header('location: index.php');
 }

include('inc/header.inc.php');
?>
<!-- Contenu HTML -->
<!-- <!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="utf-8">
       <title>Authentification</title>
       <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">        <!-- Bootstrap -->
     <!--  <link href="css/bootstrap.min.css" rel="stylesheet">
	   <link rel="stylesheet" href="css/style_admin.css">
	   <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">
   </head>
   <body> -->

         <div class="row">
           <?= $msg ?>
           <form method="post" action="">
             <div class="col-xs-12 col-sm-6 col-md-offset-3 col-md-6 col-sm-offset-1">
               <div class="panel panel-default">
                 <div class="panel-body" id="connexion">
                   <div class="form-group">
                     <input type="text" class="form-control" name="email" placeholder="Email">
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                   </div>
                     <input type="submit" name="connexion" class="btn btn-danger btn-block " value="Connexion">
                   </div>
                 </div>
               </div>
             </form>
       </div>


<?php include('inc/footer.inc.php');?>
