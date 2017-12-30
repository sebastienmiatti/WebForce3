<?php

class BlogController extends Controller // création de blog associé a Controller
{
    public function create()
    {
        $this->render('blog.create');
    }

    public function store() // enregistré ressource full
    {
        $blog = new Model('blogs');
        $blog->titre = $_POST['titre'];
        $blog->nom = $_POST['body'];
        $blog->nom = $_POST['auteur'];
        $blog->save();
        header('Location: /blog/index');
    }

    public function index()
    {
        $blog = new Model('blogs');
        $GLOBALS['blogs'] = $blog->all();
        $this->render('blog.index');
    }

    public function edit()
    {
        $blog = new Model('blogs');
        $blog->find($_GET['id']);
        $GLOBALS['blog'] = $blog;
        $this->render('blog.edit');
    }

    public function update()
    {
         $blog = new Model('blogs');
         $blog->find($_GET['id']);
         $blog->titre = $_POST['titre'];
         $blog->nom = $_POST['body'];
         $blog->nom = $_POST['auteur'];
         $blog->save();
         // header('Location: /blog/index');
    }

    public function delete()
    {
    $blog = new Model('blogs');
    $blog->delete($_GET['id']);
    header('Location: /blog/index');
    }
}
?>
