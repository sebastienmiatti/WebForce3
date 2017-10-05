<?php



// ---------> Une fonction peut recevoir 2 arguments ou plus... 1er procédé réaliser la fonctions avec ces parametres:

function conversionMonnaie($prix, $taux = 1.1761){ // Déclaration de la fonction de conversion euro en dollar Américain , taux de 1.1761 en octobre 2017

	return $prix * $taux; // la fonction va nous retourné le prix multiplié par le taux

}

	$montantEuro = 187;
	$montantUsd = 1.055;

	echo '<p>La conversion de <b>'. $montantEuro .  ' </b>€ Nous donne donc <b>' . conversionMonnaie($montantEuro) . ' </b> dollars Américain </p>'; // affiche le résultat de la fonction.

?>


<br><br><br><br><br><br><br><br>




  <!--2eme maniere de procédé a l'aide d'un formulaire; selon les données inscrit dans un fomulaire et la conversion choisit on obtien le résultat souhaité -->
<html>
	<form method="post" action="resultat2.php">
		<input type="text" name="n1" />

		<select name="devise">
			<option value="euro">Euro</option>
			<option value="usd">USD</option>
		</select>


		<input type="submit" value="Calculer" />
	</form>
</html>
