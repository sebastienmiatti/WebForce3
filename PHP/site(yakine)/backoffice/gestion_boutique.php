<?php
require('../inc/init.inc.php');

// redirection si USER n'est pa admin
if(!userAdmin()){
	header('location:' . RACINE_SITE . 'profil.php');
}

// Traitement pour récupérer toutes les infos des produits
$resultat = $pdo -> query("SELECT * FROM produit");

$contenu .= 'Nombre de résultat(s) : ' . $resultat -> rowCount() . '<br/>';

$contenu .=  '<table border="1">';
$contenu .=  ' <tr>';
for($i = 0; $i < $resultat -> columnCount(); $i ++){
	$meta = $resultat -> getColumnMeta($i);
	$contenu .=  '<th>' . $meta['name'] . '</th>';
}
$contenu .= '<th colspan="2">Actions</th>';
$contenu .=  ' </tr>';

while($infos = $resultat -> fetch(PDO::FETCH_ASSOC)){
	$contenu .=  '<tr>';
	foreach($infos as $indice => $valeur){
		if($indice == 'photo'){
			$contenu .= '<td><img src="' . RACINE_SITE .  'photo/' . $valeur .'" height="80" /></td>';
		}
		else{
			$contenu .=  '<td>' . $valeur . '</td>';
		}
	}
	$contenu .= '<td><a href="formulaire_produit.php?id=' . $infos['id_produit'] . '"><img src="' . RACINE_SITE . 'img/edit.png" /></a></td>';
	$contenu .= '<td><a href="supprimer_produit.php?id=' . $infos['id_produit'] . '"><img src="' . RACINE_SITE . 'img/delete.png" /></a></td>';
	$contenu .=  '</tr>';
}
$contenu .=  '</table>';

require('../inc/header.inc.php');
?>
<h1>Gestion de la boutique</h1>
<?= $contenu ?>
<a style="display: inline-block; padding: 10px; border: 2px solid red; border-radius: 3px; text-align: center; margin: 20px 0; color: red; font-weight: bold;" href="formulaire_produit.php">Ajouter un produit</a>



<?php
require('../inc/footer.inc.php');
?>