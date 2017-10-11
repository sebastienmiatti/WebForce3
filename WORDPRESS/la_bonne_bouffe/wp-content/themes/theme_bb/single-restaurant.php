<?php
get_header();
?>
 <?php if(have_posts()) : ?>
     <?php while(have_posts()) : the_post() ?>
            <!--DEBUT CONTENU HTML -->
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="contenu">
                <?php the_content(); ?>
            </div>



          <p class="postmetada"> Retour a la catégorie <?php the_category('&gt'); ?> </p> <!-- Fonction permettant de rellier le restaurant a la catégory et de créer un lien -->

            <?php $telephone = getField('telephone'); ?>
            <?php $horaire = getField('horaire'); ?>
            <?php $adresse = getField('adresse'); ?>
            <?php $promotion = getField('promotion'); ?>
            <?php $photo = getField('photo'); ?>
            <?php $brunch = getField('brunch'); ?>
            <?php $type_de_cuisine = getField('type_de_cuisine'); ?>
            <?php $prix_moyen = getField('prix_moyen'); ?>
            <?php $la_carte = getField('la_carte'); ?>
            <?php $acces = getField('acces'); ?>

            <div class="telephone"><?= $telephone->label; ?> : <?= $telephone->value; ?> </div>
            <div class="horaire"><?= $horaire->label; ?> : <?= $horaire->value; ?> </div>
            <div class="adresse"><?= $adresse->label; ?> : <?= $adresse->value; ?> </div>
            <div class="photo"> <img src="<?= $photo->value; ?>" </div>
            <div class="type_de_cuisine"><?= $type_de_cuisine->label; ?> : <?= $type_de_cuisine->value; ?> </div>
            <div class="prix_moyen"><?= $prix_moyen->label; ?> : <?= $prix_moyen->value; ?> </div>
            <div class="la_carte"><?= $la_carte->label; ?> : <?= $la_carte->value; ?> </div>
            <div class="acces"><?= $acces->label; ?> : <?= $acces->value; ?> </div>


             <!-- Afficher oui ou non si le restaurant propose des promotions ou des brunchs (et non 0 et 1)-->
          <div class="brunch">
               <?php echo $brunch->label . ' : '; // champ brunch
               if($brunch->value == 1){
                    echo 'Oui';
               }else{
                    echo 'Non';
               }
               ?>
               </div>

          <div class="promotion">
               <?php
               echo $promotion->label . ' : '; // champ promotion
                    if($promotion->value == 1){
                       echo 'Oui';
                 }else{
                       echo 'Non';
                 };
                 ?>
           </div>


            <!--<?php the_field('telephone'); ?>
            <?php the_field('adresse'); ?>
            <?php the_field('horaire'); ?>-->

            <!--FIN CONTENU HTML-->
     <?php endwhile; ?>
 <?php endif; ?>



<?php
get_footer();
?>
