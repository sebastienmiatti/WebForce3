<?php

if(!empty($_POST)){

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	extract($_POST);
	// $operateur = $_POST['operateur'];
	// $n1 = $_POST['n1'];
	// $n2 = $_POST['n2'];

	if(is_numeric($n1)){
		if($devise == 'euro' || $devise == 'usd'){
			switch($devise){

				case 'euro' :
					$n2 = $n1 * 0.85;
				break;

				case 'usd' :
					$n2 = $n1 * 1.1761;
				break;


				default :
					header('location:exercice2.php');
				break;
			}

		$msg = 'La conversion de ' . $n1 . ' en ' . $devise . ' donne : <b> ' . $n2 . ' ' . $devise . '</b><br/>';
		}
		else{
			$msg = 'Veuillez saisir un operateur valide<br/>';
		}
	}
	else{
		$msg = 'Veuillez saisir des valeurs numériques<br/>';
	}
}
echo $msg;
?>
<a href="exercice2.php">Effectuer un autre calcul</a>
