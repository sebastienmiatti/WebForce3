<?php

if(!empty($_POST)){

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	extract($_POST);
	// $operateur = $_POST['operateur'];
	// $n1 = $_POST['n1'];
	// $n2 = $_POST['n2'];

	if(is_numeric($n1) && is_numeric($n2)){
		if($operateur == 'addition' || $operateur == 'multiplication' || $operateur == 'soustraction' || $operateur == 'division' ){
			switch($operateur){

				case 'addition' :
					$resultat = $n1 + $n2;
				break;

				case 'soustraction' :
					$resultat = $n1 - $n2;
				break;

				case 'multiplication' :
					$resultat = $n1 * $n2;
				break;

				case 'division' :
					$resultat = $n1 / $n2;
				break;

				default :
					header('location:calculatrice.php');
				break;
			}

		$msg = 'Le résultat est : ' . $resultat . '<br/>';
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
<a href="calculatrice.php">Effectuer un autre calcul</a>
