<?php

$nationalite = '';

if(isset($_GET['pays']) && !empty($_GET['pays'])){
	echo $_GET['pays'];


	switch($_GET['pays']){

		case 'fr' :
			$nationalite = 'française';
		break;

		case 'es' :
			$nationalite = 'espagnole';
		break;

		case 'it' :
			$nationalite = 'italienne';
		break;

		case 'en' :
			$nationalite = 'anglais';
		break;

		default :
			$nationalite = 'Bien joué !! mais pas bien joué !!';
		break;

	}
}
?>
<html>
	<ul>
		<li><a href="message.php?pays=fr">France</a></li>
		<li><a href="?pays=it">Italie</a></li>
		<li><a href="?pays=es">Espagne</a></li>
		<li><a href="?pays=en">Angleterre</a></li>
	</ul><hr/>
	<?php  echo 'Vous êtes de nationalité ' . $nationalite ; ?>

	<?php echo 'Vous etes ' . $_GET['pays'] . '<br/>'; ?>

</html>
