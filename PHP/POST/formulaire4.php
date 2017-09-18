<?php

echo '<pre>';
print_r($_POST);
echo '</pre>';

$msg ='';
if(!empty($_POST)){ // on verifie que post ne soit pas vide avant de faire des traitements.
  if(empty($_POST['pseudo'])){
    $msg .='<p style="background:red; color:white; padding :5px;">ATTENTION Veuillez remplir le champ pseudo</p>';
  }

  if(empty($_POST['email'])){
    $msg .='<p style="background:red; color:white; padding :5px;">ATTENTION Veuillez remplir le champ email</p>';
}
  echo $msg;

  if(empty($msg)){// Signifie que tout est OK ! Les feux sont au vert, on peut effectuer les traitements attendus(enregistrer dans la bdd par exemple).
    echo '<p style="background:green; color:white; padding:5px;">Félicitations vous êtes enregistré !</p>';

      // traitement pour enregistrer les infos dans un fichier .txt
      $f = fopen('liste.txt', 'a');// fopen est une fonction qui nous permet d'ouvrir un fichier. Option 'a', si le fichier n'existe pas il va être créée automatiquement.
      // ici, $f va représenter ce fichier

      fwrite($f, $_POST['pseudo'] . ' - ' . $_POST['email'] . "\r\n");// fwrite nous permet d'enregistrer des informations dans un fichier : arg1 : le fichier, arg2 : l'info à enregistrer.
  }
  else{
    echo '<a href="formulaire3.php">Retour au formulaire</a>';
  }
}




/*
if(!empty($_POST)){}

foreach($_POST as $indice => $valeur){
  if(empty($valeur)){
    $msg[$indice] = '<p style ="background:red; color:white; padding :5px;">Veuillez renseigner le champ ' . $indice . '</p>';
  }else{
    echo $indice . ' : <b>' . $valeur . '<br></b>';
  }

}
*/
?>

<h1>Formulaire 4</h1>
