<?php

require_once __DIR__ . '/../vendor/autoload.php'; // chargement des fichier de routing

$app = new Silex\Application; // instanciation de l'application

//$app -> get('/', function(){
//return 'Hello World !';
//});

//$app -> get('/hello/{name}', function($name) use($app){
//    return 'Hello' . $app -> escape($name);
//});


//$app['debug'] = true;

require __DIR__ . '/../app/config/dev.php';
require __DIR__ . '/../app/app.php';
require __DIR__ . '/../app/routes.php';

$app -> run(); // lancement du traitement demandé avec run();


 ?>
