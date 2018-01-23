<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller{

    /**
    * @Route("/login", name="login")
    * @return \Symfony\Component\HttpFoundation\Response
    */
    public function loginAction(){

        // $user = new user();
        // $em = $this->getDoctrine()->getManager();
        // $user->setUsername('admin');
        // $encoder = $this->get('security.password_encoder');
        // $user->setPassword($encoder->encodePassword($user, 'admin'));
        // $em->persist($user);
        // $em->flush();

        $utils = $this->get('security.authentication_utils'); // récupère l'authentification
        $error = $utils->getLastAuthenticationError(); // edite les erreurs
        $lastUsername = $utils->getLastUsername(); // réinscrit la derniere authentification utilisé
        return $this->render('security/login.html.twig', [
            'username' => $lastUsername,
            'error' => $error
        ]);
    }

}
