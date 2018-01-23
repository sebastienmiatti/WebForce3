

<?php require 'inc/init.inc.php'; ?>

<?php

/*

 * A mettre dans toutes les pages de l'admin, même cette page

 */


$msg_log_err = ''; // initialise la variable contenant le message d'erreur

//$sql = $pdoCV->query(" SELECT * FROM t_utilisateurs WHERE id_utilisateur ='$id_utilisateur' ");

//$ligne_utilisateur = $sql->fetch();

// déconnexion de l'admin - à mettre dans toutes les pages de l'admin

if (isset($_GET['logout'])) { // on récupère le terme quitter dans l'URL
    // on vide le contenu des variables
    $_SESSION['connexion'] = '';
    $_SESSION['id_utilisateur'] = '';
    $_SESSION['prenom'] = '';
    $_SESSION['nom'] = '';
    unset($_SESSION['connexion']);
    session_destroy();
    //header('location:../index.php');

}

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

if (isset($_POST['connexion'])) {// on renvoie le formulaire avec l'attribut name du bouton (on a cliqué dessus)
    $email = addslashes($_POST['email']); // ajoute un caractère d'échappement
    $mdp = addslashes($_POST['mdp']);
    $resultat = $pdo->prepare("SELECT * FROM t_utilisateurs WHERE email='$email' AND mdp='$mdp' "); // on vérifie le mail et le mdp
    $resultat->execute();
    $nbr_utilisateur = $resultat->rowCount(); // on compte si on a des lignes de résultat à la requête que l'on vient d'exécuter => 1 si l'utilisateur existe et 0 sinon

    if ($nbr_utilisateur == 0) {
        $msg_log_err = "Erreur d'authentification !";
    } else {
        $ligne_utilisateur = $resultat->fetch(); // on récupère les infos
        $_SESSION['connexion'] = 'Login'; // le name du bouton
        $_SESSION['id_utilisateur'] = $ligne_utilisateur['id_utilisateur'];
        $_SESSION['prenom'] = $ligne_utilisateur['prenom'];
        $_SESSION['nom'] = $ligne_utilisateur['nom'];
        $_SESSION['pseudo'] = $ligne_utilisateur['pseudo'];
        header('location: index.php');

    }

}

include('inc/header.inc.php');

?>

        <!--nav en include-->

            <hr>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <!-- Formulaire de connexion à l'admin -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Se connecter à l'espace Admin</h3>
                        </div>
                        <div class="panel-body">
                            <form action="authentification.php" method="POST" class="form-group">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" Placeholder="Email" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" name="mdp" placeholder="Mot de passe" class="form-control" required/>
                                </div>
                                <button type="submit" name="connexion" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <div class="row">
            <!--  footer en include-->
            <?php include("inc/footer.inc.php"); ?>
        </div>

        <hr>
