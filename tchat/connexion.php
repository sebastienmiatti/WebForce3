<?php
require_once("inc/init.inc.php");
if(isset($_POST['connexion'])) // si on clic sur connexion
{
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);
    //echo '<pre>';
    //print_r($_SERVER);
    //echo '</pre>';
    if($resultat->rowCount() == 0)
    {
        $resultat = $pdo->prepare("INSERT INTO membre (pseudo, civilite, ville, date_de_naissance, ip, date_connexion) VALUES (:pseudo, :civilite, :ville, :date_de_naissance, ' $_SERVER[REMOTE_ADDR]'," . time() . ")");

        $resultat->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $resultat->bindParam(':civilite', $_POST['civilite'], PDO::PARAM_STR);
        $resultat->bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
        $resultat->bindParam(':date_de_naissance', $_POST['date_de_naissance'], PDO::PARAM_INT);
        $resultat->execute();

        $id_membre = $pdo->lastInsertId(); // méthode issu de l'objet PDO qui retourne le dernier ID insérer en BDD.
        //echo $id_membre;

    }else if($resultat->rowCount() > 0 && $membre['ip'] == $_SERVER['REMOTE_ADDR']) // sinon si le pseudo est connu et que l'internaute est le propriétaire du pseudo.
    { // si nous recuperons un pseudo que nous avons utilisé, nous mettrons a jour la deniere date de connexion, nous ne sommes pas censé changer civilité ou ville.
        $pdo->exec("UPDATE membre SET date_connexion" . time() . "WHERE id_membre=$membre[id_membre]");
        $id_membre = $membre['id_membre'];
    }else{
        $msg .= '<div class="erreur">Ce pseudo a déjà été réservé</div>';
    }
    if(empty($msg))
    {
        $_SESSION['id_membre'] = $id_membre;
        $_SESSION['civilite'] = $_POST['civilite'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('location:index.php');
    }
}

 ?>

<link rel="css/stylesheet" href="inc/style.css">


<fieldset>
    <form action="" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" value="" id="pseudo"><br>
        <label for="civilite">Civilité</label>
        <select name="civilite">
            <option value="m">Homme</option>
            <option value="f">Femme</option>
        </select><br>

        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville" value=""><br><br>

        <label for="date_de_naissance">Date de naissance</label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" value=""><br><br>

        <input type="submit" name="connexion" value="connexion au tchat!">
    </form>
</fieldset>
