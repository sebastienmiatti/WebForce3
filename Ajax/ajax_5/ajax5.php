<?php
 // Réaliser le traitement PHP permettant d'afficher les informations de guillaume sous forme de tableau HTML.
require_once('init.inc.php');
$tab = array();
$tab['monresultat'] = '';

$result = $pdo -> query("SELECT * FROM employes");


$tab['monresultat'] .= '<table border="10"><tr>';

	for($i = 0; $i < $result->columnCount(); $i++){ // compte le nombre de colonne de l'array
		$colonne = $result->getColumnMeta($i);
		$tab['monresultat'] .=  '<th>' . $colonne['name'] . '</th>';
	}
	$tab['monresultat'] .= '</tr>';

	// Pour chaque enregistrement ici je vais récupérer un array. Qui dit array, si je veux veux récupérer toutes les infos : foreach !
	while($ligne = $result->fetch(PDO::FETCH_ASSOC)){
		$tab['monresultat'] .= '<tr>';
		foreach($ligne as $informations){
		$tab['monresultat'] .= '<td>' . $informations . '</td>';
	}
}
	$tab['monresultat'] .= '</tr>';
	$tab['monresultat'] .= '</table>';

//echo $tab['monresultat'];


echo json_encode($tab);
//json_encode permet de transformer le tableau ARRAY au bon format (JSON)
// Ce format (JSON) assure la possibilité de transporter les données sans JSON, nous ne pouvons pas transporter les données.

?>
