<?php
final class Application
{
    public function launchApp()
    {
        return "L'app s'est lancée.";
    }
}

// provoque une erreur.
class Extension extends Application{}
    $app = new Application; // la class est instanciable

    echo $app->launchApp();

    class Application
    {
        final public function launchApp()
        {
            return "L'app se lance.";
        }
    }

class Extension2 extends Application
{
    //provoque une erreur.
    public function launchApp(){
        // bla bla bla 
    }

}





 ?>
