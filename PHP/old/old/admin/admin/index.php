<?php
require('inc/inc.header.php');
if(!$_SESSION['connexion']) {
    header('location:../index_.php');
}
if(isset($_POST['connexion'])){//on envoie le form avec le name du button (on a cliqué dessus)
	$email = addslashes($_POST['email']);
	$mdp = addslashes($_POST['mdp']);
		$sql = $pdo->prepare(" SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' ");// on vérifie courriel ET mot de passe
		$sql->execute();
		$nbr_utilisateur = $sql->rowCount();//on compte s'il est dans la table, le compte répond 1 s'il y est, 0 s'il n'y est pas
			if($nbr_utilisateur == 0){//il n'y est pas ! c'est la faute à sarah
				$msg="Erreur d'authentification !";
			}
            else {//on le trouve, il est inscrit, grâce à hadi
				$ligne_utilisateur = $sql->fetch();//on cherche ses infos

				$_SESSION['connexion']='connecté';
				$_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
				$_SESSION['prenom']=$ligne_utilisateur['prenom'];
				$_SESSION['nom']=$ligne_utilisateur['nom'];

				header('location:sauthentifier.php');
			}//ferme le if else
}//ferme le if isset

if(isset($_GET['deconnexion'])) {
    $_SESSION['connexion'] = '';
    $_SESSION['id_utilisateur'] = '';
    $_SESSION['prenom'] = '';
    $_SESSION['nom'] = '';
        unset($_SESSION['connexion']);
        session_destroy();
    header('location:../index_.php');
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
require('inc/inc.footer.php'); ?>
