<?php
class Reseau
{
   // déclaration des variables = champs de la table t_reseaus.sql
   private $reseau;
   private $url;

   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertReseau($reseau, $url)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->reseau = strip_tags($reseau);
		$this->url = strip_tags($url);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_reseaux (reseau, url) VALUES (:reseau, :url)');
          $req->execute([
        	':reseau' => $this->reseau,//on attribue à la variable reseau la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':url'	=> $this->url]);
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
