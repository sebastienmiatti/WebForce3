<?php
class Realisation
{
   // déclaration des variables = champs de la table t_competences.sql
   private $r_titre;
   private $r_soustitre;
   private $r_dates;
   private $r_description;
   private $r_img;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertRealisation($r_titre, $r_soustitre, $r_dates, $r_description, $r_img)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->r_titre = strip_tags($r_titre);
		$this->r_soustitre = strip_tags($r_soustitre);
        $this->r_dates = strip_tags($r_dates);
        $this->r_description = strip_tags($r_description);
        $this->r_img = strip_tags($r_img);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_competences (r_titre, r_soustitre, r_dates, r_description, r_img) VALUES (:r_titre, :r_soustitre, :r_dates, :r_description, :r_img)');
          $req->execute([
        	':r_titre' => $this->r_titre,//on attribue à la variable r_titre la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':r_soustitre'	=> $this->r_soustitre,
            ':r_dates'	=> $this->r_dates,
            ':r_description' => $this->r_description,
            ':r_img' => $this->r_img]);
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
