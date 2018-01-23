<?php

switch ($_POST['operation']) {

     case 'addition':
     $result = $_POST['value1'] + $_POST['value2'];
     break;

     case'soustraction':
     $result = $_POST['value1'] - $_POST['value2'];
     break;

     case'multiplication':
     $result = $_POST['value1'] * $_POST['value2'];
     break;

     case'division':
     $result = $_POST['value1'] / $_POST['value2'];
     break;

     default :
     header('location:calculatrice.php');
     break;
}

echo 'Le résultat est : ' . $result;





 ?>
