<!Doctype html>
<html>
<head>
  <title>Mon Site - </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="/css/style.css"/>
</head>
<body>
  <header>
    <div class="conteneur">
      <span>
        <a href="index.php" title="Mon Site">MonSite.com</a>
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
        <li><a href="/">Tous les produits</a></li>
        <?php for($i = 0; $i < count($categories) ; $i ++) : ?>
          <li><a href="/boutique/<?=  $categories[$i]['categorie'] ?>"><?=  $categories[$i]['categorie'] ?></a></li>
        <?php endfor; ?>
        <!-- La boucle ci-dessus parcourt tous les résultats de la requête SELECT DISTINCT CATEGORIE FROM PRODUIT. Le résultat un tableau multidimentionnel dans lequel à chaque indice (0, 1, 2 etc..) on récupère un array, avec la catégorie à l'indice 'categorie'. Donc $categories[$i]['categorie'] nous affiche chaque catégorie. -->

      </ul>
    </div>

    <div class="boutique-droite">

      <?php foreach($produits as $pdt) :  ?>
        <!-- Debut vignette produit -->
        <div class="boutique-produit">
          <h3><?= $pdt->getTitre() ?></h3>
          <a href="/produit/<?= $pdt->getId_produit() ?>"><img src="/photo/<?= $pdt->getPhoto() ?>" height="100"/></a>
          <p style="font-weight: bold; font-size: 20px;"><?= $pdt->getPrix() ?>€</p>

          <p style="height: 40px"><?= substr($pdt->getDescription(), 0, 40) ?>...</p>
          <a href="/produit/<?= $pdt->getId_produit() ?>" style="padding:5px 15px; background: red; color:white; text-align: center; border: 2px solid black; border-radius: 3px" >Voir la fiche</a>
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
