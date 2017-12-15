<?php

if(!empty($_POST)){
	
	$date = $_POST['annee'] . '-' . $_POST['mois'] . '-' . $_POST['jour'];
	echo $date;
	
}

?>


<html>
	<form method="post" action="">
		<label>Date de naissance : </label><br/>
		
		
		<select name="jour">
			<?php
			for($i = 1; $i <= 31; $i++){
				echo '<option>' . substr('0'.$i, -2) . '</option>';
			}
			?>
		</select>
		
		
		
		
		<select name="mois">
			<?php 
				$mois = array(
					'01' => 'Janvier',
					'02' => 'Février',
					'03' => 'Mars',
					'04' => 'Avril',
					'05' => 'Mai',
					'06' => 'Juin',
					'07' => 'Juillet',
					'08' => 'Aout',
					'09' => 'Septembre',
					'10' => 'Octobre',
					'11' => 'Novembre',
					'12' => 'Décembre',
				);
			
				foreach($mois as $indice => $valeur){
						
					echo '<option value="' . $indice . '">' . $valeur . '</option>' . "\r\n"; 
				}
			
			
			?>
		</select>
		
		
		
		<select name="annee">
			<?php
			$j= date('Y');
			while($j >= 1900){	
				echo '<option>' . $j . '</option>';
				$j--;
			}
			?>
		</select>
		
		<input type="submit" />
	
	</form>
</html>