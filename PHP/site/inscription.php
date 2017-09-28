<?php
require_once('inc/init.inc.php');

    // Traitement pour rediriger l'utilisateur s'il est deja connecté
if(userConnecte()){
header('location:profil.php');
}

        //Traitement pour inscription
    //-> Vérifie si le formulaire est activé
    //-> Affiche avec print_r()
    //-> Controle sur les champs (pseudo et Mdp et email)
    //-> enregistrer l'utilisateur
    //      --> Pseudo disponible ? / Email disponible ?
    //      --> INSERT
    //      --> Redirection vers la connexion

if(!empty($_POST)){
    debug($_POST);
    // vérification pseudo :
    $verif_pseudo = preg_match('#^([a-zA-Z0-9._-]{3,20})$#', $_POST['pseudo']); // Cette fonction me permet de mettre une regle en place pour les caractère autorisés :
        // arg 1 : REGEX - EXPRESSIONS REGULIERES
        // arg 2 : la CC
        //Retour: TRUE (si OK) - FALSE (si nok)
if(!empty($_POST['pseudo'])){
    if(!$verif_pseudo){ // Si verif_pseudo nous retourne FALSE
    $msg .= '<div class="erreur"> pseudo: Autorisé entre 3 et 20 caractères, compris entre "A-Z","0-9" , pas de caractères spéciaux.</div>';
    }
}else{
     $msg .= '<div class="erreur">Veuillez renseigner un pseudo.</div>';
    }
    // Verification de Mot De Passe
    $verif_pwd = preg_match('#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$#', $_POST['mdp']); // 8 caractères min, 20 max, au moin un chiffre, au moin une MAJ.
    if(!empty($_POST['mdp'])){
        if(!$verif_pwd){
            $msg .= '<div class="erreur"> Mot De Passe: Veuillez renseigner 8 caractères minimium (20 max), au moins une majuscule et un chiffre.</div>';
        }

    }else{
        $msg .= '<div class="erreur"> Veuillez renseigner un Mot de passe
        .</div>';
    }

    //verification Email:
    $verif_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // vérifie que le format de l'email est OK. Retourne TRUE (si OK) - FALSE ( si nok)

    //sebastien.miatti@live.fr
    $pos = strpos($_POST['email'], '@'); // la position de @
    $ext = substr($_POST['email'], $pos +1); // 'gmail.com'

    $ext_non_autorisees = array('wimsg.com', 'yopmail.com', 'mailinator.com', 'tafmail.com', 'mvrht.net');

    if(!empty($_POST['email'])){
    if(!$verif_email || in_array($ext, $ext_non_autorisees)){
        $msg .= '<div class="erreur"> Veuillez saisir un email valide </div>';
    }

} else {
    $msg .= '<div class="erreur"> Veuillez renseigner un email.</div>';

    }

    // a ce stade si notre variable $msg est encore vide c'est qu'il n'y a pas d'erreur au moins sur email, pseudo et MDP (pensez a faire les verifs des autres champs.)

    if(empty($msg)){ // TOUS EST OK !!
        //enregistrement du nouvel utilisateur :

        // attention le pseudo et le mail sont-il disponible.
        $resultat = $pdo -> prepare("SELECT * FROM membre WHERE pseudo = :pseudo ");
        $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $resultat -> execute();

        if($resultat -> rowCount() > 0){ // signifie que le pseudo est deja utilisée.

            // Nous aurions pu lui proposer 2/3 variante de son pseudo, en aynt vérifié qu'ils sont disponibles.
             $msg .= '<div class="erreur"> Le pseudo ' . $_POST['pseudo'] .' n\'est pas disponible, veuillez choisir un autre pseudo.</div>';

        }else{ // OK le pseudo est disponible on va enregistré enfin le membre dans la BDD, nous devrions également vérifié la disponibilité de l'email.

            // crypte le MDP
                $mdp = md5($_POST['mdp']); // md5() va crypté le mdp selon en hashage 64o;

            // requete INSERT
            $resultat = $pdo -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :civilite, :ville, :code_postal, :adresse, '0') ");

            $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $resultat -> bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $resultat -> bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);
            $resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
            $resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);

            $resultat -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_INT);

            // redirection

            if($resultat -> execute()){ // si la requete est ok
                header('location:connexion.php');
            }



        } // fin du else rowCount();

    } // fin du if !empty $msg

} // fin du if !empty $_POST

    // Pour maintenir les infos dans le formulaire, en cas d'erreur, on doit définir une variable pour chaque champs.
/*
if(isset($_POST['pseudo'])){
    $pseudo = $_POST['pseudo'];
}else{
    $pseudo = '';
}
*/
    // On peut écrire le if/else ci-dessus de manière simplifiée:

$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '';
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : '';
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$civilite = (isset($_POST['civilite'])) ? $_POST['civilite'] : '';
$ville = (isset($_POST['ville'])) ? $_POST['ville'] : '';
$code_postal = (isset($_POST['code_postal'])) ? $_POST['code_postal'] : '';
$adresse = (isset($_POST['adresse'])) ? $_POST['adresse'] : '';

$page = 'Inscription';

require_once('inc/header.inc.php');
?>

<!-- Contenu HTML -->
<h1>Inscription</h1>
<form method="post" action="">
    <?= $msg ?>
    <label>pseudo :</label>
    <input type="text" name="pseudo" value="<?= $pseudo ?>">

    <label>Mot de passe :</label>
    <input type="text" name="mdp">

    <label>Nom :</label>
    <input type="text" name="nom" value="<?= $nom ?>">

    <label>Prenom :</label>
    <input type="text" name="prenom" value="<?= $prenom ?>">

    <label>Email :</label>
    <input type="text" name="email" value="<?= $email ?>">

    <label>Civilité :</label>
    <Select name="civilite">
    <option value="m" selected>Homme</option>
    <option value="f" <?= ($civilite == 'f') ? 'selected' : '' ?> >Femme</option>
    </select>

    <label>Ville :</label>
    <input type="text" name="ville" value="<?= $ville ?>">

    <label>Code Postal :</label>
    <input type="text" name="code_postal" value="<?= $code_postal ?>">

    <label>Adresse :</label>
    <input type="text" name="adresse" value="<?= $adresse ?>">

    <input type="submit" name="valider" value="inscription">



<?php
require_once('inc/footer.inc.php');
?>
