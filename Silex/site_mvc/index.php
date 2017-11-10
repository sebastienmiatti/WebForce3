<?php

define('RACINE_SITE', '/htdocs-SEB/WebForce3/Silex/site_mvc/');

require('model.php');

$infos = afficheAll();

$produits = $infos['produits'];
$categories = $infos['categories'];


require('view.php');
 ?>
