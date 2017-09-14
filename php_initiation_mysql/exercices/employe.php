<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mardi;charset=utf8','root','');
    echo "ok";

    } catch (PDOException $e) {
        echo "impossible de se connecter.";
        exit;
        // on récupère tous les contacts de la bdd
} $req = $bdd->query('SELECT * FROM contacts ORDER BY co_name ASC, co_firstname ASC');
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
        </head>

        <body>
            <table>
                <?php while($datas = $req->fetch()) { ?>
                <tr>
                    <td><?php echo $datas['co_name']; ?></td>
                    <td><?php echo $datas['co_firstname']; ?></td>
                    <td><?php echo $datas['co_gender']; ?></td>
                </tr>
            <?php } ?>
            </table>

        </body>
    </html>
