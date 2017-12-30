<?php

namespace BOUTIQUE\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class MembreController
{
    public function profilAction(Application $app)
    {
        session_start();
        $_SESSION['membre']['pseudo'] = 'Tchikito';
        $_SESSION['membre']['id_membre'] = '1';
        $_SESSION['membre']['sexe'] = 'm';
        $_SESSION['membre']['prenom'] = 'sebastien';
        $_SESSION['membre']['nom'] = 'miatti';
        $_SESSION['membre']['email'] = 'miatti.sebastien@live.fr';
        $_SESSION['membre']['adresse'] = '11 allée saint-exupéry';
        $_SESSION['membre']['code_postal'] = '92390';
        $_SESSION['membre']['ville'] = 'Villeneuve-la-garenne';
        $_SESSION['membre']['statut'] = '0';
        //etc...

        //On rend la vue profil.html.twig

        $params = array(
            // 'id_membre' => $_SESSION['membre']['id_membre'], (fait seul)
            // 'sexe' => $_SESSION['membre']['sexe'],
            // 'prenom' => $_SESSION['membre']['prenom'],
            // 'nom' => $_SESSION['membre']['nom'],
            // 'email' => $_SESSION['membre']['email'],
            // 'adresse' => $_SESSION['membre']['adresse'],
            // 'code_postal' => $_SESSION['membre']['code_postal'],
            // 'ville' => $_SESSION['membre']['ville'],
            // 'statut' => $_SESSION['membre']['statut'],
            'membre' => $_SESSION['membre'],
            'title' => 'Profil de ' . $_SESSION['membre']['pseudo']

        );
        return $app['twig'] -> render('profil.html.twig', $params);
    }
}


 ?>
