<?php
class Utilisateur
{
   // déclaration des variables = champs de la table t_competences.sql
   private $prenom;
   private $nom;
   private $email;
   private $telephone;
   private $mdp;
   private $pseudo;
   private $avatar;
   private $age;
   private $date_naissance;
   private $sexe;
   private $etat_civil;
   private $adresse;
   private $cp;
   private $ville;
   private $site_web;
   private $pdo;

   public function __construct($pdo){
       $this->pdo = $pdo;
   }

   // fonction d'insertion en BDD
   public function insertUtilisateur($prenom, $nom, $email, $telephone, $mdp, $pseudo, $avatar, $age, $date_naissance, $sexe, $etat_civil, $adresse, $cp, $ville, $site_web)
   {
    	// on récupère les données rentrées par l'utilisateur
        $this->prenom = strip_tags($prenom);
		$this->nom = strip_tags($nom);
        $this->email = strip_tags($email);
        $this->telephone = strip_tags($telephone);
        $this->mdp = strip_tags($mdp);
        $this->pseudo = strip_tags($pseudo);
        $this->avatar = strip_tags($avatar);
        $this->age = strip_tags($age);
        $this->date_naissance = strip_tags($date_naissance);
        $this->sexe = strip_tags($sexe);
        $this->etat_civil = strip_tags($etat_civil);
        $this->adresse = strip_tags($adresse);
        $this->cp = strip_tags($cp);
        $this->ville = strip_tags($ville);
        $this->site_web = strip_tags($site_web);


          // on crée une requête puis on l'exécute
          $req = $this->pdo->prepare('INSERT INTO t_utilisateurs (prenom, nom, email, telephone, mdp, pseudo, avatar, age, date_naissance, sexe, etat_civil, adresse, cp, ville, site_web) VALUES (:prenom, :nom, :email, :telephone, :mdp, :pseudo, :avatar, :age, :date_naissance, :sexe, :etat_civil, :adresse, :cp, :ville, :site_web)');
          $req->execute([
        	':prenom' => $this->prenom,//on attribue à la variable prenom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'etre posté
            ':nom'	=> $this->nom,
            ':email'	=> $this->email,
            ':telephone' => $this->telephone,
            ':mdp' => $this->mdp,
            ':pseudo' => $this->pseudo,
            ':avatar' => $this->avatar,
            ':age' => $this->age,
            ':date_naissance' => $this->date_naissance,
            ':sexe' => $this->sexe,
            ':etat_civil' => $this->etat_civil,
            ':adresse' => $this->adresse,
            ':cp' => $this->cp,
            ':ville' => $this->ville,
            ':site_web' => $this->site_web]);
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
