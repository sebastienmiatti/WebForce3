<?php
require_once('../inc/init.inc.php');

    //traitement pour ajouter un produit dans la boutique:
if(!empty($_POST)){
    debug($_POST);
    debug($_FILES);
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
