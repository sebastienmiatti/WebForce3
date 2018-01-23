<?php
class Texte
{
   // déclaration des variables = champs de la table t_t_heads.sql
   private $t_head;
   private $t_body;
   private $t_foot;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertTexte($t_head, $t_body, $t_foot)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->t_head = strip_tags($t_head);
		$this->t_body = strip_tags($t_body);
        $this->t_foot = strip_tags($t_foot);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_textes (t_head, t_body, t_foot) VALUES (:t_head, :t_body, :t_foot)');
          $req->execute([
        	':c_t_head' => $this->t_head,//on attribue à la variable c_t_head la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':t_body'	=> $this->t_body,
            ':t_foot'	=> $this->t_foot]);
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
