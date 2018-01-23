<?php
class Loisir
{
   // déclaration des variables = champs de la table t_loisirs.sql
   private $loisir;
   private $l_logo;

   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertLoisir($loisir, $l_logo)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->loisir = strip_tags($loisir);
		$this->l_logo = strip_tags($l_logo);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_loisirs (loisir, l_logo) VALUES (:loisir, :l_logo)');
          $req->execute([
        	':c_loisir' => $this->loisir,//on attribue à la variable loisir la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':l_logo'	=> $this->l_logo]);
            // on ferme la requête pour protéger des injections
            $req->closeCursor();
      }

    // // Bonus - envoi d'un email
    // public function sendEmail($sujet, $email, $message) {
    //     $this->to = 'miatti.sebastien@live.fr';
    //     $this->email = strip_tags($email);
    //     $this->sujet = strip_tags($sujet);
    //     $this->message = strip_tags($message);
    //     $this->headers = 'From: ' . $this->email . "\r\n"; //retours à la ligne
    //     $this->headers .= 'MIME-version: 1.0' . "\r\n";
    //     $this->headers .= 'Content-type : text/html; charset=utf-8' . "\r\n";
    //
    //     // on utilise la fonction mail() de PHP
    //     mail($this->to, $this->sujet, $this->message, $this->headers);
    // }

}
