<?php
//  Exercice boucle/boucles_images.php

// 1 : Telecharger 5 images sur google : image1.jpg, image2.jpg, image3.jpg, image4.jpg, image5.jpg

// 2 : Afficher l'image 1 grâce à une balise <img>

// 3 : Afficher 5 fois l'image 1 grâce à une boucle while.

// 4 : Afficher les 5 images grâce à une boucle while.


echo '<img src="image1.jpg" alt="cheval" width="250px"/>';
echo '<hr>';
/*
echo '<img src="image2.jpg" alt="nature1"/>';
echo '<img src="image3.jpg" alt="nature2"/>';
echo '<img src="image4.jpg" alt="tigre"/>';
echo '<img src="image5.jpg" alt="nature3"/>';
*/

$i = 0;
 while($i < 5){
     echo '<img src="image1.jpg" alt="cheval"/>';
     $i++;
}
echo '<hr>';

$i = 1; // $ = 1 puis 2 puis 3 puis 4 puis 5
while($i <= 5){
     echo  '<img src="image' . $i .'.jpg" alt="cheval"/>';
     $i++;
}
echo '<hr>';



 ?>
