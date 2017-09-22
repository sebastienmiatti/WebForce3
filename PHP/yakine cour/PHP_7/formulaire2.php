<?php
session_start(); // Création du fichier de session$pdo = new PDO('mysql:host=localhost;dbname=repertoire', 'root','');if(empty($_POST['nom'])){

}
else{
   if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 30){
       echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un pseudo compris entre 3 et 30 caractères ! </p>';
   }
}
if(empty($_POST['prenom'])){}
else{
   if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 30){
       echo '<p style="background:red; color: white; padding: 5px">Veuillez renseigner un pseudo compris entre 3 et 30 caractères ! </p>';
   }
}
if(empty($_POST['telephone'])){}
else{
   if(strlen($_POST['telephone']) <= 10 && (is_numeric($_POST['telephone'])) == false){
       echo '<p style="background:red; color: white; padding: 5px">Votre numéro n\'est pas valide! </p>';
   }
}echo "<pre>";
print_r($_POST);
echo "</pre>";
?><!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="utf-8">
       <title>Formulaire</title>
   </head>
   <body>
       <h1>Information :</h1>
       <form action="" method="post">            <label>Nom *</label><br>
           <input type="text" name="nom"><br><br>            <label>Prénom *</label><br>
           <input type="text" name="prenom"><br><br>            <label>Télephone *</label><br>
           <input name="telephone" type="tel"></input><br><br>            <label>Ville</label><br>
           <input name="ville" type="text"></input><br><br>            <label>Code Postal</label><br>
           <input name="cp" type="text"></input><br><br>            <label>Adresse</label><br>
           <textarea style="rezise:none" name="adresse" rows="3" cols="22"></textarea><br><br>            <label>Date de naissance</label><br>
           <input name="date_de_naissance" type="date"></input><br><br>            <label>Sexe</label><br>
           <select name="sexe">
               <option>Homme</option>
               <option>Femme</option>
           </select><br><br>            <label>Message</label><br>
           <textarea name="message" rows="10" cols="30"></textarea><br><br>            <input type="submit" value="Enregistrement">        </form>    </body>
</html>
