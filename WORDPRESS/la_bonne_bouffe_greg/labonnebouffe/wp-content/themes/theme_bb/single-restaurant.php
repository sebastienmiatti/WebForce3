<?php get_header(); ?> 	

<?php if(have_posts()) : ?>

		<?php while(have_posts()) : the_post(); ?>
			<!-- debut contenu HMTL -->
			<h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
			<div class="contenu">
				<?php the_content(); ?>
			</div>
			
			<p class="postmetada">Retour à la catégorie <?php the_category('&gt'); ?></p><!-- fonction permettant de relier le restaurant à la catégorie et de créer un lien  -->
			
			<?php $photo = getField('photo'); ?> 
			<?php $telephone = getField('telephone'); ?> 
			<?php $horaires = getField('horaires'); ?>
			<?php $adresse = getField('adresse'); ?>
			<?php $promotion = getField('promotion'); ?>
			<?php $brunch = getField('brunch'); ?>
			<?php $type_de_cuisine = getField('type_de_cuisine'); ?>
			<?php $prix_moyen = getField('prix_moyen'); ?> 
			<?php $la_carte = getField('la_carte'); ?>
			<?php $acces = getField('acces'); ?>
			
			
			
			<div class="photo"><img src="<?php echo $photo->value; ?>"></div>
			<div class="telephone"><?php echo $telephone->label; ?> : <?php echo $telephone->value; ?></div>
			<div class="horaires"><?php echo $horaires->label; ?> : <?php echo $horaires->value; ?></div>
			<div class="telephone"><?php echo $telephone->label; ?> : <?php echo $telephone->value; ?></div>
			<div class="adresse"><?php echo $adresse->label; ?> : <?php echo $adresse->value; ?></div>
			<div class="type_de_cuisine"><?php echo $type_de_cuisine->label; ?> : <?php echo $type_de_cuisine->value; ?></div>
			<div class="la_carte"><?php echo $la_carte->label; ?> : <?php echo $la_carte->value; ?></div>
			<div class="acces"><?php echo $acces->label; ?> : <?php echo $acces->value; ?></div>
			<div class="brunch">
			<!-- Afficher oui ou non si le restaurant propose des promotions ou des brunch (et non 1 ou 0)-->
			<?php 
			//---- champ brunch
			echo $brunch->label . ' : ';  
			
			if($brunch->value == 1)
			{
				echo 'oui';
			}
			else
			{
				echo 'non';
			}
			
			?>
			</div>
			<div class="promotion">
			<?php
			//---- champ promotion
			echo $promotion->label . ' : ';  
			
			if($promotion->value == 1)
			{
				echo 'oui';
			}
			else
			{
				echo 'non';
			}
			?>
			</div>
			
			<!-- FIN contenu HTML -->
		<?php endwhile; ?>
	
	<?php endif; ?>
	
<?php get_footer(); ?> 	