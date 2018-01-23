<?php

namespace AppBundle\Controller;

//spéficiation d'une méthode dans les routes
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
//route par le principe d'annotation
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HelloController extends Controller
{
    /**
    *@Route("/hello/{slug}", name="hello")
    *@Method("GET"))
    *@param $slug
    *@return Response
    */

    public function helloAction($slug){
        return $this->render('Hello.html.twig',[
            'name' => $slug
        ]);
    }
    /**
     * @Route("/", name="homepage")
     */
    // public function helloAction(Request $request)
    // {
    //     // replace this example code with whatever you need
    //     return $this->render('default/index.html.twig', [
    //         'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
    //     ]);
    // }
}
