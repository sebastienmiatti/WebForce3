<!Doctype html>
<html>
    <head>
        <title>Mon Site - <?= $page ?></title>
        <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css"/>
    </head>
    <body>    
        <header>
			<div class="conteneur">                      
				<span>
					<a href="" title="Mon Site">MonSite.com</a>
                </span>
<nav>
<?php if(userConnecte()) : ?>

	<a <?= active('Profil') ?> href="<?= RACINE_SITE ?>profil.php">Profil</a>
	
	<a <?= ($page == 'Boutique') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
	<a <?= ($page == 'Panier') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>panier.php">Panier
	
	<?php if(quantitePanier()) : ?>
		<span class="bulle" title="Vous avez <?= quantitePanier() ?> produit(s) dans votre panier" ><?= quantitePanier() ?></span>
	<?php endif; ?>
		</a>
	
	
	<a href="<?= RACINE_SITE ?>connexion.php?action=deconnexion">Déconnexion</a>
<?php else : ?>
	<a <?= ($page == 'Inscription') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
	<a <?= ($page == 'Connexion') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
	<a <?= ($page == 'Boutique') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
	<a <?= ($page == 'Panier') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>panier.php">Panier
	
	<?php if(quantitePanier()) : ?>
		<span class="bulle" title="Vous avez <?= quantitePanier() ?> produit(s) dans votre panier"><?= quantitePanier() ?></span>
	<?php endif; ?>
		</a>
		
<?php endif; ?>	


<?php if(userAdmin()) : ?>
	<a <?= ($page == 'Gestion Boutique') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_boutique.php">Gestion boutique</a>
	<a <?= ($page == 'Gestion membres') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_membres.php">Gestion membres</a>
	<a <?= ($page == 'Gestion commandes') ? 'class="active"' : '' ?> href="<?= RACINE_SITE ?>backoffice/gestion_commandes.php">Gestion commandes</a>
<?php endif; ?>
	
</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">