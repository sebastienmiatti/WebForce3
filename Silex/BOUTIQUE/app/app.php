<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// enregistrement des services : Error et Exception :
    ErrorHandler::register();
    ExceptionHandler::register();

// On enregistre notre application au service Doctrine qu'on a récupérés
    $app -> register(new Silex\Provider\DoctrineServiceProvider());

// On enregistre dans $app['dao.produit'] un objet de la class ProduitDao de maniere a ce qu'il soit directement accessible via $app.
    $app['dao.produit'] = function($app)
    {
        return new BOUTIQUE\DAO\ProduitDAO($app['db']);
    };

// On enregistre le service TWIG:
    $app -> register(new Silex\Provider\TwigServiceProvider(),
    array(
    'twig.path' => __DIR__ . '/../views'
    ));

// On enregistre le service Assets
    $app -> register(new Silex\Provider\AssetServiceProvider(), array(
        'assets.version' => 'v1'
    ));

// On enregistre le service Form
    $app -> register(new Silex\Provider\FormServiceProvider());


 ?>
