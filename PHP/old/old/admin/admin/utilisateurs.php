<?php
require('inc/inc.header.php');

    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
    $sql -> execute();
    $nbr_utilisateurs = $sql->rowCount();
    // Insertion d'une utilisateur
    if(isset($_POST['prenom'])) { // Si on a posté une nouvelle utilisateur
        if($_POST['nom'] != '' && $_POST['adresse'] != ''  && $_POST['email'] != '' && $_POST['telephone'] != '')  { // Si utilisateur n'est pas vide
            // $r_titre             = addslashes($_POST['r_titre']);
            // $r_soustitre         = addslashes($_POST['r_soustitre']);
            // $r_dates             = addslashes($_POST['r_dates']);
            // $r_description       = addslashes($_POST['r_description']);
            // $pdo->exec("INSERT INTO t_utilisateurs  VALUES ('$r_titre', '$r_soustitre', '$r_dates', '$r_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session

            $sql =  $pdo->prepare("INSERT INTO t_utilisateurs (email, telephone, adresse,  avatar) VALUES (email, :telephone, :adresse,  '1')");

            $sql->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $sql->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
            $sql->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $sql->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
            $sql->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
            if($sql->execute()) {

                header('location:utilisateurs.php');
            }
            exit();
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une utilisateur
    if(isset($_GET['id_utilisateur'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_utilisateur']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_utilisateurs WHERE id_utilisateur = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:utilisateurs.php'); // pour revenir sur la page

    } // ferme le if isset
?>
    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_utilisateurs; ?> utilisateurs</div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                <div class="panel-heading">Liste des utilisateurs</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <th>Identifiant des utiliseurs</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Pseudo</th>
                                <th>Adresse</th>
                                <th>Code Postal</th>
                                <th>Pays</th>
                                <th>Site Web</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                            <tr>
                        <?php while($ligne_utilisateurs = $sql->fetch()) {  ?>
                                <td><?= $ligne_utilisateurs['id_utilisateur']; ?></td>
                                <td><?= $ligne_utilisateurs['prenom']; ?></td>
                                <td><?= $ligne_utilisateurs['nom']; ?></td>
                                <td><?= $ligne_utilisateurs['email']; ?></td>
                                <td><?= $ligne_utilisateurs['pseudo']; ?></td>
                                <td><?= $ligne_utilisateurs['telephone']; ?></td>
                                <td><?= $ligne_utilisateurs['adresse']; ?></td>
                                <td><?= $ligne_utilisateurs['code_postal']; ?></td>
                                <td><?= $ligne_utilisateurs['pays']; ?></td>
                                <td><?= $ligne_utilisateurs['site_web']; ?></td>

                                <td class="modif"><a href="modif_utilisateur.php?id_utilisateur=<?= $ligne_utilisateurs['id_utilisateur']; ?>">
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                    <td class="supr"><a href="utilisateurs.php?id_utilisateur=<?= $ligne_utilisateurs['id_utilisateur']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                </tr>
                        <?php } ?>
                        </table>
                    </div>
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg-12 text-justify">
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
<?php require('inc/inc.footer.php');?>
