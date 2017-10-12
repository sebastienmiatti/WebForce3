<?php get_header(); ?>
<?php showCategoryByPostType('restaurant'); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php echo category_description(get_cat_ID( get_cat_name('ville') )); ?>
	<div class="contenu-category"><?php $visuel = getImage(); //the_content(); ?>
	<a href="<?php the_permalink(); ?>"><span class="titre"><?php the_title(); ?></span><a/>
				<?php if (function_exists('the_ratings_results')): echo the_ratings_results(get_the_ID()); endif; // the_ID(); // affiche l'id du contenu courant. ?><br>
	<a href="<?php the_permalink(); ?>"><?php echo $visuel; ?></a>
	</div>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
	 <?php endif; ?>
	 
	 
	<div id="qui-sommes-nous">
		<?php 
			$qsn = new WP_query('pagename=qui-sommes-nous'); // je vais chercher une page en particulier.
			if($qsn->have_posts()) : 
				while($qsn->have_posts()): $qsn->the_post(); ?>
					<div class="content"><?php the_excerpt(); // l'extrait ?></div>
		<?php
			endwhile;
			endif;
		?>
	</div>
	 

<?php get_sidebar('region2'); ?>
<?php get_footer(); ?>