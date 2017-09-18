<?php
$msg = array();
$msg['ville'] = '';
$msg['codePostal'] = '';
$msg['adresse'] = '';
if(!empty($_POST)){
//echo'<pre>';
//print_r($_POST);
//echo'</pre>';
/*
echo "Adresse saisie : <br>";
echo "Adresse :  " . $_POST['adresse'] . '<br>';
echo "code postal :  " .$_POST['codePostal'] . '<br>';
echo "ville :  " . $_POST['ville'] . '<br>';
}
*/
/*
  if(empty($_POST['adresse'])){
  	echo '<p style ="background:red; color:white; padding :5px;">ATTENTION Veuillez remplir le champ adresse</p>';
  }
  if(empty($_POST['codePostal'])){
  	echo '<p style ="background:red; color:white; padding :5px;">ATTENTION Veuillez remplir le champ code postal</p>';
  }
  if(empty($_POST['ville'])){
  	echo '<p style ="background:red; color:white; padding :5px;">ATTENTION Veuillez remplir le champ ville </p>';
  }
*/

  foreach($_POST as $indice => $valeur){
    if(empty($valeur)){
      $msg[$indice] = '<p style ="background:red; color:white; padding :5px;">Veuillez renseigner le champ ' . $indice . '</p>';
    }else{
      echo $indice . ' : <b>' . $valeur . '<br></b>';
    }
  }

}
?>


<h1>Formulaire 2</h1>
<form method="post" action="">
  <?php echo $msg['ville']; ?>
  <label>Ville :</label><br>
  <input type="text" name="ville"><br><br>

  <?php echo $msg['codePostal']; ?>
  <label>Code postal :</label><br>
  <input type="text" name="codePostal"><br><br>

  <?php echo $msg['adresse']; ?>
  <label>adresse : </label><br>
  <textarea name="adresse" rows="5" cols="10"></textarea><br><br>

  <input type="submit" value="valider">
</form>
