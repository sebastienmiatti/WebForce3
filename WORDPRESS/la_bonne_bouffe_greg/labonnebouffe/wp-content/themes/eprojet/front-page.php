<?php get_header(); ?>	
<?php echo showCategory(); ?>	
	
	<?php if(is_front_page()) echo 'c bien Accueil'; else 'pas accueil'; ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="contenu"><?php the_content(); ?></div>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
	 <?php endif; ?>
	 
<?php get_footer(); ?>