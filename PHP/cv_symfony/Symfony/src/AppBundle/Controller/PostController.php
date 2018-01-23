<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Post;
use AppBundle\Form\PostType;
//spéficiation d'une méthode dans les routes
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//route par le principe d'annotation
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller
{
    /**
    * @Route("/posts", name="posts.index")
    * @Method({"GET", "POST"})
    */
    public function indexAction(Request $request){ // récupère automatiquement les info et renseigne l'entité en fonction
        // return new Response($this->get('app_demo')->hello());
        $repository = $this->getDoctrine()->getRepository('AppBundle:Post');
        $posts = $repository->findAllWithCategories();
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->add('Sauvegarder', SubmitType::class); // soumission du formu

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){ // validation de la soumission si il est valid selon les condition entity/post
            $em = $this->getDoctrine()->getManager();
            $post->setCreatedAt(new \DateTime());
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('posts.index');
        }


        return $this->render('posts/index.html.twig', [ // retour de vue
            'posts' => $posts,
            'form' => $form->createView()
        ]);
    }

    /**
    * @Route("/posts/{id}", name="posts.edit")
    * @Method({"GET", "POST"})
    */
    public function editAction(Request $request, Post $post){ // récupère automatiquement les info et renseigne l'entité en fonction
        $form = $this->createForm(PostType::class, $post);
        $form->add('Modifier', SubmitType::class); // soumission du formu

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){ // validation de la soumission si il est valid selon les condition entity/post
            $em = $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('posts.index');
        }


        return $this->render('posts/edit.html.twig', [ // retour de vue
            'form' => $form->createView(),
            'post' => $post
        ]);
    }

}
