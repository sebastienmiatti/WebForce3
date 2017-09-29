<?php
require_once('inc/init.inc.php');

// traitement pour redirection si user n'est pas connecté
if(!userConnecte()){
	header('location:connexion.php');
}

extract($_SESSION['membre']);

//Traitement pour récupérer les commandes correspondantes à cet utilisateur : 
$resultat = $pdo -> query("SELECT id_commande, id_membre, montant, date_format(date_enregistrement, '%d/%m/%Y') as date_commande, etat FROM commande WHERE id_membre = $id_membre ORDER BY  date_enregistrement DESC");
$commande = $resultat -> fetchAll(PDO::FETCH_ASSOC);

// S'il y a bien des commandes je stocke leur nombre dans une variable pour pouvoir afficher à l'utilisateur le nombre de commande qu'il a dans son hitorique
if($resultat -> rowCount() > 0){
	$nbre_commande = '(' .$resultat -> rowCount() . ')';
}
else{
	$nbre_commande = '';
}

$page = 'Profil';
require_once('inc/header.inc.php');
?>
<h1>Profil de <?= $pseudo ?> </h1>

<div class="profil">
	<p>Bonjour <?= $pseudo ?> !!</p><br/>
	
	<div class="profil_img"> 
		<img src="img/default.png" />
	</div>
	<div class="profil_infos">
		<ul>
			<li>Pseudo : <b><?= $pseudo ?></b></li>
			<li>Prénom : <b><?= $prenom ?></b></li>
			<li>Nom : <b><?= $nom ?></b></li>
			<li>Email : <b><?= $email ?></b></li>
		</ul>
	</div>
	<div class="profil_adresse">
		<ul>
			<li>Adresse : <b><?= $adresse ?></b></li>
			<li>Code Postal : <b><?= $code_postal ?></b></li>
			<li>Ville : <b><?= $ville ?></b></li>
		</ul>
	</div>
</div>

<div class="profil">
	<h2>Détails des commandes <?= $nbre_commande ?></h2>
	<!-- S'il y a des commandes j'affiche les détails : -->
	<?php if($resultat -> rowCount() > 0) : ?>
		<!-- Pour chaque commande j'affiche les infos -->
		<?php for($i = 0; $i < count($commande); $i ++) : ?>
			<hr/><h4>Commande passé le <?= $commande[$i]['date_commande'] ?> : </h4>
			<ul>
				<li>Numéro de commande : <b><?= $commande[$i]['id_commande'] ?></b></li>
				<li>Montant de la commande : <b><?= $commande[$i]['montant'] ?>€TTC</b></li>
			</ul>
			<p>Le statut de votre commande est :  <span style="font-weight: bold; color:<?php 
			if($commande[$i]['etat'] == 'livré'){
				echo 'green';
			}
			elseif($commande[$i]['etat'] == 'envoyé'){
				echo 'orange';
			}
			else{
				echo 'red';
			}
			?>"><?= $commande[$i]['etat'] ?></span></p>
			<p><u><a href="#">Voir les détails de la commande</a></u></p>
			
			<?php
			// Pour chaque commande, je récupère les détails dans la table details_commande ainsi que la table produit (pour récupérer les photos et les titres des produits).
			$id_commande = $commande[$i]['id_commande'];
			$resultat = $pdo -> query(
			"SELECT p.id_produit, d.quantite, d.prix, p.photo, p.titre
			FROM details_commande d, produit p
			WHERE d.id_produit = p.id_produit
			AND d.id_commande = $id_commande"
			);
			
			$details = $resultat -> fetchAll(PDO::FETCH_ASSOC);
			foreach($details as $indice => $valeur){
				
				echo '<hr/><img src="photo/' . $valeur['photo'] . '" width="30"/>';
				echo '<p>Produit : ' . $valeur['titre'] . '<br/>Prix : ' . $valeur['prix'] . '€ttc<br/>Quantité achetée : '. $valeur['quantite'].'</p>';  
			}
			?>
		<?php endfor; ?>
	<!-- Sinon, je propose un lien vers la boutique : -->
	<?php else : ?>
	<p>Vous n'avez pas encore passé de commande !<br/>Venez visiter <a href="boutique.php"><u>notre boutique</u></a></p>
	<?php endif; ?>
</div>




<?php
require_once('inc/footer.inc.php');
?>