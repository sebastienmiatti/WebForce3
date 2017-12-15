<?php

// 0123456789
for($i = 0; $i <= 9; $i++){
	echo $i;
}
echo '<br/>'; 

// 0123456789 (dans un tableau)
echo '<table border="1">'; 
echo '<tr>'; 
for($i = 0; $i <= 9; $i++){
	echo '<td>' . $i . '</td>'; 
}
echo '</tr>'; 
echo '</table>'; 
echo '<br/>'; 


// de 0 à 99 dans un tableau


// Calcul avec $i et $j
echo '<table border="1">'; 
for($i = 0; $i <= 9; $i++){
	echo '<tr>';
	for($j = 0; $j <= 9; $j++){
		echo '<td>' . ($i * 10 + $j) . '</td>'; 
	}
	echo '</tr>';
}
echo '</table>';



// variable extérieur : 
$z = 0;
echo '<br/>'; 
echo '<table border="1">'; 
for($i = 0; $i <= 9; $i++){
	echo '<tr>';
	for($j = 0; $j <= 9; $j++){
		echo '<td>' . $z . '</td>';
		// combien de fois je passe ici ? 
		$z++;
	}
	echo '</tr>';
}
echo '</table>';


// Modulo : 
echo '<br/>'; 
echo '<table border="1">';
echo '<tr>'; 
for($i = 0; $i <= 99; $i++){
	
	if($i%10 == 0){
		echo '</tr><tr>'; 
	}
	echo '<td>' . $i . '</td>'; 
	
}
echo '</tr>'; 
echo '</table>'; 




