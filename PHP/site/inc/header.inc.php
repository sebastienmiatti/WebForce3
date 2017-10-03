<!Doctype html>
<html>
    <head>
        <title>Mon Site - <?= $page ?></title>
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
						<a class="<?= ($page == 'Profil') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>profil.php">Profil</a>
						<a href="<?= RACINE_SITE ?>connexion.php?action=deconnexion">Déconnexion</a>
					<?php else : ?>
						<a class="<?= ($page == 'Inscription') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>inscription.php">Inscription</a>
						<a class="<?= ($page == 'Connexion') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>connexion.php">Connexion</a>
					<?php endif; ?>
						<a class="<?= ($page == 'Boutique') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>boutique.php">Boutique</a>
						<a class="<?= ($page == 'Panier') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>panier.php">Panier<?php if (quantitePanier()) : ?><span class="bulle"><?= quantitePanier() ?></span>
                            <?php endif; ?>
                        </a>
                    <?php if (userAdmin()) : ?>
                        <a class="<?= ($page == 'Gestion Boutique') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>backoffice/gestion_boutique.php">Gestion Boutique</a>
                        <a class="<?= ($page == 'Gestion Membres') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>backoffice/gestion_membres.php">Gestion Membres</a>
                        <a class="<?= ($page == 'Gestion Commandes') ? 'active' : '' ?>" href="<?= RACINE_SITE ?>backoffice/gestion_commandes.php">Gestion Commandes</a>
                    <?php endif; ?>
				</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">
