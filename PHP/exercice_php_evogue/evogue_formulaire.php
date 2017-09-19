<?php
if(!empty($_POST)){

echo '<pre>';
print_r($_POST);
echo '</pre>';

foreach($_POST as $indice => $valeur){
    echo $indice . ' : <strong>' . $valeur . '</strong><br>';
    }
}


 ?>
<h1>formulaire de contact</h1>
<form action="evogue_formulaire.php" method="post">

    <label>Nom :</label>
    <input type="text" name="nom" placeholder="mon nom"><br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom" placeholder="mon prenom"><br><br>

    <label>Adresse :</label>
    <input type="text" name="adresse" placeholder="mon adresse"><br><br>

    <label>Ville :</label>
    <input type="text" name="ville" placeholder="ma ville"><br><br>

    <label>Code Postal :</label>
    <input type="text" name="codePostal" placeholder="75015"><br><br>

    <label>Sexe :</label>
    <select name="genre" placeholder="M.">
        <option>Homme</option>
        <option>Femme</option>
        <option>Autre</option>
    </select> <br> <br>

    <label>Description : </label><br>
    <textarea name="description" cols="50" rows="15" placeholder="Ma description"></textarea><br><br>

    <input type="submit" value="envoyer">

</form>
