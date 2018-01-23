<?php
class Formation
{
   // déclaration des variables = champs de la table t_competences.sql
   private $f_titre;
   private $f_soustitre;
   private $f_dates;
   private $f_description;
   private $f_logo;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertFormation($f_titre, $f_soustitre, $f_dates, $f_description, $f_logo)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->f_titre = strip_tags($f_titre);
		$this->f_soustitre = strip_tags($f_soustitre);
        $this->f_dates = strip_tags($f_dates);
        $this->f_description = strip_tags($f_description);
        $this->f_logo = strip_tags($f_logo);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_competences (f_titre, f_soustitre, f_dates, f_description, f_logo) VALUES (:f_titre, :f_soustitre, :f_dates, :f_description, :f_logo)');
          $req->execute([
        	':f_titre' => $this->f_titre,//on attribue à la variable f_titre la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':f_soustitre'	=> $this->f_soustitre,
            ':f_dates'	=> $this->f_dates,
            ':f_description' => $this->f_description,
            ':f_logo' => $this->f_logo]);
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
