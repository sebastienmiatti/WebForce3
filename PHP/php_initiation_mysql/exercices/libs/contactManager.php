<?php
// démarrage de la session
session_start();

// si le formulaire à été envoyé en method GET
//print_r($_GET);
//echo $_GET['nomEmploye'];


// si le formulaire a été envoyé en method POST
//print_r($_POST);

// si on ne recoit pas d'action, alors retourne d'ou tu viens
if(!isset($_GET['action'])){
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit;
}

if($_GET['action']=="new"){
    $error = "";
    // je verifie que le nom et prénom on bien été saisis
    if(empty($_POST['nomEmploye']) || trim($_POST['nomEmploye']) == ""){
        $error .= "Le nom n'a pas été saisi.<br>";

    }
    if(empty($_POST['prenomEmploye']) || trim($_POST['prenomEmploye'])== ""){
        $error .= "Le prénom n'a pas été saisi.<br>";

    }
        // si j'ai une erreur je la met en session et je retourne sur le formulaire pour l'afficher
    if(!empty($error)){ // $error != ""
        $_SESSION['error'] = $error;
        //retourne au formulaire
        header('Location:../formulaire.php');
        exit;

    }else{
        //on se connecte à la bdd
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');

        } catch (PDOException $e) {
            die ("impossible de se connecter.");
        }
        //print_r($datas)
        //1-on utilise les données envoyées dans $_POST

        //2-on prépare la requète
        $req = $bdd->prepare('INSERT INTO contacts (co_name, co_firstname, co_gender) VALUES (:nomEmploye, :prenomEmploye, :hommeFemme)');
        // 3- on exécute la requete
        $req->execute($_POST);
        //4 - si la requete est correcte on redirectionne
        $_SESSION['message'] = "C'est enregistré!";
        header('Location:'.$_SERVER['HTTP_REFERER']);
        exit;
    }

} else {
    //redirection en php
    //header('Location:../index.php');

    //retourne d'ou tu viens
    header('Location:'.$_SERVER['HTTP_REFERER']);
    exit;

}
?>
