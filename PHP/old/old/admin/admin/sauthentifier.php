<?php require('inc/inc.header.php');

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion') { // si une action est demandé dans l'URL et que cette action est "déconnexion" alors on procède à la  déconnexion.
    unset($_SESSION['connexion']);
	session_destroy();
  header('location:../index_.php');
}

if(isset($_POST['connexion'])){//on envoie le form avec le name du button (on a cliqué dessus)
	$email = addslashes($_POST['email']);
	$mdp = addslashes($_POST['mdp']);
		$sql = $pdo->prepare(" SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' ");// on vérifie courriel ET mot de passe
		$sql->execute();
		$nbr_utilisateur = $sql->rowCount();//on compte s'il est dans la table, le compte répond 1 s'il y est, 0 s'il n'y est pas
			if($nbr_utilisateur == 0){//il n'y est pas ! c'est la faute à sarah
				$msg='<div class="alert alert-danger">Erreur d\'authentification !</div>';
			}
            else {//on le trouve, il est inscrit, grâce à hadi
				$ligne_utilisateur = $sql->fetch();//on cherche ses infos

				$_SESSION['connexion']='connecté';
				$_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
				$_SESSION['prenom']=$ligne_utilisateur['prenom'];
				$_SESSION['nom']=$ligne_utilisateur['nom'];

				header('location:' . RACINE_CV . 'index.php');
			}//ferme le if else
}//ferme le if isset
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>
<div class="container">
        <div class="row conexion">
            <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-4">
				<?= $msg; ?>
                <div class="panel panel-default ">
                    <div class="text-center panel-heading panel-title">Se connecter</div>
                    <div class="panel-body">
                    <form action="#"  method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    </div>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 " >
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        </div>
                                        <input type="text" class="form-control input" id="mdp" name="mdp" placeholder="Mot de passe">
                                    </div>
                                </div>
                             <div>
                                 <div class="form-group">
                                <input class= "btn btn-primary btn-block" name="connexion" id="connexion" type="submit" value="Connexion"/>
                            </div>
                             <div class="col-md-offset-0">
                                 <small id="mdplost" class="form-text text-muted">
                                     <a href="#">Mot de passe oublié ?</a>
                                 </small>
                            </div>
                             <div class="col-md-offset-0">
                                 <small id="inscription" class="form-text text-muted">
                                      <a href="inscription.php">S'inscrire </a>
                                 </small>
                            </div>
                        </div>
                 </form>
            </div>
        </div>
    </div>
</div>


<?php require('inc/inc.footer.php'); ?>
