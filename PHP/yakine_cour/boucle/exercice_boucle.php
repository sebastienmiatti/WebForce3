<?php
// boucle/exemple_bouche.php

// 1 : Télécharger 5 images sur google : image1.jpg, image2.jpg, image3.jpg, image4.jpg, image5.jpg

// 2 : Afficher l'image 1 grâce à une balise <img />

// 3 : Afficher 5 fois l'image 1 grâce à une boucle while.

// 4 : Afficher les 5 images grâce à une boucle While



//2 : 
echo '<img src="image1.jpg" width="250px" /><br/>'; 
echo '<hr/>'; 


//3 :
$i = 0; 
while($i <= 4 ){
	echo '<img src="image1.jpg" width="250px" /><br/>';
	$i ++;
}
echo '<hr/>'; 

//4 : 


$i = 1; // $i = 0 puis 1 puis 2 puis 3 puis 4
while($i <= 5 ){
	echo '<img src="image' . $i . '.jpg" width="250px" /><br/>';
	$i ++;
}
















