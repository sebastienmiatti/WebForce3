<?php

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array( // connexion a la BDD

    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING

));

$msg = ''; // créé la variable $msg pour les messages de verifications
if(!empty($_POST)){ // verification de $_POST n'est pas vide avant de faire les traitements suivant.

    if(empty($_POST['title'])){
       $msg .= '<p style="background:red; font-weight:bold;color:white; padding:5px">Veuillez renseigner le champs</p>';

    }else{

        if(strlen($_POST['title']) < 5 || strlen($_POST['title']) > 60){ // bloque les caractères entre 5 et 60
            $msg .= '<p style="color: white; background: red; padding: 5px">Attention : Un titre doit comporter au moins 5 caractères !</p>';
        }
    }

    if(empty($_POST['actors'])){ // vérification des auteurs
      $msg .= '<p style="background:red; font-weight:bold;color:white; padding:5px">Veuillez renseigner le champs</p>';

    }else{

        if(strlen($_POST['actors']) < 5 || strlen($_POST['actors']) > 60){

            $msg .= '<p style="color: white; background: red; padding: 5px">Attention : l\'acteur doit comporter au moins 5 caractères !</p>';
        }
    }

   if(empty($_POST['director'])){ // vérification des directeurs de films
      $msg .= '<p style="background:red; font-weight:bold;color:white; padding:5px">Veuillez renseigner le champs</p>';

    }else{

        if(strlen($_POST['director']) < 5 || strlen($_POST['director']) > 60){

            $msg .= '<p style="color: white; background: red; padding: 5px">Attention : le directeur doit comporter au moins 5 caractères !</p>';
        }
    }

   if(empty($_POST['producer'])){ // vérification du produteur
      $msg .= '<p style="background:red; font-weight:bold;color:white; padding:5px">Veuillez renseigner le champs</p>';

    }else{

        if(strlen($_POST['producer']) < 5 || strlen($_POST['producer']) > 60){

            $msg .= '<p style="color: white; background: red; padding: 5px">Attention : le producteur doit comporter au moins 5 caractères !</p>';
        }
    }

   if(empty($_POST['storyline'])){ //  vérification du synopsis
      $msg .= '<p style="background:red; font-weight:bold;color:white; padding:5px">Veuillez renseigner le champs</p>';

    }else{

        if(strlen($_POST['storyline']) < 5 || strlen($_POST['storyline']) > 250){ // bloque les caractères entre 5 et 250
            $msg .= '<p style="color: white; background: red; padding: 5px">Attention : la storyline doit comporter au moins 5 caractères !</p>';
        }
    }

   if(empty($msg)){ // Tout est OK !!

        // Traitement pour l'enregistrement dans la BDD
        //prepare() + execute() : DELETE-REPLACE-INSERT-UPDATE-SELECT - SHOW si données sensibles

        $resultat = $pdo -> prepare("INSERT INTO movies (id_movies, title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES (:id_movies, :title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video) "); // Il y a des données sensibles dans la future requête, car nous allons insérer toutes les infos transmises, par l'utilisateur. Il peut avoir tenté des injections SQL !!

        $resultat -> bindParam(':id_movies', $_POST['id_movies'], PDO::PARAM_INT);
        $resultat -> bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $resultat -> bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
        $resultat -> bindParam(':director', $_POST['director'], PDO::PARAM_STR);
        $resultat -> bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
        $resultat -> bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_INT);
        $resultat -> bindParam(':language', $_POST['language'], PDO::PARAM_STR);
        $resultat -> bindParam(':category', $_POST['category'], PDO::PARAM_STR);
        $resultat -> bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
        $resultat -> bindParam(':video', $_POST['video'], PDO::PARAM_STR);

       if($resultat -> execute()){ // exécution de la requete

           $msg .= '<p style="color: white; background: green; padding: 5px">Félicitations, le film a été ajouté !</p>';

       }
   }
}
?>
<form method="post" action="">
   <?= $msg ?>
   <fieldset>
      <legend>Ajouter un film</legend>
      <label>Title :</label><br>
      <input type="text" name="title" value=""><br><br>

      <label>Actor :</label><br>
      <input type="text" name="actors"><br><br>

      <label>Director :</label><br>
      <input type="text" name="director" value=""><br><br>

      <label>Producer :</label><br>
      <input type="text" name="producer" value=""><br><br>

      <label>Year of prod :</label><br>
      <select name="year_of_prod">
           <?php for($i = date("Y"); $i >= 1900; $i--) {
               if($i == $_POST['year_of_prod']){
                  $select = 'selected';
               }else{
                  $select ='';
               }
                  echo '<option ' . $select .  ' >' .  $i . '</option>';
            }
            ?>
      </select><br><br>

      <label>Language :</label><br>
      <select name="language">
            <option value="français">Français</option>
            <option value="anglais">Anglais</option>
            <option value="espagnol">Espagnol</option>
            <option value="espagnol">Italien</option>
      </select><br><br>

      <label>Category :</label><br>
      <select name="category">
            <option value="horreur">Horreur</option>
            <option value="romantique">Romantique</option>
            <option value="thriller">Thriller</option>
            <option value="action">Action</option>
      </select><br><br>

      <label>Storyline :</label><br>
      <textarea name="storyline" cols="16"></textarea><br><br>

      <label>Video :</label><br>
      <input type="text" name="video"><br><br>

      <input type="submit" name="envoyer" value="Envoyer">


   </fieldset>

</form>

</html>
