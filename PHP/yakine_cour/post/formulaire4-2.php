<?php 

echo '<pre>'; 
print_r($_POST);
echo '</pre>'; 

$msg = '';


	


if(!empty($_POST)){ // On vérifie que post ne soit pas vide avant de faire des traitements. 

	if(empty($_POST['pseudo'])){
		$msg .= '<p style="background:red; color: white; padding: 5px;">Veuillez renseigner un pseudo</p>';
	}

	if(empty($_POST['email'])){
		$msg .= '<p style="background:red; color: white; padding: 5px;">Veuillez renseigner un email</p>';
	}
	
	
	
	
	
	
	if(empty($msg)){ // Signifie que tout est OK ! Les feux sont au vert, on peut effectuer les traimtements attendus (enregistrer dans la bdd par exemple). 
		echo '<p style="background:green; padding: 5px; color: white;">Félicitations vous êtes enregistré !</p>';
		
		// traitement pour enregistrer les infos dans un fichier .txt
		
		$f = fopen('liste-2.txt', 'a'); // fopen() est une fonction quie nous permet d'ouvrir un fichier. En mode 'a', si le fichier n'existe pas il va le créer automatiquement. 
		// ici, $f va représenter ce fichier
		
		fwrite($f, $_POST['pseudo'] . ';' . $_POST['email'] . "\r\n"); // Fwrite() nous permet d'enregistrer des informations dans un fichier : arg1 : le fichier, arg2 : L'info à enregistrer. 
	}
	else{
		echo '<a href="formulaire3-2.php">Retour au formulaire 3-2</a>'; 
	}
	
}

echo $msg; 

?>

<h1>Formulaire 4</h1>