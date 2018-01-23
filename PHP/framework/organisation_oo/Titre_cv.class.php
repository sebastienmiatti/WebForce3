<?php
class Texte
{
   // déclaration des variables = champs de la table t_titre_cv.sql
   private $titre_cv;
   private $accroche;
   private $logo;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertTexte($titre_cv, $accroche, $logo)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->titre_cv = strip_tags($titre_cv);
		$this->accroche = strip_tags($accroche);
        $this->logo = strip_tags($logo);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_titre_cv (titre_cv, accroche, logo) VALUES (:titre_cv, :accroche, :logo)');
          $req->execute([
        	':c_titre_cv' => $this->titre_cv,//on attribue à la variable c_titre_cv la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':accroche'	=> $this->accroche,
            ':logo'	=> $this->logo]);
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
