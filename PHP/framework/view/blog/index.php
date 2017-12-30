<?php  ?>

<?php foreach($GLOBALS['blogs'] as $blog): ?>
    <div>
        Prénom: <a href="/blog/edit/?id=<?= $blog['id'] ?>"> <?= $blog['prenom'] ?> </a><br>
        Nom: <?= $blog['nom'] ?> <br>
        Téléphone: <?= $blog['phone'] ?> <br>
        <a href="/blog/delete/?id=<?= $blog['id'] ?>">Supprimer</a>
    </div>
    <hr>
<?php endforeach ?>
