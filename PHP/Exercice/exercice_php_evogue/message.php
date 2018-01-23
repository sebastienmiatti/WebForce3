
<?php
if(!empty($_GET)){ // S'il y a bien des informations dans $_GET alors je peux faire des traitements:

	echo '<pre>';
	print_r($_GET);
	echo '</pre>';

	echo 'Vous êtes : '. $_GET['pays'] . '<br/>';
}
 ?>


    <ul>
        <li><a href="message.php?pays=Français">France</a></li>
        <li><a href="message.php?pays=Italien">Italie</a></li>
        <li><a href="message.php?pays=Espagnol">Espagne</a></li>
        <li><a href="message.php?pays=Anglais">Angleterre</a></li>
    </ul>
