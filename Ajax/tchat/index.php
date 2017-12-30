<?php
require_once('inc/init.inc.php');

if(!isset($_SESSION['pseudo']))// Si on a pas de pseudo enregisté dans une session, c'est quon est pas passé par la page connexion.
{
        header('location:connexion.php');// redirection vers la page connexion
}

 ?>

 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <title>Bienvenu sur le TCHAT!!</title>
         <link rel="stylesheet" href="inc/style.css">
         <script type="text/javascript" src="inc/ajax.js"></script>
     </head>
     <body>

         <div id="conteneur">

             <div id="message_tchat">
                 <?php
                    echo '<h2>connecté en tant que : ' . $_SESSION['pseudo'] . '</h2>';
                    // formuler une requete permettant de selectionner les messages de la BDD
                    $resultat = $pdo->query("SELECT d.id_dialogue, m.pseudo, m.civilite, d.message, date_format(d.date, '%d/%m/%Y') as datefr, date_format(d.date, '%H:%i%s') as heurefr
                    FROM dialogue d, membre m
                    WHERE m.id_membre = d.id_membre
                    ORDER BY d.date");

                    while($dialogue = $resultat->fetch(PDO::FETCH_ASSOC))
                    {
                            echo '<pre>'; print_r($dialogue); echo '</pre>';
                    }

                  ?>

             </div>
                <div class="clear"></div>

             <div id="liste_membre_connecte">

             </div>
                <div class="clear"></div>

                <div id="formulaire_tchat">

                </div>

         </div>

     </body>
 </html>
