<?php
class Competence
{
   // déclaration des variables = champs de la table t_competences.sql
   private $competence;
   private $c_niveau;
   private $c_categorie;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertCompetence($competence, $c_niveau, $c_categorie)
   {
    	    // on récupère les données rentrées par l'utilisateur
        $this->competence = strip_tags($competence);
		$this->c_niveau = strip_tags($c_niveau);
        $this->c_categorie = strip_tags($c_categorie);
              // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_competences (competence, c_niveau, c_categorie) VALUES (:competence, :c_niveau, :c_categorie)');
          $req->execute([
        	':c_competence' => $this->competence,//on attribue à la variable c_competence la valeur de l'objet en cours d'instanciation, le nom de la competence de la competence qui vient d'etre posté
            ':c_niveau'	=> $this->c_niveau,
            ':c_categorie'	=> $this->c_categorie]);
            // on ferme la requête pour protéger des injections
            $req->closeCursor();
      }

    public function updateCompetence($competence, $c_niveau, $c_categorie){
            // on récupère les données rentrées par l'utilisateur
        $this->competence = strip_tags($competence);
        $this->c_niveau = strip_tags($c_niveau);
        $this->c_categorie = strip_tags($c_categorie);
            // on crée une requete puis on l'exécute
        $req = $this->pdo->prepare('UPDATE t_competences(competence, c_niveau, c_categorie) VALUES (:competence, :c_niveau, :c_categorie)');
        $req->execute([
            'c_competence' => $this->competence, // on attribue a la variable c_competence la valeur de lobjet en cour d'instanciation
            'c_niveau' => $this->c_niveau,
            'c_categorie' => $this->c_categorie]);
            $req->closeCursor();
    }

    public function deleteCompetence($competence, $c_niveau, $c_categorie){
            // on crée une requete puis on l'exécute
        $req = $this->pdo->prepare('DELETE * FROM t_competences WHERE id_competence= $id_competence');
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
