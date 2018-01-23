<?php
class Experience
{
   // déclaration des variables = champs de la table t_competences.sql
   private $e_titre;
   private $e_soustitre;
   private $e_dates;
   private $e_description;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertExperience($e_titre, $e_soustitre, $e_dates, $e_description)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->e_titre = strip_tags($e_titre);
		$this->e_soustitre = strip_tags($e_soustitre);
        $this->e_dates = strip_tags($e_dates);
        $this->e_description = strip_tags($e_description);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_competences (e_titre, e_soustitre, e_dates, e_description) VALUES (:e_titre, :e_soustitre, :e_dates, :e_description)');
          $req->execute([
        	':e_titre' => $this->e_titre,//on attribue à la variable e_titre la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':e_soustitre'	=> $this->e_soustitre,
            ':e_dates'	=> $this->e_dates,
            ':e_description' => $this->e_description]);
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
