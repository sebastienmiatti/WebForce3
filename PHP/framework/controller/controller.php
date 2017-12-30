<?php
class Controller
{
    // Ce controller général est instancié dans l'index.php

    // La fonction handlerequest, va "scanner" l'URL pour savoir quelle action a été demandée.
    public function handleRequest()
    {
        require('model/model.php');// on require model qui va effectuer la connexion a la BDD
        // Explode ca créé un tableau : array('framework.dev, 'contact', 'create') en décomposant les infos dans l'URL
        $exploded =  explode('/', $_SERVER['REQUEST_URI']);
        $controller = $exploded[1];// $controller va contenir le controller : contact
        $method = $exploded[2]; // $method va contenir l'action à effectuer : Create

        require('controller/' . $controller . '.php'); // require le controller dont on a besoin : controller/contact.php
        // ContactController    Contact        controller
        $controller = ucfirst($controller) . 'Controller';
        $controller = new $controller; // On instancie le controller dont on a besoin : $controller = new ContactController;
        $controller->$method(); // Depuis le controller que l'on vient de créer on lance la méthode demandée dans l'URL : $controller -> create()
    }

    //en résumé:
    //require ('model/model.php');
    //require ('controller/contact.php');
    //$controller = new ContactController;
    //$controller -> create();
    // scanne et lance ce qu'il y a dans l'url


    public function render($view)
    {
        // cette fonction attends un argument du type : nom_du_dossier nom_du_fichier : contact.create
        // elle va recréer le chemin complet de la vue a require en commenceant par le dossier View, puis le nom du dossier puis le nom du fichier
        // str_replace permet de remplacer le '-' par un '/'
        // le chemin de notre vue devient : view/contact/create.php
        $chemin_view = 'view/' . str_replace('.', '/', $view) . '.php';
        require($chemin_view);
        //on require la vue demandée
    }
}
