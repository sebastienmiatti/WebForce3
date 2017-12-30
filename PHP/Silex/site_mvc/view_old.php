<!Doctype html>
<html>
    <head>
        <title>Mon Site - <?= $page ?></title>
		<meta charset="UTF-8" />
        <link rel="stylesheet" href="<?= RACINE_SITE ?>css/style.css"/>
    </head>
    <body>
        <header>
			<div class="conteneur">
				<span>
					<a href="<?= RACINE_SITE ?>index.php" title="Mon Site">MonSite.com</a>
                </span>
				<nav>
                    <a href="#">Connexion</a>
                    <a href="#">Inscription</a>
                    <a href="#">Profil</a>
                    <a href="#">Panier</a>
                    <a href="#">Boutique</a>

                </nav>
            </div>
        </header>
        <section>
            <div class="conteneur">

                </h1>Boutique</h1>

                <div class="boutique-gauche">
                    <ul>
                        <li><a href="boutique.php">Tous les produits</a></li>
                        <?php for($i = 0; $i < count($categories) ; $i ++) : ?>
                            <li><a href="?cat=<?=  $categories[$i]['categorie'] ?>"><?=  $categories[$i]['categorie'] ?></a></li>
                        <?php endfor; ?>
                        <!-- La boucle ci-dessus parcourt tous les résultats de la requête SELECT DISTINCT CATEGORIE FROM PRODUIT. Le résultat un tableau multidimentionnel dans lequel à chaque indice (0, 1, 2 etc..) on récupère un array, avec la catégorie à l'indice 'categorie'. Donc $categories[$i]['categorie'] nous affiche chaque catégorie. -->

                    </ul>
                </div>

                <div class="boutique-droite">



                    <?php foreach($produits as $pdt) :  ?>
                    <!-- Debut vignette produit -->
                    <div class="boutique-produit">
                        <h3><?= $pdt['titre'] ?></h3>
                        <a href="fiche_produit.php?id=<?= $pdt['id_produit'] ?>"><img src="<?= RACINE_SITE ?>photo/<?= $pdt['photo'] ?>" height="100"/></a>
                        <p style="font-weight: bold; font-size: 20px;"><?= $pdt['prix'] ?>€</p>
                        <p style="height: 40px"><?= substr($pdt['description'], 0, 40) ?>...</p>
                        <a href="fiche_produit.php?id=<?= $pdt['id_produit'] ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
                        <!-- href="fiche_produit.php?id=id_du_produit" -->
                    </div>
                    <!-- Fin vignette produit -->
                    <?php endforeach; ?>

                </div>

            </div>
        </section>
        <footer>
            <div class="conteneur">
                <?= date('Y') ?> - Tous droits reservés.
            </div>
        </footer>
    </body>
</html>
