<?php
require_once('../inc/init.inc.php');

    //traitement pour ajouter un produit dans la boutique:
if(!empty($_POST)){
    debug($_POST);
    debug($_FILES);


    //renommer la photo / ref_time()_nom.ext
    //controles sur la photo
    //enregistrer la photo sur le serveur

    //contrôle sur les infos du formulaire (pas vide, nbre de CC etc...)
    //requete pour insérer les infos dans la BDD
    // redirection sur la gestion_boutique.php


    $nom_photo = 'default.jpg';

    if(!empty($_FILES['photo']['name'])){ // si une photo est uploadée

            $nom_photo = $_POST['reference'] . '_' . time() . '_' . $_FILES['photo']['name'];
            // Si la photo est nommé tshirt.jpg, on la renomme: XX21_1543234451_tshirt.jpg pour eviter les doublons possibles sur le serveur (cf les noms des photos sur facebook par exemple).

        $chemin_photo = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . 'photo/' . $nom_photo;
         //chemin : c//xamp/htdocs/Webforce3/php/site/photo/XX21_1543234454_tshirt.jpg

         $ext = array('image/png', 'image/jpeg', 'image/gif');
         if(!in_array($_FILES['photo']['type'], $ext)){
             $msg .= '<div class="erreur">Images autorisées : PNG, JPG, JPEG  et GIF</div>';
             // si le fichier uploadé ne correspond pas aux extensions autorisées ( ici PNG, JPEG, JPG, et GIF) alors ona fficher un message d'erreur.
         }
         if($_FILES['photo']['size'] > 2000000){
             $msg .= '<div class="erreur">Image : 2Mo Maximum autorisé</div>';
             // Si la photo uploadée est trop volumineuse (ici 2Mo max), alors on met un message d'erreur.
             // Par defaut XAMPP autorise 2,5Mo. Voir dans php.ini, rechercher upload_max_file_size=2.5M
         }
         if(empty($msg) && $_FILES['photo']['error'] == 0){

             copy($_FILES['photo']['tmp_name'], $chemin_photo);
             // on enregistre la photo sur le serveur. Dans les faits, on la copier depuis son emplacement temporaire et on la colle dans son emplacement définitif.
         }
    }// Fin du if isset ($_FILES['photo']['name'])

    // Inserer les infos en BDD
    // Au préalable nous aurions vérifié tous les champs (taille, caractères, no empty etc ...)
    if(empty($msg)){
        $resultat = $pdo -> prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES(:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");

        $resultat -> bindParam(':reference', $_POST['reference'], PDO::PARAM_STR);
        $resultat -> bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
        $resultat -> bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
        $resultat -> bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $resultat -> bindParam(':couleur', $_POST['couleur'], PDO::PARAM_STR);
        $resultat -> bindParam(':taille', $_POST['taille'], PDO::PARAM_STR);
        $resultat -> bindParam(':public', $_POST['public'], PDO::PARAM_STR);
        $resultat -> bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
        $resultat -> bindParam(':stock', $_POST['stock'], PDO::PARAM_INT);

        $resultat -> bindParam(':photo', $nom_photo, PDO::PARAM_STR);

        if($resultat -> execute()){
            $pdt_insert = $pdo -> lastInsertId(); // Récupère l'id du dernier enregistrement
            header('location:gestion_boutique.php?msg=validation&id=' . $pdt_insert);
        }

    }
}

$page = 'Gestion Boutique';
require('../inc/header.inc.php');

 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <h1>Ajout de produit</h1>
        <form enctype="multipart/form-data" action="" method="POST">

 <label>Réference :</label>
 <input type="text" name="reference" value="">

 <label>Catégorie :</label>
 <input type="text" name="categorie" value="">

 <label>Titre :</label>
 <input type="text" name="titre" value="">

 <label>description :</label>
 <textarea name="description" rows="8" cols="80"></textarea>

 <label>Couleur :</label>
 <input type="text" name="couleur" value="">

 <label>Taille :</label>
 <input type="text" name="taille" value="">

 <label>Public :</label>
 <select name="public">
 <option value="m">Homme</option>
 <option value="f">Femme</option>
 <option value="mixte">Mixte</option>
 </select>

 <label>Photo :</label>
 <input type="file" name="photo" value="">

 <label>Prix :</label>
 <input type="text" name="prix" value="">

 <label>Stock :</label>
 <input type="text" name="stock" value="">

 <input type="submit" name="" value="Envoyer">

</form>
    </body>
</html>



<?php
require('../inc/footer.inc.php');
?>
