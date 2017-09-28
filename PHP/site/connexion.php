<?php
require_once('inc/init.inc.php');

// Traitement pour la deconnexion :
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){

    // si une action est demandé dans l'url... et que cette action est "deconnexion" alors on procède a la déconnexion.
    unset($_SESSION['membre']);
    header('location:connexion.php');
}

    // Traitement pour rediriger l'utilisateur s'il est deja connecté
if(userConnecte()){
    header('location:profil.php');
}

    //formulaire activé ?
    if(!empty($_POST)){
        debug($_POST);
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){

            $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
            $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $resultat -> execute();

            if($resultat -> rowCount() > 0){ // ok le pseudo existe bien.
                $membre = $resultat -> fetch(PDO::FETCH_ASSOC); // on recupère les infos du membre qui souhaite se connecter sous la forme d'un array
                if($membre['mdp'] ==  md5($_POST['mdp'])){
                    // si (mdp crypté en BDD == mdp saisi + crypté.. ALORS TOUT EST OK !!!!)

                        // TOUT EST OK on peut connecter l'utilisateur :



                        foreach ($membre as $indice => $valeur){
                            if ($indice != 'mdp'){
                                $_SESSION['membre'][$indice] = $valeur;
                            }
                        }
                        //debug($_SESSION);

                        //redirection

                            header('location:profil.php');

                }else{
                    $msg .= '<div class="erreur">Mot de passe erroné! </div>';
                }
            }else{
                $msg .= '<div class="erreur">Pseudo erroné! </div>';
            }

        }else{
            $msg .= '<div class="erreur">Veuillez renseigner un Pseudo et un Mot de passe. </div>';
        }
    }

    // debug() pour vérifier

    // on vérifie que les deux champs ne sont pas vides

    // on connecte le membre en enregistrant ses infos dans la session
    //    ->on verifie qu'il existe en BDD
    //    -> Est-ce que le MDP saisie correspond a celui en BDD
    //    -> Enregistrement en session
    //    -> Redirection vers profil

    $page = 'Connexion';

require('inc/header.inc.php');

?>
<!--Contenu HTML-->
<h1>Connexion</h1>
    <form action="" method="POST">
        <?= $msg ?>
        <label>Pseudo :</label>
        <input type="text" name="pseudo" value="">
        <label>Mot de passe :</label>
        <input type="text" name="mdp" value="">

        <input type="submit" value="Connexion">
    </form>

<?php
require_once('inc/footer.inc.php');
?>
