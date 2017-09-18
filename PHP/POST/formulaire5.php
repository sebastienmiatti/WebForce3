<?php
if(!empty($_POST)){
    //echo '<pre>';
    //echo print_r($_POST);
    //echo '</pre>';

    extract($_POST); //
//$prenom = $_POST['prenom'];
//$nom = $_POST['nom'];
//$email = $_POST['email'];
//$sujet = $_POST['sujet'];
//$message = $_POST['message'];
}

$header = "From: $email \r\n";
$header .= "Reply-To : $email \r\n";
$header .= "MIME-Version: 1.0 \r\n";
$header .= "Content-type: text/html; charset=iso-8859-1 \r\n";
$header .= "X-Mailer: PHP/" . phpversion();

// Mise en forme du mail :
$contenu = "<h1>$sujet</h1>";
$contenu .="<ul>";
$contenu .="<li>Prénom : $prenom</li>";
$contenu .="<li>Nom : $nom</li>";
$contenu .="<li>Email : $email</li>";
$contenu .="</ul><hr>";
$contenu .="<p>$message</p>";

$destinataire = 'contact@gmail.com';

mail($destinataire, $sujet, $contenu, $header); // mail() nous permet d'envoyer un email, cette fonction attend 4 arguments :
/*
  1 : Destinataire
  2 : Sujet
  3 : le contenu
  4 : l'en-tête (optionnelle)
*/










?>




<h1>formulaire de contact</h1>
<form action="" method="post">
    <label>Prénom :</label><br>
    <input type="text" name="prenom"><br><br>

    <label>Nom :</label><br>
    <input type="text" name="nom"><br><br>

    <label>Email :</label><br>
    <input type="text" name="email"><br><br>


    <label>Sujet :</label><br>
    <select name="sujet">
        <option>Service Client</option>
        <option>Problème technique</option>
        <option>Service Presse</option>
        <option>Autre</option>
    </select> <br> <br>

    <label>Message : </label><br>
    <textarea name="message" cols="22" rows="5"></textarea><br><br>

    <input type="submit" value="envoyer">
</form>
