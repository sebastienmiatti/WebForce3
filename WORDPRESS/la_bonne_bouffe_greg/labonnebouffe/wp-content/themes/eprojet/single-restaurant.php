<?php get_header(); ?>	
	
	<?php if(is_front_page()) echo 'c bien Accueil'; else 'pas accueil'; ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h1><?php the_title(); ?></a></h1>
	<?php the_tags( '<span class="tag">', ',', '</span>' ); ?> 
	<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
	<div class="contenu"><?php the_content(); ?></div><br>
	 <p class="postmetadata">Catégorie <?php the_category(' &gt; '); ?></p>
	<?php //the_field('horaires');  // permet de récupérer le contenu d'un champ. ?>
	<?php $telephone = getField('telephone');  // permet de récupérer des informations sur un champ. ?>
	<?php $horaires = getField('horaires');  // permet de récupérer des informations sur un champ. ?>
	<?php $adresse = getField('adresse2');  // permet de récupérer des informations sur un champ. ?>
	<?php $promotion = getField('promotion');  // permet de récupérer des informations sur un champ. ?>
	<?php $brunch = getField('brunch');  // permet de récupérer des informations sur un champ. ?>
	<?php $typedecuisine = getField('typedecuisine');  // permet de récupérer des informations sur un champ. ?>
	<?php $prix_moyen = getField('prix_moyen');  // permet de récupérer des informations sur un champ. ?>
	<?php $la_carte = getField('la_carte');  // permet de récupérer des informations sur un champ. ?>
	<?php $acces = getField('acces');  // permet de récupérer des informations sur un champ. ?>
	
	<div class="telephone"><?php echo $telephone->label ; ?> : <?php echo $telephone->value ; ?></div>
	<div class="horaires"><?php echo $horaires->label ; ?> : <?php echo $horaires->value ; ?></div>
	<div class="adresse"><?php echo $adresse->label ; ?> : <?php echo $adresse->value['address'] ; ?></div>
	<div class="promotion"><?php echo $promotion->label ; ?> : <?php echo $promotion->value ; // si en promo, grosse fond rouge! ?></div>
	<div class="brunch"><?php echo $brunch->label ; ?> : <?php echo $brunch->value ; ?></div>
	<div class="typedecuisine"><?php echo $typedecuisine->label ; ?> : <?php echo $typedecuisine->value ; ?></div>
	<div class="prix-moyen"><?php echo $prix_moyen->label ; ?> : <?php echo $prix_moyen->value ; ?></div>
	<div class="la-carte"><?php echo $la_carte->label ; ?> : <?php echo $la_carte->value ; ?></div>
	<div class="acces"><?php echo $acces->label ; ?> : <?php echo $acces->value ; ?></div>
	
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="<?php bloginfo('template_directory'); ?>/assets/acf-map.js"></script>

<?php
$adresse = get_field('adresse2');

if( !empty($adresse) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $adresse['lat']; ?>" data-lng="<?php echo $adresse['lng']; ?>"></div>
</div>
<?php endif; ?>


	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
	 <?php endif; ?>
	 
<?php comments_template(); ?>
<?php get_footer(); ?>