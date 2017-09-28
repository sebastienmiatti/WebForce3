<!Doctype html>
<html>
    <head>
        <title>Mon Site</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css">
    </head>
    <body>
        <header>
			<div class="conteneur">
				<span>
					<a href="<?= RACINE_SITE ?>index.php" title="Mon Site">MonSite.com</a>
                </span>
				<nav>
					<?php if(userConnecte()) : ?>
						<a href="<?= RACINE_SITE ?>profil.php">Profil</a>
						<a href="<?= RACINE_SITE ?>connexion.php?action=deconnexion">Déconnexion</a>
					<?php else : ?>
						<a href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
						<a href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
					<?php endif; ?>
						<a href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
						<a href="<?= RACINE_SITE ?>panier.php">Panier</a>
                    <?php if (userAdmin()) : ?>
                        <a href="<?= RACINE_SITE ?>backoffice/gestion_boutique.php">Gestion Boutique</a>
                        <a href="<?= RACINE_SITE ?>backoffice/gestion_membres.php">Gestion Membres</a>
                        <a href="<?= RACINE_SITE ?>backoffice/gestion_commandes.php">Gestion Commandes</a>
                    <?php endif; ?>
				</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">
