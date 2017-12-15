<?php 

$msg = array();
$msg['ville'] = '';
$msg['code_postal'] = '';
$msg['adresse'] = '';

if(!empty($_POST)){
	// echo '<pre>'; 
	// print_r($_POST);
	// echo '</pre>'; 
	
	
	foreach($_POST as $indice => $valeur){
		if(empty($valeur)){
			$msg[$indice] = '<p style="background:red; color: white; padding: 5px;">Veuillez renseigner le champs ' . $indice . '</p>';
		}
		else
		{
			echo $indice . ' : <b>' . $valeur . '</b><br/>';
		}
	}
}


?>

<header style="width: 100%; height: 50px; background: yellow;">
</header>
<h1>Formulaire 2</h1>

<form action="" method="post">
	<?php echo $msg['ville']; ?>
	<label>Ville :<label><br/>
	<input type="text" name="ville" /><br/><br/>
	
	
	<?php echo $msg['code_postal']; ?>
	<label>Code postal :<label><br/>
	<input type="text" name="code_postal" /><br/><br/>
	

	<?php echo $msg['adresse']; ?>
	<label>Adresse :<label><br/>
	<textarea style="resize:none" name="adresse" rows="10" cols="30"></textarea><br/><br/>
	
	
	<input type="submit" value="Envoyer"/>
</form>

