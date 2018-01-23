<?php
require('inc/inc.header.php');
if(!$_SESSION['connexion']) {
    header('location:../index_.php');
}
    // Gestion des contenus de la Base de données
    $sql = $pdo->prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
    $sql -> execute();
    $nbr_experiences = $sql->rowCount();
    // Insertion d'une experience
    if(isset($_POST['e_titre'])) { // Si on a posté une nouvelle experience
        if($_POST['e_titre'] != '' && $_POST['e_soustitre'] != ''  && $_POST['e_dates'] != '' && $_POST['e_description'] != '')  { // Si experience n'est pas vide
            // $e_titre             = addslashes($_POST['e_titre']);
            // $e_soustitre         = addslashes($_POST['e_soustitre']);
            // $e_dates             = addslashes($_POST['e_dates']);
            // $e_description       = addslashes($_POST['e_description']);
            // $pdo->exec("INSERT INTO t_experiences  VALUES ('$e_titre', '$e_soustitre', '$e_dates', '$e_description', '1')"); // mettre $id_utilisateur quand on l'aura dans la varible de session

            // exit();
            $sql =  $pdo->prepare("INSERT INTO t_experiences (e_titre, e_soustitre, e_dates, e_description, utilisateur_id) VALUES (:e_titre, :e_soustitre, :e_dates, :e_description, '1')");

            $sql->bindParam(':e_titre', addslashes($_POST['e_titre']), PDO::PARAM_STR);
            $sql->bindParam(':e_soustitre', addslashes($_POST['e_soustitre']), PDO::PARAM_STR);
            $sql->bindParam(':e_dates', addslashes($_POST['e_dates']), PDO::PARAM_STR);
            $sql->bindParam(':e_description', addslashes($_POST['e_description']), PDO::PARAM_STR);
            if($sql->execute()) {
                header('location:experiences.php');
            }
        } // ferme le if $_POST
    } // ferme le if isset du form

    // Suppression d'une experience
    if(isset($_GET['id_experience'])) { // on récupère la comp. par son id dans l'url
        $efface = $_GET['id_experience']; //  je mets cela dans une variable
        $sql = (" DELETE FROM t_experiences WHERE id_experience = '$efface'");
        $pdo->query($sql); // on peut avec exec aussi si on veut
        header('location:experiences.php'); // pour revenir sur la page

    } // ferme le if isset
?>

    <div class="panel panel-default">
        <div class="panel-heading">Il y a  <?= $nbr_experiences; ?> experiences</div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">Liste des experiences</div>
                    <div class="panel-body">
                        <table border="3" class="table table-bordered table-hover">
                            <tr>
                                <th>Experiences</th>
                                <th>Titre</th>
                                <th>Sous titre</th>
                                <th>Dates</th>
                                <th>Description</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                            <tr>
                        <?php while($ligne_experiences = $sql->fetch()) {  ?>
                                <td><?= $ligne_experiences['id_experience']; ?></td>
                                <td><?= $ligne_experiences['e_titre']; ?></td>
                                <td><?= $ligne_experiences['e_soustitre']; ?></td>
                                <td><?= $ligne_experiences['e_dates']; ?></td>
                                <td><?= $ligne_experiences['e_description']; ?></td>

                                <td class="modif"><a href="modif_experience.php?id_experience=<?= $ligne_experiences['id_experience']; ?>">
                                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></a></td>

                                    <td class="supr"><a href="experiences.php?id_experience=<?= $ligne_experiences['id_experience']; ?>"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>
                                </tr>
                        <?php } ?>
                        </table>
                    </div> <!-- ferme panel-body -->
                </div>
            </div>
            <div class="col-sm-4 col-lg4 text-justify">
                <div class="panel panel-primary">
                <div class=" panel panel-heading">Insertion d'une experience</div>
                    <div class="panel-body">
                        <form action="experiences.php" method="post">
                            <div class="form-group">
                                <label for="e_titre">Titre</label>
                                <input id="e_titre" name="e_titre" type="text" class="form-control" placeholder="Inserer un titre">
                                <label>Sous Titre</label>
                                <input id="e_soustitre" name="e_soustitre" class="form-control" type="text" placeholder="Inserer un soustitre">
                                <label>Dates</label>
                                <input id="e_dates" name="e_dates" class="form-control" type="text" placeholder="Inserer une date">
                                <label>Description</label>
                                <textarea id="e_description" name="e_description" class="form-control" type="text" placeholder="Inserer une description"></textarea>
                            </div>
                            <script>
                                CKEDITOR.replace( 'editor1' );
                            </script>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block form-control" value="Ajouté une experience">
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>
<?php require('inc/inc.footer.php');?>
