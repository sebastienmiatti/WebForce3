<?php
require('inc/inc.header.php');

    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
    $sql -> execute();
    $nbr_utilisateurs = $sql->rowCount();
    // Insertion d'une utilisateur
    if(isset($_POST['prenom'])) { // Si on a posté une nouvelle utilisateur
        if($_POST['nom'] != '' && $_POST['telephone'] != ''  && $_POST['pseudo'] != '' && $_POST['adresse'] != '')  { // Si utilisateur n'est pas vide
            // $r_titre             = addslashes($_POST['r_titre']);
            // $r_soustitre         = addslashes($_POST['r_soustitre']);
            // $r_dates             = addslashes($_POST['r_dates']);
            // $r_description       = addslashes($_POST['r_description']);
            // $pdo->exec("INSERT INTO t_utilisateurs  VALUES ('$r_titre', '$r_soustitre', '$r_dates', '$r_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session

            $sql =  $pdo->prepare("INSERT INTO t_utilisateurs (prenom, nom, email, telephone, adresse) VALUES (:prenom, :nom, :email, :telephone, :adresse '1')");

            $sql->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $sql->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $sql->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $sql->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
            $sql->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
            if($sql->execute()) {

                header('location:utilisateurstest.php');
            }
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une utilisateur
    if(isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_utilisateur']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:utilisateurstest.php'); // pour revenir sur la page

    } // ferme le if isset
?>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_utilisateurs; ?> utilisateurs</div>
    </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des utilisateurs</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <td>Identifiant des utiliseur :<?= $ligne_utilisateurs['id_utilisateur']; ?>s</td>
                                <td>Prénom : <?= $ligne_utilisateurs['prenom']; ?></td>
                                <td>Nom :<?= $ligne_utilisateurs['nom']; ?></td>
                                <td>Email : <?= $ligne_utilisateurs['email']; ?></td>
                                <td>Téléphone :<?= $ligne_utilisateurs['telephone']; ?></td>
                                <td>Pseudo : <?= $ligne_utilisateurs['pseudo']; ?></td>
                                <td>Adresse : <?= $ligne_utilisateurs['adresse']; ?></td>
                                <td>Code Postal : <?= $ligne_utilisateurs['code']?></td>
                                <td>Pays</th>
                                <td>Site Web</th>
                                <td>Modification</th>
                                <td>Suppression</th>
                            </tr>
                    
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg-3 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'un utilisateur</div>
                    <div class="panel-body">
                        <form action="utilisateurs.php" method="post">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Inserer un Prénom">
                                <label>Nom</label>
                                <input id="nom" name="nom" class="form-control" type="text" placeholder="Inserer un Nom">
                                <label>Email</label>
                                <input id="email" name="email" class="form-control" type="text" placeholder="Inserer un Email">
                                <label>Téléphone</label>
                                <input id="telephone" name="telephone" class="form-control" type="text" placeholder="Inserer un téléphone">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="ajouté un utilisateur">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>
<?php require('inc/inc.footer.php');?>
